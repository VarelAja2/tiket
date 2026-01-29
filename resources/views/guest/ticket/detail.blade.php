@extends('guest.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 pt-24">
        <div class="container mx-auto px-4 max-w-4xl">
            <!-- Ticket Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-600 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h1 class="text-4xl font-bold mb-2">Pembayaran Berhasil!</h1>
                <p class="text-gray-300">Tiket Anda telah dipesan. Detail tiket dapat dilihat di bawah ini.</p>
            </div>

            <!-- Ticket Card -->
            <div class="bg-gradient-to-r from-red-900/20 to-gray-900/30 rounded-2xl overflow-hidden mb-8">
                <!-- Ticket Header -->
                <div class="bg-gray-800 p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div>
                            <h2 class="text-2xl font-bold">Avengers: Endgame</h2>
                            <p class="text-gray-400">XXI Plaza Indonesia • Studio 5</p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <div class="text-lg font-bold text-red-500">ORDER #TIX20231115001</div>
                            <div class="text-gray-400 text-sm">{{ now()->format('d M Y, H:i') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Ticket Details -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-gray-400 text-sm mb-2">INFORMASI FILM</h3>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Tanggal Tayang</span>
                                        <span class="font-semibold">15 Nov 2023</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Jam Tayang</span>
                                        <span class="font-semibold">19:45 WIB</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Durasi</span>
                                        <span class="font-semibold">3 jam 2 menit</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-gray-400 text-sm mb-2">KURSI</h3>
                                <div class="flex flex-wrap gap-2">
                                    @php $seats = ['A5', 'A6', 'A7'] @endphp
                                    @foreach ($seats as $seat)
                                        <div class="px-4 py-2 bg-red-600 text-white rounded-lg font-bold">
                                            {{ $seat }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-gray-400 text-sm mb-2">INFORMASI PEMBELI</h3>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Nama</span>
                                        <span class="font-semibold">John Doe</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Email</span>
                                        <span class="font-semibold">john@example.com</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">No. Telepon</span>
                                        <span class="font-semibold">0812-3456-7890</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-gray-400 text-sm mb-2">RINCIAN PEMBAYARAN</h3>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Tiket (3x)</span>
                                        <span class="font-semibold">Rp 135.000</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Admin Fee</span>
                                        <span class="font-semibold">Rp 5.000</span>
                                    </div>
                                    <div class="flex justify-between border-t border-gray-700 pt-2">
                                        <span class="text-lg font-bold">Total</span>
                                        <span class="text-lg font-bold text-red-500">Rp 140.000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- QR Code -->
                <div class="border-t border-gray-700 p-6">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="mb-6 md:mb-0">
                            <h3 class="text-lg font-bold mb-2">Kode Tiket</h3>
                            <div class="text-2xl font-bold text-red-500 tracking-wider">TIX-ABC123-XYZ456</div>
                            <p class="text-gray-400 text-sm mt-2">Tunjukkan kode ini di loket bioskop</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg">
                            <div class="w-32 h-32 bg-gray-200 flex items-center justify-center">
                                <span class="text-4xl">📱</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col md:flex-row gap-4 mb-12">
                <button
                    class="flex-1 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Download Tiket
                </button>

                <button
                    class="flex-1 py-3 border-2 border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-colors flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm3 1h6v4H7V5zm8 8v2h1v-2h-1zm-2-2H7v4h6v-4zm2 0h1V9h-1v2zm1-4V5h-1v2h1zM5 5v2H4V5h1zm0 4H4v2h1V9zm-1 4h1v2H4v-2z"
                            clip-rule="evenodd" />
                    </svg>
                    Cetak Tiket
                </button>

                <a href="{{ route('home') }}"
                    class="flex-1 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Pesan Tiket Lain
                </a>
            </div>

            <!-- Instructions -->
            <div class="bg-gray-800 rounded-xl p-6 mb-12">
                <h2 class="text-xl font-bold mb-6">Instruksi Penggunaan Tiket</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">1️⃣</span>
                        </div>
                        <h3 class="font-bold mb-2">Datang ke Bioskop</h3>
                        <p class="text-gray-400 text-sm">Datang minimal 30 menit sebelum film dimulai</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">2️⃣</span>
                        </div>
                        <h3 class="font-bold mb-2">Tunjukkan Tiket</h3>
                        <p class="text-gray-400 text-sm">Tunjukkan QR code atau kode tiket di loket</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">3️⃣</span>
                        </div>
                        <h3 class="font-bold mb-2">Ambil Tiket Fisik</h3>
                        <p class="text-gray-400 text-sm">Petugas akan memberikan tiket fisik Anda</p>
                    </div>
                </div>
            </div>

            <!-- Customer Support -->
            <div class="text-center">
                <p class="text-gray-400 mb-4">Butuh bantuan? Hubungi customer service kami</p>
                <div class="flex justify-center gap-4">
                    <button class="px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        📞 (021) 1234-5678
                    </button>
                    <button class="px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        💬 Live Chat
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
