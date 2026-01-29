@extends('guest.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 pt-24">

        <!-- Movies Grid -->
        <div class="container mx-auto px-4 pb-12">
            <!-- Event Categories Filter -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-4">Kategori Event</h2>
                <div class="flex flex-wrap gap-2">
                    <button class="category-btn px-4 py-2 bg-red-600 text-white rounded-lg">Semua</button>
                    <button
                        class="category-btn px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Seminar</button>
                    <button
                        class="category-btn px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Workshop</button>
                    <button
                        class="category-btn px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Konser</button>
                    <button
                        class="category-btn px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Festival</button>
                    <button
                        class="category-btn px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Kompetisi</button>
                    <button class="category-btn px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Talk
                        Show</button>
                </div>
            </div>

            <!-- Events Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="events-grid">

                <!-- Event 1: Seminar Akuntansi -->
                <div class="event-card bg-gray-800 rounded-xl overflow-hidden group hover:scale-[1.02] transition-transform duration-300"
                    data-category="seminar">
                    <div class="relative overflow-hidden">
                        <!-- Event Image with Dummy Image -->
                        <div class="aspect-[16/9] bg-cover bg-center relative"
                            style="background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                            <!-- Event Badge -->
                            <div
                                class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                SEMINAR
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 line-clamp-1">Seminar Akuntansi Modern 2023</h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-2">Update terbaru tentang standar akuntansi dan
                            teknologi finansial untuk era digital</p>

                        <!-- Date and Time Info -->
                        <div class="flex items-center text-sm text-gray-300 mb-3">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Sab, 15 Nov • 09:00-16:00 WIB</span>
                        </div>

                        <!-- Location Info -->
                        <div class="flex items-center text-sm text-gray-300 mb-4">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="line-clamp-1">Auditorium Financial Center, Jakarta</span>
                        </div>

                        <!-- Price and Button Section -->
                        <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                            <div>
                                <div class="text-gray-400 text-sm">Mulai dari</div>
                                <div class="text-xl font-bold text-red-500">Rp 250.000</div>
                            </div>
                            <a href="{{ route('event.seminar.detail', ['slug' => 'seminar-akuntansi-2023']) }}"
                                class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors whitespace-nowrap">
                                Beli Tiket
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Event 2: Workshop Digital Marketing -->
                <div class="event-card bg-gray-800 rounded-xl overflow-hidden group hover:scale-[1.02] transition-transform duration-300"
                    data-category="workshop">
                    <div class="relative overflow-hidden">
                        <div class="aspect-[16/9] bg-cover bg-center relative"
                            style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                            <div
                                class="absolute top-4 left-4 bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                WORKSHOP
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 line-clamp-1">Workshop Digital Marketing Mastery</h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-2">Strategi marketing digital untuk bisnis di era
                            4.0 dengan tools terbaru</p>

                        <div class="flex items-center text-sm text-gray-300 mb-3">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Sel, 18 Nov • 13:00-18:00 WIB</span>
                        </div>

                        <div class="flex items-center text-sm text-gray-300 mb-4">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="line-clamp-1">Co-Working Space Digital Hub, Bandung</span>
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                            <div>
                                <div class="text-gray-400 text-sm">Mulai dari</div>
                                <div class="text-xl font-bold text-red-500">Rp 350.000</div>
                            </div>
                            <a href="{{ route('event.workshop.detail', ['slug' => 'workshop-digital-marketing']) }}"
                                class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors whitespace-nowrap">
                                Beli Tiket
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Event 3: Konser Musik Indie -->
                <div class="event-card bg-gray-800 rounded-xl overflow-hidden group hover:scale-[1.02] transition-transform duration-300"
                    data-category="konser">
                    <div class="relative overflow-hidden">
                        <div class="aspect-[16/9] bg-cover bg-center relative"
                            style="background-image: url('https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                            <div
                                class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                KONSER
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 line-clamp-1">Konser "Sound of Independence"</h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-2">Featuring bands indie terbaik dari berbagai kota
                            di Indonesia</p>

                        <div class="flex items-center text-sm text-gray-300 mb-3">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Sab, 22 Nov • 19:00-23:00 WIB</span>
                        </div>

                        <div class="flex items-center text-sm text-gray-300 mb-4">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="line-clamp-1">Stadion GBK, Jakarta</span>
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                            <div>
                                <div class="text-gray-400 text-sm">Mulai dari</div>
                                <div class="text-xl font-bold text-red-500">Rp 150.000</div>
                            </div>
                            <a href="{{ route('event.konser.detail', ['slug' => 'event.konser.detail']) }}"
                                class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors whitespace-nowrap">
                                Beli Tiket
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Event 4: Festival Kuliner -->
                <div class="event-card bg-gray-800 rounded-xl overflow-hidden group hover:scale-[1.02] transition-transform duration-300"
                    data-category="festival">
                    <div class="relative overflow-hidden">
                        <div class="aspect-[16/9] bg-cover bg-center relative"
                            style="background-image: url('https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                            <div
                                class="absolute top-4 left-4 bg-yellow-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                FESTIVAL
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 line-clamp-1">Festival Kuliner Nusantara 2023</h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-2">Jelajahi kelezatan makanan tradisional dari 34
                            provinsi Indonesia</p>

                        <div class="flex items-center text-sm text-gray-300 mb-3">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>25-27 Nov • 10:00-22:00 WIB</span>
                        </div>

                        <div class="flex items-center text-sm text-gray-300 mb-4">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="line-clamp-1">Lapangan Monas, Jakarta Pusat</span>
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                            <div>
                                <div class="text-gray-400 text-sm">Tiket Masuk</div>
                                <div class="text-xl font-bold text-red-500">Rp 25.000</div>
                            </div>
                            <a href="{{ route('event.festival.detail', ['slug' => 'festival-kuliner-nusantara']) }}"
                                class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors whitespace-nowrap">
                                Beli Tiket
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Event 5: Kompetisi E-Sports -->
                <div class="event-card bg-gray-800 rounded-xl overflow-hidden group hover:scale-[1.02] transition-transform duration-300"
                    data-category="kompetisi">
                    <div class="relative overflow-hidden">
                        <div class="aspect-[16/9] bg-cover bg-center relative"
                            style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                            <div
                                class="absolute top-4 left-4 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                KOMPETISI
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 line-clamp-1">Kompetisi E-Sport Championship</h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-2">Kompetisi E-Sports dengan total hadiah Rp 500
                            juta</p>

                        <div class="flex items-center text-sm text-gray-300 mb-3">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>30 Nov-2 Des • 09:00-22:00 WIB</span>
                        </div>

                        <div class="flex items-center text-sm text-gray-300 mb-4">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="line-clamp-1">ICE BSD City, Tangerang</span>
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                            <div>
                                <div class="text-gray-400 text-sm">Mulai dari</div>
                                <div class="text-xl font-bold text-red-500">Rp 100.000</div>
                            </div>
                            <a href="{{ route('event.kompetisi.detail', ['slug' => 'kompetisi event']) }}"
                                class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors whitespace-nowrap">
                                Beli Tiket
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Event 6: Talk Show Entrepreneurship -->
                <div class="event-card bg-gray-800 rounded-xl overflow-hidden group hover:scale-[1.02] transition-transform duration-300"
                    data-category="talk-show">
                    <div class="relative overflow-hidden">
                        <div class="aspect-[16/9] bg-cover bg-center relative"
                            style="background-image: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                            <div
                                class="absolute top-4 left-4 bg-pink-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                TALK SHOW
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 line-clamp-1">Talk Show: Young Entrepreneurs Success</h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-2">Inspirasi dari founder startup unicorn Indonesia
                        </p>

                        <div class="flex items-center text-sm text-gray-300 mb-3">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Sel, 5 Des • 19:00-21:30 WIB</span>
                        </div>

                        <div class="flex items-center text-sm text-gray-300 mb-4">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="line-clamp-1">Universitas Indonesia, Depok</span>
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                            <div>
                                <div class="text-gray-400 text-sm">Tiket Gratis</div>
                                <div class="text-xl font-bold text-green-500">FREE</div>
                            </div>
                            <a href="{{ route('event.talk-show.detail', ['slug' => 'talk-show-entrepreneurship']) }}"
                                class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors whitespace-nowrap">
                                Daftar Gratis
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Category Filter
                const categoryButtons = document.querySelectorAll('.category-btn');
                const eventCards = document.querySelectorAll('.event-card');

                categoryButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        // Update active button
                        categoryButtons.forEach(btn => {
                            btn.classList.remove('bg-red-600', 'text-white');
                            btn.classList.add('bg-gray-800', 'text-gray-300');
                        });
                        this.classList.remove('bg-gray-800', 'text-gray-300');
                        this.classList.add('bg-red-600', 'text-white');

                        // Filter events
                        const selectedCategory = this.textContent.toLowerCase();

                        eventCards.forEach(card => {
                            const cardCategory = card.getAttribute('data-category');

                            if (selectedCategory === 'semua') {
                                card.style.display = 'block';
                            } else if (cardCategory === selectedCategory) {
                                card.style.display = 'block';
                            } else {
                                card.style.display = 'none';
                            }
                        });
                    });
                });

                // Pagination functionality
                const paginationButtons = document.querySelectorAll('nav button');
                paginationButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        if (!this.textContent.includes('...')) {
                            paginationButtons.forEach(btn => {
                                btn.classList.remove('bg-red-600', 'text-white');
                                btn.classList.add('bg-gray-800', 'text-gray-300');
                            });
                            this.classList.remove('bg-gray-800', 'text-gray-300');
                            this.classList.add('bg-red-600', 'text-white');
                        }
                    });
                });
            });
        </script>

        <style>
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
    </div>
@endsection
