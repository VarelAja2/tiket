<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPIX - Pesan Tiket Event Online</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

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
                    <a href="{{ url('/') }}" class="text-2xl font-bold text-red-600">BPIX</a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="hover:text-red-500 transition-colors duration-300">Beranda</a>
                    <a href="{{ route('now-playing') }}" class="hover:text-red-500 transition-colors duration-300">Buy
                        Ticket</a>
                    <a href="{{ route('help') }}" class="hover:text-red-500 transition-colors duration-300">Tentang</a>
                    <a href="{{ route('contact') }}"
                        class="hover:text-red-500 transition-colors duration-300">Kontak</a>
                </div>

                <!-- Desktop Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="../../auth/login.blade.php"
                        class="px-4 py-2 rounded-lg border border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-colors duration-300">Masuk</a>
                    <a href="../../auth/register.blade.php"
                        class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition-colors duration-300">Daftar</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-300 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden py-4 border-t border-gray-800">
                <div class="flex flex-col space-y-4">
                    <a href="#" class="hover:text-red-500 transition-colors duration-300">Home</a>
                    <a href="#" class="hover:text-red-500 transition-colors duration-300">Buy Ticket</a>
                    <a href="#" class="hover:text-red-500 transition-colors duration-300">Tentang</a>
                    <a href="#" class="hover:text-red-500 transition-colors duration-300">Kontak</a>

                    <div class="flex flex-col space-y-2 pt-4 border-t border-gray-800">
                        <a href="#"
                            class="px-4 py-2 rounded-lg border border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-colors duration-300 text-center">Masuk</a>
                        <a href="#"
                            class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition-colors duration-300 text-center">Daftar</a>
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
                    <h3 class="text-xl font-bold text-red-600 mb-4">BPIX</h3>
                    <p class="text-gray-400 text-sm">
                        Platform pemesanan tiket event online di smk bppi baleendah. Pesan tiket dengan mudah, cepat,
                        dan aman.
                    </p>
                </div>

                <!-- Menu Cepat -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Menu Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300">Home</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300">Buy Ticket</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300">Tentang</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300">Kontak</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300">Promo</a></li>
                    </ul>
                </div>

                <!-- Bantuan -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Bantuan</h4>
                    <ul class="space-y-2">
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300">FAQ</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300">Cara Pesan</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300">Syarat &
                                Ketentuan</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-red-500 transition-colors duration-300">Kebijakan
                                Privasi</a></li>
                    </ul>
                </div>

                <!-- Sosial Media -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-red-500 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-red-500 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-red-500 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500 text-sm">
                <p>&copy; 2026 BPIX. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
