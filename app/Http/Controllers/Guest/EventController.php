<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('guest.event.show', compact('event'));
    }
}
