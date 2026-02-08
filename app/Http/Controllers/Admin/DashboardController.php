<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Event;
use App\Models\Banner;
use App\Models\Promo;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser     = User::count();
        $totalOrder    = Order::count();
        $orderPaid     = Order::where('status', 'paid')->count();
        $orderPending  = Order::where('status', 'pending')->count();

        // NEW: Tambahkan data untuk backend management
        $totalEvents   = Event::count();
        $totalBanners  = Banner::count();
        $totalPromos   = Promo::count();
        $activeEvents  = Event::where('is_active', true)->count();
        $activeBanners = Banner::where('is_active', true)->count();

        // Recent data
        $recentEvents = Event::latest()->take(5)->get();
        $recentBanners = Banner::latest()->take(3)->get();
        $recentOrders = Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalOrder',
            'orderPaid',
            'orderPending',
            'totalEvents',
            'totalBanners',
            'totalPromos',
            'activeEvents',
            'activeBanners',
            'recentEvents',
            'recentBanners',
            'recentOrders'
        ));
    }
}
