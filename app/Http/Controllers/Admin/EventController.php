<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\Genre;
use App\Models\EventCategory;
use App\Models\EventOrganizer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::with(['category', 'organizer']);

        // Filters
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%");
            });
        }

        // Filter by date range
        if ($request->has('date_from') && $request->date_from) {
            $query->where('start_date', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to) {
            $query->where('start_date', '<=', $request->date_to);
        }

        $events = $query->latest()->paginate(20);

        // Statistics for dashboard
        $totalEvents = Event::count();
        $publishedEvents = Event::where('status', 'published')->count();
        $upcomingEvents = Event::where('start_date', '>=', now())->count();
        $featuredEvents = Event::where('is_featured', true)->count();

        $categories = EventCategory::where('is_active', true)->get();
        $statuses = ['draft', 'published', 'cancelled', 'completed'];

        return view('admin.events.index', compact(
            'events',
            'categories',
            'statuses',
            'totalEvents',
            'publishedEvents',
            'upcomingEvents',
            'featuredEvents'
        ));
    }

    /**
     * Show the form for creating a new event
     */
    public function create()
    {
        // Gunakan model Category yang sudah ada
        $categories = Category::where('type', 'event')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $organizers = EventOrganizer::where('is_active', true)->get();

        return view('admin.events.create', compact('categories', 'organizers'));
    }

    /**
     * Store a newly created event in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'location' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'age_rating' => 'nullable|in:SU,13+,17+,21+',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'is_free' => 'boolean',
            'base_price' => 'required_if:is_free,false|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'discount_start' => 'nullable|date',
            'discount_end' => 'nullable|date|after_or_equal:discount_start',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:draft,published,cancelled,completed',
            'is_featured' => 'boolean',
            'whats_included' => 'nullable|string',
            'requirements' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('events', 'public');
                $validated['image'] = $imagePath;
            }

            // Set default values
            $validated['is_free'] = $request->has('is_free');
            $validated['is_featured'] = $request->has('is_featured');

            // Generate slug
            $validated['slug'] = Str::slug($request->title);

            // Set available seats same as capacity initially
            $validated['available_seats'] = $validated['capacity'];

            // Create event
            $event = Event::create($validated);

            return redirect()->route('admin.events.index')
                ->with('success', 'Event berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Gagal menambahkan event: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified event (Admin view)
     */
    public function show(Event $event)
    {
        $event->load(['category', 'organizer', 'speakers', 'tickets', 'galleries', 'registrations.user']);

        // Statistics for this event
        $registrationStats = [
            'total' => $event->registrations_count,
            'confirmed' => $event->registrations()->where('status', 'confirmed')->count(),
            'pending' => $event->registrations()->where('status', 'pending')->count(),
            'cancelled' => $event->registrations()->where('status', 'cancelled')->count(),
        ];

        return view('admin.events.show', compact('event', 'registrationStats'));
    }

    /**
     * Show the form for editing the specified event
     */
    public function edit(Event $event)
    {
        // Gunakan model Category yang sudah ada
        $categories = Category::where('type', 'event') // Filter hanya kategori event
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $organizers = EventOrganizer::where('is_active', true)->get();

        return view('admin.events.edit', compact('event', 'categories', 'organizers'));
    }

    /**
     * Update the specified event in storage
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:event_categories,id',
            'organizer_id' => 'nullable|exists:event_organizers,id',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'location' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'base_price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'discount_start' => 'nullable|date',
            'discount_end' => 'nullable|date|after_or_equal:discount_start',
            'capacity' => 'required|integer|min:1',
            'is_free' => 'boolean',
            'is_featured' => 'boolean',
            'status' => 'required|in:draft,published,cancelled,completed',
            'age_rating' => 'nullable|string|max:20',
            'terms_conditions' => 'nullable|string',
            'whats_included' => 'nullable|string',
            'requirements' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        // Update slug if title changed
        if ($event->title != $validated['title']) {
            $baseSlug = Str::slug($validated['title']);
            $slug = $baseSlug;
            $counter = 1;

            while (Event::where('slug', $slug)->where('id', '!=', $event->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $validated['slug'] = $slug;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image_url && Storage::disk('public')->exists($event->image_url)) {
                Storage::disk('public')->delete($event->image_url);
            }

            $path = $request->file('image')->store('events', 'public');
            $validated['image_url'] = $path;
        }

        // Handle boolean fields
        $validated['is_free'] = $request->has('is_free');
        $validated['is_featured'] = $request->has('is_featured');

        // Update event
        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Remove the specified event from storage
     */
    public function destroy(Event $event)
    {
        // Check if event has registrations
        if ($event->registrations_count > 0) {
            return redirect()->route('admin.events.index')
                ->with('error', 'Tidak dapat menghapus event yang sudah memiliki pendaftar.');
        }

        // Delete image if exists
        if ($event->image_url && Storage::disk('public')->exists($event->image_url)) {
            Storage::disk('public')->delete($event->image_url);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus.');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Event $event)
    {
        $event->update(['is_featured' => !$event->is_featured]);

        $status = $event->is_featured ? 'ditampilkan' : 'disembunyikan';
        return back()->with('success', "Event berhasil {$status} dari featured.");
    }

    /**
     * Toggle status (publish/unpublish)
     */
    public function toggleStatus(Event $event)
    {
        $newStatus = $event->status === 'published' ? 'draft' : 'published';
        $event->update(['status' => $newStatus]);

        $statusText = $newStatus === 'published' ? 'dipublikasikan' : 'disimpan sebagai draft';
        return back()->with('success', "Event berhasil {$statusText}.");
    }
}
