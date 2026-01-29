@extends('guest.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 pt-24">
        <!-- Filter Section -->
        <div class="container mx-auto px-4 mb-8">
            <h1 class="text-4xl font-bold mb-6">Sedang Tayang</h1>

            <!-- Filters -->
            <div class="flex flex-wrap gap-4 mb-6">
                <select
                    class="bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:outline-none focus:border-red-600">
                    <option>Semua Genre</option>
                    <option>Action</option>
                    <option>Drama</option>
                    <option>Comedy</option>
                    <option>Horror</option>
                </select>

                <select
                    class="bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:outline-none focus:border-red-600">
                    <option>Semua Rating</option>
                    <option>SU</option>
                    <option>13+</option>
                    <option>17+</option>
                    <option>21+</option>
                </select>

                <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    Terapkan Filter
                </button>
            </div>
        </div>

        <!-- Movies Grid -->
        <div class="container mx-auto px-4 pb-12">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @for ($i = 1; $i <= 10; $i++)
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl mb-3">
                            <div
                                class="aspect-[2/3] bg-gradient-to-br from-red-900/20 to-gray-900 flex items-center justify-center">
                                <span class="text-6xl">🎬</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
                                13+
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                <a href="{{ route('film.detail', ['slug' => 'film-' . $i]) }}"
                                    class="block w-full py-2 bg-red-600 text-white text-center rounded hover:bg-red-700 transition-colors">
                                    Beli Tiket
                                </a>
                            </div>
                        </div>
                        <h3 class="font-bold text-lg mb-1">Film Sedang Tayang {{ $i }}</h3>
                        <p class="text-gray-400 text-sm mb-2">Action, Adventure</p>
                        <div class="flex items-center">
                            <span class="text-yellow-400 mr-2">★★★★☆</span>
                            <span class="text-gray-300">8.{{ $i }}</span>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <nav class="flex items-center space-x-2">
                    <button class="px-3 py-2 bg-gray-800 text-gray-400 rounded hover:bg-gray-700">‹</button>
                    <button class="px-4 py-2 bg-red-600 text-white rounded">1</button>
                    <button class="px-4 py-2 bg-gray-800 text-gray-300 rounded hover:bg-gray-700">2</button>
                    <button class="px-4 py-2 bg-gray-800 text-gray-300 rounded hover:bg-gray-700">3</button>
                    <span class="text-gray-400">...</span>
                    <button class="px-4 py-2 bg-gray-800 text-gray-300 rounded hover:bg-gray-700">10</button>
                    <button class="px-3 py-2 bg-gray-800 text-gray-400 rounded hover:bg-gray-700">›</button>
                </nav>
            </div>
        </div>
    </div>
@endsection
