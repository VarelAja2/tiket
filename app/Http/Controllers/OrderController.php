<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Simpan order dari form buy ticket
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'buyer_name' => 'required|string|max:255',
            'buyer_phone' => 'required|string|max:20',
            'buyer_email' => 'required|email',
            'qty' => 'required|integer|min:1',
            'payment_method' => 'required|in:dana,gopay,ovo',
        ]);

        // 2. Ambil tiket
        $ticket = Ticket::findOrFail($validated['ticket_id']);

        // 3. Cek stok
        if ($validated['qty'] > $ticket->stock) {
            return back()->withErrors([
                'qty' => 'Stok tiket tidak mencukupi'
            ]);
        }

        // 4. Buat order (PENDING)
        $order = Order::create([
            'order_code' => 'ORD-' . Str::upper(Str::random(8)),
            'user_id' => auth()->id(),
            'ticket_id' => $ticket->id,

            // data pembeli
            'buyer_name' => $validated['buyer_name'],
            'buyer_phone' => $validated['buyer_phone'],
            'buyer_email' => $validated['buyer_email'],

            // transaksi
            'qty' => $validated['qty'],
            'total_price' => $ticket->price * $validated['qty'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
        ]);

        // 5. Redirect ke halaman ringkasan
        return redirect()->route('order.summary', $order->id);
    }

    /**
     * Halaman ringkasan tiket
     */
    public function summary($id)
    {
        $order = Order::with('ticket.event')->findOrFail($id);

        return view('orders.summary', compact('order'));
    }

    /**
     * SIMULASI PAYMENT (DEV MODE)
     */
    public function pay($id)
    {
        $order = Order::with('ticket')->findOrFail($id);

        // Cegah double bayar
        if ($order->status === 'paid') {
            return redirect()->route('order.success', $order->id);
        }

        // Update status
        $order->update([
            'status' => 'paid',
            'paid_at' => now()
        ]);

        // Kurangi stok tiket
        $order->ticket->decrement('stock', $order->qty);

        return redirect()->route('order.success', $order->id);
    }

    /**
     * Halaman sukses
     */
    public function success($id)
    {
        $order = Order::with('ticket.event')->findOrFail($id);

        return view('orders.success', compact('order'));
    }
}
