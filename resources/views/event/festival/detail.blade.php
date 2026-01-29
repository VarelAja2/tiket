@extends('guest.layouts.app')

@section('content')
    <style>
        .festival-gradient {
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(234, 179, 8, 0.7) 50%, rgba(0, 0, 0, 0.3) 100%);
        }

        .timer-box {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.6) 100%);
            backdrop-filter: blur(10px);
        }

        @media (max-width: 768px) {
            .festival-gradient {
                background: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(234, 179, 8, 0.7) 50%, rgba(0, 0, 0, 0.5) 100%);
            }
        }
    </style>

    <!-- FESTIVAL HERO SECTION -->
    <section class="relative bg-gray-900">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="festival-gradient absolute inset-0 z-10"></div>
            <div class="w-full h-full bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')">
            </div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-4 py-12 md:py-20 relative z-20">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                <!-- Festival Poster -->
                <div class="w-full md:w-1/3 lg:w-1/4 flex justify-center md:justify-start">
                    <div class="w-64 md:w-full max-w-xs rounded-xl overflow-hidden shadow-2xl shadow-yellow-900/30">
                        <div class="aspect-[3/4] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div
                                class="absolute top-4 left-4 bg-yellow-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                FESTIVAL
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Festival Info -->
                <div class="w-full md:w-2/3 lg:w-3/4 text-center md:text-left">
                    <!-- Category Badge -->
                    <div class="inline-block bg-yellow-600 text-white text-sm font-bold px-3 py-1 rounded-full mb-4">
                        MUSIC • FOOD • ART • PERFORMANCE
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Bandung Creative Festival 2023</h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 text-gray-300 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">25-27 November 2023 • 10:00 - 22:00 WIB</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Gedung Sate & Lapangan Gasibu, Bandung</span>
                        </div>
                    </div>

                    <!-- Countdown Timer -->
                    <div class="mb-8">
                        <div class="text-gray-400 text-sm mb-2">Festival dimulai dalam:</div>
                        <div class="flex gap-3">
                            <div class="timer-box rounded-lg p-4 text-center min-w-[70px]">
                                <div class="text-2xl font-bold text-yellow-500" id="days">14</div>
                                <div class="text-gray-300 text-xs">Hari</div>
                            </div>
                            <div class="timer-box rounded-lg p-4 text-center min-w-[70px]">
                                <div class="text-2xl font-bold text-yellow-500" id="hours">08</div>
                                <div class="text-gray-300 text-xs">Jam</div>
                            </div>
                            <div class="timer-box rounded-lg p-4 text-center min-w-[70px]">
                                <div class="text-2xl font-bold text-yellow-500" id="minutes">45</div>
                                <div class="text-gray-300 text-xs">Menit</div>
                            </div>
                            <div class="timer-box rounded-lg p-4 text-center min-w-[70px]">
                                <div class="text-2xl font-bold text-yellow-500" id="seconds">30</div>
                                <div class="text-gray-300 text-xs">Detik</div>
                            </div>
                        </div>
                    </div>

                    <!-- Price & Action Buttons -->
                    <div class="flex flex-wrap items-center gap-6 justify-center md:justify-start">
                        <div class="text-center md:text-left">
                            <div class="text-gray-400 text-sm">Mulai dari</div>
                            <div class="text-3xl font-bold text-yellow-500">Rp 75.000</div>
                            <div class="text-gray-400 text-sm">Harga early bird 1-day pass</div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <a href="#ticket-section"
                                class="px-8 py-3 bg-yellow-600 text-white font-bold rounded-lg hover:bg-yellow-700 transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Beli Tiket Sekarang
                            </a>

                            <a href="#lineup"
                                class="px-8 py-3 bg-transparent border-2 border-yellow-600 text-yellow-600 font-bold rounded-lg hover:bg-yellow-600 hover:text-white transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                        clip-rule="evenodd" />
                                </svg>
                                Lihat Lineup
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Deskripsi & Lineup -->
            <div class="lg:col-span-2 space-y-8">
                <!-- ABOUT FESTIVAL -->
                <section>
                    <h2 class="text-2xl font-bold mb-4 flex items-center text-yellow-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z"
                                clip-rule="evenodd" />
                        </svg>
                        Tentang Festival
                    </h2>

                    <div class="bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            <strong>Bandung Creative Festival 2023</strong> adalah perhelatan akbar tahunan yang
                            mempertemukan kreator, musisi, seniman, dan pelaku industri kreatif dari seluruh Indonesia.
                            Selama 3 hari, festival ini akan menghadirkan lebih dari <strong>200 booth</strong> dari
                            berbagai
                            kategori kreatif, <strong>50+ pertunjukan langsung</strong>, dan berbagai workshop interaktif.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Festival ini menjadi platform untuk mendorong kolaborasi antar disiplin kreatif,
                            dengan fokus pada sustainable development dan digital innovation. Tahun ini mengangkat tema
                            <strong>"Future Heritage: Mengukir Warisan Masa Depan"</strong> yang mengajak peserta untuk
                            melihat tradisi dengan cara baru.
                        </p>
                        <p class="text-gray-300 leading-relaxed">
                            Selain pertunjukan utama, festival juga menampilkan <strong>food market</strong> dengan
                            kuliner kreatif, <strong>art installation</strong> interaktif, <strong>creative talks</strong>
                            dengan pembicara internasional, dan <strong>night market</strong> yang buka hingga larut malam.
                        </p>
                    </div>
                </section>

                <!-- LINEUP SECTION -->
                <section id="lineup">
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-yellow-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
                        </svg>
                        Lineup & Jadwal Pertunjukan
                    </h2>

                    <div class="bg-gray-800 rounded-xl p-6">
                        <!-- Day Selector -->
                        <div class="flex mb-6 overflow-x-auto">
                            <button class="flex-shrink-0 px-4 py-2 bg-yellow-600 text-white rounded-lg mr-2">
                                Day 1 - Sabtu, 25 Nov
                            </button>
                            <button
                                class="flex-shrink-0 px-4 py-2 bg-gray-700 text-gray-300 rounded-lg mr-2 hover:bg-gray-600">
                                Day 2 - Minggu, 26 Nov
                            </button>
                            <button class="flex-shrink-0 px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600">
                                Day 3 - Senin, 27 Nov
                            </button>
                        </div>

                        <!-- Stage Schedule -->
                        <div class="space-y-6">
                            <!-- Main Stage -->
                            <div>
                                <h3 class="text-lg font-bold mb-3 text-yellow-400 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Main Stage
                                </h3>
                                <div class="space-y-3">
                                    <div class="bg-gray-900 rounded-lg p-4 border-l-4 border-yellow-500">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h4 class="font-bold text-white">Sheila On 7</h4>
                                                <p class="text-gray-400 text-sm">Headliner Performance</p>
                                            </div>
                                            <div class="text-right">
                                                <div class="text-yellow-500 font-bold">20:00 - 22:00</div>
                                                <div class="text-gray-400 text-sm">2 jam</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-gray-900 rounded-lg p-4 border-l-4 border-yellow-500">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h4 class="font-bold text-white">Raisa</h4>
                                                <p class="text-gray-400 text-sm">Special Performance</p>
                                            </div>
                                            <div class="text-right">
                                                <div class="text-yellow-500 font-bold">18:00 - 19:30</div>
                                                <div class="text-gray-400 text-sm">1.5 jam</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Indie Stage -->
                            <div>
                                <h3 class="text-lg font-bold mb-3 text-yellow-400 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9.504 1.132a1 1 0 01.992 0l1.75 1a1 1 0 11-.992 1.736L10 3.152l-1.254.716a1 1 0 11-.992-1.736l1.75-1zM5.618 4.504a1 1 0 01-.372 1.364L5.016 6l.23.132a1 1 0 11-.992 1.736L4 7.723V8a1 1 0 01-2 0V6a.996.996 0 01.52-.878l1.734-.99a1 1 0 011.364.372zm8.764 0a1 1 0 011.364-.372l1.733.99A1.002 1.002 0 0118 6v2a1 1 0 11-2 0v-.277l-.254.145a1 1 0 11-.992-1.736l.23-.132-.23-.132a1 1 0 01-.372-1.364zm-7 4a1 1 0 011.364-.372L10 8.848l1.254-.716a1 1 0 11.992 1.736L11 10.58V12a1 1 0 11-2 0v-1.42l-1.246-.712a1 1 0 01-.372-1.364zM3 11a1 1 0 011 1v1.42l1.246.712a1 1 0 11-.992 1.736l-1.75-1A1 1 0 012 14v-2a1 1 0 011-1zm14 0a1 1 0 011 1v2a1 1 0 01-.504.868l-1.75 1a1 1 0 11-.992-1.736l1.246-.712V12a1 1 0 011-1zm-9.618 5.504a1 1 0 011.364-.372l.254.145V16a1 1 0 112 0v.277l.254-.145a1 1 0 11.992 1.736l-1.735.992a.995.995 0 01-1.022 0l-1.735-.992a1 1 0 01-.372-1.364z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Indie Stage
                                </h3>
                                <div class="space-y-3">
                                    <div class="bg-gray-900 rounded-lg p-4 border-l-4 border-yellow-500">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h4 class="font-bold text-white">Maliq & D'Essentials</h4>
                                                <p class="text-gray-400 text-sm">Acoustic Session</p>
                                            </div>
                                            <div class="text-right">
                                                <div class="text-yellow-500 font-bold">16:00 - 17:30</div>
                                                <div class="text-gray-400 text-sm">1.5 jam</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- FESTIVAL MAP -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 text-yellow-500">Peta Festival & Zona</h2>
                    <div class="bg-gray-800 rounded-xl p-6">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="bg-yellow-600/20 border border-yellow-600/30 rounded-lg p-4">
                                <div class="w-10 h-10 bg-yellow-600 rounded-full flex items-center justify-center mb-2">
                                    <span class="text-lg">🎵</span>
                                </div>
                                <h4 class="font-bold text-white">Music Zone</h4>
                                <p class="text-gray-300 text-sm">3 stage dengan berbagai genre musik</p>
                            </div>

                            <div class="bg-yellow-600/20 border border-yellow-600/30 rounded-lg p-4">
                                <div class="w-10 h-10 bg-yellow-600 rounded-full flex items-center justify-center mb-2">
                                    <span class="text-lg">🎨</span>
                                </div>
                                <h4 class="font-bold text-white">Art Zone</h4>
                                <p class="text-gray-300 text-sm">Installation art & gallery</p>
                            </div>

                            <div class="bg-yellow-600/20 border border-yellow-600/30 rounded-lg p-4">
                                <div class="w-10 h-10 bg-yellow-600 rounded-full flex items-center justify-center mb-2">
                                    <span class="text-lg">🍔</span>
                                </div>
                                <h4 class="font-bold text-white">Food Zone</h4>
                                <p class="text-gray-300 text-sm">100+ food & beverage vendors</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Ticket & Info -->
            <div class="lg:col-span-1">
                <!-- TICKET SECTION -->
                <section id="ticket-section" class="bg-gray-800 rounded-xl p-6 sticky top-24">
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-yellow-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 2a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7zm1 5a1 1 0 011-1h.01a1 1 0 110 2H9a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Pilihan Tiket Festival
                    </h2>

                    <!-- Pilihan Tiket -->
                    <div class="space-y-4 mb-6">
                        <!-- 1-Day Pass -->
                        <div class="border border-yellow-600 rounded-lg p-4 bg-yellow-600/10 cursor-pointer">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h4 class="font-bold text-lg text-white">1-Day Pass</h4>
                                    <p class="text-gray-400 text-sm">Akses 1 hari pilihan</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-xl font-bold text-yellow-500">Rp 75.000</div>
                                    <div class="text-green-500 text-sm font-medium">Early Bird</div>
                                </div>
                            </div>
                            <ul class="text-sm text-gray-300 space-y-1">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Akses semua zona festival
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Free merchandise tote bag
                                </li>
                            </ul>
                        </div>

                        <!-- 3-Day Pass -->
                        <div class="border border-yellow-600 rounded-lg p-4 bg-yellow-600/10 cursor-pointer">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <div class="flex items-center">
                                        <h4 class="font-bold text-lg text-white">3-Day Pass</h4>
                                        <span class="ml-2 bg-yellow-600 text-white text-xs px-2 py-1 rounded">🔥 Best
                                            Deal</span>
                                    </div>
                                    <p class="text-gray-400 text-sm">Akses 25-27 November</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-xl font-bold text-yellow-500">Rp 180.000</div>
                                    <div class="text-xs text-gray-400 line-through">Rp 225.000</div>
                                </div>
                            </div>
                            <ul class="text-sm text-gray-300 space-y-1">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Akses 3 hari penuh festival
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Premium merchandise package
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Priority seating area
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Action Button - DIUBAH -->
                    <a href="{{ route('booking.seats', ['event_id' => $event_id ?? 'festival-bandung-creative-festival']) }}"
                        class="block w-full py-3 bg-yellow-600 text-white text-center font-bold rounded-lg hover:bg-yellow-700 transition-colors duration-300 mb-4">
                        Beli Tiket Sekarang
                    </a>

                    <!-- Info Tambahan -->
                    <div class="border-t border-gray-700 pt-4 space-y-3">
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Durasi: <strong>3 hari</strong> (10:00 - 22:00)</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Kapasitas: <strong>5,000 orang/hari</strong></span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Countdown Timer
            function updateCountdown() {
                const festivalDate = new Date('2023-11-25T10:00:00').getTime();
                const now = new Date().getTime();
                const distance = festivalDate - now;

                if (distance < 0) {
                    document.getElementById('days').textContent = '00';
                    document.getElementById('hours').textContent = '00';
                    document.getElementById('minutes').textContent = '00';
                    document.getElementById('seconds').textContent = '00';
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('days').textContent = days.toString().padStart(2, '0');
                document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);

            // Day Selector
            const dayButtons = document.querySelectorAll('.flex.mb-6 button');
            dayButtons.forEach(button => {
                button.addEventListener('click', function() {
                    dayButtons.forEach(btn => {
                        btn.classList.remove('bg-yellow-600', 'text-white');
                        btn.classList.add('bg-gray-700', 'text-gray-300',
                            'hover:bg-gray-600');
                    });
                    this.classList.remove('bg-gray-700', 'text-gray-300', 'hover:bg-gray-600');
                    this.classList.add('bg-yellow-600', 'text-white');
                });
            });

            // Ticket Selection
            const ticketOptions = document.querySelectorAll('#ticket-section > div.space-y-4 > div');
            ticketOptions.forEach(option => {
                option.addEventListener('click', function() {
                    ticketOptions.forEach(opt => {
                        opt.classList.remove('border-yellow-600', 'bg-yellow-600/20');
                        opt.classList.add('border-gray-700');
                    });
                    this.classList.add('border-yellow-600', 'bg-yellow-600/20');
                    this.classList.remove('border-gray-700');
                });
            });
        });
    </script>
@endpush
