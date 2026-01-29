<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalOrder = Order::count();
        $orderPaid = Order::where('status', 'paid')->count();
        $orderPending = Order::where('status', 'pending')->count();

        return view('admin.dashboard', [
            'totalUser'    => User::count(),
            'totalOrder'   => Order::count(),
            'orderPaid'    => Order::where('status', 'paid')->count(),
            'orderPending' => Order::where('status', 'pending')->count(),
        ]);
    }
}
