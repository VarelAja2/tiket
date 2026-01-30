<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPIX - Pesan Tiket Event Online</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="#">

    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }

        ::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 4px;
        }

        /* Custom animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        /* Custom horizontal scroll */
        .horizontal-scroll {
            overflow-x: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .horizontal-scroll::-webkit-scrollbar {
            display: none;
        }

        /* Pulse animation for notification badge */
        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Search bar animation */
        .search-expand {
            transition: all 0.3s ease;
        }

        .search-expand:focus {
            width: 250px;
        }
    </style>

    <!-- Simple JS for mobile menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const menuBtn = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Hero slider simulation
            let currentSlide = 0;
            const slides = document.querySelectorAll('.hero-slide');
            const totalSlides = slides.length;

            if (slides.length > 0) {
                // Show first slide
                slides[0].classList.remove('hidden');

                // Auto slide every 5 seconds
                setInterval(() => {
                    slides[currentSlide].classList.add('hidden');
                    currentSlide = (currentSlide + 1) % totalSlides;
                    slides[currentSlide].classList.remove('hidden');
                }, 5000);
            }

            // Toggle search bar on mobile
            const searchToggle = document.getElementById('search-toggle');
            const searchBar = document.getElementById('search-bar');

            if (searchToggle && searchBar) {
                searchToggle.addEventListener('click', function() {
                    searchBar.classList.toggle('hidden');
                    if (!searchBar.classList.contains('hidden')) {
                        searchBar.querySelector('input').focus();
                    }
                });
            }

            // Wishlist counter
            const wishlistCount = 3; // Dummy data
            document.querySelectorAll('.wishlist-count').forEach(el => {
                el.textContent = wishlistCount;
            });
        });
    </script>
</head>

<body class="bg-gray-900 text-white">
    <!-- NAVBAR -->
    <nav class="bg-gray-900 border-b border-gray-800 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-red-600 flex items-center">
                        BPIX
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="hover:text-red-500 transition-colors duration-300 flex items-center">
                        <i class="fas fa-home mr-2"></i>
                        Beranda
                    </a>
                    <a href="{{ route('now-playing') }}"
                        class="hover:text-red-500 transition-colors duration-300 flex items-center">
                        <i class="fas fa-film mr-2"></i>
                        Buy Ticket
                    </a>
                    <a href="{{ route('help') }}"
                        class="hover:text-red-500 transition-colors duration-300 flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        Tentang
                    </a>
                    <a href="{{ route('contact') }}"
                        class="hover:text-red-500 transition-colors duration-300 flex items-center">
                        <i class="fas fa-phone-alt mr-2"></i>
                        Kontak
                    </a>
                </div>

                <!-- Desktop Right Section - Search, Wishlist, Auth -->
                <div class="hidden md:flex items-center space-x-6">
                    <!-- Search Bar -->
                    <div class="relative">
                        <div class="relative search-expand">
                            <input type="text" placeholder="Cari event atau film..."
                                class="pl-10 pr-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-sm text-white focus:outline-none focus:border-red-500 w-40 focus:w-64 transition-all duration-300">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist Icon with Badge -->
                    <div class="relative">
                        <a href="{{ route('wishlist.index') }}"
                            class="relative text-gray-300 hover:text-red-500 transition-colors duration-300">
                            <i class="fas fa-heart text-xl"></i>
                            <span
                                class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center animate-pulse">
                                <span class="wishlist-count">3</span>
                            </span>
                        </a>
                    </div>

                    <!-- Separator -->
                    <div class="h-6 w-px bg-gray-700"></div>

                    <!-- Auth Buttons -->
                    @guest
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 rounded-lg border border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-colors duration-300">
                                Masuk
                            </a>
                            <a href="{{ route('register') }}"
                                class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition-colors duration-300">
                                Daftar
                            </a>
                        </div>
                    @endguest

                    @auth
                        <div class="relative group">
                            <button class="flex items-center space-x-2 hover:text-red-500 transition">
                                <i class="fas fa-user-circle text-xl"></i>
                                <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>

                            <!-- Dropdown -->
                            <div
                                class="absolute right-0 mt-2 w-44 bg-gray-800 rounded-lg shadow-lg
                opacity-0 invisible group-hover:opacity-100 group-hover:visible
                transition-all duration-200 z-50">
                                <a href="{{ route('user.profile') }}" class="block px-4 py-2 hover:bg-gray-700 text-sm">
                                    <i class="fas fa-user mr-2"></i> Profile
                                </a>

                                <a href="{{ route('user.history') }}" class="block px-4 py-2 hover:bg-gray-700 text-sm">
                                    <i class="fas fa-ticket-alt mr-2"></i> Riwayat
                                </a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-600 text-sm">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Mobile Menu Button with Icons -->
                <div class="md:hidden flex items-center space-x-4">
                    <!-- Mobile Search Toggle -->
                    <button id="search-toggle" class="text-gray-300 hover:text-red-500">
                        <i class="fas fa-search text-xl"></i>
                    </button>

                    <!-- Mobile Wishlist -->
                    <a href="{{ route('wishlist.index') }}" class="relative text-gray-300 hover:text-red-500">
                        <i class="fas fa-heart text-xl"></i>
                        <span
                            class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold rounded-full h-4 w-4 flex items-center justify-center">
                            <span class="wishlist-count">3</span>
                        </span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-button" class="text-gray-300 hover:text-white">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Search Bar -->
            <div id="search-bar" class="md:hidden hidden mt-4 mb-2">
                <div class="relative">
                    <input type="text" placeholder="Cari event atau film..."
                        class="w-full pl-10 pr-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-red-500">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden py-4 border-t border-gray-800">
                <div class="flex flex-col space-y-4">
                    <a href="{{ route('home') }}"
                        class="hover:text-red-500 transition-colors duration-300 flex items-center">
                        <i class="fas fa-home mr-3 w-5"></i>
                        Beranda
                    </a>
                    <a href="{{ route('now-playing') }}"
                        class="hover:text-red-500 transition-colors duration-300 flex items-center">
                        <i class="fas fa-film mr-3 w-5"></i>
                        Buy Ticket
                    </a>
                    <a href="{{ route('help') }}"
                        class="hover:text-red-500 transition-colors duration-300 flex items-center">
                        <i class="fas fa-info-circle mr-3 w-5"></i>
                        Tentang
                    </a>
                    <a href="{{ route('contact') }}"
                        class="hover:text-red-500 transition-colors duration-300 flex items-center">
                        <i class="fas fa-phone-alt mr-3 w-5"></i>
                        Kontak
                    </a>

                    <div class="pt-4 border-t border-gray-800">
                        <div class="mb-4">
                            <a href="{{ route('wishlist.index') }}"
                                class="hover:text-red-500 transition-colors duration-300 flex items-center">
                                <i class="fas fa-heart mr-3 w-5"></i>
                                Wishlist
                                <span
                                    class="ml-auto bg-red-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                                    <span class="wishlist-count">3</span>
                                </span>
                            </a>
                        </div>

                        @guest
                            <div class="flex flex-col space-y-2">
                                <a href="{{ route('login') }}"
                                    class="px-4 py-2 rounded-lg border border-red-600 text-red-600
              hover:bg-red-600 hover:text-white transition text-center">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                                </a>
                                <a href="{{ route('register') }}"
                                    class="px-4 py-2 rounded-lg bg-red-600 text-white
              hover:bg-red-700 transition text-center">
                                    <i class="fas fa-user-plus mr-2"></i> Daftar
                                </a>
                            </div>
                        @endguest

                        @auth
                            <div class="flex flex-col space-y-2">
                                <a href="{{ route('user.profile') }}"
                                    class="px-4 py-2 hover:bg-gray-800 rounded-lg flex items-center">
                                    <i class="fas fa-user mr-2"></i> Profile
                                </a>

                                <a href="{{ route('user.wishlist') }}"
                                    class="px-4 py-2 hover:bg-gray-800 rounded-lg flex items-center">
                                    <i class="fas fa-heart mr-2"></i> Wishlist
                                </a>

                                <a href="{{ route('user.history') }}"
                                    class="px-4 py-2 hover:bg-gray-800 rounded-lg flex items-center">
                                    <i class="fas fa-ticket-alt mr-2"></i> Riwayat
                                </a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full px-4 py-2 text-left text-red-500 hover:bg-red-600 hover:text-white rounded-lg transition">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 border-t border-gray-800">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Tentang Kami -->
                <div>
                    <h3 class="text-xl font-bold text-red-600 mb-4 flex items-center">
                        <i class="fas fa-ticket-alt mr-2"></i>
                        BPIX
                    </h3>
                    <p class="text-gray-400 text-sm">
                        Platform pemesanan tiket event online di smk bppi baleendah. Pesan tiket dengan mudah, cepat,
                        dan aman.
                    </p>
                </div>

                <!-- Menu Cepat -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fas fa-bars mr-2"></i>
                        Menu Cepat
                    </h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300 flex items-center">
                                <i class="fas fa-home mr-2 text-xs"></i>
                                Home
                            </a></li>
                        <li><a href="{{ route('now-playing') }}"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300 flex items-center">
                                <i class="fas fa-film mr-2 text-xs"></i>
                                Buy Ticket
                            </a></li>
                        <li><a href="{{ route('help') }}"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300 flex items-center">
                                <i class="fas fa-info-circle mr-2 text-xs"></i>
                                Tentang
                            </a></li>
                        <li><a href="{{ route('contact') }}"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300 flex items-center">
                                <i class="fas fa-phone-alt mr-2 text-xs"></i>
                                Kontak
                            </a></li>
                        <li><a href="{{ route('coming-soon') }}"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300 flex items-center">
                                <i class="fas fa-calendar mr-2 text-xs"></i>
                                Akan Hadir
                            </a></li>
                    </ul>
                </div>

                <!-- Bantuan -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fas fa-question-circle mr-2"></i>
                        Bantuan
                    </h4>
                    <ul class="space-y-2">
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300 flex items-center">
                                <i class="fas fa-question mr-2 text-xs"></i>
                                FAQ
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300 flex items-center">
                                <i class="fas fa-shopping-cart mr-2 text-xs"></i>
                                Cara Pesan
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300 flex items-center">
                                <i class="fas fa-file-contract mr-2 text-xs"></i>
                                Syarat & Ketentuan
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300 flex items-center">
                                <i class="fas fa-shield-alt mr-2 text-xs"></i>
                                Kebijakan Privasi
                            </a></li>
                    </ul>
                </div>

                <!-- Sosial Media -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fas fa-hashtag mr-2"></i>
                        Ikuti Kami
                    </h4>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="text-gray-400 hover:text-red-500 transition-colors duration-300 text-2xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="text-gray-400 hover:text-red-500 transition-colors duration-300 text-2xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="text-gray-400 hover:text-red-500 transition-colors duration-300 text-2xl">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#"
                            class="text-gray-400 hover:text-red-500 transition-colors duration-300 text-2xl">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500 text-sm">
                <p class="flex items-center justify-center">
                    <i class="fas fa-copyright mr-2"></i>
                    2026 BPIX. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>
