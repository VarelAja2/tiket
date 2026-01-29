@extends('guest.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 pt-24">
        <div class="container mx-auto px-4 max-w-4xl">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">FAQ - Pertanyaan Umum</h1>
                <p class="text-gray-300 text-lg">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
            </div>

            <!-- Search Box -->
            <div class="bg-gray-800 rounded-xl p-6 mb-8">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="text" placeholder="Cari pertanyaan..."
                        class="flex-1 bg-transparent text-white placeholder-gray-400 focus:outline-none" id="faq-search">
                </div>
            </div>

            <!-- FAQ Categories -->
            <div class="flex flex-wrap gap-2 mb-8">
                <button class="faq-category px-4 py-2 bg-red-600 text-white rounded-lg">Semua</button>
                <button
                    class="faq-category px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Pemesanan</button>
                <button
                    class="faq-category px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Pembayaran</button>
                <button class="faq-category px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Tiket</button>
                <button class="faq-category px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Akun</button>
                <button
                    class="faq-category px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Bioskop</button>
            </div>

            <!-- FAQ List -->
            <div class="space-y-4 mb-12" id="faq-container">
                <!-- FAQ Item 1 -->
                <div class="faq-item bg-gray-800 rounded-xl overflow-hidden" data-category="pemesanan">
                    <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                        <span class="text-lg font-semibold">Bagaimana cara memesan tiket di TIXCLONE?</span>
                        <svg class="w-6 h-6 text-red-500 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-300">Untuk memesan tiket di TIXCLONE:</p>
                        <ol class="list-decimal pl-5 mt-2 space-y-2 text-gray-300">
                            <li>Pilih film yang ingin ditonton</li>
                            <li>Pilih tanggal dan jam tayang</li>
                            <li>Pilih bioskop dan studio</li>
                            <li>Pilih kursi yang tersedia</li>
                            <li>Lakukan pembayaran dengan metode yang tersedia</li>
                            <li>Tiket akan dikirim ke email dan bisa diakses di akun Anda</li>
                        </ol>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item bg-gray-800 rounded-xl overflow-hidden" data-category="pembayaran">
                    <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                        <span class="text-lg font-semibold">Metode pembayaran apa saja yang tersedia?</span>
                        <svg class="w-6 h-6 text-red-500 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-300 mb-3">TIXCLONE menyediakan berbagai metode pembayaran:</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center mr-3">
                                    <span>💳</span>
                                </div>
                                <span class="text-gray-300">Kartu Kredit/Debit</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center mr-3">
                                    <span>🏦</span>
                                </div>
                                <span class="text-gray-300">Transfer Bank</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-yellow-500/20 rounded-lg flex items-center justify-center mr-3">
                                    <span>📱</span>
                                </div>
                                <span class="text-gray-300">E-Wallet</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center mr-3">
                                    <span>🏪</span>
                                </div>
                                <span class="text-gray-300">Minimarket</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item bg-gray-800 rounded-xl overflow-hidden" data-category="tiket">
                    <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                        <span class="text-lg font-semibold">Bisakah saya membatalkan atau mengembalikan tiket?</span>
                        <svg class="w-6 h-6 text-red-500 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-300 mb-3">Kebijakan pembatalan tiket:</p>
                        <ul class="space-y-2 text-gray-300">
                            <li>✅ Pembatalan bisa dilakukan <strong>minimal 2 jam sebelum jam tayang</strong></li>
                            <li>✅ Dana akan dikembalikan ke akun Anda dalam waktu 3-7 hari kerja</li>
                            <li>❌ Tidak bisa membatalkan tiket yang sudah digunakan</li>
                            <li>❌ Tidak bisa membatalkan tiket promo khusus</li>
                        </ul>
                        <p class="text-gray-300 mt-4">Untuk pembatalan, silakan hubungi customer service kami.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item bg-gray-800 rounded-xl overflow-hidden" data-category="akun">
                    <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                        <span class="text-lg font-semibold">Bagaimana jika saya lupa password akun?</span>
                        <svg class="w-6 h-6 text-red-500 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-300">Jika lupa password, Anda bisa reset dengan cara:</p>
                        <ol class="list-decimal pl-5 mt-2 space-y-2 text-gray-300">
                            <li>Klik "Lupa Password" di halaman login</li>
                            <li>Masukkan email yang terdaftar</li>
                            <li>Cek email Anda untuk link reset password</li>
                            <li>Klik link dan buat password baru</li>
                            <li>Login dengan password baru Anda</li>
                        </ol>
                        <p class="text-gray-300 mt-4">Jika mengalami kendala, hubungi customer service kami.</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item bg-gray-800 rounded-xl overflow-hidden" data-category="bioskop">
                    <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                        <span class="text-lg font-semibold">Apakah ada batasan usia untuk menonton film?</span>
                        <svg class="w-6 h-6 text-red-500 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-300 mb-3">Ya, sesuai regulasi film Indonesia:</p>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <span class="w-20 bg-green-600 text-white text-center py-1 rounded mr-3">SU</span>
                                <span class="text-gray-300">Semua Umur - Bisa ditonton semua usia</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-20 bg-blue-600 text-white text-center py-1 rounded mr-3">13+</span>
                                <span class="text-gray-300">Boleh ditonton usia 13 tahun ke atas</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-20 bg-yellow-600 text-white text-center py-1 rounded mr-3">17+</span>
                                <span class="text-gray-300">Boleh ditonton usia 17 tahun ke atas</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-20 bg-red-600 text-white text-center py-1 rounded mr-3">21+</span>
                                <span class="text-gray-300">Boleh ditonton usia 21 tahun ke atas</span>
                            </div>
                        </div>
                        <p class="text-gray-300 mt-4">Petugas bioskop akan memeriksa KTP untuk film dengan rating 17+ dan
                            21+.</p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item bg-gray-800 rounded-xl overflow-hidden" data-category="pemesanan">
                    <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                        <span class="text-lg font-semibold">Berapa lama waktu pemesanan sebelum jam tayang?</span>
                        <svg class="w-6 h-6 text-red-500 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-300">Waktu pemesanan tiket:</p>
                        <ul class="space-y-2 text-gray-300 mt-2">
                            <li>✅ Pemesanan dibuka <strong>7 hari sebelum tanggal tayang</strong></li>
                            <li>✅ Pemesanan ditutup <strong>30 menit sebelum jam tayang</strong></li>
                            <li>✅ Untuk tiket terakhir, datang minimal 15 menit sebelum film dimulai</li>
                            <li>✅ Tiket akan hangus jika tidak diambil sampai film dimulai</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Contact Support -->
            <div class="bg-gradient-to-r from-red-900/20 to-gray-900/30 rounded-xl p-8 text-center">
                <h2 class="text-2xl font-bold mb-4">Masih butuh bantuan?</h2>
                <p class="text-gray-300 mb-6">Tim customer service kami siap membantu Anda 24/7</p>
                <div class="flex flex-col md:flex-row justify-center gap-4">
                    <a href="{{ route('contact') }}"
                        class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Hubungi Kami
                    </a>
                    <a href="{{ route('help') }}"
                        class="px-6 py-3 border-2 border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                        Bantuan Lainnya
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion
            const faqQuestions = document.querySelectorAll('.faq-question');
            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    const answer = this.nextElementSibling;
                    const icon = this.querySelector('svg');

                    // Toggle current answer
                    answer.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');

                    // Close other answers
                    faqQuestions.forEach(otherQuestion => {
                        if (otherQuestion !== this) {
                            const otherAnswer = otherQuestion.nextElementSibling;
                            const otherIcon = otherQuestion.querySelector('svg');
                            otherAnswer.classList.add('hidden');
                            otherIcon.classList.remove('rotate-180');
                        }
                    });
                });
            });

            // FAQ Category Filter
            const categoryButtons = document.querySelectorAll('.faq-category');
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active button
                    categoryButtons.forEach(btn => {
                        btn.classList.remove('bg-red-600', 'text-white');
                        btn.classList.add('bg-gray-800', 'text-gray-300');
                    });
                    this.classList.remove('bg-gray-800', 'text-gray-300');
                    this.classList.add('bg-red-600', 'text-white');

                    // Filter FAQ items
                    const category = this.textContent.toLowerCase();
                    const faqItems = document.querySelectorAll('.faq-item');

                    faqItems.forEach(item => {
                        if (category === 'semua') {
                            item.style.display = 'block';
                        } else {
                            const itemCategory = item.getAttribute('data-category');
                            if (itemCategory === category) {
                                item.style.display = 'block';
                            } else {
                                item.style.display = 'none';
                            }
                        }
                    });
                });
            });

            // FAQ Search
            const searchInput = document.getElementById('faq-search');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const faqItems = document.querySelectorAll('.faq-item');

                    faqItems.forEach(item => {
                        const question = item.querySelector('.faq-question span').textContent
                            .toLowerCase();
                        const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

                        if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>

    <style>
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
@endsection
