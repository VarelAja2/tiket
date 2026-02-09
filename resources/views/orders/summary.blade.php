@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-16 text-white">

    <h1 class="text-3xl font-bold mb-6">Ringkasan Tiket</h1>

    <div class="bg-gray-800 rounded-lg p-6 space-y-4">

        <p><b>Kode Order:</b> {{ $order->order_code }}</p>
        <p><b>Nama:</b> {{ $order->buyer_name }}</p>
        <p><b>Email:</b> {{ $order->buyer_email }}</p>

        <hr class="border-gray-700">

        <p><b>Event:</b> {{ $order->ticket->event->title }}</p>
        <p><b>Jumlah Tiket:</b> {{ $order->qty }}</p>

        <p class="text-xl text-red-500 font-bold">
            Total: Rp {{ number_format($order->total_price,0,',','.') }}
        </p>

        <form method="POST" action="{{ route('order.pay', $order->id) }}">
            @csrf
            <button class="w-full bg-red-600 hover:bg-red-700 py-3 rounded-lg font-bold">
                Bayar Sekarang
            </button>
        </form>

    </div>
</div>
@endsection
