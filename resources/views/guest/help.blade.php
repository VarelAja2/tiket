@extends('guest.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 pt-24">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Pusat Bantuan</h1>
                <p class="text-gray-300 text-lg max-w-2xl mx-auto">Dapatkan bantuan untuk masalah yang Anda hadapi saat
                    menggunakan TIXCLONE</p>
            </div>

            <!-- Help Categories -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <!-- Category 1 -->
                <a href="{{ route('faq') }}" class="bg-gray-800 rounded-xl p-6 hover:bg-gray-700 transition-colors group">
                    <div
                        class="w-16 h-16 bg-red-600/20 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <span class="text-2xl">❓</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">FAQ</h3>
                    <p class="text-gray-400">Pertanyaan yang sering diajukan oleh pengguna</p>
                </a>

                <!-- Category 2 -->
                <div class="bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-lg flex items-center justify-center mb-4">
                        <span class="text-2xl">🎫</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Panduan Pemesanan</h3>
                    <p class="text-gray-400 mb-4">Langkah-langkah lengkap memesan tiket</p>
                    <button class="text-red-500 hover:text-red-400 font-medium" onclick="openGuide('booking')">
                        Baca Panduan →
                    </button>
                </div>

                <!-- Category 3 -->
                <div class="bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-green-600/20 rounded-lg flex items-center justify-center mb-4">
                        <span class="text-2xl">💳</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Panduan Pembayaran</h3>
                    <p class="text-gray-400 mb-4">Cara melakukan pembayaran dengan berbagai metode</p>
                    <button class="text-red-500 hover:text-red-400 font-medium" onclick="openGuide('payment')">
                        Baca Panduan →
                    </button>
                </div>

                <!-- Category 4 -->
                <div class="bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-yellow-600/20 rounded-lg flex items-center justify-center mb-4">
                        <span class="text-2xl">📱</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Panduan Akun</h3>
                    <p class="text-gray-400 mb-4">Mengelola akun dan pengaturan</p>
                    <button class="text-red-500 hover:text-red-400 font-medium" onclick="openGuide('account')">
                        Baca Panduan →
                    </button>
                </div>

                <!-- Category 5 -->
                <a href="{{ route('contact') }}"
                    class="bg-gray-800 rounded-xl p-6 hover:bg-gray-700 transition-colors group">
                    <div
                        class="w-16 h-16 bg-purple-600/20 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <span class="text-2xl">📞</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Hubungi Kami</h3>
                    <p class="text-gray-400">Hubungi customer service untuk bantuan langsung</p>
                </a>

                <!-- Category 6 -->
                <div class="bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-pink-600/20 rounded-lg flex items-center justify-center mb-4">
                        <span class="text-2xl">⚡</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Panduan Cepat</h3>
                    <p class="text-gray-400 mb-4">Video tutorial dan panduan visual</p>
                    <button class="text-red-500 hover:text-red-400 font-medium" onclick="openGuide('quick')">
                        Lihat Tutorial →
                    </button>
                </div>
            </div>

            <!-- Common Problems -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6">Masalah Umum</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Problem 1 -->
                    <div class="bg-gray-800 rounded-xl p-6">
                        <h3 class="text-lg font-bold mb-3 flex items-center">
                            <span class="text-red-500 mr-2">🔒</span>
                            Tidak Bisa Login
                        </h3>
                        <p class="text-gray-400 mb-4">Solusi jika mengalami masalah login ke akun Anda</p>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li>• Pastikan email dan password benar</li>
                            <li>• Reset password jika lupa</li>
                            <li>• Cek koneksi internet</li>
                            <li>• Clear cache browser</li>
                        </ul>
                    </div>

                    <!-- Problem 2 -->
                    <div class="bg-gray-800 rounded-xl p-6">
                        <h3 class="text-lg font-bold mb-3 flex items-center">
                            <span class="text-red-500 mr-2">💳</span>
                            Pembayaran Gagal
                        </h3>
                        <p class="text-gray-400 mb-4">Langkah-langkah jika pembayaran tidak berhasil</p>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li>• Cek saldo/kartu kredit</li>
                            <li>• Coba metode pembayaran lain</li>
                            <li>• Hubungi bank penerbit</li>
                            <li>• Tunggu beberapa menit dan coba lagi</li>
                        </ul>
                    </div>

                    <!-- Problem 3 -->
                    <div class="bg-gray-800 rounded-xl p-6">
                        <h3 class="text-lg font-bold mb-3 flex items-center">
                            <span class="text-red-500 mr-2">📧</span>
                            Tidak Menerima Tiket
                        </h3>
                        <p class="text-gray-400 mb-4">Jika tiket tidak diterima via email</p>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li>• Cek folder spam/promosi</li>
                            <li>• Verifikasi email yang digunakan</li>
                            <li>• Cek di akun TIXCLONE > My Tickets</li>
                            <li>• Hubungi customer service</li>
                        </ul>
                    </div>

                    <!-- Problem 4 -->
                    <div class="bg-gray-800 rounded-xl p-6">
                        <h3 class="text-lg font-bold mb-3 flex items-center">
                            <span class="text-red-500 mr-2">🔄</span>
                            Error Saat Pemesanan
                        </h3>
                        <p class="text-gray-400 mb-4">Jika terjadi error saat memesan tiket</p>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li>• Refresh halaman</li>
                            <li>• Clear cache browser</li>
                            <li>• Coba browser berbeda</li>
                            <li>• Coba lagi beberapa menit kemudian</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Video Tutorials -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6">Video Tutorial</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Video 1 -->
                    <div class="bg-gray-800 rounded-xl overflow-hidden">
                        <div class="h-48 bg-gradient-to-br from-red-900/30 to-gray-900 flex items-center justify-center">
                            <button
                                class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold mb-2">Cara Pesan Tiket</h3>
                            <p class="text-gray-400 text-sm mb-4">Tutorial lengkap memesan tiket dari awal sampai akhir</p>
                            <div class="text-gray-400 text-sm">Durasi: 3:15</div>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="bg-gray-800 rounded-xl overflow-hidden">
                        <div class="h-48 bg-gradient-to-br from-blue-900/30 to-gray-900 flex items-center justify-center">
                            <button
                                class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold mb-2">Panduan Pembayaran</h3>
                            <p class="text-gray-400 text-sm mb-4">Metode pembayaran dan cara menggunakannya</p>
                            <div class="text-gray-400 text-sm">Durasi: 2:45</div>
                        </div>
                    </div>

                    <!-- Video 3 -->
                    <div class="bg-gray-800 rounded-xl overflow-hidden">
                        <div class="h-48 bg-gradient-to-br from-green-900/30 to-gray-900 flex items-center justify-center">
                            <button
                                class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold mb-2">Pengaturan Akun</h3>
                            <p class="text-gray-400 text-sm mb-4">Cara mengelola profil dan pengaturan akun</p>
                            <div class="text-gray-400 text-sm">Durasi: 4:20</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Now -->
            <div class="bg-gradient-to-r from-red-900/20 to-gray-900/30 rounded-xl p-8 text-center">
                <h2 class="text-2xl font-bold mb-4">Masih belum menemukan solusi?</h2>
                <p class="text-gray-300 mb-6">Tim support kami siap membantu Anda segera</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('contact') }}"
                        class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        Telepon Sekarang
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-6 py-3 border-2 border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-colors flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        Kirim Email
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openGuide(type) {
            const guides = {
                booking: `
            <div class="p-6">
                <h3 class="text-2xl font-bold mb-4">Panduan Pemesanan Tiket</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center mr-4 flex-shrink-0">1</div>
                        <div>
                            <h4 class="font-bold mb-1">Pilih Film</h4>
                            <p class="text-gray-300">Cari film yang ingin ditonton di halaman Now Playing atau Coming Soon</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center mr-4 flex-shrink-0">2</div>
                        <div>
                            <h4 class="font-bold mb-1">Pilih Jadwal</h4>
                            <p class="text-gray-300">Pilih tanggal, bioskop, dan jam tayang yang tersedia</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center mr-4 flex-shrink-0">3</div>
                        <div>
                            <h4 class="font-bold mb-1">Pilih Kursi</h4>
                            <p class="text-gray-300">Pilih kursi yang masih tersedia di layout studio</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center mr-4 flex-shrink-0">4</div>
                        <div>
                            <h4 class="font-bold mb-1">Pembayaran</h4>
                            <p class="text-gray-300">Pilih metode pembayaran dan selesaikan transaksi</p>
                        </div>
                    </div>
                </div>
            </div>
        `,
                payment: `
            <div class="p-6">
                <h3 class="text-2xl font-bold mb-4">Panduan Pembayaran</h3>
                <div class="space-y-4">
                    <div class="bg-gray-800 rounded-lg p-4">
                        <h4 class="font-bold mb-2 text-red-500">Transfer Bank</h4>
                        <p class="text-gray-300">Pilih bank tujuan, transfer sesuai nominal, dan konfirmasi pembayaran</p>
                    </div>
                    <div class="bg-gray-800 rounded-lg p-4">
                        <h4 class="font-bold mb-2 text-red-500">Kartu Kredit</h4>
                        <p class="text-gray-300">Masukkan detail kartu kredit dan OTP dari bank</p>
                    </div>
                    <div class="bg-gray-800 rounded-lg p-4">
                        <h4 class="font-bold mb-2 text-red-500">E-Wallet</h4>
                        <p class="text-gray-300">Pilih e-wallet, scan QR code atau login ke aplikasi</p>
                    </div>
                </div>
            </div>
        `,
                account: `
            <div class="p-6">
                <h3 class="text-2xl font-bold mb-4">Panduan Akun</h3>
                <div class="space-y-4">
                    <p class="text-gray-300">Untuk mengelola akun Anda:</p>
                    <ul class="list-disc pl-5 space-y-2 text-gray-300">
                        <li>Login ke akun TIXCLONE Anda</li>
                        <li>Klik profil di pojok kanan atas</li>
                        <li>Pilih "My Profile" untuk edit data pribadi</li>
                        <li>Pilih "My Tickets" untuk lihat riwayat tiket</li>
                        <li>Pilih "Settings" untuk pengaturan akun</li>
                    </ul>
                </div>
            </div>
        `,
                quick: `
            <div class="p-6">
                <h3 class="text-2xl font-bold mb-4">Panduan Cepat</h3>
                <div class="space-y-4">
                    <p class="text-gray-300">Tips cepat menggunakan TIXCLONE:</p>
                    <div class="bg-red-600/10 border border-red-600/30 rounded-lg p-4">
                        <h4 class="font-bold text-red-500 mb-2">💡 Tips 1: Pesan Lebih Awal</h4>
                        <p class="text-gray-300">Pesan tiket minimal 1 hari sebelumnya untuk mendapatkan kursi terbaik</p>
                    </div>
                    <div class="bg-red-600/10 border border-red-600/30 rounded-lg p-4">
                        <h4 class="font-bold text-red-500 mb-2">💡 Tips 2: Cek Promo</h4>
                        <p class="text-gray-300">Selalu cek halaman promo untuk mendapatkan diskon terbaik</p>
                    </div>
                    <div class="bg-red-600/10 border border-red-600/30 rounded-lg p-4">
                        <h4 class="font-bold text-red-500 mb-2">💡 Tips 3: Datang Tepat Waktu</h4>
                        <p class="text-gray-300">Datang 30 menit sebelum film dimulai untuk proses tiket yang lancar</p>
                    </div>
                </div>
            </div>
        `
            };

            // Create modal
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4';
            modal.innerHTML = `
        <div class="bg-gray-800 rounded-xl max-w-md w-full max-h-[80vh] overflow-y-auto">
            ${guides[type]}
            <div class="p-6 border-t border-gray-700">
                <button onclick="this.closest('.fixed').remove()" class="w-full py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    `;

            document.body.appendChild(modal);
        }
    </script>
@endsection
