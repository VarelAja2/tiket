<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Cinema;

class CinemaController extends Controller
{
    public function index()
    {
        $cinemas = Cinema::active()->paginate(12);
        return view('guest.cinemas.index', compact('cinemas'));
    }

    public function show($id)
    {
        $cinema = Cinema::findOrFail($id);
        return view('guest.cinema.detail', compact('cinema'));
    }
}
