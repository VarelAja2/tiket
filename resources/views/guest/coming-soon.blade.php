@extends('guest.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 pt-24">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-8">Coming Soon</h1>

            <!-- Timeline Filter -->
            <div class="mb-8">
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg">Semua</button>
                    <button class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">November 2023</button>
                    <button class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Desember 2023</button>
                    <button class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">Januari 2024</button>
                </div>
            </div>

            <!-- Coming Soon Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pb-12">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="bg-gray-800 rounded-xl overflow-hidden">
                        <div class="relative">
                            <div
                                class="aspect-[16/9] bg-gradient-to-br from-blue-900/20 to-gray-900 flex items-center justify-center">
                                <span class="text-8xl">🚀</span>
                            </div>
                            <div class="absolute top-4 left-4 bg-gray-900 text-white text-xs font-bold px-3 py-1 rounded">
                                COMING SOON
                            </div>
                            <div class="absolute top-4 right-4 bg-red-600 text-white text-sm font-bold px-2 py-1 rounded">
                                {{ 15 + $i }} Des
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-2">Film Akan Datang {{ $i }}</h3>
                            <p class="text-gray-400 mb-4">Action, Sci-Fi, Adventure</p>

                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <div class="text-sm text-gray-400">Durasi</div>
                                    <div class="font-medium">2 jam {{ 10 * $i }} menit</div>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-400">Sutradara</div>
                                    <div class="font-medium">John Director</div>
                                </div>
                            </div>

                            <p class="text-gray-300 mb-6">
                                Sinopsis singkat film akan datang {{ $i }}. Film ini menceritakan tentang
                                petualangan seru dengan efek visual yang memukau.
                            </p>

                            <div class="flex gap-3">
                                <button
                                    class="flex-1 py-3 border-2 border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                                    ⭐ Wishlist
                                </button>
                                <button
                                    class="flex-1 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-colors">
                                    🔔 Ingatkan
                                </button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Countdown Section -->
            <div class="bg-gradient-to-r from-red-900/20 to-gray-900/30 rounded-xl p-8 mb-12">
                <h2 class="text-2xl font-bold mb-4">Film Paling Dinanti</h2>
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="w-full md:w-1/3">
                        <div
                            class="aspect-[2/3] bg-gradient-to-br from-purple-900/30 to-gray-900 rounded-xl flex items-center justify-center">
                            <span class="text-9xl">🦸</span>
                        </div>
                    </div>
                    <div class="w-full md:w-2/3">
                        <h3 class="text-3xl font-bold mb-4">Superhero Movie: The Final Chapter</h3>
                        <p class="text-gray-300 mb-6">Film superhero paling dinanti tahun 2024. Pertarungan epik menentukan
                            nasib dunia.</p>

                        <div class="grid grid-cols-4 gap-4 mb-6">
                            <div class="bg-gray-800 rounded-lg p-4 text-center">
                                <div class="text-3xl font-bold">45</div>
                                <div class="text-gray-400 text-sm">Hari</div>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-4 text-center">
                                <div class="text-3xl font-bold">12</div>
                                <div class="text-gray-400 text-sm">Jam</div>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-4 text-center">
                                <div class="text-3xl font-bold">30</div>
                                <div class="text-gray-400 text-sm">Menit</div>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-4 text-center">
                                <div class="text-3xl font-bold">15</div>
                                <div class="text-gray-400 text-sm">Detik</div>
                            </div>
                        </div>

                        <button
                            class="px-8 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition-colors">
                            ⭐ Tambah ke Wishlist
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
