@extends('guest.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 pt-24">
        <!-- Movies Grid -->
        <div class="container mx-auto px-4 pb-12">
            <!-- Event Categories Filter -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-white mb-4">Kategori Event</h2>
                <div class="flex flex-wrap gap-2">
                    <!-- Semua Kategori -->
                    <a href="{{ url()->current() }}" 
                       class="category-btn px-4 py-2 rounded-lg transition-colors {{ !request('category') ? 'bg-red-600 text-white' : 'bg-gray-800 text-gray-300 hover:bg-gray-700' }}">
                        Semua
                    </a>
                    
                    <!-- Kategori dari Database -->
                    @foreach($categories as $category)
                    <a href="{{ url()->current() }}?category={{ $category->slug }}" 
                       class="category-btn px-4 py-2 rounded-lg transition-colors 
                              {{ request('category') == $category->slug ? 'bg-red-600 text-white' : 'bg-gray-800 text-gray-300 hover:bg-gray-700' }}"
                       style="{{ request('category') == $category->slug ? 'background-color: ' . $category->color : '' }}">
                        {{ $category->name }}
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Events Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="events-grid">
                
                @forelse($events as $event)
                <!-- Event Card -->
                <div class="event-card bg-gray-800 rounded-xl overflow-hidden group hover:scale-[1.02] transition-transform duration-300"
                    data-category="{{ $event->category ? Str::slug($event->category->name) : 'other' }}">
                    <div class="relative overflow-hidden">
                        <!-- Event Image -->
                        <img src="{{ $event->image_url }}" 
                             alt="{{ $event->title }}"
                             class="w-full aspect-[16/9] object-cover group-hover:scale-110 transition-transform duration-500">
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                        <!-- Event Badge -->
                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full"
                             style="background-color: {{ $event->category->color ?? '#3b82f6' }}">
                            {{ strtoupper($event->category->name ?? 'EVENT') }}
                        </div>
                        
                        @if($event->is_featured)
                        <div class="absolute top-4 right-4 bg-yellow-500 text-gray-900 text-xs font-bold px-3 py-1 rounded-full">
                            <i class="fas fa-star mr-1"></i> FEATURED
                        </div>
                        @endif
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2 line-clamp-1">{{ $event->title }}</h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                            {{ $event->short_description ?? Str::limit($event->description, 100) }}
                        </p>

                        <!-- Date and Time Info -->
                        <div class="flex items-center text-sm text-gray-300 mb-3">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>
                                {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('D, d M') }} • 
                                {{ date('H:i', strtotime($event->start_time)) }}-{{ date('H:i', strtotime($event->end_time)) }} WIB
                            </span>
                        </div>

                        <!-- Location Info -->
                        <div class="flex items-center text-sm text-gray-300 mb-4">
                            <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="line-clamp-1">{{ $event->location }}, {{ $event->city }}</span>
                        </div>

                        <!-- Price and Button Section -->
                        <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                            <div>
                                @if($event->is_free)
                                    <div class="text-gray-400 text-sm">Tiket Gratis</div>
                                    <div class="text-xl font-bold text-green-500">FREE</div>
                                @else
                                    <div class="text-gray-400 text-sm">Mulai dari</div>
                                    <div class="text-xl font-bold text-red-500">
                                        Rp {{ number_format($event->base_price, 0, ',', '.') }}
                                    </div>
                                @endif
                            </div>
                            <a href="{{ route('events.show', $event->slug) }}"
                                class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors whitespace-nowrap">
                                {{ $event->is_free ? 'Daftar Gratis' : 'Beli Tiket' }}
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="col-span-full text-center py-12">
                    <div class="inline-block p-6 bg-gray-800 rounded-full mb-6">
                        <i class="fas fa-calendar-times text-4xl text-gray-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Tidak ada event tersedia</h3>
                    <p class="text-gray-400 mb-6">
                        @if(request('category'))
                            Belum ada event untuk kategori ini
                        @else
                            Belum ada event yang tersedia saat ini
                        @endif
                    </p>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($events->hasPages())
            <div class="mt-12">
                <div class="flex justify-center">
                    <div class="flex space-x-2">
                        @if($events->onFirstPage())
                            <span class="px-4 py-2 bg-gray-800 text-gray-600 rounded-lg cursor-not-allowed">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $events->previousPageUrl() }}{{ request('category') ? '&category=' . request('category') : '' }}" 
                               class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif

                        @for($i = 1; $i <= $events->lastPage(); $i++)
                            @if($i == $events->currentPage())
                                <span class="px-4 py-2 bg-red-600 text-white rounded-lg font-bold">{{ $i }}</span>
                            @else
                                <a href="{{ $events->url($i) }}{{ request('category') ? '&category=' . request('category') : '' }}" 
                                   class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor

                        @if($events->hasMorePages())
                            <a href="{{ $events->nextPageUrl() }}{{ request('category') ? '&category=' . request('category') : '' }}" 
                               class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <span class="px-4 py-2 bg-gray-800 text-gray-600 rounded-lg cursor-not-allowed">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Category Filter dengan JavaScript untuk highlight button
                const categoryButtons = document.querySelectorAll('.category-btn');
                const eventCards = document.querySelectorAll('.event-card');

                categoryButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        // Update active button
                        categoryButtons.forEach(btn => {
                            if(!btn.classList.contains('bg-red-600')) {
                                btn.classList.add('bg-gray-800', 'text-gray-300');
                                btn.classList.remove('bg-red-600', 'text-white');
                            }
                        });
                        this.classList.remove('bg-gray-800', 'text-gray-300');
                        this.classList.add('bg-red-600', 'text-white');

                        // Filter events by data attribute
                        const selectedCategory = this.textContent.toLowerCase().trim();
                        
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
            
            /* Hover effect untuk event card */
            .event-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            }
        </style>
    </div>
@endsection