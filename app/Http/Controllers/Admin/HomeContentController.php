<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Event;
use App\Models\Promo;
use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeContentController extends Controller
{
    // Banner Management
    public function bannerIndex()
    {
        $banners = Banner::orderBy('order')->paginate(10);
        return view('admin.home.banners.index', compact('banners'));
    }

    public function bannerCreate()
    {
        return view('admin.home.banners.create');
    }

    public function bannerStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_url' => 'nullable|url',
            'button_secondary_text' => 'nullable|string|max:50',
            'button_secondary_url' => 'nullable|url',
            'order' => 'required|integer',
            'is_active' => 'boolean',
            'type' => 'required|in:main,secondary'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners', 'public');
            $validated['image_url'] = Storage::url($path);
        }

        Banner::create($validated);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner created successfully.');
    }

    public function bannerEdit(Banner $banner)
    {
        return view('admin.home.banners.edit', compact('banner'));
    }

    public function bannerUpdate(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_url' => 'nullable|url',
            'button_secondary_text' => 'nullable|string|max:50',
            'button_secondary_url' => 'nullable|url',
            'order' => 'required|integer',
            'is_active' => 'boolean',
            'type' => 'required|in:main,secondary'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($banner->image_url) {
                $oldImage = str_replace('/storage/', '', $banner->image_url);
                Storage::disk('public')->delete($oldImage);
            }

            $path = $request->file('image')->store('banners', 'public');
            $validated['image_url'] = Storage::url($path);
        }

        $banner->update($validated);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner updated successfully.');
    }

    public function bannerDestroy(Banner $banner)
    {
        if ($banner->image_url) {
            $oldImage = str_replace('/storage/', '', $banner->image_url);
            Storage::disk('public')->delete($oldImage);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully.');
    }

    // Event Management
    public function eventIndex(Request $request)
    {
        $query = Event::with('category', 'genres')->latest();

        // Search
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Category filter
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Status filter
        if ($request->has('status') && $request->status) {
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
        $categories = \App\Models\Category::where('is_active', true)->get();

        return view('admin.events.index', compact('events', 'categories'));
    }

    public function eventCreate()
    {
        $categories = \App\Models\Category::where('is_active', true)->get();
        $genres = \App\Models\Genre::where('is_active', true)->get();
        return view('admin.events.create', compact('categories', 'genres'));
    }

    public function eventStore(Request $request)
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
            'promo_code' => 'nullable|string|max:50',
            'promo_discount' => 'nullable|integer|min:0|max:100',
            'promo_valid_until' => 'nullable|date',
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
            ->with('success', 'Event created successfully.');
    }

    public function eventEdit(Event $event)
    {
        $categories = \App\Models\Category::where('is_active', true)->get();
        $genres = \App\Models\Genre::where('is_active', true)->get();
        return view('admin.events.edit', compact('event', 'categories', 'genres'));
    }

    public function eventUpdate(Request $request, Event $event)
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
            'promo_code' => 'nullable|string|max:50',
            'promo_discount' => 'nullable|integer|min:0|max:100',
            'promo_valid_until' => 'nullable|date',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,id'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
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
            ->with('success', 'Event updated successfully.');
    }

    public function eventDestroy(Event $event)
    {
        if ($event->image_url) {
            $oldImage = str_replace('/storage/', '', $event->image_url);
            Storage::disk('public')->delete($oldImage);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
