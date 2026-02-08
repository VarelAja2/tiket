<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of event categories
     */
    public function index(Request $request)
    {
        $query = EventCategory::query();

        // Search filter
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->has('status') && $request->status) {
            if ($request->status == 'active') {
                $query->where('is_active', true);
            } elseif ($request->status == 'inactive') {
                $query->where('is_active', false);
            } elseif ($request->status == 'featured') {
                $query->where('is_featured', true);
            }
        }

        // Type filter
        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        $categories = $query->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(20);

        // Statistics
        $totalCategories = EventCategory::count();
        $activeCategories = EventCategory::where('is_active', true)->count();
        $featuredCategories = EventCategory::where('is_featured', true)->count();

        // Available types
        $types = [
            'seminar' => 'Seminar',
            'workshop' => 'Workshop',
            'konser' => 'Konser',
            'festival' => 'Festival',
            'kompetisi' => 'Kompetisi',
            'talk_show' => 'Talk Show',
            'general' => 'General',
        ];

        return view('admin.event-categories.index', compact(
            'categories',
            'totalCategories',
            'activeCategories',
            'featuredCategories',
            'types'
        ));
    }

    /**
     * Show the form for creating a new category
     */
    public function create()
    {
        $types = [
            'seminar' => 'Seminar',
            'workshop' => 'Workshop',
            'konser' => 'Konser',
            'festival' => 'Festival',
            'kompetisi' => 'Kompetisi',
            'talk_show' => 'Talk Show',
            'general' => 'General',
        ];

        return view('admin.event-categories.create', compact('types'));
    }

    /**
     * Store a newly created category in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:event_categories,name',
            'type' => 'required|in:seminar,workshop,konser,festival,kompetisi,talk_show,general',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['name']);

        // Handle duplicate slug
        $counter = 1;
        $originalSlug = $validated['slug'];
        while (EventCategory::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('event-categories', 'public');
            $validated['image'] = $path;
        }

        // Handle boolean fields
        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        // Default color based on type if not provided
        if (!$validated['color']) {
            $colors = [
                'seminar' => '#3b82f6',
                'workshop' => '#8b5cf6',
                'konser' => '#ef4444',
                'festival' => '#f59e0b',
                'kompetisi' => '#10b981',
                'talk_show' => '#ec4899',
                'general' => '#6b7280',
            ];
            $validated['color'] = $colors[$validated['type']] ?? '#6b7280';
        }

        // Create category
        EventCategory::create($validated);

        return redirect()->route('admin.event-categories.index')
            ->with('success', 'Kategori event berhasil ditambahkan.');
    }

    /**
     * Display the specified category
     */
    public function show(EventCategory $eventCategory)
    {
        $eventCategory->load(['events' => function ($query) {
            $query->orderBy('start_date', 'desc')->limit(10);
        }]);

        return view('admin.event-categories.show', compact('eventCategory'));
    }

    /**
     * Show the form for editing the specified category
     */
    public function edit(EventCategory $eventCategory)
    {
        $types = [
            'seminar' => 'Seminar',
            'workshop' => 'Workshop',
            'konser' => 'Konser',
            'festival' => 'Festival',
            'kompetisi' => 'Kompetisi',
            'talk_show' => 'Talk Show',
            'general' => 'General',
        ];

        return view('admin.event-categories.edit', compact('eventCategory', 'types'));
    }

    /**
     * Update the specified category in storage
     */
    public function update(Request $request, EventCategory $eventCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:event_categories,name,' . $eventCategory->id,
            'type' => 'required|in:seminar,workshop,konser,festival,kompetisi,talk_show,general',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Update slug if name changed
        if ($eventCategory->name != $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);

            // Handle duplicate slug
            $counter = 1;
            $originalSlug = $validated['slug'];
            while (EventCategory::where('slug', $validated['slug'])->where('id', '!=', $eventCategory->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($eventCategory->image && Storage::disk('public')->exists($eventCategory->image)) {
                Storage::disk('public')->delete($eventCategory->image);
            }

            $path = $request->file('image')->store('event-categories', 'public');
            $validated['image'] = $path;
        } elseif ($request->has('remove_image') && $request->remove_image) {
            // Remove existing image
            if ($eventCategory->image && Storage::disk('public')->exists($eventCategory->image)) {
                Storage::disk('public')->delete($eventCategory->image);
            }
            $validated['image'] = null;
        }

        // Handle boolean fields
        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        // Update category
        $eventCategory->update($validated);

        return redirect()->route('admin.event-categories.index')
            ->with('success', 'Kategori event berhasil diperbarui.');
    }

    /**
     * Remove the specified category from storage
     */
    public function destroy(EventCategory $eventCategory)
    {
        // Check if category has events
        if ($eventCategory->events_count > 0) {
            return redirect()->route('admin.event-categories.index')
                ->with('error', 'Tidak dapat menghapus kategori yang memiliki event.');
        }

        // Delete image if exists
        if ($eventCategory->image && Storage::disk('public')->exists($eventCategory->image)) {
            Storage::disk('public')->delete($eventCategory->image);
        }

        $eventCategory->delete();

        return redirect()->route('admin.event-categories.index')
            ->with('success', 'Kategori event berhasil dihapus.');
    }

    /**
     * Toggle active status
     */
    public function toggleActive(EventCategory $eventCategory)
    {
        $eventCategory->update(['is_active' => !$eventCategory->is_active]);

        $status = $eventCategory->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Kategori berhasil {$status}.");
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(EventCategory $eventCategory)
    {
        $eventCategory->update(['is_featured' => !$eventCategory->is_featured]);

        $status = $eventCategory->is_featured ? 'ditampilkan' : 'disembunyikan';
        return back()->with('success', "Kategori berhasil {$status} dari featured.");
    }

    /**
     * Update sort order
     */
    public function updateSortOrder(Request $request)
    {
        $request->validate([
            'categories' => 'required|array',
            'categories.*.id' => 'required|exists:event_categories,id',
            'categories.*.sort_order' => 'required|integer|min:0',
        ]);

        foreach ($request->categories as $categoryData) {
            EventCategory::where('id', $categoryData['id'])
                ->update(['sort_order' => $categoryData['sort_order']]);
        }

        return response()->json(['success' => true, 'message' => 'Urutan kategori berhasil diperbarui.']);
    }

    /**
     * Get categories for select dropdown (AJAX)
     */
    public function getCategoriesSelect(Request $request)
    {
        $query = EventCategory::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name');

        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        $categories = $query->get(['id', 'name', 'type', 'color']);

        return response()->json($categories);
    }
}
