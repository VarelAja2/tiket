@extends('guest.layouts.app')

@section('content')
    <div
        class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12 animate-fade-in-up">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full shadow-xl mb-6">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm3 1h6v4H7V5zm8 8h-6v-4h6v4zm0 2h-6v4h6v-4zM7 15h2v4H7v-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h1
                    class="text-4xl sm:text-5xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-4">
                    Pemesanan Tiket Talk Show
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-6">The Art of Mindful Leadership</p>

                <div
                    class="inline-flex items-center justify-center space-x-6 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">Sabtu, 20 Jan 2024</span>
                    </div>
                    <div class="w-1 h-1 bg-gray-300 rounded-full"></div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">Balai Sidang Jakarta</span>
                    </div>
                    <div class="w-1 h-1 bg-gray-300 rounded-full"></div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-purple-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">19:00 WIB</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Ticket Selection & Form -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Progress Steps -->
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div
                                        class="flex items-center justify-center w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full font-bold shadow-lg">
                                        1
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-bold text-gray-900 dark:text-white">Pilih Tiket</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">Pilih jenis dan jumlah tiket
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden sm:block h-1 w-24 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full">
                            </div>

                            <div class="flex-1">
                                <div class="flex items-center justify-end">
                                    <div class="mr-4 text-right">
                                        <div class="font-bold text-gray-900 dark:text-white">Isi Data</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">Informasi pemesan</div>
                                    </div>
                                    <div
                                        class="flex items-center justify-center w-10 h-10 bg-gray-200 dark:bg-gray-700 text-gray-500 rounded-full font-bold">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Ticket Types -->
                        <div class="space-y-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Pilih Jenis Tiket</h3>

                            @php
                                $ticketTypes = [
                                    [
                                        'id' => 'regular',
                                        'name' => 'Regular Ticket',
                                        'description' => 'Perfect for individuals who want to learn',
                                        'price' => 150000,
                                        'available' => true,
                                        'remaining' => null,
                                        'features' => [
                                            'Akses talk show 2.5 jam',
                                            'Workbook & materials',
                                            'Coffee break & snack',
                                            'Digital certificate',
                                        ],
                                        'color' => 'blue',
                                        'gradient' => 'from-blue-500 to-cyan-500',
                                        'badge' => 'Popular',
                                        'max_per_order' => 5,
                                    ],
                                    [
                                        'id' => 'vip',
                                        'name' => 'VIP Ticket',
                                        'description' => 'Enhanced experience with exclusive benefits',
                                        'price' => 300000,
                                        'available' => true,
                                        'remaining' => 5,
                                        'features' => [
                                            'Semua fasilitas Regular',
                                            'Networking session',
                                            'VIP seating area',
                                            'Meet & greet with speaker',
                                            'Exclusive merchandise',
                                            'Premium workbook',
                                        ],
                                        'color' => 'purple',
                                        'gradient' => 'from-purple-500 to-pink-500',
                                        'badge' => 'Best Value',
                                        'max_per_order' => 2,
                                    ],
                                    [
                                        'id' => 'vvip',
                                        'name' => 'VVIP Ticket',
                                        'description' => 'Ultimate experience with all-access',
                                        'price' => 500000,
                                        'available' => false,
                                        'remaining' => 0,
                                        'features' => [
                                            'Semua fasilitas VIP',
                                            'Backstage access',
                                            'Photo session',
                                            'Physical certificate',
                                            'Premium gift package',
                                            '1-on-1 consultation',
                                        ],
                                        'color' => 'amber',
                                        'gradient' => 'from-amber-500 to-orange-500',
                                        'badge' => 'Premium',
                                        'max_per_order' => 1,
                                    ],
                                ];
                            @endphp

                            @foreach ($ticketTypes as $ticket)
                                <div
                                    class="group relative overflow-hidden bg-white dark:bg-gray-800 border-2 border-gray-100 dark:border-gray-700 hover:border-{{ $ticket['color'] }}-300 dark:hover:border-{{ $ticket['color'] }}-500 rounded-2xl p-6 transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-1 {{ !$ticket['available'] ? 'opacity-50 cursor-not-allowed' : '' }}">
                                    <!-- Gradient Background Effect -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r opacity-0 group-hover:opacity-5 transition-opacity duration-300 {{ $ticket['gradient'] }}">
                                    </div>

                                    <!-- Badge -->
                                    @if ($ticket['badge'])
                                        <div class="absolute -top-3 -right-3">
                                            <div
                                                class="bg-gradient-to-r {{ $ticket['gradient'] }} text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg transform rotate-12">
                                                {{ $ticket['badge'] }}
                                            </div>
                                        </div>
                                    @endif

                                    <div class="relative">
                                        <div
                                            class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                                            <!-- Ticket Info -->
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-3">
                                                    <div
                                                        class="w-12 h-12 bg-gradient-to-r {{ $ticket['gradient'] }} rounded-xl flex items-center justify-center shadow-lg">
                                                        <svg class="w-6 h-6 text-white" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h4 class="font-bold text-xl text-gray-900 dark:text-white">
                                                            {{ $ticket['name'] }}</h4>
                                                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                                                            {{ $ticket['description'] }}</p>
                                                    </div>
                                                </div>

                                                <!-- Features -->
                                                <div class="grid grid-cols-2 gap-2 mb-4">
                                                    @foreach (array_slice($ticket['features'], 0, 4) as $feature)
                                                        <div class="flex items-center text-sm">
                                                            <svg class="w-4 h-4 mr-2 text-{{ $ticket['color'] }}-500"
                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            <span
                                                                class="text-gray-700 dark:text-gray-300">{{ $feature }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Price & Quantity -->
                                            <div class="flex flex-col items-end gap-4">
                                                <div class="text-right">
                                                    <div
                                                        class="text-3xl font-bold bg-gradient-to-r {{ $ticket['gradient'] }} bg-clip-text text-transparent">
                                                        Rp {{ number_format($ticket['price'], 0, ',', '.') }}
                                                    </div>
                                                    @if ($ticket['remaining'] !== null)
                                                        <div
                                                            class="text-sm text-{{ $ticket['color'] }}-500 dark:text-{{ $ticket['color'] }}-400 mt-1">
                                                            <span class="animate-pulse">•</span> {{ $ticket['remaining'] }}
                                                            kursi tersisa
                                                        </div>
                                                    @endif
                                                    @if (!$ticket['available'])
                                                        <div
                                                            class="text-sm text-red-500 dark:text-red-400 mt-1 font-medium">
                                                            Sold Out
                                                        </div>
                                                    @endif
                                                </div>

                                                <!-- Quantity Selector -->
                                                <div class="flex items-center">
                                                    <button type="button"
                                                        onclick="updateQuantity('{{ $ticket['id'] }}', -1)"
                                                        class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-l-xl flex items-center justify-center text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 disabled:opacity-30 disabled:cursor-not-allowed transition-all">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M20 12H4" />
                                                        </svg>
                                                    </button>
                                                    <input type="number" id="quantity-{{ $ticket['id'] }}"
                                                        data-price="{{ $ticket['price'] }}"
                                                        data-max="{{ $ticket['max_per_order'] }}"
                                                        data-available="{{ $ticket['available'] ? 'true' : 'false' }}"
                                                        value="{{ $ticket['id'] === 'regular' ? 1 : 0 }}" min="0"
                                                        max="{{ $ticket['max_per_order'] }}"
                                                        class="w-16 h-10 bg-white dark:bg-gray-800 border-y border-gray-200 dark:border-gray-700 text-center text-gray-900 dark:text-white font-bold text-lg focus:outline-none focus:ring-2 focus:ring-{{ $ticket['color'] }}-500"
                                                        onchange="validateQuantity('{{ $ticket['id'] }}')"
                                                        {{ !$ticket['available'] ? 'disabled' : '' }}>
                                                    <button type="button"
                                                        onclick="updateQuantity('{{ $ticket['id'] }}', 1)"
                                                        class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-r-xl flex items-center justify-center text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 disabled:opacity-30 disabled:cursor-not-allowed transition-all">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 4v16m8-8H4" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Buyer Information -->
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center">
                                <div
                                    class="flex items-center justify-center w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full font-bold shadow-lg">
                                    2
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Pemesan</h2>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Lengkapi data diri Anda</div>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500 bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full">
                                <span id="form-progress">0%</span> Terisi
                            </div>
                        </div>

                        <form id="booking-form" class="space-y-6">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event_id ?? 'EVT20240120' }}">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative">
                                    <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">
                                        <span class="text-red-500">*</span> Nama Lengkap
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="name" required
                                            class="w-full pl-10 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                            placeholder="Masukkan nama lengkap" oninput="updateFormProgress()">
                                    </div>
                                </div>
                                <div class="relative">
                                    <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">
                                        <span class="text-red-500">*</span> Email
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="email" name="email" required
                                            class="w-full pl-10 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                            placeholder="email@example.com" oninput="updateFormProgress()">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative">
                                    <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">
                                        <span class="text-red-500">*</span> Nomor Telepon
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <input type="tel" name="phone" required
                                            class="w-full pl-10 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                            placeholder="0812-3456-7890" oninput="updateFormProgress()">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">
                                        Jumlah Tamu
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 1.205a6 6 0 00-8.5-5.197" />
                                            </svg>
                                        </div>
                                        <input type="number" name="guest_count" min="1" max="5"
                                            value="1"
                                            class="w-full pl-10 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                            placeholder="Jumlah tamu yang hadir">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">
                                    Catatan Tambahan (Opsional)
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3 left-3">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                    </div>
                                    <textarea name="notes" rows="3"
                                        class="w-full pl-10 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                                        placeholder="Masukkan catatan atau permintaan khusus..."></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="w-full flex justify-center mt-10 mb-6">
                        <a href="{{ route('home') }}"
                            class="flex items-center gap-2
              bg-red-600 text-white
              px-6 py-3 rounded-full
              font-semibold
              hover:bg-red-700 transition">
                            Kembali
                        </a>
                    </div>

                </div>

                <!-- Right Column: Order Summary -->
                <div class="lg:col-span-1">
                    <div class="sticky top-6 space-y-8">
                        <!-- Order Summary -->
                        <div
                            class="bg-gradient-to-br from-blue-50 to-purple-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-2xl p-6 border border-blue-100 dark:border-gray-700">
                            <div class="flex items-center justify-between mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Ringkasan Pesanan</h2>
                                <div
                                    class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Order Items -->
                            <div class="space-y-4 mb-6" id="order-items">
                                <div class="text-center py-8 text-gray-500 dark:text-gray-400" id="empty-cart">
                                    <div
                                        class="w-20 h-20 mx-auto mb-4 bg-gradient-to-r from-blue-100 to-purple-100 dark:from-gray-700 dark:to-gray-800 rounded-full flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <p class="text-lg font-medium">Keranjang Kosong</p>
                                    <p class="text-sm mt-2">Pilih tiket untuk melihat ringkasan</p>
                                </div>
                            </div>

                            <!-- Price Breakdown -->
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between text-gray-600 dark:text-gray-400">
                                    <span>Subtotal</span>
                                    <span id="subtotal" class="font-medium">Rp 0</span>
                                </div>
                                <div class="flex justify-between text-gray-600 dark:text-gray-400">
                                    <span>Biaya Admin</span>
                                    <span id="admin-fee" class="font-medium">Rp 0</span>
                                </div>
                                <div class="flex justify-between text-gray-600 dark:text-gray-400">
                                    <span>PPN (10%)</span>
                                    <span id="tax" class="font-medium">Rp 0</span>
                                </div>
                                <div class="pt-4 border-t border-blue-100 dark:border-gray-700">
                                    <div class="flex justify-between text-xl font-bold">
                                        <span class="text-gray-900 dark:text-white">Total Pembayaran</span>
                                        <span
                                            class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent"
                                            id="total">Rp 0</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Countdown Timer -->
                            <div
                                class="bg-gradient-to-r from-blue-500/10 to-purple-500/10 dark:from-blue-500/20 dark:to-purple-500/20 rounded-xl p-4 mb-6">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center text-blue-600 dark:text-blue-400">
                                        <svg class="w-5 h-5 mr-2 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.415L11 9.586V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium">Waktu Tersisa</span>
                                    </div>
                                    <div class="text-2xl font-bold text-gray-900 dark:text-white font-mono"
                                        id="booking-timer">
                                        15:00
                                    </div>
                                </div>
                                <div class="w-full bg-blue-200 dark:bg-blue-800 rounded-full h-2">
                                    <div id="booking-progress"
                                        class="bg-gradient-to-r from-blue-600 to-purple-600 h-2 rounded-full transition-all duration-1000"
                                        style="width: 100%"></div>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <button id="continue-payment-btn"
                                class="w-full py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center shadow-lg hover:shadow-xl mb-4">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                Lanjutkan Pembayaran
                            </button>

                            <div class="space-y-3">
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 mr-2 text-green-500 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Transaksi 100% aman & terenkripsi
                                </div>
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 mr-2 text-green-500 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Garansi uang kembali 100%
                                </div>
                            </div>
                        </div>

                        <!-- Event Highlights -->
                        <div
                            class="bg-gradient-to-br from-amber-50 to-orange-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-xl p-6 border border-amber-100 dark:border-gray-700">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                        clip-rule="evenodd" />
                                </svg>
                                Highlight Event
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-amber-100 dark:bg-amber-900/30 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-amber-600 dark:text-amber-400" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 dark:text-gray-300">Speaker berpengalaman 10+ tahun</span>
                                </div>
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-amber-100 dark:bg-amber-900/30 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-amber-600 dark:text-amber-400" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 dark:text-gray-300">Networking dengan profesional</span>
                                </div>
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-amber-100 dark:bg-amber-900/30 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-amber-600 dark:text-amber-400" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 dark:text-gray-300">Sertifikat resmi & materi premium</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-modal"
        class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-3xl p-8 max-w-md mx-4 shadow-2xl transform transition-all duration-500 scale-95"
            id="modal-content">
            <div class="text-center">
                <div
                    class="w-24 h-24 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">Pemesanan Berhasil!</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-8">Tiket Anda telah dipesan. Silakan lanjutkan ke halaman
                    pembayaran.</p>
                <button onclick="window.location.href='/payment'"
                    class="w-full py-4 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl">
                    Lanjut ke Pembayaran
                </button>
            </div>
        </div>
    </div>


    <script>
        // Ticket booking system
        let order = {
            items: {},
            subtotal: 0,
            adminFee: 2500,
            tax: 0,
            total: 0
        };

        const ticketTypes = {
            regular: {
                price: 150000,
                name: 'Regular Ticket',
                color: 'blue',
                gradient: 'from-blue-600 to-cyan-600'
            },
            vip: {
                price: 300000,
                name: 'VIP Ticket',
                color: 'purple',
                gradient: 'from-purple-600 to-pink-600'
            },
            vvip: {
                price: 500000,
                name: 'VVIP Ticket',
                color: 'amber',
                gradient: 'from-amber-600 to-orange-600'
            }
        };

        // Booking countdown timer
        let bookingTime = 15 * 60; // 15 minutes in seconds
        const bookingTimer = document.getElementById('booking-timer');
        const bookingProgress = document.getElementById('booking-progress');

        function updateBookingTimer() {
            if (bookingTime <= 0) {
                bookingTimer.textContent = '00:00';
                bookingProgress.style.width = '0%';

                // Show warning
                if (Object.keys(order.items).length > 0) {
                    showNotification('Waktu booking habis! Silakan refresh halaman.', 'error');
                }
                return;
            }

            const minutes = Math.floor(bookingTime / 60);
            const seconds = bookingTime % 60;

            bookingTimer.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

            // Update progress bar
            const progress = (bookingTime / (15 * 60)) * 100;
            bookingProgress.style.width = `${progress}%`;

            // Change color when less than 5 minutes
            if (minutes < 5) {
                bookingProgress.classList.remove('from-blue-600', 'to-purple-600');
                bookingProgress.classList.add('from-red-600', 'to-orange-600');
            }

            bookingTime--;
        }

        setInterval(updateBookingTimer, 1000);
        updateBookingTimer();

        // Form progress tracking
        function updateFormProgress() {
            const form = document.getElementById('booking-form');
            const inputs = form.querySelectorAll('input[required]');
            let filled = 0;

            inputs.forEach(input => {
                if (input.value.trim()) filled++;
            });

            const progress = Math.round((filled / inputs.length) * 100);
            document.getElementById('form-progress').textContent = `${progress}%`;

            // Update progress bar color
            const progressBar = document.querySelector('.text-xs.bg-gray-100');
            if (progressBar) {
                if (progress === 100) {
                    progressBar.classList.remove('bg-gray-100', 'dark:bg-gray-700');
                    progressBar.classList.add('bg-green-100', 'dark:bg-green-900', 'text-green-800', 'dark:text-green-200');
                } else if (progress >= 50) {
                    progressBar.classList.remove('bg-gray-100', 'dark:bg-gray-700');
                    progressBar.classList.add('bg-blue-100', 'dark:bg-blue-900', 'text-blue-800', 'dark:text-blue-200');
                }
            }
        }

        // Ticket quantity management
        function updateQuantity(ticketId, change) {
            const input = document.getElementById(`quantity-${ticketId}`);
            const currentValue = parseInt(input.value) || 0;
            const max = parseInt(input.dataset.max);
            const available = input.dataset.available === 'true';

            if (!available) return;

            let newValue = currentValue + change;
            if (newValue < 0) newValue = 0;
            if (newValue > max) newValue = max;

            input.value = newValue;

            // Update order
            if (newValue === 0) {
                delete order.items[ticketId];
            } else {
                order.items[ticketId] = {
                    quantity: newValue,
                    ...ticketTypes[ticketId]
                };
            }

            updateOrderSummary();
            validateForm();
            updateFormProgress();
        }

        function validateQuantity(ticketId) {
            const input = document.getElementById(`quantity-${ticketId}`);
            let value = parseInt(input.value) || 0;
            const max = parseInt(input.dataset.max);
            const available = input.dataset.available === 'true';

            if (!available) {
                input.value = 0;
                return;
            }

            if (value < 0) value = 0;
            if (value > max) value = max;

            input.value = value;

            if (value === 0) {
                delete order.items[ticketId];
            } else {
                order.items[ticketId] = {
                    quantity: value,
                    ...ticketTypes[ticketId]
                };
            }

            updateOrderSummary();
            validateForm();
            updateFormProgress();
        }

        function updateOrderSummary() {
            const orderItemsContainer = document.getElementById('order-items');
            const emptyCart = document.getElementById('empty-cart');

            // Calculate totals
            order.subtotal = 0;
            Object.keys(order.items).forEach(ticketId => {
                const item = order.items[ticketId];
                order.subtotal += item.quantity * item.price;
            });

            order.tax = Math.round(order.subtotal * 0.1);
            order.total = order.subtotal + order.adminFee + order.tax;

            // Update display
            document.getElementById('subtotal').textContent = formatCurrency(order.subtotal);
            document.getElementById('admin-fee').textContent = formatCurrency(order.adminFee);
            document.getElementById('tax').textContent = formatCurrency(order.tax);
            document.getElementById('total').textContent = formatCurrency(order.total);

            // Update order items
            if (Object.keys(order.items).length === 0) {
                emptyCart.classList.remove('hidden');
                orderItemsContainer.innerHTML =
                    `<div class="text-center py-8 text-gray-500 dark:text-gray-400" id="empty-cart">${emptyCart.innerHTML}</div>`;
            } else {
                emptyCart.classList.add('hidden');

                let itemsHTML = '';
                Object.keys(order.items).forEach(ticketId => {
                    const item = order.items[ticketId];
                    const itemTotal = item.quantity * item.price;

                    itemsHTML += `
                <div class="flex items-center justify-between p-3 bg-white/50 dark:bg-gray-700/50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-r ${item.gradient} rounded-md flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-medium text-gray-900 dark:text-white">${item.name}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">${item.quantity} × ${formatCurrency(item.price, false)}</div>
                        </div>
                    </div>
                    <div class="font-bold text-${item.color}-600 dark:text-${item.color}-500">
                        ${formatCurrency(itemTotal)}
                    </div>
                </div>
            `;
                });

                orderItemsContainer.innerHTML = itemsHTML;
            }
        }

        function formatCurrency(amount, includePrefix = true) {
            return includePrefix ? 'Rp ' + amount.toLocaleString('id-ID') : amount.toLocaleString('id-ID');
        }

        function validateForm() {
            const continueBtn = document.getElementById('continue-payment-btn');
            const hasItems = Object.keys(order.items).length > 0;

            const form = document.getElementById('booking-form');
            const requiredFields = form.querySelectorAll('input[required]');
            let formValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) formValid = false;
            });

            continueBtn.disabled = !(hasItems && formValid);

            // Update button style
            if (!continueBtn.disabled) {
                continueBtn.classList.add('shadow-lg', 'hover:shadow-xl');
            } else {
                continueBtn.classList.remove('shadow-lg', 'hover:shadow-xl');
            }

            return hasItems && formValid;
        }

        function showNotification(message, type = 'success') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className =
                `fixed top-4 right-4 px-6 py-3 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300 ${type === 'error' ? 'bg-red-500' : 'bg-green-500'} text-white`;
            notification.textContent = message;
            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => notification.classList.remove('translate-x-full'), 100);

            // Remove after 3 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Event Listeners
        document.querySelectorAll('#booking-form input, #booking-form textarea').forEach(input => {
            input.addEventListener('input', () => {
                validateForm();
                updateFormProgress();
            });
        });

        document.getElementById('continue-payment-btn').addEventListener('click', function() {
            if (!validateForm()) {
                showNotification('Silakan lengkapi semua informasi yang diperlukan.', 'error');
                return;
            }

            if (bookingTime <= 0) {
                showNotification('Waktu booking habis! Silakan refresh halaman.', 'error');
                return;
            }

            // Show success modal with animation
            const modal = document.getElementById('success-modal');
            const modalContent = document.getElementById('modal-content');
            modal.classList.remove('hidden');
            setTimeout(() => modalContent.classList.remove('scale-95'), 100);

            // Prepare data for backend
            const formData = new FormData(document.getElementById('booking-form'));
            const orderData = {
                tickets: order.items,
                customer: {
                    name: formData.get('name'),
                    email: formData.get('email'),
                    phone: formData.get('phone'),
                    guest_count: formData.get('guest_count'),
                    notes: formData.get('notes')
                },
                summary: {
                    subtotal: order.subtotal,
                    admin_fee: order.adminFee,
                    tax: order.tax,
                    total: order.total
                },
                event_id: formData.get('event_id'),
                booking_time: bookingTime
            };

            console.log('Order data:', orderData);
        });

        // Close modal on outside click
        document.getElementById('success-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateQuantity('regular', 0);
            updateOrderSummary();
            validateForm();
            updateFormProgress();
        });
    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        /* Glass morphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 4px;
        }

        .dark ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #2563eb, #7c3aed);
        }

        /* Input number spinner hide */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        /* Smooth transitions */
        * {
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        /* Gradient text animation */
        .gradient-text {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6, #ec4899);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradient 3s ease infinite;
        }

        @keyframes gradient {

            0%,
            100% {
                background-position: 0% center;
            }

            50% {
                background-position: 100% center;
            }
        }
    </style>
@endsection
