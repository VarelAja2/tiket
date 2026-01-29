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
        });
    </script>

    <!-- HERO FILM SECTION -->
    <section class="relative bg-gray-900">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="hero-gradient absolute inset-0 z-10"></div>
            <div class="w-full h-full bg-gradient-to-br from-red-900/30 to-gray-900"></div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-4 py-12 md:py-20 relative z-20">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                <!-- Poster -->
                <div class="w-full md:w-1/3 lg:w-1/4 flex justify-center md:justify-start">
                    <div class="w-64 md:w-full max-w-xs rounded-xl overflow-hidden shadow-2xl shadow-red-900/30">
                        <div
                            class="aspect-[2/3] bg-gradient-to-br from-red-900/40 to-gray-900 flex items-center justify-center">
                            <span class="text-8xl">🎬</span>
                        </div>
                    </div>
                </div>

                <!-- Film Info -->
                <div class="w-full md:w-2/3 lg:w-3/4 text-center md:text-left">
                    <!-- Age Rating Badge -->
                    <div class="inline-block bg-red-600 text-white text-sm font-bold px-3 py-1 rounded-full mb-4">
                        13+
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">AVENGERS: ENDGAME</h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 text-gray-300 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">3 jam 2 menit</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Rilis: 24 April 2019</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Action, Adventure, Sci-Fi</span>
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center justify-center md:justify-start mb-8">
                        <div class="flex items-center mr-6">
                            <div class="text-yellow-400 text-2xl mr-2">★★★★★</div>
                            <div>
                                <div class="text-2xl font-bold">8.4</div>
                                <div class="text-gray-400 text-sm">/10 IMDb</div>
                            </div>
                        </div>
                        <div class="text-gray-300">
                            <div class="font-bold">4.7 juta</div>
                            <div class="text-gray-400 text-sm">penonton</div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                        <a href="#"
                            class="px-8 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition-colors duration-300 transform hover:scale-105 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Beli Tiket
                        </a>

                        <a href="#"
                            class="px-8 py-3 bg-transparent border-2 border-red-600 text-red-600 font-bold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300 transform hover:scale-105 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            Lihat Trailer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Sinopsis & Details -->
            <div class="lg:col-span-2 space-y-8">
                <!-- SINOPSIS SECTION -->
                <section>
                    <h2 class="text-2xl font-bold mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        Sinopsis
                    </h2>

                    <div id="synopsis-content" class="synopsis-content bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Setelah peristiwa yang menghancurkan di "Avengers: Infinity War", alam semesta porak-poranda.
                            Dengan bantuan sekutu yang tersisa, Avengers berkumpul sekali lagi untuk membalikkan tindakan
                            Thanos dan mengembalikan keseimbangan alam semesta.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Setelah kehancuran yang ditimbulkan oleh Thanos, dunia menjadi tempat yang sangat berbeda. Para
                            pahlawan yang tersisa berusaha untuk melanjutkan hidup mereka, tetapi ketika kesempatan untuk
                            membalikkan keadaan muncul, mereka harus bersatu sekali lagi.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Dengan perjalanan waktu dan pengorbanan yang tak terduga, Avengers melakukan misi terakhir
                            mereka dalam upaya untuk mengalahkan Thanos dan memulihkan alam semesta. Film ini menjadi
                            penutup epik bagi saga Infinity yang telah berlangsung selama satu dekade.
                        </p>
                        <p class="text-gray-300 leading-relaxed">
                            Dibintangi oleh Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth, Scarlett
                            Johansson, Jeremy Renner, dan banyak lagi. Disutradarai oleh Anthony dan Joe Russo.
                        </p>
                    </div>

                    <button id="read-more-btn"
                        class="read-more-btn mt-4 text-red-500 font-semibold hover:text-red-400 transition-colors duration-300">
                        <span>Selengkapnya</span>
                    </button>
                </section>

                <!-- DETAIL INFO SECTION -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13z"
                                clip-rule="evenodd" />
                        </svg>
                        Detail Film
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div class="flex">
                                <div class="w-1/3 text-gray-400 font-medium">Sutradara</div>
                                <div class="w-2/3 text-gray-300">Anthony Russo, Joe Russo</div>
                            </div>
                            <div class="flex">
                                <div class="w-1/3 text-gray-400 font-medium">Produser</div>
                                <div class="w-2/3 text-gray-300">Kevin Feige</div>
                            </div>
                            <div class="flex">
                                <div class="w-1/3 text-gray-400 font-medium">Penulis</div>
                                <div class="w-2/3 text-gray-300">Christopher Markus, Stephen McFeely</div>
                            </div>
                            <div class="flex">
                                <div class="w-1/3 text-gray-400 font-medium">Musik</div>
                                <div class="w-2/3 text-gray-300">Alan Silvestri</div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div class="flex">
                                <div class="w-1/3 text-gray-400 font-medium">Pemeran</div>
                                <div class="w-2/3 text-gray-300">Robert Downey Jr., Chris Evans, Scarlett Johansson, Mark
                                    Ruffalo, Chris Hemsworth</div>
                            </div>
                            <div class="flex">
                                <div class="w-1/3 text-gray-400 font-medium">Distributor</div>
                                <div class="w-2/3 text-gray-300">Walt Disney Studios Motion Pictures</div>
                            </div>
                            <div class="flex">
                                <div class="w-1/3 text-gray-400 font-medium">Bahasa</div>
                                <div class="w-2/3 text-gray-300">Inggris</div>
                            </div>
                            <div class="flex">
                                <div class="w-1/3 text-gray-400 font-medium">Negara</div>
                                <div class="w-2/3 text-gray-300">Amerika Serikat</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Jadwal Tayang -->
            <div class="lg:col-span-1">
                <!-- JADWAL TAYANG SECTION -->
                <section class="bg-gray-800 rounded-xl p-6 sticky top-24">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        Jadwal Tayang
                    </h2>

                    <!-- Filter Kota -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-2">KOTA</h3>
                        <div class="flex flex-wrap gap-2">
                            <button
                                class="cinema-btn px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium transition-colors duration-300">
                                Jakarta
                            </button>
                            <button
                                class="cinema-btn px-4 py-2 bg-gray-800 text-gray-400 border border-gray-700 rounded-lg text-sm font-medium hover:border-red-600 hover:text-red-600 transition-colors duration-300">
                                Bandung
                            </button>
                            <button
                                class="cinema-btn px-4 py-2 bg-gray-800 text-gray-400 border border-gray-700 rounded-lg text-sm font-medium hover:border-red-600 hover:text-red-600 transition-colors duration-300">
                                Surabaya
                            </button>
                        </div>
                    </div>

                    <!-- Filter Tanggal -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-2">TANGGAL</h3>
                        <div class="flex overflow-x-auto showtime-scroll pb-2 gap-2">
                            <button
                                class="date-btn px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium whitespace-nowrap transition-colors duration-300">
                                Hari Ini
                            </button>
                            <button
                                class="date-btn px-4 py-2 bg-gray-800 text-gray-300 rounded-lg text-sm font-medium whitespace-nowrap transition-colors duration-300">
                                Besok
                            </button>
                            <button
                                class="date-btn px-4 py-2 bg-gray-800 text-gray-300 rounded-lg text-sm font-medium whitespace-nowrap transition-colors duration-300">
                                Sab, 18 Nov
                            </button>
                            <button
                                class="date-btn px-4 py-2 bg-gray-800 text-gray-300 rounded-lg text-sm font-medium whitespace-nowrap transition-colors duration-300">
                                Min, 19 Nov
                            </button>
                            <button
                                class="date-btn px-4 py-2 bg-gray-800 text-gray-300 rounded-lg text-sm font-medium whitespace-nowrap transition-colors duration-300">
                                Sen, 20 Nov
                            </button>
                        </div>
                    </div>

                    <!-- Daftar Bioskop -->
                    <div class="space-y-6">
                        <!-- Bioskop 1 -->
                        <div class="border-b border-gray-700 pb-6">
                            <h3 class="font-bold text-lg mb-3">XXI Plaza Indonesia</h3>
                            <div class="mb-3">
                                <span class="text-gray-400 text-sm">Studio 5 • Dolby Atmos</span>
                                <span class="text-red-500 text-sm font-medium ml-4">Rp 45.000</span>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    10:00
                                </button>
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    13:15
                                </button>
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    16:30
                                </button>
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    19:45
                                </button>
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    22:00
                                </button>
                            </div>
                        </div>

                        <!-- Bioskop 2 -->
                        <div class="border-b border-gray-700 pb-6">
                            <h3 class="font-bold text-lg mb-3">CGV Grand Indonesia</h3>
                            <div class="mb-3">
                                <span class="text-gray-400 text-sm">Studio 3 • 4DX</span>
                                <span class="text-red-500 text-sm font-medium ml-4">Rp 75.000</span>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    11:30
                                </button>
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    14:45
                                </button>
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    18:00
                                </button>
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    21:15
                                </button>
                            </div>
                        </div>

                        <!-- Bioskop 3 -->
                        <div class="pb-6">
                            <h3 class="font-bold text-lg mb-3">Cinema 31 BSD City</h3>
                            <div class="mb-3">
                                <span class="text-gray-400 text-sm">Studio 7 • Velvet Class</span>
                                <span class="text-red-500 text-sm font-medium ml-4">Rp 65.000</span>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    12:00
                                </button>
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    15:30
                                </button>
                                <button
                                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-red-600 transition-colors duration-300">
                                    19:00
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-6">
                        <a href="#"
                            class="text-red-500 hover:text-red-400 font-medium transition-colors duration-300">
                            Lihat semua jadwal →
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- REKOMENDASI FILM SECTION -->
    <section class="bg-gray-900 border-t border-gray-800 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Film Lainnya</h2>

            <div class="flex overflow-x-auto showtime-scroll pb-4 gap-6">
                <!-- Movie 1 -->
                <div class="flex-shrink-0 w-40 group">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 transform group-hover:scale-105 transition-transform duration-300">
                        <div
                            class="aspect-[2/3] bg-gradient-to-br from-blue-900/30 to-gray-900 flex items-center justify-center">
                            <span class="text-6xl">🕷️</span>
                        </div>
                        <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
                            13+
                        </div>
                    </div>
                    <h3 class="font-bold mb-1">Spider-Man: No Way Home</h3>
                    <p class="text-gray-400 text-sm">Action, Adventure</p>
                </div>

                <!-- Movie 2 -->
                <div class="flex-shrink-0 w-40 group">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 transform group-hover:scale-105 transition-transform duration-300">
                        <div
                            class="aspect-[2/3] bg-gradient-to-br from-purple-900/30 to-gray-900 flex items-center justify-center">
                            <span class="text-6xl">🔮</span>
                        </div>
                        <div class="absolute top-2 left-2 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded">
                            17+
                        </div>
                    </div>
                    <h3 class="font-bold mb-1">Doctor Strange 2</h3>
                    <p class="text-gray-400 text-sm">Fantasy, Action</p>
                </div>

                <!-- Movie 3 -->
                <div class="flex-shrink-0 w-40 group">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 transform group-hover:scale-105 transition-transform duration-300">
                        <div
                            class="aspect-[2/3] bg-gradient-to-br from-green-900/30 to-gray-900 flex items-center justify-center">
                            <span class="text-6xl">👻</span>
                        </div>
                        <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
                            17+
                        </div>
                    </div>
                    <h3 class="font-bold mb-1">The Conjuring 3</h3>
                    <p class="text-gray-400 text-sm">Horror, Thriller</p>
                </div>

                <!-- Movie 4 -->
                <div class="flex-shrink-0 w-40 group">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 transform group-hover:scale-105 transition-transform duration-300">
                        <div
                            class="aspect-[2/3] bg-gradient-to-br from-yellow-900/30 to-gray-900 flex items-center justify-center">
                            <span class="text-6xl">🚀</span>
                        </div>
                        <div class="absolute top-2 left-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
                            SU
                        </div>
                    </div>
                    <h3 class="font-bold mb-1">Top Gun: Maverick</h3>
                    <p class="text-gray-400 text-sm">Action, Drama</p>
                </div>

                <!-- Movie 5 -->
                <div class="flex-shrink-0 w-40 group">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 transform group-hover:scale-105 transition-transform duration-300">
                        <div
                            class="aspect-[2/3] bg-gradient-to-br from-red-900/30 to-gray-900 flex items-center justify-center">
                            <span class="text-6xl">🦇</span>
                        </div>
                        <div class="absolute top-2 left-2 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded">
                            17+
                        </div>
                    </div>
                    <h3 class="font-bold mb-1">The Batman</h3>
                    <p class="text-gray-400 text-sm">Action, Crime</p>
                </div>
            </div>
        </div>
    </section>
@endsection
