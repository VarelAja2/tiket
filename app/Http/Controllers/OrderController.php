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
        $validated = $request->validate([
            'ticket_id'       => 'required|exists:tickets,id',
            'buyer_name'      => 'required|string|max:255',
            'buyer_phone'     => 'required|string|max:20',
            'buyer_email'     => 'required|email',
            'qty'             => 'required|integer|min:1',
            'payment_method'  => 'required|in:dana,gopay,ovo',
        ]);

        $ticket = Ticket::findOrFail($validated['ticket_id']);

        if ($validated['qty'] > $ticket->stock) {
            return back()->withErrors([
                'qty' => 'Stok tiket tidak mencukupi'
            ]);
        }

        $order = Order::create([
            'order_code'     => 'ORD-' . Str::upper(Str::random(8)),
            'user_id'        => auth()->id(),
            'ticket_id'      => $ticket->id,

            'buyer_name'     => $validated['buyer_name'],
            'buyer_phone'    => $validated['buyer_phone'],
            'buyer_email'    => $validated['buyer_email'],

            'qty'            => $validated['qty'],
            'total_price'    => $ticket->price * $validated['qty'],
            'payment_method' => $validated['payment_method'],
            'status'         => 'pending',
        ]);

        return redirect()->route('order.summary', $order->id);
    }

    /**
     * Halaman ringkasan / keterangan tiket
     */
    public function summary($id)
    {
        $order = Order::with('ticket.event')->findOrFail($id);

        return view('orders.summary', compact('order'));
    }

    /**
     * Simulasi pembayaran
     */
    public function pay($id)
    {
        $order = Order::with('ticket')->findOrFail($id);

        if ($order->status === 'paid') {
            return redirect()->route('order.success', $order->id);
        }

        $order->update([
            'status'  => 'paid',
            'paid_at' => now(),
        ]);

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
