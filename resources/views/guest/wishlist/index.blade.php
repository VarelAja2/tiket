@extends('guest.layouts.app')

@section('content')
    <div
        class="min-h-screen bg-gradient-to-b from-gray-50 via-white to-blue-50/30 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <!-- Header -->
        <!-- Floating Back Button -->
        <div class="container mx-auto px-4 pt-14 pb-12">
            <div class="sticky top-16 ml-6 mt-4 z-40">
                <button onclick="history.back()"
                    class="w-10 h-10 bg-white/90 dark:bg-gray-800/90 backdrop-blur-md
                   rounded-full shadow-xl hover:shadow-2xl
                   transition-all duration-300
                   transform hover:scale-105 active:scale-95
                   flex items-center justify-center group
                   border border-gray-200 dark:border-gray-700">
                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-300
                        group-hover:text-red-600 dark:group-hover:text-red-500
                        transition-colors"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button>
            </div>
            <div class="text-center mb-12 animate-fade-in-up">
                <div
                    class="w-20 h-20 bg-gradient-to-r from-red-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h1
                    class="text-4xl sm:text-5xl font-bold bg-gradient-to-r from-red-600 to-pink-600 bg-clip-text text-transparent mb-4">
                    Wishlist Saya
                </h1>
                <p class="text-gray-600 dark:text-gray-300 text-lg max-w-md mx-auto">
                    Film yang ingin kamu tonton
                </p>
                <div class="mt-6 flex items-center justify-center space-x-2 text-gray-500 dark:text-gray-400">
                    <svg class="w-5 h-5 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.415L11 9.586V6z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm">{{ rand(5, 15) }} film tersimpan</span>
                </div>
            </div>

            <!-- Wishlist Content -->
            <div id="wishlist-content">
                <!-- State when empty (hidden by default) -->
                <div id="empty-state" class="hidden">
                    <div class="max-w-md mx-auto text-center py-20">
                        <div
                            class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 rounded-full flex items-center justify-center mx-auto mb-8">
                            <svg class="w-20 h-20 text-gray-300 dark:text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Wishlist kamu masih kosong</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-sm mx-auto">
                            Tambahkan film favoritmu agar tidak lupa menonton
                        </p>
                        <a href="{{ route('now-playing') }}"
                            class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-pink-600 text-white font-semibold rounded-xl hover:from-red-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Jelajahi Film
                        </a>
                    </div>
                </div>

                <!-- State when has data -->
                <div id="wishlist-grid">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @php
                            $wishlistMovies = [
                                [
                                    'id' => 1,
                                    'title' => 'Avengers: Endgame',
                                    'genre' => 'Action, Adventure, Sci-Fi',
                                    'rating' => '8.4',
                                    'age_rating' => '13+',
                                    'status' => 'Now Playing',
                                    'status_color' => 'green',
                                    'poster' =>
                                        'https://images.unsplash.com/photo-1595769812725-4c6564f7528b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                    'added_date' => '2 hari lalu',
                                ],
                                [
                                    'id' => 2,
                                    'title' => 'Spider-Man: No Way Home',
                                    'genre' => 'Action, Adventure, Fantasy',
                                    'rating' => '8.1',
                                    'age_rating' => '13+',
                                    'status' => 'Now Playing',
                                    'status_color' => 'green',
                                    'poster' =>
                                        'https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                    'added_date' => '1 minggu lalu',
                                ],
                                [
                                    'id' => 3,
                                    'title' => 'Dune: Part Two',
                                    'genre' => 'Sci-Fi, Adventure',
                                    'rating' => '8.7',
                                    'age_rating' => '13+',
                                    'status' => 'Coming Soon',
                                    'status_color' => 'yellow',
                                    'poster' =>
                                        'https://images.unsplash.com/photo-1534447677768-be436bb09401?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                    'added_date' => '3 hari lalu',
                                ],
                                [
                                    'id' => 4,
                                    'title' => 'The Batman',
                                    'genre' => 'Action, Crime, Drama',
                                    'rating' => '7.9',
                                    'age_rating' => '17+',
                                    'status' => 'Now Playing',
                                    'status_color' => 'green',
                                    'poster' =>
                                        'https://images.unsplash.com/photo-1497124401559-3e75ec2ed794?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                    'added_date' => '5 hari lalu',
                                ],
                                [
                                    'id' => 5,
                                    'title' => 'Avatar: The Way of Water',
                                    'genre' => 'Action, Adventure, Fantasy',
                                    'rating' => '7.6',
                                    'age_rating' => '13+',
                                    'status' => 'Now Playing',
                                    'status_color' => 'green',
                                    'poster' =>
                                        'https://images.unsplash.com/photo-1489599809516-9827b6d1cf13?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                    'added_date' => '2 minggu lalu',
                                ],
                                [
                                    'id' => 6,
                                    'title' => 'Top Gun: Maverick',
                                    'genre' => 'Action, Drama',
                                    'rating' => '8.2',
                                    'age_rating' => '13+',
                                    'status' => 'Now Playing',
                                    'status_color' => 'green',
                                    'poster' =>
                                        'https://images.unsplash.com/photo-1574269909862-7e1d70bb8078?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                    'added_date' => '4 hari lalu',
                                ],
                                [
                                    'id' => 7,
                                    'title' => 'Black Panther: Wakanda Forever',
                                    'genre' => 'Action, Adventure, Drama',
                                    'rating' => '7.2',
                                    'age_rating' => '13+',
                                    'status' => 'Now Playing',
                                    'status_color' => 'green',
                                    'poster' =>
                                        'https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                    'added_date' => '1 bulan lalu',
                                ],
                                [
                                    'id' => 8,
                                    'title' => 'Mission: Impossible 7',
                                    'genre' => 'Action, Adventure, Thriller',
                                    'rating' => '7.8',
                                    'age_rating' => '13+',
                                    'status' => 'Coming Soon',
                                    'status_color' => 'yellow',
                                    'poster' =>
                                        'https://images.unsplash.com/photo-1531259683007-016a7b628fc3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                    'added_date' => '1 minggu lalu',
                                ],
                            ];
                        @endphp

                        @foreach ($wishlistMovies as $movie)
                            <div class="group relative overflow-hidden rounded-2xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 animate-fade-in-up"
                                style="animation-delay: {{ $loop->index * 0.1 }}s">
                                <!-- Poster with Gradient Overlay -->
                                <div class="relative h-64 overflow-hidden">
                                    <img src="{{ $movie['poster'] }}" alt="{{ $movie['title'] }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                                    <!-- Gradient Overlay -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    </div>

                                    <!-- Status Badge -->
                                    <div class="absolute top-4 left-4">
                                        <span
                                            class="px-3 py-1.5 rounded-full text-xs font-bold {{ $movie['status_color'] == 'green' ? 'bg-green-500/90 text-white' : 'bg-yellow-500/90 text-white' }} backdrop-blur-sm">
                                            {{ $movie['status'] }}
                                        </span>
                                    </div>

                                    <!-- Rating -->
                                    <div class="absolute top-4 right-4 bg-black/60 backdrop-blur-sm rounded-lg px-3 py-1.5">
                                        <div class="flex items-center text-white">
                                            <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <span class="font-bold">{{ $movie['rating'] }}</span>
                                        </div>
                                    </div>

                                    <!-- Action Buttons (Appear on hover) -->
                                    <div
                                        class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('now-playing', ['id' => $movie['id']]) }}"
                                                class="flex-1 bg-white/90 backdrop-blur-sm text-gray-900 font-semibold py-2.5 rounded-lg hover:bg-white transition-all duration-300 transform hover:scale-105 active:scale-95 text-center">
                                                Lihat Detail
                                            </a>
                                            <button onclick="removeFromWishlist({{ $movie['id'] }})"
                                                class="w-12 bg-red-500/90 backdrop-blur-sm text-white rounded-lg hover:bg-red-600 transition-all duration-300 transform hover:scale-105 active:scale-95 flex items-center justify-center group/remove">
                                                <svg class="w-5 h-5 group-hover/remove:scale-110 transition-transform"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Movie Info -->
                                <div class="p-5">
                                    <h3
                                        class="font-bold text-lg text-gray-900 dark:text-white mb-2 line-clamp-1 group-hover:text-red-600 dark:group-hover:text-red-500 transition-colors">
                                        {{ $movie['title'] }}
                                    </h3>

                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-3 line-clamp-2">
                                        {{ $movie['genre'] }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                                                {{ $movie['age_rating'] }}
                                            </span>
                                            <span class="ml-3 text-xs text-gray-500 dark:text-gray-400">
                                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.415L11 9.586V6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                {{ $movie['added_date'] }}
                                            </span>
                                        </div>

                                        <!-- Quick Add to Calendar -->
                                        <button onclick="addToCalendar({{ $movie['id'] }})"
                                            class="text-gray-400 hover:text-blue-500 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Load More (Optional) -->
                    <div class="text-center mt-12">
                        <button id="load-more"
                            class="px-8 py-3 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:from-gray-200 hover:to-gray-300 dark:hover:from-gray-700 dark:hover:to-gray-800 transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Muat Lebih Banyak
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast"
        class="fixed bottom-4 right-4 bg-gray-800 text-white px-6 py-3 rounded-xl shadow-2xl transform translate-y-full transition-transform duration-300 z-50 max-w-sm">
        <div class="flex items-center">
            <svg id="toast-icon" class="w-6 h-6 mr-3"></svg>
            <div>
                <p id="toast-message" class="font-medium"></p>
                <p id="toast-submessage" class="text-sm text-gray-300"></p>
            </div>
        </div>
    </div>

    <script>
        // Wishlist functionality
        let wishlistItems = {{ count($wishlistMovies) }};

        function showToast(message, submessage = '', type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            const toastSubmessage = document.getElementById('toast-submessage');
            const toastIcon = document.getElementById('toast-icon');

            // Set content
            toastMessage.textContent = message;
            toastSubmessage.textContent = submessage;

            // Set icon based on type
            if (type === 'success') {
                toastIcon.innerHTML = `
            <path fill="currentColor" fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        `;
                toastIcon.classList.remove('text-red-500', 'text-yellow-500');
                toastIcon.classList.add('text-green-500');
            } else if (type === 'error') {
                toastIcon.innerHTML = `
            <path fill="currentColor" fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
        `;
                toastIcon.classList.remove('text-green-500', 'text-yellow-500');
                toastIcon.classList.add('text-red-500');
            }

            // Show toast
            toast.classList.remove('translate-y-full');

            // Hide after 3 seconds
            setTimeout(() => {
                toast.classList.add('translate-y-full');
            }, 3000);
        }

        function removeFromWishlist(movieId) {
            const movieCard = document.querySelector(`[onclick="removeFromWishlist(${movieId})"]`).closest('.group');

            // Add fade out animation
            movieCard.style.opacity = '0';
            movieCard.style.transform = 'scale(0.8) translateY(-20px)';

            // After animation, remove from DOM
            setTimeout(() => {
                movieCard.remove();
                wishlistItems--;

                // Update counter
                document.querySelector('.text-sm span').textContent = `${wishlistItems} film tersimpan`;

                // Show empty state if no items left
                if (wishlistItems === 0) {
                    document.getElementById('wishlist-grid').classList.add('hidden');
                    document.getElementById('empty-state').classList.remove('hidden');
                }

                // Show success toast
                showToast(
                    'Film dihapus dari wishlist',
                    'Film telah dihapus dari daftar kamu',
                    'success'
                );

            }, 300);
        }

        function addToCalendar(movieId) {
            showToast(
                'Ditambahkan ke kalender',
                'Kami akan mengingatkan kamu 1 hari sebelum rilis',
                'success'
            );
        }

        // Load more functionality
        document.getElementById('load-more').addEventListener('click', function() {
            const btn = this;
            const originalText = btn.innerHTML;

            // Show loading state
            btn.innerHTML = `
        <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Memuat...
    `;
            btn.disabled = true;

            // Simulate API call
            setTimeout(() => {
                // In production, this would fetch more movies from backend
                btn.innerHTML = originalText;
                btn.disabled = false;

                showToast(
                    'Semua film telah dimuat',
                    'Kamu telah melihat semua film di wishlist',
                    'success'
                );
            }, 1500);
        });

        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.animate-fade-in-up');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Check if wishlist is empty on load
            if (wishlistItems === 0) {
                document.getElementById('wishlist-grid').classList.add('hidden');
                document.getElementById('empty-state').classList.remove('hidden');
            }
        });
    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Line clamp for text truncation */
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

        /* Smooth transitions */
        * {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        /* Custom scrollbar for the page */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }

        .dark ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #dc2626, #ec4899);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #b91c1c, #db2777);
        }

        /* Back button glow effect */
        @keyframes buttonGlow {

            0%,
            100% {
                box-shadow: 0 10px 25px rgba(220, 38, 38, 0.2);
            }

            50% {
                box-shadow: 0 10px 35px rgba(220, 38, 38, 0.4);
            }
        }

        .sticky button {
            animation: buttonGlow 3s ease-in-out infinite;
        }

        /* Card hover effects */
        .group:hover .transition-transform {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .grid {
                gap: 1rem;
            }

            .sticky button {
                width: 3rem;
                height: 3rem;
                top: 1rem;
                left: 1rem;
            }
        }
    </style>
@endsection
