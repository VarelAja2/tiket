@extends('guest.layouts.app')

@section('content')
<section class="py-16 bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 max-w-5xl">

        <!-- TITLE -->
        <h1 class="text-4xl font-bold mb-10 text-center">
            Beli Tiket
            <span class="block text-red-500 text-lg font-medium mt-2">
                {{ $event->title }}
            </span>
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- LEFT: POSTER & INFO -->
            <div class="md:col-span-1">
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ $event->image_url }}"
                        class="w-full h-80 object-cover">

                    <div class="p-5 space-y-3">
                        <h3 class="text-xl font-bold">{{ $event->title }}</h3>
                        <p class="text-gray-400 text-sm">
                            {{ $event->event_date->format('d M Y') }} • {{ $event->start_time }}
                        </p>
                        <p class="text-gray-400 text-sm">
                            {{ $event->cinema->name }}
                        </p>
                        <p class="text-red-400 font-bold text-lg">
                            {{ $event->formatted_price }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- RIGHT: FORM -->
            <div class="md:col-span-2">
                <form action="{{ route('order.store') }}" method="POST"
                    class="bg-gray-800 rounded-xl p-8 space-y-6 border border-gray-700">

                    @csrf
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                    <!-- INPUT -->
                    <div>
                        <label class="block text-sm mb-2 text-gray-300">Nama Lengkap</label>
                        <input type="text" name="buyer_name" required
                            class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3
                            focus:outline-none focus:border-red-600">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-2 text-gray-300">No. Telepon</label>
                            <input type="text" name="buyer_phone" required
                                class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3">
                        </div>
                        <div>
                            <label class="block text-sm mb-2 text-gray-300">Email</label>
                            <input type="email" name="buyer_email" required
                                class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm mb-2 text-gray-300">Jumlah Tiket</label>
                        <input type="number" name="qty" min="1" value="1"
                            class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3">
                    </div>

                    <!-- PAYMENT -->
                    <div>
                        <p class="mb-3 text-gray-300 font-medium">Metode Pembayaran</p>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach (['dana','gopay','ovo'] as $method)
                                <label class="cursor-pointer">
                                    <input type="radio" name="payment_method"
                                        value="{{ $method }}" class="hidden peer" required>
                                    <div
                                        class="bg-gray-900 border border-gray-700 rounded-xl p-4
                                        text-center uppercase font-bold text-gray-400
                                        peer-checked:border-red-600 peer-checked:text-red-500
                                        transition-all duration-300">
                                        {{ $method }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- SUBMIT -->
                    <button type="submit"
                        class="w-full py-3 rounded-lg font-bold text-white
                        bg-gradient-to-r from-red-600 to-red-700
                        hover:from-red-700 hover:to-red-800
                        transition-all duration-300 hover:shadow-lg hover:shadow-red-900/30">
                        Bayar & Pesan Tiket
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
