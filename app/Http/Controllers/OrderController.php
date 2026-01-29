<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'qty' => 'required|integer|min:1'
        ]);

        // 2. Ambil tiket
        $ticket = Ticket::findOrFail($validated['ticket_id']);

        // 3. Cek stok
        if ($validated['qty'] > $ticket->stock) {
            return back()->withErrors([
                'qty' => 'Stok tiket tidak mencukupi'
            ]);
        }

        // 4. Buat order
        $order = Order::create([
            'order_code' => 'ORD-' . Str::upper(Str::random(8)),
            'user_id' => auth()->id(),
            'ticket_id' => $ticket->id,
            'qty' => $validated['qty'],
            'total_price' => $ticket->price * $validated['qty'],
            'status' => 'pending'
        ]);

        return redirect()->route('order.pending', $order->id);
    }

    // SIMULASI PAYMENT (DEV MODE)
    public function pay($id)
    {
        $order = Order::findOrFail($id);

        // Cegah double bayar
        if ($order->status === 'paid') {
            return redirect()->route('order.success', $order->id);
        }

        $order->update([
            'status' => 'paid',
            'paid_at' => now()
        ]);

        // (opsional) kurangi stok
        $order->ticket->decrement('stock', $order->qty);

        return redirect()->route('order.success', $order->id);
    }
}
