<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Event;
use App\Models\Promo;
use App\Models\Cinema;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Pastikan semua variable ada
        $banners = Banner::active()->ordered()->take(4)->get();

        $nowPlayingEvents = Event::where('is_active', true)
            ->where('is_coming_soon', false)
            ->whereDate('event_date', '>=', now())
            ->with('genres')
            ->orderBy('event_date')
            ->take(8)
            ->get();

        $comingSoonEvents = Event::where('is_active', true)
            ->where('is_coming_soon', true)
            ->with('genres')
            ->orderBy('event_date')
            ->take(5)
            ->get();

        $activePromo = Promo::active()->first();

        // Jika model Cinema belum ada, gunkan data dummy atau buat modelnya
        $cinemas = [];
        if (class_exists(Cinema::class)) {
            $cinemas = Cinema::where('is_active', true)->take(3)->get();
        } else {
            // Data dummy jika model Cinema belum dibuat
            $cinemas = collect([
                (object) [
                    'name' => 'XXI Plaza Indonesia',
                    'location' => 'Jakarta Pusat',
                    'studio_count' => 12,
                    'facilities' => 'Dolby Atmos, IMAX, 4DX, Food Court'
                ],
                (object) [
                    'name' => 'CGV Grand Indonesia',
                    'location' => 'Jakarta Pusat',
                    'studio_count' => 10,
                    'facilities' => 'ScreenX, Gold Class, SweetBox, Starbucks'
                ],
                (object) [
                    'name' => 'Cinema 31 BSD City',
                    'location' => 'Tangerang Selatan',
                    'studio_count' => 8,
                    'facilities' => 'Velvet Class, 3D Digital, Cafe, Playground'
                ]
            ]);
        }

        return view('guest.home', compact(
            'banners',
            'nowPlayingEvents',
            'comingSoonEvents',
            'activePromo',
            'cinemas'
        ));
    }

    public function showEvent($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('guest.events.show', compact('event'));
    }

    public function nowPlaying()
    {
        $events = Event::where('is_active', true)
            ->where('is_coming_soon', false)
            ->whereDate('event_date', '>=', now())
            ->orderBy('event_date')
            ->paginate(12);

        return view('guest.events.now-playing', compact('events'));
    }

    public function comingSoon()
    {
        $events = Event::where('is_active', true)
            ->where('is_coming_soon', true)
            ->orderBy('event_date')
            ->paginate(12);

        return view('guest.events.coming-soon', compact('events'));
    }

    public function promo()
    {
        $promos = Promo::active()->paginate(12);
        return view('guest.promo.index', compact('promos'));
    }

    public function cinemas()
    {
        $cinemas = Cinema::where('is_active', true)->paginate(12);
        return view('guest.cinemas.index', compact('cinemas'));
    }
}
