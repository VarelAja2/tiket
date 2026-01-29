@extends('guest.layouts.app')

@section('content')
    <style>
        /* Custom CSS for expandable synopsis */
        .synopsis-content {
            max-height: 100px;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .synopsis-content.expanded {
            max-height: 1000px;
        }

        .read-more-btn::after {
            content: '▼';
            display: inline-block;
            margin-left: 5px;
            transition: transform 0.3s;
            font-size: 12px;
        }

        .read-more-btn.expanded::after {
            transform: rotate(180deg);
        }

        /* Gradient overlay for hero */
        .hero-gradient {
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 50%, rgba(0, 0, 0, 0.3) 100%);
        }

        @media (max-width: 768px) {
            .hero-gradient {
                background: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 50%, rgba(0, 0, 0, 0.5) 100%);
            }
        }

        /* Custom scroll for showtimes */
        .showtime-scroll {
            scrollbar-width: thin;
            scrollbar-color: #dc2626 #1f2937;
        }

        .showtime-scroll::-webkit-scrollbar {
            height: 6px;
        }

        .showtime-scroll::-webkit-scrollbar-track {
            background: #1f2937;
            border-radius: 3px;
        }

        .showtime-scroll::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 3px;
        }

        /* Line clamp utility */
        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }

        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Expand synopsis
            const readMoreBtn = document.getElementById('read-more-btn');
            const synopsisContent = document.getElementById('synopsis-content');

            if (readMoreBtn && synopsisContent) {
                readMoreBtn.addEventListener('click', function() {
                    synopsisContent.classList.toggle('expanded');
                    readMoreBtn.classList.toggle('expanded');
                    readMoreBtn.querySelector('span').textContent =
                        synopsisContent.classList.contains('expanded') ? 'Lebih Sedikit' : 'Selengkapnya';
                });
            }

            // Showtime date selector
            const dateButtons = document.querySelectorAll('.date-btn');
            dateButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    dateButtons.forEach(b => b.classList.remove('bg-red-600', 'text-white'));
                    dateButtons.forEach(b => b.classList.add('bg-gray-800', 'text-gray-300'));
                    this.classList.remove('bg-gray-800', 'text-gray-300');
                    this.classList.add('bg-red-600', 'text-white');
                });
            });

            // Cinema selector
            const cinemaButtons = document.querySelectorAll('.cinema-btn');
            cinemaButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    cinemaButtons.forEach(b => b.classList.remove('border-red-600',
                        'text-red-600'));
                    cinemaButtons.forEach(b => b.classList.add('border-gray-700', 'text-gray-400'));
                    this.classList.remove('border-gray-700', 'text-gray-400');
                    this.classList.add('border-red-600', 'text-red-600');
                });
            });

            // Showtime selector
            const showtimeButtons = document.querySelectorAll('.showtime-btn');
            showtimeButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    showtimeButtons.forEach(b => b.classList.remove('bg-red-600', 'text-white'));
                    showtimeButtons.forEach(b => b.classList.add('bg-gray-700', 'text-gray-300'));
                    this.classList.remove('bg-gray-700', 'text-gray-300');
                    this.classList.add('bg-red-600', 'text-white');
                });
            });
        });
    </script>

    <!-- HERO EVENT SECTION -->
    <section class="relative bg-gray-900">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="hero-gradient absolute inset-0 z-10"></div>
            <div class="w-full h-full bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')">
            </div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-4 py-12 md:py-20 relative z-20">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                <!-- Event Poster -->
                <div class="w-full md:w-1/3 lg:w-1/4 flex justify-center md:justify-start">
                    <div class="w-64 md:w-full max-w-xs rounded-xl overflow-hidden shadow-2xl shadow-blue-900/30">
                        <div class="aspect-[2/3] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <!-- Event Badge Overlay -->
                            <div
                                class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                SEMINAR
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event Info -->
                <div class="w-full md:w-2/3 lg:w-3/4 text-center md:text-left">
                    <!-- Event Badge -->
                    <div class="inline-block bg-blue-600 text-white text-sm font-bold px-3 py-1 rounded-full mb-4">
                        AKUNTANSI & FINANSIAL
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Seminar Akuntansi Modern 2023</h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 text-gray-300 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Sab, 15 November 2023 • 09:00 - 16:00 WIB</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Auditorium Financial Center, Jakarta</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Dr. Budi Santoso, CPA & Tim Expert</span>
                        </div>
                    </div>

                    <!-- Rating & Participants -->
                    <div class="flex items-center justify-center md:justify-start mb-8">
                        <div class="flex items-center mr-6">
                            <div class="text-yellow-400 text-2xl mr-2">★★★★★</div>
                            <div>
                                <div class="text-2xl font-bold">4.8</div>
                                <div class="text-gray-400 text-sm">/5.0 Rating</div>
                            </div>
                        </div>
                        <div class="text-gray-300">
                            <div class="font-bold">250+</div>
                            <div class="text-gray-400 text-sm">peserta bergabung</div>
                        </div>
                    </div>

                    <!-- Price & Action Buttons -->
                    <div class="flex flex-wrap items-center gap-6 justify-center md:justify-start">
                        <div class="text-center md:text-left">
                            <div class="text-gray-400 text-sm">Mulai dari</div>
                            <div class="text-3xl font-bold text-red-500">Rp 250.000</div>
                            <div class="text-gray-400 text-sm">Early bird hingga 10 Nov</div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <a href="#booking-section"
                                class="px-8 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                Beli Tiket Sekarang
                            </a>

                            <a href="#"
                                class="px-8 py-3 bg-transparent border-2 border-red-600 text-red-600 font-bold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd" />
                                </svg>
                                Simpan ke Wishlist
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Deskripsi & Detail -->
            <div class="lg:col-span-2 space-y-8">
                <!-- DESKRIPSI SECTION -->
                <section>
                    <h2 class="text-2xl font-bold mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        Deskripsi Event
                    </h2>

                    <div id="synopsis-content" class="synopsis-content bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Seminar Akuntansi Modern 2023 merupakan acara tahunan yang menghadirkan pembahasan terkini
                            tentang perkembangan standar akuntansi, teknologi finansial, dan strategi pengelolaan keuangan
                            di era digital. Acara ini dirancang khusus untuk para profesional akuntansi, CFO, finance
                            manager,
                            dan mahasiswa akuntansi yang ingin mengupdate pengetahuan mereka.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Dalam seminar ini, Anda akan mendapatkan insight tentang penerapan SAK ETAP terbaru,
                            implementasi software akuntansi modern, strategi pengendalian internal, dan bagaimana
                            memanfaatkan data analytics untuk pengambilan keputusan finansial yang lebih tepat.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Acara ini juga memberikan kesempatan networking dengan para praktisi terkemuka di bidang
                            akuntansi dan finansial dari berbagai perusahaan besar di Indonesia. Anda dapat bertukar
                            pengalaman dan membangun koneksi yang bermanfaat untuk karir Anda.
                        </p>
                        <p class="text-gray-300 leading-relaxed">
                            Dihadiri oleh 250+ peserta dari berbagai perusahaan, seminar ini telah mendapatkan rating
                            4.8/5.0 dari peserta tahun sebelumnya. Jangan lewatkan kesempatan untuk mengembangkan
                            kompetensi Anda di bidang akuntansi modern.
                        </p>
                    </div>

                    <button id="read-more-btn"
                        class="read-more-btn mt-4 text-red-500 font-semibold hover:text-red-400 transition-colors duration-300">
                        <span>Selengkapnya</span>
                    </button>
                </section>

                <!-- MATERI PEMBAHASAN -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Materi Pembahasan
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div
                                    class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    1</div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Update SAK ETAP 2023</h3>
                                    <p class="text-gray-400">Perubahan standar akuntansi terbaru dan implementasinya</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div
                                    class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    2</div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Digital Financial Reporting</h3>
                                    <p class="text-gray-400">Membuat laporan keuangan dengan tools digital modern</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div
                                    class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    3</div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Internal Control System</h3>
                                    <p class="text-gray-400">Sistem pengendalian internal untuk perusahaan</p>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div
                                    class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    4</div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Financial Data Analytics</h3>
                                    <p class="text-gray-400">Analisis data keuangan untuk pengambilan keputusan</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div
                                    class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    5</div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Tax Planning Strategy</h3>
                                    <p class="text-gray-400">Strategi perencanaan pajak yang efektif</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div
                                    class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    6</div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Case Study Workshop</h3>
                                    <p class="text-gray-400">Studi kasus nyata perusahaan besar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- PEMBICARA SECTION -->
                <section>
                    <h2 class="text-2xl font-bold mb-6">Pembicara & Fasilitator</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Pembicara 1 -->
                        <div class="bg-gray-800 rounded-xl p-6">
                            <div class="flex items-start mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center mr-4 text-xl font-bold text-white">
                                    BS
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold">Dr. Budi Santoso, CPA</h3>
                                    <p class="text-gray-400">Senior Partner - Santoso & Partners</p>
                                </div>
                            </div>
                            <p class="text-gray-300 text-sm">
                                Pakar akuntansi dengan 20+ tahun pengalaman, konsultan untuk perusahaan BUMN dan
                                multinasional.
                            </p>
                        </div>

                        <!-- Pembicara 2 -->
                        <div class="bg-gray-800 rounded-xl p-6">
                            <div class="flex items-start mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mr-4 text-xl font-bold text-white">
                                    DI
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold">Diana Indriani, M.Acc</h3>
                                    <p class="text-gray-400">Finance Director - TechGlobal Corp</p>
                                </div>
                            </div>
                            <p class="text-gray-300 text-sm">
                                Ahli financial technology dengan spesialisasi digital transformation di sektor keuangan.
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Booking & Ticket -->
            <div class="lg:col-span-1">
                <!-- BOOKING SECTION -->
                <section id="booking-section" class="bg-gray-800 rounded-xl p-6 sticky top-24">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        Pemesanan Tiket
                    </h2>

                    <!-- Tanggal & Waktu -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-2">TANGGAL & WAKTU</h3>
                        <div class="bg-gray-900 rounded-lg p-4">
                            <div class="flex items-center text-gray-300 mb-2">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-semibold">Sabtu, 15 November 2023</span>
                            </div>
                            <div class="flex items-center text-gray-300">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>09:00 - 16:00 WIB (Full Day)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-2">LOKASI</h3>
                        <div class="bg-gray-900 rounded-lg p-4">
                            <div class="flex items-start text-gray-300">
                                <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Auditorium Financial Center<br>Jl. Sudirman Kav. 52-53<br>Jakarta Selatan 12190</span>
                            </div>
                        </div>
                    </div>

                    <!-- Pilihan Tiket -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-2">PILIHAN TIKET</h3>
                        <div class="space-y-4">
                            <!-- Early Bird -->
                            <div
                                class="border border-gray-700 rounded-lg p-4 hover:border-red-600 transition-colors cursor-pointer group">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h4 class="font-bold text-lg">Early Bird</h4>
                                        <p class="text-gray-400 text-sm">Berlaku hingga 10 Nov 2023</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-red-500">Rp 250.000</div>
                                        <div class="text-green-500 text-sm font-medium">✅ Tersedia</div>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-300 space-y-1">
                                    <li>• Akses seminar full day</li>
                                    <li>• Materi digital & sertifikat</li>
                                    <li>• Coffee break & lunch</li>
                                    <li>• Networking session</li>
                                </ul>
                            </div>

                            <!-- Regular -->
                            <div
                                class="border border-gray-700 rounded-lg p-4 hover:border-red-600 transition-colors cursor-pointer group">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h4 class="font-bold text-lg">Regular</h4>
                                        <p class="text-gray-400 text-sm">11-14 Nov 2023</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-red-500">Rp 350.000</div>
                                        <div class="text-green-500 text-sm font-medium">✅ Tersedia</div>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-300 space-y-1">
                                    <li>• Akses seminar full day</li>
                                    <li>• Materi digital & sertifikat</li>
                                    <li>• Coffee break & lunch</li>
                                    <li>• Networking session</li>
                                    <li>• Goodie bag eksklusif</li>
                                </ul>
                            </div>

                            <!-- VIP -->
                            <div class="border border-red-600 rounded-lg p-4 bg-red-600/10 cursor-pointer">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h4 class="font-bold text-lg">VIP Package</h4>
                                        <p class="text-gray-300 text-sm">Limited seat</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-red-500">Rp 500.000</div>
                                        <div class="text-yellow-500 text-sm font-medium">⏳ Terbatas</div>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-300 space-y-1">
                                    <li>• Semua fasilitas Regular</li>
                                    <li>• VIP seating area</li>
                                    <li>• Exclusive dinner with speakers</li>
                                    <li>• Premium merchandise</li>
                                    <li>• Photo session dengan pembicara</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <a href="{{ route('booking.seats', ['showtime_id' => 1]) }}"
                        class="block w-full py-3 bg-red-600 text-white text-center font-bold rounded-lg hover:bg-red-700 transition-colors duration-300">
                        Pilih Tiket & Lanjutkan
                    </a>

                    <!-- Info Tambahan -->
                    <div class="mt-6 pt-6 border-t border-gray-700">
                        <div class="flex items-center text-sm text-gray-400 mb-2">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            Durasi: 7 jam (full day)
                        </div>
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            Kuota: 250 peserta (Early Bird: 100, Regular: 100, VIP: 50)
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- EVENT TERKAIT SECTION -->
    <section class="bg-gray-900 border-t border-gray-800 py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold">Event Lainnya</h2>
                <a href="{{ route('now-playing') }}" class="text-red-500 hover:text-red-400 font-medium">
                    Lihat Semua Event →
                </a>
            </div>

            <div class="flex overflow-x-auto showtime-scroll pb-4 gap-6">
                <!-- Event 1 -->
                <div class="flex-shrink-0 w-64">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 group hover:scale-105 transition-transform duration-300">
                        <div class="aspect-[16/9] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                            <div
                                class="absolute top-2 left-2 bg-purple-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                WORKSHOP
                            </div>
                        </div>
                        <div class="absolute top-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                            <div class="font-semibold">18</div>
                            <div class="text-xs">NOV</div>
                        </div>
                    </div>
                    <h3 class="font-bold mb-1 line-clamp-1">Workshop Digital Marketing Mastery</h3>
                    <div class="flex items-center text-sm text-gray-400 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Sel, 18 Nov • 13:00-18:00</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-red-500 font-bold">Rp 350.000</div>
                        <span class="bg-purple-600/20 text-purple-400 text-xs px-2 py-1 rounded">Marketing</span>
                    </div>
                </div>

                <!-- Event 2 -->
                <div class="flex-shrink-0 w-64">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 group hover:scale-105 transition-transform duration-300">
                        <div class="aspect-[16/9] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1518709268805-4e9042af2176?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                            <div
                                class="absolute top-2 left-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                SEMINAR
                            </div>
                        </div>
                        <div class="absolute top-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                            <div class="font-semibold">8</div>
                            <div class="text-xs">DES</div>
                        </div>
                    </div>
                    <h3 class="font-bold mb-1 line-clamp-1">Seminar AI & Machine Learning 2023</h3>
                    <div class="flex items-center text-sm text-gray-400 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Jum, 8 Des • 10:00-17:00</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-red-500 font-bold">Rp 300.000</div>
                        <span class="bg-blue-600/20 text-blue-400 text-xs px-2 py-1 rounded">Technology</span>
                    </div>
                </div>

                <!-- Event 3 -->
                <div class="flex-shrink-0 w-64">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 group hover:scale-105 transition-transform duration-300">
                        <div class="aspect-[16/9] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                            <div
                                class="absolute top-2 left-2 bg-yellow-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                FESTIVAL
                            </div>
                        </div>
                        <div class="absolute top-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                            <div class="font-semibold">12</div>
                            <div class="text-xs">DES</div>
                        </div>
                    </div>
                    <h3 class="font-bold mb-1 line-clamp-1">Java Jazz Festival 2023</h3>
                    <div class="flex items-center text-sm text-gray-400 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>12-14 Des • 14:00-23:00</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-red-500 font-bold">Rp 200.000</div>
                        <span class="bg-yellow-600/20 text-yellow-400 text-xs px-2 py-1 rounded">Musik</span>
                    </div>
                </div>

                <!-- Event 4 -->
                <div class="flex-shrink-0 w-64">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 group hover:scale-105 transition-transform duration-300">
                        <div class="aspect-[16/9] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                            <div
                                class="absolute top-2 left-2 bg-pink-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                TALK SHOW
                            </div>
                        </div>
                        <div class="absolute top-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                            <div class="font-semibold">5</div>
                            <div class="text-xs">DES</div>
                        </div>
                    </div>
                    <h3 class="font-bold mb-1 line-clamp-1">Talk Show: Young Entrepreneurs</h3>
                    <div class="flex items-center text-sm text-gray-400 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Sel, 5 Des • 19:00-21:30</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-green-500 font-bold">FREE</div>
                        <span class="bg-pink-600/20 text-pink-400 text-xs px-2 py-1 rounded">Bisnis</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
