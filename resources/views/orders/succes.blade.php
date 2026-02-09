@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-16 text-white text-center">

    <h1 class="text-4xl font-bold text-green-500 mb-4">
        Pembayaran Berhasil
    </h1>

    <p class="mb-6">Tunjukkan tiket ini saat masuk</p>

    <div class="bg-gray-800 p-6 rounded-lg space-y-2">
        <p><b>Kode:</b> {{ $order->order_code }}</p>
        <p><b>Event:</b> {{ $order->ticket->event->title }}</p>
        <p><b>Jumlah:</b> {{ $order->qty }} tiket</p>
        <p><b>Status:</b> {{ strtoupper($order->status) }}</p>
    </div>

</div>
@endsection
