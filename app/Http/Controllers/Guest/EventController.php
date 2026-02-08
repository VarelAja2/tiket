<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of all events (guest view)
     */
    public function index(Request $request)
    {
        // Default query for published events
        $query = Event::with(['category', 'organizer'])
            ->where('status', 'published')
            ->orderBy('start_date', 'asc');

        // Filter by category slug
        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by search term
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%");
            });
        }

        // Filter by date
        if ($request->has('date') && $request->date) {
            $query->whereDate('start_date', $request->date);
        }

        // Filter by price range
        if ($request->has('price_min') && $request->price_min) {
            $query->where('base_price', '>=', $request->price_min);
        }

        if ($request->has('price_max') && $request->price_max) {
            $query->where('base_price', '<=', $request->price_max);
        }

        // Filter free events
        if ($request->has('free_only') && $request->free_only) {
            $query->where('is_free', true);
        }

        // Get events with pagination
        $events = $query->paginate(12);

        // Get all active categories for filter
        $categories = EventCategory::where('is_active', true)
            ->orderBy('name')
            ->get();

        // Statistics
        $upcomingCount = Event::where('status', 'published')
            ->where('start_date', '>=', Carbon::today())
            ->count();

        $freeCount = Event::where('status', 'published')
            ->where('is_free', true)
            ->count();

        return view('guest.events.index', compact(
            'events',
            'categories',
            'upcomingCount',
            'freeCount'
        ));
    }

    /**
     * Display the specified event (general detail page)
     */
    public function show($slug)
    {
        $event = Event::with(['category', 'organizer', 'speakers'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Increment view count
        $event->increment('views');

        // Get related events (same category)
        $relatedEvents = Event::with('category')
            ->where('category_id', $event->category_id)
            ->where('id', '!=', $event->id)
            ->where('status', 'published')
            ->where('start_date', '>=', Carbon::today())
            ->orderBy('start_date', 'asc')
            ->limit(4)
            ->get();

        return view('guest.events.show', compact('event', 'relatedEvents'));
    }

    /**
     * Display seminar detail page
     */
    public function seminarDetail($slug)
    {
        return $this->showEventByType($slug, 'seminar', 'guest.events.seminar-detail');
    }

    /**
     * Display workshop detail page
     */
    public function workshopDetail($slug)
    {
        return $this->showEventByType($slug, 'workshop', 'guest.events.workshop-detail');
    }

    /**
     * Display konser detail page
     */
    public function konserDetail($slug)
    {
        return $this->showEventByType($slug, 'konser', 'guest.events.konser-detail');
    }

    /**
     * Display festival detail page
     */
    public function festivalDetail($slug)
    {
        return $this->showEventByType($slug, 'festival', 'guest.events.festival-detail');
    }

    /**
     * Display kompetisi detail page
     */
    public function kompetisiDetail($slug)
    {
        return $this->showEventByType($slug, 'kompetisi', 'guest.events.kompetisi-detail');
    }

    /**
     * Display talk show detail page
     */
    public function talkShowDetail($slug)
    {
        return $this->showEventByType($slug, 'talk_show', 'guest.events.talk-show-detail');
    }

    /**
     * Helper method to show event by type
     */
    private function showEventByType($slug, $type, $view)
    {
        $event = Event::with(['category', 'organizer'])
            ->where('slug', $slug)
            ->whereHas('category', function ($q) use ($type) {
                $q->where('type', $type);
            })
            ->where('status', 'published')
            ->firstOrFail();

        // Increment view count
        $event->increment('views');

        return view($view, compact('event'));
    }

    /**
     * Search events with AJAX
     */
    public function search(Request $request)
    {
        $query = Event::with('category')
            ->where('status', 'published')
            ->where('start_date', '>=', Carbon::today());

        if ($request->has('q') && $request->q) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $events = $query->orderBy('start_date', 'asc')
            ->limit(10)
            ->get();

        return response()->json($events);
    }

    /**
     * Get upcoming events for home page
     */
    public function upcoming()
    {
        $events = Event::with('category')
            ->where('status', 'published')
            ->where('start_date', '>=', Carbon::today())
            ->where('is_featured', true)
            ->orderBy('start_date', 'asc')
            ->limit(6)
            ->get();

        return response()->json($events);
    }

    /**
     * Get events by category for home page
     */
    public function byCategory($categorySlug)
    {
        $events = Event::with('category')
            ->where('status', 'published')
            ->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            })
            ->where('start_date', '>=', Carbon::today())
            ->orderBy('start_date', 'asc')
            ->limit(8)
            ->get();

        return response()->json($events);
    }
}
