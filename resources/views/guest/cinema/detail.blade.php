@extends('guest.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 pt-24">
        <div class="container mx-auto px-4">
            <!-- Cinema Header -->
            <div class="flex flex-col md:flex-row items-start md:items-center gap-6 mb-8">
                <div class="w-24 h-24 bg-red-600 rounded-xl flex items-center justify-center text-4xl">
                    🎬
                </div>
                <div>
                    <h1 class="text-4xl font-bold mb-2">XXI Plaza Indonesia</h1>
                    <div class="flex flex-wrap items-center gap-4 text-gray-300">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Jl. M.H. Thamrin No. 28-30, Jakarta Pusat
                        </span>
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd" />
                            </svg>
                            12 Studio
                        </span>
                    </div>
                </div>
            </div>

            <!-- Cinema Details -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Showtimes -->
                <div class="lg:col-span-2">
                    <!-- Date Selector -->
                    <div class="bg-gray-800 rounded-xl p-6 mb-6">
                        <h2 class="text-xl font-bold mb-4">Pilih Tanggal</h2>
                        <div class="flex overflow-x-auto gap-2 pb-2">
                            @for ($i = 0; $i < 7; $i++)
                                <button
                                    class="date-btn flex-shrink-0 px-4 py-3 rounded-lg {{ $i === 0 ? 'bg-red-600 text-white' : 'bg-gray-700 text-gray-300' }} hover:bg-gray-600">
                                    <div class="text-sm">{{ now()->addDays($i)->format('D') }}</div>
                                    <div class="font-bold">{{ now()->addDays($i)->format('d') }}</div>
                                    <div class="text-xs">{{ now()->addDays($i)->format('M') }}</div>
                                </button>
                            @endfor
                        </div>
                    </div>

                    <!-- Movies List -->
                    <div class="space-y-6">
                        @for ($movie = 1; $movie <= 3; $movie++)
                            <div class="bg-gray-800 rounded-xl p-6">
                                <div class="flex flex-col md:flex-row gap-6">
                                    <!-- Movie Poster -->
                                    <div class="w-full md:w-1/4">
                                        <div
                                            class="aspect-[2/3] bg-gradient-to-br from-red-900/30 to-gray-900 rounded-lg flex items-center justify-center">
                                            <span class="text-6xl">🎬</span>
                                        </div>
                                    </div>

                                    <!-- Movie Info -->
                                    <div class="w-full md:w-3/4">
                                        <div class="flex flex-col md:flex-row md:items-start md:justify-between mb-4">
                                            <div>
                                                <h3 class="text-2xl font-bold">Avengers: Endgame</h3>
                                                <div class="flex items-center gap-4 mt-2">
                                                    <span class="bg-red-600 text-white text-sm px-2 py-1 rounded">13+</span>
                                                    <span class="text-gray-400">Action, Adventure, Sci-Fi</span>
                                                    <span class="text-gray-400">3 jam 2 menit</span>
                                                </div>
                                            </div>
                                            <div class="flex items-center mt-2 md:mt-0">
                                                <span class="text-yellow-400 text-xl mr-2">★★★★★</span>
                                                <span class="font-bold">8.4</span>
                                            </div>
                                        </div>

                                        <!-- Showtimes -->
                                        <div class="mt-6">
                                            <h4 class="text-lg font-semibold mb-3">Jam Tayang</h4>
                                            <div class="flex flex-wrap gap-3">
                                                @php $times = ['10:00', '13:15', '16:30', '19:45', '22:00'] @endphp
                                                @foreach ($times as $time)
                                                    <a href="{{ route('booking.seats', ['showtime_id' => $movie]) }}"
                                                        class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-red-600 transition-colors">
                                                        {{ $time }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Studio Info -->
                                        <div class="mt-4 text-sm text-gray-400">
                                            <span class="mr-4">Studio {{ $movie }} • Regular</span>
                                            <span class="text-red-500 font-semibold">Rp 45.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Right Column: Cinema Info -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-800 rounded-xl p-6 sticky top-24">
                        <h2 class="text-xl font-bold mb-6">Fasilitas Bioskop</h2>

                        <div class="space-y-4 mb-6">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-xl">🎵</span>
                                </div>
                                <div>
                                    <div class="font-semibold">Dolby Atmos</div>
                                    <div class="text-sm text-gray-400">Audio surround terbaik</div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-xl">🛋️</span>
                                </div>
                                <div>
                                    <div class="font-semibold">Premium Seats</div>
                                    <div class="text-sm text-gray-400">Kursi nyaman dengan footrest</div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-xl">🍔</span>
                                </div>
                                <div>
                                    <div class="font-semibold">Food Court</div>
                                    <div class="text-sm text-gray-400">Berbagai pilihan makanan</div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-xl">🅿️</span>
                                </div>
                                <div>
                                    <div class="font-semibold">Parking Area</div>
                                    <div class="text-sm text-gray-400">Parkir luas dan aman</div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="border-t border-gray-700 pt-6">
                            <h3 class="font-bold mb-4">Informasi Kontak</h3>
                            <div class="space-y-3">
                                <div class="flex items-center text-gray-300">
                                    <svg class="w-5 h-5 mr-3 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zm3 14a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    (021) 1234-5678
                                </div>
                                <div class="flex items-center text-gray-300">
                                    <svg class="w-5 h-5 mr-3 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Buka: 09:00 - 24:00
                                </div>
                            </div>
                        </div>

                        <!-- Get Directions -->
                        <button
                            class="w-full mt-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Dapatkan Petunjuk
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Date selector
            const dateButtons = document.querySelectorAll('.date-btn');
            dateButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    dateButtons.forEach(b => {
                        b.classList.remove('bg-red-600', 'text-white');
                        b.classList.add('bg-gray-700', 'text-gray-300');
                    });
                    this.classList.remove('bg-gray-700', 'text-gray-300');
                    this.classList.add('bg-red-600', 'text-white');
                });
            });
        });
    </script>
@endsection
