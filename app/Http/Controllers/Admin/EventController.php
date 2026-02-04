<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::with('category', 'genres')->latest();

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('status')) {
            switch ($request->status) {
                case 'active':
                    $query->where('is_active', true);
                    break;
                case 'inactive':
                    $query->where('is_active', false);
                    break;
                case 'coming_soon':
                    $query->where('is_coming_soon', true);
                    break;
            }
        }

        $events = $query->paginate(10);
        $categories = Category::where('is_active', true)->get();

        return view('admin.events.index', compact('events', 'categories'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        $genres = Genre::where('is_active', true)->get();
        return view('admin.events.create', compact('categories', 'genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'rating' => 'nullable|numeric|min:0|max:10',
            'age_rating' => 'required|string|max:10',
            'duration' => 'nullable|string|max:50',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'is_coming_soon' => 'boolean',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'total_seats' => 'required|integer|min:1',
            'available_seats' => 'required|integer|min:0',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,id'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public');
            $validated['image_url'] = Storage::url($path);
        }

        $event = Event::create($validated);

        if ($request->has('genres')) {
            $event->genres()->sync($request->genres);
        }

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(Event $event)
    {
        $categories = Category::where('is_active', true)->get();
        $genres = Genre::where('is_active', true)->get();
        return view('admin.events.edit', compact('event', 'categories', 'genres'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'rating' => 'nullable|numeric|min:0|max:10',
            'age_rating' => 'required|string|max:10',
            'duration' => 'nullable|string|max:50',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'is_coming_soon' => 'boolean',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'total_seats' => 'required|integer|min:1',
            'available_seats' => 'required|integer|min:0',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,id'
        ]);

        if ($request->hasFile('image')) {
            if ($event->image_url) {
                $oldImage = str_replace('/storage/', '', $event->image_url);
                Storage::disk('public')->delete($oldImage);
            }

            $path = $request->file('image')->store('events', 'public');
            $validated['image_url'] = Storage::url($path);
        }

        $event->update($validated);

        if ($request->has('genres')) {
            $event->genres()->sync($request->genres);
        } else {
            $event->genres()->detach();
        }

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        if ($event->image_url) {
            $oldImage = str_replace('/storage/', '', $event->image_url);
            Storage::disk('public')->delete($oldImage);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}
