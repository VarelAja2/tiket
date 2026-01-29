@extends('guest.layouts.app')

@section('content')
    <!-- HERO SECTION -->
    <section class="relative overflow-hidden bg-gray-900">
        <!-- Hero Slider -->
        <div class="relative h-96 md:h-[500px] overflow-hidden">
            <!-- Slide 1 -->
            <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-1000">
                <!-- Background Image -->
                <div class="absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/90 to-transparent z-10"></div>
                    <div class="w-full h-full bg-cover bg-center"
                        style="background-image: url('https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1925&q=80')">
                    </div>
                </div>

                <!-- Content -->
                <div class="relative h-full flex items-center">
                    <div class="container mx-auto px-4 z-20">
                        <div class="max-w-2xl animate-fade-in">
                            <h1 class="text-4xl md:text-6xl font-bold mb-4">Pesan Tiket Event Tanpa Ribet</h1>
                            <p class="text-lg md:text-xl text-gray-300 mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse molestiae voluptate quia! Illum vero ipsum at impedit! Eligendi voluptatem 
                                iure blanditiis distinctio, accusamus, fugit minus accusantium, repellat cupiditate atque hic.</p>
                            <div class="flex flex-wrap gap-4">
                                <a href="#"
                                    class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors duration-300 transform hover:scale-105">Lihat
                                    Film</a>
                                <a href="#"
                                    class="px-6 py-3 bg-transparent border-2 border-red-600 text-red-600 font-semibold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300 transform hover:scale-105">Promo
                                    Hari Ini</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="hero-slide hidden absolute inset-0 w-full h-full transition-opacity duration-1000">
                <!-- Background Image -->
                <div class="absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/90 to-transparent z-10"></div>
                    <div class="w-full h-full bg-cover bg-center"
                        style="background-image: url('https://images.unsplash.com/photo-1489599809516-9827b6d1cf13?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1935&q=80')">
                    </div>
                </div>

                <!-- Content -->
                <div class="relative h-full flex items-center">
                    <div class="container mx-auto px-4 z-20">
                        <div class="max-w-2xl animate-fade-in">
                            <h1 class="text-4xl md:text-6xl font-bold mb-4">Event Menarik Setiap Minggu</h1>
                            <p class="text-lg md:text-xl text-gray-300 mb-8">Dapatkan tiket event terbaru
                                sebelum kehabisan.</p>
                            <div class="flex flex-wrap gap-4">
                                <a href="#"
                                    class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors duration-300 transform hover:scale-105">Beli
                                    Tiket</a>
                                <a href="#"
                                    class="px-6 py-3 bg-transparent border-2 border-red-600 text-red-600 font-semibold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300 transform hover:scale-105">Jadwal
                                    Tayang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="hero-slide hidden absolute inset-0 w-full h-full transition-opacity duration-1000">
                <!-- Background Image -->
                <div class="absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/90 to-transparent z-10"></div>
                    <div class="w-full h-full bg-cover bg-center"
                        style="background-image: url('https://images.unsplash.com/photo-1574267432553-4b4628081c31?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1931&q=80')">
                    </div>
                </div>

                <!-- Content -->
                <div class="relative h-full flex items-center">
                    <div class="container mx-auto px-4 z-20">
                        <div class="max-w-2xl animate-fade-in">
                            <h1 class="text-4xl md:text-6xl font-bold mb-4">Tempat Nyaman & Modern</h1>
                            <p class="text-lg md:text-xl text-gray-300 mb-8">Tempat outdoor dan nyaman untuk digunakan dengan
                                pengalaman event terbaik</p>
                            <div class="flex flex-wrap gap-4">
                                <a href="{{ route('cinemas') }}"
                                    class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors duration-300 transform hover:scale-105">Cari
                                    Lokasi</a>
                                <a href="#"
                                    class="px-6 py-3 bg-transparent border-2 border-red-600 text-red-600 font-semibold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300 transform hover:scale-105">Lihat
                                    Fasilitas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4 -->
            <div class="hero-slide hidden absolute inset-0 w-full h-full transition-opacity duration-1000">
                <!-- Background Image -->
                <div class="absolute inset-0">
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/90 to-transparent z-10"></div>
                    <div class="w-full h-full bg-cover bg-center"
                        style="background-image: url('https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1956&q=80')">
                    </div>
                </div>

                <!-- Content -->
                <div class="relative h-full flex items-center">
                    <div class="container mx-auto px-4 z-20">
                        <div class="max-w-2xl animate-fade-in">
                            <h1 class="text-4xl md:text-6xl font-bold mb-4">Promo Spesial Member</h1>
                            <p class="text-lg md:text-xl text-gray-300 mb-8">Dapatkan diskon hingga 50% untuk member setia
                                dan berbagai penawaran menarik lainnya.</p>
                            <div class="flex flex-wrap gap-4">
                                <a href="{{ route('promo') }}"
                                    class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors duration-300 transform hover:scale-105">Lihat
                                    Promo</a>
                                <a href="{{ route('register') }}"
                                    class="px-6 py-3 bg-transparent border-2 border-red-600 text-red-600 font-semibold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300 transform hover:scale-105">Daftar
                                    Member</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <button id="prev-slide"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white p-3 rounded-full transition-colors duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <button id="next-slide"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white p-3 rounded-full transition-colors duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <!-- Slide Indicators -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 z-30 flex space-x-2">
                <button class="slide-indicator w-3 h-3 rounded-full bg-red-600 transition-all duration-300"></button>
                <button
                    class="slide-indicator w-3 h-3 rounded-full bg-gray-600 hover:bg-gray-400 transition-all duration-300"></button>
                <button
                    class="slide-indicator w-3 h-3 rounded-full bg-gray-600 hover:bg-gray-400 transition-all duration-300"></button>
                <button
                    class="slide-indicator w-3 h-3 rounded-full bg-gray-600 hover:bg-gray-400 transition-all duration-300"></button>
            </div>
        </div>
    </section>

    <!-- NOW PLAYING SECTION -->
    <section class="py-12 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Beli Tiket</h2>
                <a href="#" class="text-red-500 hover:text-red-400 transition-colors duration-300 font-semibold">Lihat
                    Semua →</a>

            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Movie Card 1 -->
                <div
                    class="bg-gray-800 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-red-900/20">
                    <div class="relative">
                        <!-- Poster Placeholder -->
                        <div class="h-64 bg-gradient-to-br from-red-900/30 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">🎬</span>
                        </div>

                        <!-- Age Rating Badge -->
                        <div class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">13+
                        </div>

                        <!-- Rating -->
                        <div
                            class="absolute top-4 right-4 bg-gray-900/80 text-white text-sm font-bold px-2 py-1 rounded flex items-center">
                            <span>⭐ 8.5</span>
                        </div>
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">Avengers: Endgame</h3>
                        <p class="text-gray-400 text-sm mb-4">Action, Adventure, Sci-Fi</p>
                        <a href="#"
                            class="block w-full py-2 bg-red-600 text-white text-center rounded-lg hover:bg-red-700 transition-colors duration-300">Beli
                            Tiket</a>
                    </div>
                </div>

                <!-- Movie Card 2 -->
                <div
                    class="bg-gray-800 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-red-900/20">
                    <div class="relative">
                        <div class="h-64 bg-gradient-to-br from-blue-900/30 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">🎭</span>
                        </div>
                        <div class="absolute top-4 left-4 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded">17+
                        </div>
                        <div
                            class="absolute top-4 right-4 bg-gray-900/80 text-white text-sm font-bold px-2 py-1 rounded flex items-center">
                            <span>⭐ 7.9</span>
                        </div>
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">Joker</h3>
                        <p class="text-gray-400 text-sm mb-4">Drama, Thriller, Crime</p>
                        <a href="#"
                            class="block w-full py-2 bg-red-600 text-white text-center rounded-lg hover:bg-red-700 transition-colors duration-300">Beli
                            Tiket</a>
                    </div>
                </div>

                <!-- Movie Card 3 -->
                <div
                    class="bg-gray-800 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-red-900/20">
                    <div class="relative">
                        <div class="h-64 bg-gradient-to-br from-green-900/30 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">🦸</span>
                        </div>
                        <div class="absolute top-4 left-4 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">SU
                        </div>
                        <div
                            class="absolute top-4 right-4 bg-gray-900/80 text-white text-sm font-bold px-2 py-1 rounded flex items-center">
                            <span>⭐ 8.1</span>
                        </div>
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">Spider-Man: No Way Home</h3>
                        <p class="text-gray-400 text-sm mb-4">Action, Adventure, Fantasy</p>
                        <a href="#"
                            class="block w-full py-2 bg-red-600 text-white text-center rounded-lg hover:bg-red-700 transition-colors duration-300">Beli
                            Tiket</a>
                    </div>
                </div>

                <!-- Movie Card 4 -->
                <div
                    class="bg-gray-800 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-red-900/20">
                    <div class="relative">
                        <div
                            class="h-64 bg-gradient-to-br from-purple-900/30 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">👻</span>
                        </div>
                        <div class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">17+
                        </div>
                        <div
                            class="absolute top-4 right-4 bg-gray-900/80 text-white text-sm font-bold px-2 py-1 rounded flex items-center">
                            <span>⭐ 8.7</span>
                        </div>
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">The Conjuring 3</h3>
                        <p class="text-gray-400 text-sm mb-4">Horror, Mystery, Thriller</p>
                        <a href="#"
                            class="block w-full py-2 bg-red-600 text-white text-center rounded-lg hover:bg-red-700 transition-colors duration-300">Beli
                            Tiket</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- COMING SOON SECTION -->
    <section class="py-12 bg-gray-900 border-t border-gray-800">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Coming Soon</h2>
                <a href="#"
                    class="text-red-500 hover:text-red-400 transition-colors duration-300 font-semibold">Lihat
                    Semua →</a>
            </div>

            <div class="horizontal-scroll flex space-x-6 pb-4">
                <!-- Coming Soon Card 1 -->
                <div
                    class="flex-shrink-0 w-48 bg-gray-800 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105">
                    <div class="relative">
                        <div class="h-56 bg-gradient-to-br from-red-900/20 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">🚀</span>
                        </div>
                        <div class="absolute top-4 left-4 bg-gray-900 text-white text-xs font-bold px-2 py-1 rounded">
                            COMING
                            SOON</div>
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold mb-1">Dune: Part Two</h3>
                        <p class="text-gray-400 text-sm mb-2">Sci-Fi, Adventure</p>
                        <div class="text-red-500 text-sm font-semibold">15 Des 2023</div>
                    </div>
                </div>

                <!-- Coming Soon Card 2 -->
                <div
                    class="flex-shrink-0 w-48 bg-gray-800 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105">
                    <div class="relative">
                        <div class="h-56 bg-gradient-to-br from-blue-900/20 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">🦇</span>
                        </div>
                        <div class="absolute top-4 left-4 bg-gray-900 text-white text-xs font-bold px-2 py-1 rounded">
                            COMING SOON</div>
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold mb-1">The Batman 2</h3>
                        <p class="text-gray-400 text-sm mb-2">Action, Crime, Drama</p>
                        <div class="text-red-500 text-sm font-semibold">20 Jan 2024</div>
                    </div>
                </div>

                <!-- Coming Soon Card 3 -->
                <div
                    class="flex-shrink-0 w-48 bg-gray-800 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105">
                    <div class="relative">
                        <div class="h-56 bg-gradient-to-br from-green-900/20 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">👨‍👩‍👧‍👦</span>
                        </div>
                        <div class="absolute top-4 left-4 bg-gray-900 text-white text-xs font-bold px-2 py-1 rounded">
                            COMING SOON</div>
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold mb-1">Avatar 3</h3>
                        <p class="text-gray-400 text-sm mb-2">Action, Adventure, Fantasy</p>
                        <div class="text-red-500 text-sm font-semibold">10 Mar 2024</div>
                    </div>
                </div>

                <!-- Coming Soon Card 4 -->
                <div
                    class="flex-shrink-0 w-48 bg-gray-800 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105">
                    <div class="relative">
                        <div
                            class="h-56 bg-gradient-to-br from-yellow-900/20 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">🕷️</span>
                        </div>
                        <div class="absolute top-4 left-4 bg-gray-900 text-white text-xs font-bold px-2 py-1 rounded">
                            COMING SOON</div>
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold mb-1">Spider-Man: Across the Spider-Verse 2</h3>
                        <p class="text-gray-400 text-sm mb-2">Animation, Action, Adventure</p>
                        <div class="text-red-500 text-sm font-semibold">5 Apr 2024</div>
                    </div>
                </div>

                <!-- Coming Soon Card 5 -->
                <div
                    class="flex-shrink-0 w-48 bg-gray-800 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105">
                    <div class="relative">
                        <div
                            class="h-56 bg-gradient-to-br from-purple-900/20 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">🔮</span>
                        </div>
                        <div class="absolute top-4 left-4 bg-gray-900 text-white text-xs font-bold px-2 py-1 rounded">
                            COMING SOON</div>
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold mb-1">Fantastic Beasts 4</h3>
                        <p class="text-gray-400 text-sm mb-2">Adventure, Family, Fantasy</p>
                        <div class="text-red-500 text-sm font-semibold">15 Mei 2024</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROMO SECTION -->
    <section class="py-16 bg-gradient-to-r from-red-900 to-red-800">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">Diskon 50% Tiket Bioskop</h2>
                    <p class="text-xl mb-6 text-red-100">Setiap hari Senin - Kamis untuk semua film</p>
                    <p class="text-red-200 mb-8">Promo berlaku untuk semua bioskop partner TIXCLONE. Pesan sekarang sebelum
                        kehabisan!</p>
                    <a href="#"
                        class="inline-block px-8 py-3 bg-white text-red-600 font-bold rounded-lg hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105">Lihat
                        Promo</a>
                </div>

                <div class="md:w-2/5">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="text-center mb-6">
                            <div class="text-6xl font-bold text-white mb-2">50%</div>
                            <div class="text-white text-xl">DISCOUNT</div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center border-b border-white/20 pb-2">
                                <span class="text-white">Kode Promo</span>
                                <span class="font-bold text-white">TIX50OFF</span>
                            </div>
                            <div class="flex justify-between items-center border-b border-white/20 pb-2">
                                <span class="text-white">Berlaku Hingga</span>
                                <span class="font-bold text-white">31 Des 2023</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-white">Kuota</span>
                                <span class="font-bold text-white">1.000 tiket/hari</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CINEMA INFO SECTION -->
    <section class="py-12 bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Bioskop Partner</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Cinema 1 -->
                <div
                    class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-colors duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-white font-bold text-xl">XXI</span>
                        </div>
                        <h3 class="text-xl font-bold">XXI Plaza Indonesia</h3>
                    </div>

                    <div class="mb-4">
                        <div class="flex items-center text-gray-400 mb-2">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Jakarta Pusat</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>12 Studio</span>
                        </div>
                    </div>

                    <div class="text-sm text-gray-300">
                        <span class="font-semibold text-red-500">Fasilitas:</span> Dolby Atmos, IMAX, 4DX, Food Court
                    </div>
                </div>

                <!-- Cinema 2 -->
                <div
                    class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-colors duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-white font-bold text-xl">CGV</span>
                        </div>
                        <h3 class="text-xl font-bold">CGV Grand Indonesia</h3>
                    </div>

                    <div class="mb-4">
                        <div class="flex items-center text-gray-400 mb-2">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Jakarta Pusat</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>10 Studio</span>
                        </div>
                    </div>

                    <div class="text-sm text-gray-300">
                        <span class="font-semibold text-red-500">Fasilitas:</span> ScreenX, Gold Class, SweetBox, Starbucks
                    </div>
                </div>

                <!-- Cinema 3 -->
                <div
                    class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-colors duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                            <span class="text-white font-bold text-xl">CIN</span>
                        </div>
                        <h3 class="text-xl font-bold">Cinema 31 BSD City</h3>
                    </div>

                    <div class="mb-4">
                        <div class="flex items-center text-gray-400 mb-2">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Tangerang Selatan</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>8 Studio</span>
                        </div>
                    </div>

                    <div class="text-sm text-gray-300">
                        <span class="font-semibold text-red-500">Fasilitas:</span> Velvet Class, 3D Digital, Cafe,
                        Playground
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <a href="#"
                    class="inline-block px-6 py-3 border-2 border-red-600 text-red-600 font-semibold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300">Lihat
                    Semua Bioskop</a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentSlide = 0;
            const slides = document.querySelectorAll('.hero-slide');
            const indicators = document.querySelectorAll('.slide-indicator');
            const totalSlides = slides.length;
            let slideInterval;

            // Show specific slide
            function showSlide(index) {
                // Hide all slides
                slides.forEach(slide => {
                    slide.classList.add('hidden');
                    slide.classList.remove('opacity-100');
                    slide.classList.add('opacity-0');
                });

                // Remove active from all indicators
                indicators.forEach(indicator => {
                    indicator.classList.remove('bg-red-600', 'w-8');
                    indicator.classList.add('bg-gray-600', 'w-3');
                });

                // Show current slide
                slides[index].classList.remove('hidden');
                setTimeout(() => {
                    slides[index].classList.remove('opacity-0');
                    slides[index].classList.add('opacity-100');
                }, 10);

                // Update indicator
                indicators[index].classList.remove('bg-gray-600', 'w-3');
                indicators[index].classList.add('bg-red-600', 'w-8');

                currentSlide = index;
            }

            // Next slide
            function nextSlide() {
                let nextIndex = (currentSlide + 1) % totalSlides;
                showSlide(nextIndex);
            }

            // Previous slide
            function prevSlide() {
                let prevIndex = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(prevIndex);
            }

            // Auto slide
            function startAutoSlide() {
                slideInterval = setInterval(nextSlide, 5000);
            }

            // Stop auto slide
            function stopAutoSlide() {
                clearInterval(slideInterval);
            }

            // Initialize
            showSlide(0);
            startAutoSlide();

            // Event Listeners
            document.getElementById('next-slide')?.addEventListener('click', function() {
                nextSlide();
                stopAutoSlide();
                startAutoSlide();
            });

            document.getElementById('prev-slide')?.addEventListener('click', function() {
                prevSlide();
                stopAutoSlide();
                startAutoSlide();
            });

            // Add click events to indicators
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', function() {
                    showSlide(index);
                    stopAutoSlide();
                    startAutoSlide();
                });
            });

            // Pause auto slide on hover
            const slider = document.querySelector('.relative.h-96');
            if (slider) {
                slider.addEventListener('mouseenter', stopAutoSlide);
                slider.addEventListener('mouseleave', startAutoSlide);
            }
        });
    </script>
@endsection
