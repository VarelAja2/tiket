@extends('layouts.app')

@section('title', 'Detail Booking #' . $booking->booking_code)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Booking</h1>
                <p class="text-gray-600">Kode: <span class="font-semibold">{{ $booking->booking_code }}</span></p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.bookings.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
                <button onclick="window.print()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-print mr-2"></i> Print
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column: Booking Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Booking Summary -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Booking</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Kode Booking</p>
                            <p class="font-medium">{{ $booking->booking_code }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Tanggal Booking</p>
                            <p class="font-medium">{{ $booking->created_at->format('d F Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Status</p>
                            <span
                                class="px-3 py-1 text-xs rounded-full 
                            {{ $booking->status == 'pending'
                                ? 'bg-yellow-100 text-yellow-800'
                                : ($booking->status == 'confirmed'
                                    ? 'bg-green-100 text-green-800'
                                    : ($booking->status == 'cancelled'
                                        ? 'bg-red-100 text-red-800'
                                        : 'bg-blue-100 text-blue-800')) }}">
                                {{ strtoupper($booking->status) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Metode Pembayaran</p>
                            <p class="font-medium">{{ $booking->payment_method ?? 'Transfer Bank' }}</p>
                        </div>
                    </div>
                </div>

                <!-- User Information -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pemesan</h2>
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-gray-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">{{ $booking->user->name }}</p>
                            <p class="text-sm text-gray-600">{{ $booking->user->email }}</p>
                            <p class="text-sm text-gray-600">{{ $booking->user->phone ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Event Information -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Event</h2>
                    <div class="flex items-start">
                        <img src="{{ $booking->event->image_url }}" alt="{{ $booking->event->title }}"
                            class="w-24 h-32 object-cover rounded-lg mr-4">
                        <div>
                            <h3 class="font-bold text-lg">{{ $booking->event->title }}</h3>
                            <p class="text-gray-600 mb-2">{{ $booking->event->short_description }}</p>
                            <div class="flex items-center space-x-4 text-sm">
                                <span class="flex items-center">
                                    <i class="fas fa-calendar mr-2 text-gray-500"></i>
                                    {{ $booking->event->event_date->format('d F Y') }}
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-clock mr-2 text-gray-500"></i>
                                    {{ $booking->event->event_time }}
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-gray-500"></i>
                                    {{ $booking->event->location }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Tickets & Payment -->
            <div class="space-y-6">
                <!-- Ticket Details -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Detail Tiket</h2>
                    <div class="space-y-3">
                        @foreach ($booking->tickets as $ticket)
                            <div class="border border-gray-200 rounded-lg p-3">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-medium">Tiket {{ $loop->iteration }}</p>
                                        <p class="text-sm text-gray-600">Seat: {{ $ticket->seat->seat_number ?? '-' }}</p>
                                        <p class="text-sm text-gray-600">Harga: Rp
                                            {{ number_format($ticket->price, 0, ',', '.') }}</p>
                                    </div>
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded">
                                        {{ $ticket->ticket_type }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Payment Summary -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan Pembayaran</h2>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span>Rp {{ number_format($booking->subtotal, 0, ',', '.') }}</span>
                        </div>
                        @if ($booking->discount_amount > 0)
                            <div class="flex justify-between text-green-600">
                                <span>Diskon</span>
                                <span>- Rp {{ number_format($booking->discount_amount, 0, ',', '.') }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between">
                            <span class="text-gray-600">Biaya Layanan</span>
                            <span>Rp {{ number_format($booking->service_fee, 0, ',', '.') }}</span>
                        </div>
                        <div class="border-t pt-2 mt-2">
                            <div class="flex justify-between font-bold">
                                <span>Total</span>
                                <span class="text-lg">Rp {{ number_format($booking->total_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Aksi</h2>
                    <div class="space-y-3">
                        <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Ubah Status</label>
                                <select name="status"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>
                                        Confirmed</option>
                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                                        Cancelled</option>
                                    <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg">
                                Update Status
                            </button>
                        </form>

                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus booking ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded-lg">
                                Hapus Booking
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .print-section,
            .print-section * {
                visibility: visible;
            }

            .print-section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
@endsection
