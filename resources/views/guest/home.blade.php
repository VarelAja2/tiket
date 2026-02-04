@extends('guest.layouts.app')

@section('content')
    <!-- HERO SECTION -->
    <section class="relative overflow-hidden bg-gray-900">
        <!-- Hero Slider -->
        <div class="relative h-96 md:h-[500px] overflow-hidden">
            @foreach ($banners as $index => $banner)
                <!-- Slide {{ $index + 1 }} -->
                <div
                    class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-1000 {{ $index !== 0 ? 'hidden' : '' }}">
                    <!-- Background Image -->
                    <div class="absolute inset-0">
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/90 to-transparent z-10">
                        </div>
                        <div class="w-full h-full bg-cover bg-center"
                            style="background-image: url('{{ $banner->image_url }}')">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="relative h-full flex items-center">
                        <div class="container mx-auto px-4 z-20">
                            <div class="max-w-2xl animate-fade-in">
                                <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $banner->title }}</h1>
                                <p class="text-lg md:text-xl text-gray-300 mb-8">{{ $banner->description }}</p>
                                <div class="flex flex-wrap gap-4">
                                    @if ($banner->button_text && $banner->button_url)
                                        <a href="{{ $banner->button_url }}"
                                            class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors duration-300 transform hover:scale-105">
                                            {{ $banner->button_text }}
                                        </a>
                                    @endif

                                    @if ($banner->button_secondary_text && $banner->button_secondary_url)
                                        <a href="{{ $banner->button_secondary_url }}"
                                            class="px-6 py-3 bg-transparent border-2 border-red-600 text-red-600 font-semibold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300 transform hover:scale-105">
                                            {{ $banner->button_secondary_text }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

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
                @foreach ($banners as $index => $banner)
                    <button
                        class="slide-indicator w-3 h-3 rounded-full {{ $index === 0 ? 'bg-red-600' : 'bg-gray-600 hover:bg-gray-400' }} transition-all duration-300"></button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- NOW PLAYING SECTION -->
    <section class="py-12 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Beli Tiket</h2>
                <a href="{{ route('now-playing') }}"
                    class="text-red-500 hover:text-red-400 transition-colors duration-300 font-semibold">Lihat
                    Semua</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($nowPlayingEvents as $event)
                    <div
                        class="group relative overflow-hidden rounded-xl bg-gray-900 transition-all duration-500 hover:scale-[1.03] hover:shadow-2xl hover:shadow-red-900/30">
                        <!-- Image Container -->
                        <div class="relative h-64 overflow-hidden">
                            <!-- Main Image -->
                            <img src="{{ $event->image_url }}" alt="{{ $event->title }}"
                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent">
                            </div>

                            <!-- Age Rating Badge -->
                            <div
                                class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                {{ $event->age_rating }}
                            </div>

                            <!-- Rating -->
                            @if ($event->rating)
                                <div
                                    class="absolute top-4 right-4 bg-gray-900/90 backdrop-blur-sm text-white text-sm font-bold px-3 py-1.5 rounded-full flex items-center shadow-lg">
                                    <span class="text-yellow-400 mr-1">★</span> {{ number_format($event->rating, 1) }}
                                </div>
                            @endif

                            <!-- Hover Effect Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-red-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-5">
                            <h3
                                class="font-bold text-lg mb-2 text-white group-hover:text-red-300 transition-colors duration-300">
                                {{ $event->title }}
                            </h3>
                            <p class="text-gray-400 text-sm mb-1">
                                @foreach ($event->genres as $genre)
                                    {{ $genre->name }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </p>
                            <p class="text-gray-500 text-xs mb-4">
                                {{ $event->duration ? $event->duration . ' • ' : '' }}{{ $event->release_year }}
                            </p>

                            <!-- Price -->
                            <div class="mb-4">
                                @if ($event->discount_price)
                                    <div class="flex items-center">
                                        <span
                                            class="text-lg font-bold text-red-400">{{ $event->formatted_discount_price }}</span>
                                        <span
                                            class="ml-2 text-sm text-gray-400 line-through">{{ $event->formatted_price }}</span>
                                        <span class="ml-2 text-xs bg-red-600 text-white px-2 py-1 rounded-full">
                                            -{{ $event->discount_percentage }}%
                                        </span>
                                    </div>
                                @else
                                    <div class="text-lg font-bold text-white">{{ $event->formatted_price }}</div>
                                @endif
                            </div>

                            <!-- Button with smooth transition -->
                            <a href="{{ route('event.show', ['slug' => $event->slug]) }}"
                                class="inline-flex items-center justify-center w-full py-2.5 px-4 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 transform group-hover:translate-y-0 hover:shadow-lg hover:shadow-red-900/30">
                                <span class="font-medium">Beli Tiket</span>
                                <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover:translate-x-1"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>

                        <!-- Subtle Border Glow on Hover -->
                        <div
                            class="absolute inset-0 border-2 border-transparent rounded-xl group-hover:border-red-500/30 transition-all duration-500 pointer-events-none">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- COMING SOON SECTION -->
    <section class="py-12 bg-gray-900 border-t border-gray-800">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Coming Soon</h2>
                <a href="{{ route('coming-soon') }}"
                    class="text-red-500 hover:text-red-400 transition-colors duration-300 font-semibold">Lihat
                    Semua</a>
            </div>

            <div class="horizontal-scroll flex space-x-6 pb-6 overflow-x-auto scrollbar-hide">
                @foreach ($comingSoonEvents as $event)
                    <div
                        class="group flex-shrink-0 w-56 relative overflow-hidden rounded-xl bg-gray-900 transition-all duration-500 hover:scale-[1.03] hover:shadow-2xl hover:shadow-red-900/30">
                        <!-- Image Container -->
                        <div class="relative h-64 overflow-hidden">
                            <!-- Main Image -->
                            <img src="{{ $event->image_url }}" alt="{{ $event->title }}"
                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent">
                            </div>

                            <!-- Coming Soon Badge -->
                            <div
                                class="absolute top-4 left-4 bg-gradient-to-r from-red-600 to-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg backdrop-blur-sm">
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 mr-1.5 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    COMING SOON
                                </div>
                            </div>

                            <!-- Release Date Overlay -->
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-red-900/90 to-transparent p-4">
                                <div class="text-white font-bold text-lg">{{ $event->event_date->format('d M') }}</div>
                                <div class="text-gray-300 text-sm">{{ $event->event_date->format('Y') }}</div>
                            </div>

                            <!-- Hover Effect Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-red-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-5">
                            <h3
                                class="font-bold text-lg mb-2 text-white group-hover:text-red-300 transition-colors duration-300">
                                {{ $event->title }}
                            </h3>
                            <p class="text-gray-400 text-sm mb-3">
                                @foreach ($event->genres as $genre)
                                    {{ $genre->name }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </p>

                            <!-- Countdown Timer -->
                            <div class="flex items-center text-gray-500 text-sm mb-4">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>{{ $event->event_date->diffForHumans() }}</span>
                            </div>

                            <!-- Notify Button -->
                            <button
                                class="w-full py-2.5 px-4 bg-gray-800 text-gray-300 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-300 transform group-hover:-translate-y-1 hover:shadow-lg hover:shadow-red-900/30 notify-event"
                                data-event-id="{{ $event->id }}">
                                <div class="flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-2 transition-transform duration-300 group-hover:scale-110"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                    Ingatkan Saya
                                </div>
                            </button>
                        </div>

                        <!-- Subtle Border Glow -->
                        <div
                            class="absolute inset-0 border-2 border-transparent rounded-xl group-hover:border-red-500/30 transition-all duration-500 pointer-events-none">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PROMO SECTION -->
    @if ($activePromo)
        <section class="py-16 bg-gradient-to-r from-red-900 to-red-800">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="md:w-1/2 mb-8 md:mb-0">
                        <h2 class="text-4xl md:text-5xl font-bold mb-4">{{ $activePromo->title }}</h2>
                        <p class="text-xl mb-6 text-red-100">{{ $activePromo->description }}</p>
                        <p class="text-red-200 mb-8">Berlaku hingga {{ $activePromo->valid_until->format('d M Y') }}</p>
                        <a href="{{ route('promo') }}"
                            class="inline-block px-8 py-3 bg-white text-red-600 font-bold rounded-lg hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105">Lihat
                            Promo</a>
                    </div>

                    <div class="md:w-2/5">
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                            <div class="text-center mb-6">
                                <div class="text-6xl font-bold text-white mb-2">{{ $activePromo->discount_percentage }}%
                                </div>
                                <div class="text-white text-xl">DISCOUNT</div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex justify-between items-center border-b border-white/20 pb-2">
                                    <span class="text-white">Kode Promo</span>
                                    <span class="font-bold text-white">{{ $activePromo->promo_code }}</span>
                                </div>
                                <div class="flex justify-between items-center border-b border-white/20 pb-2">
                                    <span class="text-white">Berlaku Hingga</span>
                                    <span
                                        class="font-bold text-white">{{ $activePromo->valid_until->format('d M Y') }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-white">Kuota</span>
                                    <span class="font-bold text-white">
                                        {{ $activePromo->usage_limit ? $activePromo->usage_limit - $activePromo->used_count . ' tersisa' : 'Unlimited' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- CINEMA INFO SECTION -->
    <section class="py-12 bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Bioskop Partner</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($cinemas as $cinema)
                    <div
                        class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-colors duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-xl">{{ substr($cinema->name, 0, 2) }}</span>
                            </div>
                            <h3 class="text-xl font-bold">{{ $cinema->name }}</h3>
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center text-gray-400 mb-2">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>{{ $cinema->location }}</span>
                            </div>
                            <div class="flex items-center text-gray-400">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>{{ $cinema->studio_count }} Studio</span>
                            </div>
                        </div>

                        <div class="text-sm text-gray-300">
                            <span class="font-semibold text-red-500">Fasilitas:</span> {{ $cinema->facilities }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('cinemas') }}"
                    class="inline-block px-6 py-3 border-2 border-red-600 text-red-600 font-semibold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300">Lihat
                    Semua Bioskop</a>
            </div>
        </div>
    </section>

    <style>
        /* Hide scrollbar but allow scrolling */
        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari and Opera */
        }

        /* Smooth scrolling for horizontal scroll */
        .horizontal-scroll {
            scroll-behavior: smooth;
        }

        /* Optional: Add custom scrollbar if needed */
        .horizontal-scroll::-webkit-scrollbar {
            height: 6px;
        }

        .horizontal-scroll::-webkit-scrollbar-track {
            background: #1f2937;
            border-radius: 3px;
        }

        .horizontal-scroll::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 3px;
        }

        .horizontal-scroll::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }
    </style>

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
