@extends('guest.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 pt-24">
        <div class="container mx-auto px-4 max-w-6xl">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h1>
                <p class="text-gray-300 text-lg">Tim customer service kami siap membantu Anda 24/7</p>
            </div>

            <!-- Contact Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Phone -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:bg-gray-700 transition-colors">
                    <div class="w-16 h-16 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">📞</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Telepon</h3>
                    <p class="text-gray-400 mb-4">Hubungi kami via telepon</p>
                    <div class="text-2xl font-bold text-red-500">(021) 1234-5678</div>
                    <p class="text-gray-400 text-sm mt-2">24/7 Customer Service</p>
                </div>

                <!-- Email -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:bg-gray-700 transition-colors">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">📧</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Email</h3>
                    <p class="text-gray-400 mb-4">Kirim email kepada kami</p>
                    <div class="text-lg font-bold text-red-500">support@tixclone.com</div>
                    <p class="text-gray-400 text-sm mt-2">Response dalam 24 jam</p>
                </div>

                <!-- Live Chat -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:bg-gray-700 transition-colors">
                    <div class="w-16 h-16 bg-green-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">💬</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Live Chat</h3>
                    <p class="text-gray-400 mb-4">Chat langsung dengan agent</p>
                    <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors"
                        onclick="openLiveChat()">
                        Mulai Chat
                    </button>
                    <p class="text-gray-400 text-sm mt-2">Online 08:00 - 22:00 WIB</p>
                </div>
            </div>

            <!-- Contact Form & Info -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Contact Form -->
                <div class="bg-gray-800 rounded-xl p-6">
                    <h2 class="text-2xl font-bold mb-6">Kirim Pesan</h2>
                    <form id="contact-form" class="space-y-4">
                        <div>
                            <label class="block text-gray-300 mb-2">Nama Lengkap</label>
                            <input type="text"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-red-600"
                                required>
                        </div>

                        <div>
                            <label class="block text-gray-300 mb-2">Email</label>
                            <input type="email"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-red-600"
                                required>
                        </div>

                        <div>
                            <label class="block text-gray-300 mb-2">Nomor Telepon</label>
                            <input type="tel"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-red-600">
                        </div>

                        <div>
                            <label class="block text-gray-300 mb-2">Subjek</label>
                            <select
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-red-600">
                                <option value="">Pilih subjek</option>
                                <option>Pertanyaan Umum</option>
                                <option>Masalah Teknis</option>
                                <option>Pembatalan Tiket</option>
                                <option>Pengembalian Dana</option>
                                <option>Kerjasama Bisnis</option>
                                <option>Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-300 mb-2">Pesan</label>
                            <textarea rows="4"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-red-600"
                                required></textarea>
                        </div>

                        <button type="submit"
                            class="w-full py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition-colors">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                <!-- Office Info -->
                <div class="space-y-6">
                    <!-- Head Office -->
                    <div class="bg-gray-800 rounded-xl p-6">
                        <h3 class="text-xl font-bold mb-4 flex items-center">
                            <svg class="w-6 h-6 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Kantor Pusat
                        </h3>
                        <div class="space-y-3">
                            <p class="text-gray-300">TIXCLONE Tower</p>
                            <p class="text-gray-300">Jl. Sudirman No. 123, Jakarta Pusat</p>
                            <p class="text-gray-300">DKI Jakarta, Indonesia</p>
                            <p class="text-gray-300">Kode Pos: 10220</p>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="bg-gray-800 rounded-xl p-6">
                        <h3 class="text-xl font-bold mb-4 flex items-center">
                            <svg class="w-6 h-6 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            Jam Operasional
                        </h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-300">Senin - Jumat</span>
                                <span class="text-gray-300 font-semibold">08:00 - 22:00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-300">Sabtu</span>
                                <span class="text-gray-300 font-semibold">09:00 - 21:00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-300">Minggu & Hari Libur</span>
                                <span class="text-gray-300 font-semibold">10:00 - 20:00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-gray-800 rounded-xl p-6">
                        <h3 class="text-xl font-bold mb-4">Ikuti Kami</h3>
                        <div class="flex gap-4">
                            <a href="#"
                                class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-600 transition-colors">
                                <span class="text-xl">📘</span>
                            </a>
                            <a href="#"
                                class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-600 transition-colors">
                                <span class="text-xl">📷</span>
                            </a>
                            <a href="#"
                                class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-600 transition-colors">
                                <span class="text-xl">🐦</span>
                            </a>
                            <a href="#"
                                class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-600 transition-colors">
                                <span class="text-xl">🎬</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Link -->
            <div class="bg-gradient-to-r from-red-900/20 to-gray-900/30 rounded-xl p-8 text-center">
                <h2 class="text-2xl font-bold mb-4">Pertanyaan yang Sering Diajukan?</h2>
                <p class="text-gray-300 mb-6">Cek FAQ kami terlebih dahulu, mungkin pertanyaan Anda sudah ada jawabannya</p>
                <a href="{{ route('faq') }}"
                    class="inline-block px-8 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    Lihat FAQ
                </a>
            </div>
        </div>
    </div>

    <!-- Live Chat Modal -->
    <div id="live-chat-modal" class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center p-4">
        <div class="bg-gray-800 rounded-xl max-w-md w-full">
            <div class="p-6 border-b border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">Live Chat Support</h3>
                    <button onclick="closeLiveChat()" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <p class="text-gray-400 text-sm mt-2">Agent akan merespon dalam 2 menit</p>
            </div>

            <div class="p-6">
                <div class="h-64 overflow-y-auto mb-4 space-y-4">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <span class="text-white text-sm">CS</span>
                        </div>
                        <div class="bg-gray-700 rounded-lg p-3">
                            <p class="text-gray-300">Halo! Selamat datang di TIXCLONE Support. Ada yang bisa saya bantu?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <input type="text" placeholder="Ketik pesan Anda..."
                        class="flex-1 bg-gray-700 border border-gray-600 rounded-l-lg px-4 py-3 text-white focus:outline-none">
                    <button class="px-6 bg-red-600 text-white rounded-r-lg hover:bg-red-700 transition-colors">
                        Kirim
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Contact form submission
            const contactForm = document.getElementById('contact-form');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Pesan Anda telah dikirim! Tim kami akan merespon dalam 24 jam.');
                    contactForm.reset();
                });
            }
        });

        function openLiveChat() {
            document.getElementById('live-chat-modal').classList.remove('hidden');
            document.getElementById('live-chat-modal').classList.add('flex');
        }

        function closeLiveChat() {
            document.getElementById('live-chat-modal').classList.add('hidden');
            document.getElementById('live-chat-modal').classList.remove('flex');
        }
    </script>
@endsection
