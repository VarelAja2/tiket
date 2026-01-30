@extends('guest.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 pt-20 pb-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Success Header -->
            <div class="text-center mb-10 animate-fade-in-up">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-3">Pembayaran Berhasil!</h1>
                <p class="text-gray-600 dark:text-gray-300 text-lg">Tiket Anda telah dipesan dan siap digunakan.</p>
                <div
                    class="mt-4 inline-flex items-center text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/30 px-4 py-2 rounded-full text-sm font-medium">
                    <svg class="w-4 h-4 mr-2 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    Tiket Aktif • Valid untuk 24 jam
                </div>
            </div>

            <!-- Main Ticket Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden mb-8 border border-gray-200 dark:border-gray-700 animate-fade-in-up"
                style="animation-delay: 0.1s;">
                <!-- Ticket Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-700 p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-red-800/20 rounded-full -translate-y-16 translate-x-16">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-24 h-24 bg-red-800/20 rounded-full translate-y-12 -translate-x-12">
                    </div>

                    <div class="relative flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-white mb-2">Konser Dongker</h2>
                            <div class="flex items-center text-red-100">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                </svg>
                                <span class="text-lg">SMK BPPI BALEENDAH - LAPANGAN</span>
                            </div>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <div class="text-xl font-bold text-white bg-red-800/30 px-4 py-2 rounded-lg">ORDER
                                #TIX20231115001</div>
                            <div class="text-red-100 text-sm text-right mt-2">{{ now()->format('d M Y, H:i') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Ticket Content -->
                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Movie Information -->
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-5">
                                <h3
                                    class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider mb-4">
                                    INFORMASI EVENT </h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                                            <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span>Tanggal Event</span>
                                        </div>
                                        <span class="font-semibold text-gray-900 dark:text-white">Sabtu, 15 Nov 2026</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                                            <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Waktu</span>
                                        </div>
                                        <span class="font-semibold text-gray-900 dark:text-white">19:45 WIB</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                                            <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Durasi</span>
                                        </div>
                                        <span class="font-semibold text-gray-900 dark:text-white">3 jam 2 menit</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Buyer Information -->
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-5">
                                <h3
                                    class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider mb-4">
                                    INFORMASI PEMBELI</h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                                            <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <span>Nama</span>
                                        </div>
                                        <span class="font-semibold text-gray-900 dark:text-white">John Doe</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                                            <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <span>Email</span>
                                        </div>
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white truncate">john.doe@example.com</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                                            <svg class="w-5 h-5 mr-3 text-gray-400 dark:text-gray-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            <span>No. Telepon</span>
                                        </div>
                                        <span class="font-semibold text-gray-900 dark:text-white">0812-3456-7890</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Summary -->
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-5">
                                <h3
                                    class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider mb-4">
                                    RINCIAN PEMBAYARAN</h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between text-gray-600 dark:text-gray-300">
                                        <span>Tiket Single (3x)</span>
                                        <span class="font-medium">Rp 135.000</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 dark:text-gray-300">
                                        <span>Biaya Layanan</span>
                                        <span class="font-medium">Rp 5.000</span>
                                    </div>
                                    <div class="border-t border-gray-300 dark:border-gray-600 pt-3 mt-3">
                                        <div class="flex justify-between text-lg font-bold">
                                            <span class="text-gray-900 dark:text-white">Total Pembayaran</span>
                                            <span class="text-red-600 dark:text-red-400">Rp 140.000</span>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <div class="flex justify-between text-sm text-green-600 dark:text-green-400">
                                            <span>Metode Pembayaran</span>
                                            <span class="font-medium">Virtual Account BCA</span>
                                        </div>
                                        <div class="flex justify-between text-sm text-green-600 dark:text-green-400">
                                            <span>Status</span>
                                            <span class="font-medium flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Lunas
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- QR Code Section -->
                    <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                            <div class="lg:w-2/3">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Kode Tiket Digital</h3>
                                <div
                                    class="bg-gray-900 text-white font-mono text-2xl px-6 py-4 rounded-lg inline-block mb-4">
                                    TIX-{{ $ticket->code ?? 'ABC123XYZ456' }}
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    Tunjukkan QR code di bawah saat check-in di lokasi event. QR code akan aktif 2 jam
                                    sebelum
                                    event dimulai.
                                </p>
                                <div class="flex flex-wrap gap-3">
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Valid untuk 1x penggunaan</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Non-refundable & non-transferable</span>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:w-1/3">
                                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
                                    <div class="text-center mb-4">
                                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Scan QR Code</div>
                                        <div
                                            class="w-48 h-48 mx-auto bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-600">
                                            <!-- QR Code Generator API -->
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=TIX-{{ $ticket->code ?? 'ABC123XYZ456' }}&format=png&color=333333&bgcolor=ffffff&margin=10&qzone=2"
                                                alt="QR Code Tiket" class="w-full h-auto">
                                        </div>
                                        <div class="text-xs text-gray-400 dark:text-gray-500 mt-3">
                                            Aktif dari: 17:45 WIB
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 mb-10 animate-fade-in-up" style="animation-delay: 0.2s;">
                <button id="download-ticket-btn"
                    class="flex-1 bg-white dark:bg-gray-800 border-2 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white font-semibold py-4 px-6 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 flex items-center justify-center transform hover:scale-[1.02] active:scale-[0.98]">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download Tiket (PNG)
                </button>

                <button id="print-ticket-btn"
                    class="flex-1 bg-white dark:bg-gray-800 border-2 border-red-600 dark:border-red-500 text-red-600 dark:text-red-400 font-semibold py-4 px-6 rounded-xl hover:bg-red-50 dark:hover:bg-red-900/30 transition-all duration-300 flex items-center justify-center transform hover:scale-[1.02] active:scale-[0.98]">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                            clip-rule="evenodd" />
                    </svg>
                    Cetak Tiket
                </button>

                <a href="{{ route('home') }}"
                    class="flex-1 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center transform hover:scale-[1.02] active:scale-[0.98]">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Pesan Tiket Lain
                </a>
            </div>

            <!-- Instructions Section -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 mb-10 animate-fade-in-up"
                style="animation-delay: 0.3s;">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-red-600 dark:text-red-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Instruksi Penggunaan Tiket
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="text-center p-5 rounded-xl bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 group hover:shadow-lg transition-all duration-300">
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-red-600 to-red-700 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold group-hover:scale-110 transition-transform duration-300">
                            1
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-3 text-lg">Datang ke Lokasi</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            Datang minimal 30 menit sebelum event dimulai untuk proses check-in yang lancar.
                        </p>
                    </div>

                    <div
                        class="text-center p-5 rounded-xl bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 group hover:shadow-lg transition-all duration-300">
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-red-600 to-red-700 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold group-hover:scale-110 transition-transform duration-300">
                            2
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-3 text-lg">Tunjukkan Tiket</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            Tunjukkan QR code atau kode tiket di loket check-in untuk verifikasi.
                        </p>
                    </div>

                    <div
                        class="text-center p-5 rounded-xl bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 group hover:shadow-lg transition-all duration-300">
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-red-600 to-red-700 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold group-hover:scale-110 transition-transform duration-300">
                            3
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-3 text-lg">Ambil Tiket & Masuk</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            Petugas akan memberikan tiket fisik Anda dan Masuk ke lokasi event.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Customer Support -->
            <div class="text-center animate-fade-in-up" style="animation-delay: 0.4s;">
                <p class="text-gray-600 dark:text-gray-300 mb-6">Butuh bantuan? Tim customer service kami siap membantu
                    Anda.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="tel:02112345678"
                        class="inline-flex items-center justify-center px-6 py-3 bg-gray-800 dark:bg-gray-700 text-white rounded-lg hover:bg-gray-700 dark:hover:bg-gray-600 transition-colors duration-300">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        (021) 1234-5678
                    </a>
                    <a href="mailto:csbpix@gmail.com"
                        class="inline-flex items-center justify-center px-6 py-3 bg-gray-800 dark:bg-gray-700 text-white rounded-lg hover:bg-gray-700 dark:hover:bg-gray-600 transition-colors duration-300">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        csbpix@gmail.com
                    </a>
                    <button onclick="alert('Live chat sedang tidak tersedia. Silakan hubungi via telepon atau email.')"
                        class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-300">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        Live Chat
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include html2canvas for downloading ticket as image -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script>
        // Download Ticket as Image
        document.getElementById('download-ticket-btn').addEventListener('click', function() {
            const ticketCard = document.querySelector('.bg-white.dark\\:bg-gray-800.rounded-2xl.shadow-xl');
            const originalText = this.innerHTML;

            // Show loading state
            this.innerHTML = `
        <svg class="animate-spin h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Memproses...
    `;
            this.disabled = true;

            html2canvas(ticketCard, {
                scale: 2,
                backgroundColor: document.documentElement.classList.contains('dark') ? '#111827' :
                    '#ffffff',
                useCORS: true,
                logging: false,
                allowTaint: true
            }).then(canvas => {
                // Convert canvas to image
                const image = canvas.toDataURL('image/png');

                // Create download link
                const link = document.createElement('a');
                link.href = image;
                const ticketCode = document.querySelector('.bg-gray-900.text-white.font-mono').textContent
                    .trim();
                link.download = `tiket-${ticketCode}.png`;

                // Trigger download
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                // Show success state
                this.innerHTML = `
            <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
            Tiket Terdownload!
        `;
                this.classList.add('bg-green-50', 'dark:bg-green-900/20', 'border-green-500',
                    'dark:border-green-700', 'text-green-700', 'dark:text-green-400');

                // Revert after 2 seconds
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('bg-green-50', 'dark:bg-green-900/20', 'border-green-500',
                        'dark:border-green-700', 'text-green-700', 'dark:text-green-400');
                    this.disabled = false;
                }, 2000);
            }).catch(error => {
                console.error('Error generating image:', error);
                this.innerHTML = `
            <svg class="w-5 h-5 mr-3 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            Gagal Download
        `;
                this.classList.add('bg-red-50', 'dark:bg-red-900/20', 'border-red-500',
                    'dark:border-red-700', 'text-red-700', 'dark:text-red-400');

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('bg-red-50', 'dark:bg-red-900/20', 'border-red-500',
                        'dark:border-red-700', 'text-red-700', 'dark:text-red-400');
                    this.disabled = false;
                }, 2000);
            });
        });

        // Print Ticket
        document.getElementById('print-ticket-btn').addEventListener('click', function() {
            const originalText = this.innerHTML;
            this.innerHTML = `
        <svg class="animate-spin h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Mempersiapkan...
    `;
            this.disabled = true;

            // Simulate print preparation
            setTimeout(() => {
                window.print();

                this.innerHTML = `
            <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
            Print Dimulai
        `;

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 1500);
            }, 1000);
        });

        // Print media query
        const style = document.createElement('style');
        style.textContent = `
    @media print {
        body * {
            visibility: hidden;
        }
        .bg-white.dark\\:bg-gray-800.rounded-2xl.shadow-xl,
        .bg-white.dark\\:bg-gray-800.rounded-2xl.shadow-xl * {
            visibility: visible;
        }
        .bg-white.dark\\:bg-gray-800.rounded-2xl.shadow-xl {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            box-shadow: none;
            border: 1px solid #ddd;
        }
    }
`;
        document.head.appendChild(style);

        // Animation on load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.animate-fade-in-up');
            elements.forEach((el, index) => {
                el.style.animation = `fadeInUp 0.6s ease-out ${index * 0.1}s both`;
            });
        });
    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            opacity: 0;
        }

        /* Ticket subtle animation */
        @keyframes ticketGlow {

            0%,
            100% {
                box-shadow: 0 10px 30px rgba(239, 68, 68, 0.1);
            }

            50% {
                box-shadow: 0 10px 40px rgba(239, 68, 68, 0.2);
            }
        }

        .bg-white.dark\:bg-gray-800.rounded-2xl.shadow-xl {
            animation: ticketGlow 3s ease-in-out infinite;
        }

        /* Seat hover effect enhancement */
        .relative.group:hover .transform {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* QR code hover effect */
        img[alt="QR Code Tiket"] {
            transition: transform 0.3s ease;
        }

        img[alt="QR Code Tiket"]:hover {
            transform: scale(1.05);
        }

        /* Gradient text for success */
        .text-gradient {
            background: linear-gradient(135deg, #10b981 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .text-4xl {
                font-size: 2rem;
            }

            .text-2xl {
                font-size: 1.5rem;
            }

            .flex-col>.flex-col {
                margin-top: 1rem;
            }
        }
    </style>
@endsection
