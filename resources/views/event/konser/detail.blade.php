@extends('guest.layouts.app')

@section('content')
    <style>
        /* Custom CSS for konser */
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

        .hero-gradient-konser {
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(220, 38, 38, 0.7) 50%, rgba(0, 0, 0, 0.3) 100%);
        }

        @media (max-width: 768px) {
            .hero-gradient-konser {
                background: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(220, 38, 38, 0.7) 50%, rgba(0, 0, 0, 0.5) 100%);
            }
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

            // Ticket selection
            const ticketOptions = document.querySelectorAll('.ticket-option');
            ticketOptions.forEach(option => {
                option.addEventListener('click', function() {
                    ticketOptions.forEach(opt => {
                        opt.classList.remove('border-red-600', 'bg-red-600/10');
                        opt.classList.add('border-gray-700');
                    });
                    this.classList.remove('border-gray-700');
                    this.classList.add('border-red-600', 'bg-red-600/10');
                });
            });
        });
    </script>

    <!-- HERO KONSER SECTION -->
    <section class="relative bg-gray-900">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="hero-gradient-konser absolute inset-0 z-10"></div>
            <div class="w-full h-full bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')">
            </div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-4 py-12 md:py-20 relative z-20">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                <!-- Konser Poster -->
                <div class="w-full md:w-1/3 lg:w-1/4 flex justify-center md:justify-start">
                    <div class="w-64 md:w-full max-w-xs rounded-xl overflow-hidden shadow-2xl shadow-red-900/30">
                        <div class="aspect-[2/3] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div
                                class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                KONSER
                            </div>
                            <div class="absolute bottom-4 right-4 bg-black/80 text-white text-xs px-2 py-1 rounded">
                                SOLD OUT
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Konser Info -->
                <div class="w-full md:w-2/3 lg:w-3/4 text-center md:text-left">
                    <!-- Category Badge -->
                    <div class="inline-block bg-red-600 text-white text-sm font-bold px-3 py-1 rounded-full mb-4">
                        MUSIK INDIE & ALTERNATIVE
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Konser "Sound of Independence"</h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 text-gray-300 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Sabtu, 22 November 2023 • 19:00 - 23:00 WIB</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Stadion GBK, Jakarta</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Stars & Rabbit, Reality Club, +8 band indie</span>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center justify-center md:justify-start mb-8">
                        <div class="flex items-center mr-6">
                            <div class="text-red-500 text-2xl mr-2">🔥</div>
                            <div>
                                <div class="text-2xl font-bold text-red-500">SOLD OUT</div>
                                <div class="text-gray-400 text-sm">Tiket habis dalam 2 jam</div>
                            </div>
                        </div>
                        <div class="text-gray-300">
                            <div class="font-bold">15,000+</div>
                            <div class="text-gray-400 text-sm">penonton bergabung</div>
                        </div>
                    </div>

                    <!-- Warning Message -->
                    <div class="bg-red-600/20 border border-red-600 rounded-xl p-4 mb-6">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div>
                                <p class="text-white font-semibold">Tiket telah habis terjual!</p>
                                <p class="text-gray-300 text-sm">Pantau akun sosial media kami untuk informasi konser
                                    selanjutnya.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Waitlist Button -->
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                        <a href="#waitlist-section"
                            class="px-8 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition-colors duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clip-rule="evenodd" />
                            </svg>
                            Join Waitlist
                        </a>

                        <a href="#artis-section"
                            class="px-8 py-3 bg-transparent border-2 border-red-600 text-red-600 font-bold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            Lihat Lineup Artis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Deskripsi & Artis -->
            <div class="lg:col-span-2 space-y-8">
                <!-- DESKRIPSI SECTION -->
                <section>
                    <h2 class="text-2xl font-bold mb-4 flex items-center text-red-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        Tentang Konser
                    </h2>

                    <div id="synopsis-content" class="synopsis-content bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            <strong>"Sound of Independence"</strong> adalah festival musik indie terbesar tahun 2023 yang
                            menghadirkan lineup terbaik dari berbagai kota di Indonesia. Konser ini menjadi wadah apresiasi
                            terhadap musik independen dan kreativitas anak muda Indonesia dalam berkarya.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Dengan konsep <strong>open-air festival</strong> di Stadion GBK, konser ini menawarkan
                            pengalaman
                            menonton yang spektakuler dengan sistem audio kelas dunia, lighting show yang memukau, dan
                            visual effects yang akan memanjakan mata dan telinga penonton.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Selain penampilan musik, konser ini juga menampilkan <strong>art installation</strong> karya
                            seniman lokal, <strong>food festival</strong> dengan berbagai kuliner kreatif, dan
                            <strong>merchandise booth</strong> eksklusif dari masing-masing band.
                        </p>
                        <p class="text-gray-300 leading-relaxed">
                            Konser ini telah terjual habis dengan <strong>15,000+ tiket</strong> ludes dalam waktu 2 jam.
                            Menjadi salah satu event musik indie paling dinanti tahun ini dengan rating kepuasan
                            <strong>4.9/5.0</strong> dari penonton edisi sebelumnya.
                        </p>
                    </div>

                    <button id="read-more-btn"
                        class="read-more-btn mt-4 text-red-500 font-semibold hover:text-red-400 transition-colors duration-300">
                        <span>Selengkapnya</span>
                    </button>
                </section>

                <!-- ARTIS SECTION -->
                <section id="artis-section">
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-red-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z"
                                clip-rule="evenodd" />
                        </svg>
                        Lineup Artis
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Artis 1 -->
                        <div
                            class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-red-500">
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mr-4 text-xl font-bold text-white">
                                    S&R
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-white">Stars & Rabbit</h3>
                                    <p class="text-red-400 text-sm">Indie Folk • Yogyakarta</p>
                                </div>
                            </div>
                            <p class="text-gray-300 text-sm">
                                Duo indie folk dengan vokal khas Alda dan instrumentasi kreatif. Hits: "Man Upon the Hill",
                                "To the Bone".
                            </p>
                            <div class="mt-3">
                                <span class="text-xs text-gray-400">Showtime: 19:30 - 20:15</span>
                            </div>
                        </div>

                        <!-- Artis 2 -->
                        <div
                            class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-red-500">
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mr-4 text-xl font-bold text-white">
                                    RC
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-white">Reality Club</h3>
                                    <p class="text-red-400 text-sm">Indie Rock • Jakarta</p>
                                </div>
                            </div>
                            <p class="text-gray-300 text-sm">
                                Band indie rock dengan sound atmospheric dan lirik mendalam. Hits: "I Wish I Was Your Joke",
                                "Anthropocene".
                            </p>
                            <div class="mt-3">
                                <span class="text-xs text-gray-400">Showtime: 20:30 - 21:15</span>
                            </div>
                        </div>

                        <!-- Artis 3 -->
                        <div
                            class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-red-500">
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mr-4 text-xl font-bold text-white">
                                    FC
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-white">Fourtwnty</h3>
                                    <p class="text-red-400 text-sm">Indie Pop • Bandung</p>
                                </div>
                            </div>
                            <p class="text-gray-300 text-sm">
                                Band dengan lirik puitis dan melodinya yang catchy. Hits: "Zona Nyaman", "Aku Tenang".
                            </p>
                            <div class="mt-3">
                                <span class="text-xs text-gray-400">Showtime: 21:30 - 22:15</span>
                            </div>
                        </div>

                        <!-- Artis 4 -->
                        <div
                            class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-red-500">
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mr-4 text-xl font-bold text-white">
                                    +8
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-white">8 Band Indie Lainnya</h3>
                                    <p class="text-red-400 text-sm">Various Genres • Nationwide</p>
                                </div>
                            </div>
                            <p class="text-gray-300 text-sm">
                                Featuring: .Feast, The Adams, Dialog Senja, Mondo Gascaro, White Shoes & The Couples
                                Company, dll.
                            </p>
                            <div class="mt-3">
                                <span class="text-xs text-gray-400">Showtime: 18:00 - 19:15 & 22:30 - 23:00</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- FASILITAS SECTION -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 text-red-500">Fasilitas Konser</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Fasilitas 1 -->
                        <div class="bg-gray-800 rounded-xl p-6">
                            <div class="flex items-start mb-3">
                                <div class="w-12 h-12 bg-red-600/20 rounded-lg flex items-center justify-center mr-4">
                                    <span class="text-xl">🔊</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-white">Sound System Premium</h3>
                                    <p class="text-gray-300 text-sm">LINE ARRAY system dengan clarity terbaik</p>
                                </div>
                            </div>
                        </div>

                        <!-- Fasilitas 2 -->
                        <div class="bg-gray-800 rounded-xl p-6">
                            <div class="flex items-start mb-3">
                                <div class="w-12 h-12 bg-red-600/20 rounded-lg flex items-center justify-center mr-4">
                                    <span class="text-xl">🎨</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-white">Art Installation</h3>
                                    <p class="text-gray-300 text-sm">Karya seni instalasi dari seniman lokal</p>
                                </div>
                            </div>
                        </div>

                        <!-- Fasilitas 3 -->
                        <div class="bg-gray-800 rounded-xl p-6">
                            <div class="flex items-start mb-3">
                                <div class="w-12 h-12 bg-red-600/20 rounded-lg flex items-center justify-center mr-4">
                                    <span class="text-xl">🍔</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-white">Food & Beverage</h3>
                                    <p class="text-gray-300 text-sm">Berbagai pilihan makanan dan minuman</p>
                                </div>
                            </div>
                        </div>

                        <!-- Fasilitas 4 -->
                        <div class="bg-gray-800 rounded-xl p-6">
                            <div class="flex items-start mb-3">
                                <div class="w-12 h-12 bg-red-600/20 rounded-lg flex items-center justify-center mr-4">
                                    <span class="text-xl">🛍️</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-white">Merchandise Booth</h3>
                                    <p class="text-gray-300 text-sm">Merchandise eksklusif dari setiap band</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Info & Waitlist -->
            <div class="lg:col-span-1">
                <!-- INFO SECTION -->
                <section class="bg-gray-800 rounded-xl p-6 sticky top-24">
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-red-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        Informasi Konser
                    </h2>

                    <!-- Tanggal & Waktu -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-2">TANGGAL & WAKTU</h3>
                        <div class="bg-gray-900 rounded-lg p-4 border-l-4 border-red-500">
                            <div class="flex items-center text-gray-300 mb-2">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-semibold">Sabtu, 22 November 2023</span>
                            </div>
                            <div class="flex items-center text-gray-300">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>19:00 - 23:00 WIB (4 jam)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-2">LOKASI</h3>
                        <div class="bg-gray-900 rounded-lg p-4 border-l-4 border-red-500">
                            <div class="flex items-start text-gray-300">
                                <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Stadion Gelora Bung Karno (GBK)<br>Jl. Pintu Satu Senayan, Jakarta<br>Kapasitas:
                                    15,000 orang</span>
                            </div>
                        </div>
                    </div>

                    <!-- PERATURAN -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-2">PERATURAN KONSER</h3>
                        <div class="space-y-3 text-sm text-gray-300">
                            <div class="flex items-start">
                                <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Tiket harus ditukar dengan wristband di loket</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Dilarang membawa makanan dan minuman dari luar</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Wajib menunjukkan KTP/Kartu Pelajar untuk verifikasi</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Parkir tersedia di area GBK (berbayar)</span>
                            </div>
                        </div>
                    </div>

                    <!-- WAITLIST SECTION -->
                    <div id="waitlist-section" class="border-t border-gray-700 pt-6">
                        <h3 class="text-lg font-bold mb-4 text-white">Join Waitlist</h3>
                        <p class="text-gray-300 text-sm mb-4">
                            Masukkan email Anda untuk mendapatkan notifikasi jika ada tiket yang dibatalkan atau untuk
                            konser selanjutnya.
                        </p>

                        <form class="space-y-3">
                            <input type="email" placeholder="Email Anda"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-red-600">

                            <input type="number" placeholder="Jumlah tiket yang diinginkan"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-red-600">

                            <button type="submit"
                                class="w-full py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition-colors duration-300">
                                Join Waitlist
                            </button>
                        </form>
                    </div>

                    <!-- Info Tambahan -->
                    <div class="mt-6 pt-6 border-t border-gray-700">
                        <div class="flex items-center text-sm text-gray-400 mb-2">
                            <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Kapasitas: <strong>15,000 penonton</strong></span>
                        </div>
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Durasi: <strong>4 jam</strong> (10 band perform)</span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- GALLERY SECTION -->
    <section class="bg-gradient-to-r from-red-900/20 to-gray-900/30 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center text-white">Gallery Konser Sebelumnya</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Gallery 1 -->
                <div class="aspect-square bg-cover bg-center rounded-lg"
                    style="background-image: url('https://images.unsplash.com/photo-1470225620780-dba8ba36b745?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                </div>

                <!-- Gallery 2 -->
                <div class="aspect-square bg-cover bg-center rounded-lg"
                    style="background-image: url('https://images.unsplash.com/photo-1501281667305-0d4eb0b8b5b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                </div>

                <!-- Gallery 3 -->
                <div class="aspect-square bg-cover bg-center rounded-lg"
                    style="background-image: url('https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                </div>

                <!-- Gallery 4 -->
                <div class="aspect-square bg-cover bg-center rounded-lg"
                    style="background-image: url('https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                </div>
            </div>
        </div>
    </section>

    <!-- EVENT TERKAIT SECTION -->
    <section class="bg-gray-900 border-t border-gray-800 py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-white">Event Musik Lainnya</h2>
                <a href="{{ route('now-playing') }}" class="text-red-500 hover:text-red-400 font-medium">
                    Lihat Semua Event →
                </a>
            </div>

            <div class="flex overflow-x-auto showtime-scroll pb-4 gap-6">
                <!-- Event 1 -->
                <a href="{{ route('event.festival.detail', ['slug' => 'java-jazz-festival-2023']) }}"
                    class="flex-shrink-0 w-64 group">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 group-hover:scale-105 transition-transform duration-300">
                        <div class="aspect-[16/9] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                            <div
                                class="absolute top-2 left-2 bg-yellow-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                FESTIVAL
                            </div>
                            <div class="absolute top-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                                <div class="font-semibold">12</div>
                                <div class="text-xs">DES</div>
                            </div>
                        </div>
                    </div>
                    <h3 class="font-bold mb-1 line-clamp-1 text-white group-hover:text-red-400">Java Jazz Festival 2023
                    </h3>
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
                        <span class="bg-yellow-600/20 text-yellow-400 text-xs px-2 py-1 rounded">Jazz</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
