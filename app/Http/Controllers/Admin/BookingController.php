<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'event'])
            ->latest();

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Filter by date
        if ($request->has('date') && $request->date) {
            $query->whereDate('created_at', $request->date);
        }

        // Filter by event
        if ($request->has('event_id') && $request->event_id) {
            $query->where('event_id', $request->event_id);
        }

        // Filter by user
        if ($request->has('user_id') && $request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('booking_code', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    })
                    ->orWhereHas('event', function ($q) use ($search) {
                        $q->where('title', 'like', "%{$search}%");
                    });
            });
        }

        $bookings = $query->paginate(20);
        $events = Event::where('is_active', true)->get();
        $users = User::latest()->take(50)->get();

        // Statistics
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();

        return view('admin.bookings.index', compact(
            'bookings',
            'events',
            'users',
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'cancelledBookings'
        ));
    }

    public function show(Booking $booking)
    {
        $booking->load(['user', 'event', 'tickets.seat']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed'
        ]);

        $oldStatus = $booking->status;
        $booking->status = $request->status;
        $booking->save();

        // Log status change
        activity()
            ->performedOn($booking)
            ->withProperties([
                'old_status' => $oldStatus,
                'new_status' => $request->status,
                'changed_by' => auth()->user()->name
            ])
            ->log('Booking status updated');

        return back()->with('success', 'Status booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        // Check if booking can be deleted
        if ($booking->status == 'confirmed') {
            return back()->with('error', 'Tidak dapat menghapus booking yang sudah dikonfirmasi.');
        }

        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil dihapus.');
    }

    public function export(Request $request)
    {
        $bookings = Booking::with(['user', 'event'])
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->when($request->start_date, fn($q) => $q->whereDate('created_at', '>=', $request->start_date))
            ->when($request->end_date, fn($q) => $q->whereDate('created_at', '<=', $request->end_date))
            ->get();

        // Return view for now, can be extended to CSV/Excel export
        return view('admin.bookings.export', compact('bookings'));
    }

    public function statistics()
    {
        // Daily bookings for last 30 days
        $dailyBookings = Booking::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as total'),
            DB::raw('SUM(total_amount) as revenue')
        )
            ->where('status', 'confirmed')
            ->whereDate('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Bookings by status
        $statusStats = Booking::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->get();

        // Top events by bookings
        $topEvents = Booking::select('event_id', DB::raw('COUNT(*) as total'))
            ->with('event')
            ->where('status', 'confirmed')
            ->groupBy('event_id')
            ->orderByDesc('total')
            ->take(10)
            ->get();

        // Revenue by month
        $monthlyRevenue = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('SUM(total_amount) as revenue')
        )
            ->where('status', 'confirmed')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        return view('admin.bookings.statistics', compact(
            'dailyBookings',
            'statusStats',
            'topEvents',
            'monthlyRevenue'
        ));
    }
}
