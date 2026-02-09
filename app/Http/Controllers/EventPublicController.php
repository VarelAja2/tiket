<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::with('category')
            ->where('status', 'published');

        // Filter kategori
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $events = $query
            ->orderBy('start_date', 'asc')
            ->paginate(12)
            ->withQueryString(); // ⬅️ penting untuk pagination + filter

        $categories = Category::where('is_active', true)->get();

        return view('guest.events.index', compact('events', 'categories'));
    }
}
