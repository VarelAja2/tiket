@extends('guest.layouts.app')

@section('content')
    <style>
        .talk-show-gradient {
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(34, 197, 94, 0.7) 50%, rgba(0, 0, 0, 0.3) 100%);
        }

        @media (max-width: 768px) {
            .talk-show-gradient {
                background: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(34, 197, 94, 0.7) 50%, rgba(0, 0, 0, 0.5) 100%);
            }
        }
    </style>

    <!-- TALK SHOW HERO SECTION -->
    <section class="relative bg-gray-900">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="talk-show-gradient absolute inset-0 z-10"></div>
            <div class="w-full h-full bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')">
            </div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-4 py-12 md:py-20 relative z-20">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                <!-- Talk Show Poster -->
                <div class="w-full md:w-1/3 lg:w-1/4 flex justify-center md:justify-start">
                    <div class="w-64 md:w-full max-w-xs rounded-xl overflow-hidden shadow-2xl shadow-green-900/30">
                        <div class="aspect-[2/3] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1545235617-9465d2a55698?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div
                                class="absolute top-4 left-4 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                TALK SHOW
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Talk Show Info -->
                <div class="w-full md:w-2/3 lg:w-3/4 text-center md:text-left">
                    <!-- Category Badge -->
                    <div class="inline-block bg-green-600 text-white text-sm font-bold px-3 py-1 rounded-full mb-4">
                        LEADERSHIP • MENTAL HEALTH • PERSONAL DEVELOPMENT
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">The Art of Mindful Leadership</h1>
                    <p class="text-xl text-gray-300 mb-6">Mengelola Tim dengan Empati di Era Digital</p>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 text-gray-300 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Rabu, 22 November 2023 • 19:00 - 21:30 WIB</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">The Grand Ballroom, Hotel Majapahit, Jakarta</span>
                        </div>
                    </div>

                    <!-- Speakers -->
                    <div class="mb-8">
                        <div class="text-gray-400 text-sm mb-2">Dihadiri oleh</div>
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-600 to-green-800 rounded-full mr-2">
                                </div>
                                <div>
                                    <div class="font-bold text-white">Dr. Andi Susanto, M.Psi</div>
                                    <div class="text-gray-400 text-sm">Psikolog Klinis & Leadership Coach</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-600 to-green-800 rounded-full mr-2">
                                </div>
                                <div>
                                    <div class="font-bold text-white">Sarah Tanuwijaya</div>
                                    <div class="text-gray-400 text-sm">CEO TechGrowth Indonesia</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Price & Action Buttons -->
                    <div class="flex flex-wrap items-center gap-6 justify-center md:justify-start">
                        <div class="text-center md:text-left">
                            <div class="text-gray-400 text-sm">Mulai dari</div>
                            <div class="text-3xl font-bold text-green-500">Rp 150.000</div>
                            <div class="text-gray-400 text-sm">Early bird hingga 15 Nov</div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <a href="#ticket-section"
                                class="px-8 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Beli Tiket
                            </a>

                            <a href="#speakers"
                                class="px-8 py-3 bg-transparent border-2 border-green-600 text-green-600 font-bold rounded-lg hover:bg-green-600 hover:text-white transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Lihat Pembicara
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
            <!-- Left Column: Deskripsi & Speakers -->
            <div class="lg:col-span-2 space-y-8">
                <!-- TALK SHOW DESCRIPTION -->
                <section>
                    <h2 class="text-2xl font-bold mb-4 flex items-center text-green-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        Tentang Talk Show
                    </h2>

                    <div class="bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            <strong>The Art of Mindful Leadership</strong> adalah talk show eksklusif yang membahas
                            kepemimpinan transformasional di era digital dengan pendekatan mindfulness dan emotional
                            intelligence. Acara ini dirancang untuk leaders, managers, dan entrepreneurs yang ingin
                            mengembangkan kemampuan memimpin dengan empati dan kesadaran penuh.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Dalam 2.5 jam, Anda akan belajar strategi praktis untuk:
                        </p>
                        <ul class="text-gray-300 space-y-2 mb-4 pl-4">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Mengelola stress dan tekanan di tempat kerja
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Membangun hubungan kerja yang sehat dan produktif
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Mengambil keputusan dengan clarity dan compassion
                            </li>
                        </ul>
                        <p class="text-gray-300 leading-relaxed">
                            Format acara: <strong>panel discussion, Q&A session, dan networking session</strong>.
                            Setiap peserta akan mendapatkan workbook dan akses rekaman acara.
                        </p>
                    </div>
                </section>

                <!-- SPEAKERS DETAIL -->
                <section id="speakers">
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-green-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                        Pembicara & Panelis
                    </h2>

                    <div class="space-y-6">
                        <!-- Speaker 1 -->
                        <div
                            class="bg-gray-800 rounded-xl p-6 hover:shadow-xl hover:shadow-green-900/20 transition-shadow">
                            <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-24 h-24 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center text-2xl font-bold text-white">
                                        AS
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-2xl font-bold text-white mb-2">Dr. Andi Susanto, M.Psi</h3>
                                    <p class="text-green-400 font-medium mb-3">Psikolog Klinis & Certified Leadership Coach
                                    </p>
                                    <p class="text-gray-300 mb-4">
                                        Dengan pengalaman 15+ tahun di bidang psikologi organisasi, Dr. Andi telah
                                        membantu 100+ perusahaan dalam mengembangkan program leadership development.
                                        Beliau adalah penulis buku bestseller "Mindful Leader" dan sering menjadi
                                        pembicara di berbagai forum internasional.
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="bg-green-600/20 text-green-400 text-xs px-3 py-1 rounded-full">Leadership
                                            Psychology</span>
                                        <span
                                            class="bg-green-600/20 text-green-400 text-xs px-3 py-1 rounded-full">Executive
                                            Coaching</span>
                                        <span
                                            class="bg-green-600/20 text-green-400 text-xs px-3 py-1 rounded-full">Organizational
                                            Development</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Speaker 2 -->
                        <div
                            class="bg-gray-800 rounded-xl p-6 hover:shadow-xl hover:shadow-green-900/20 transition-shadow">
                            <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-24 h-24 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center text-2xl font-bold text-white">
                                        ST
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-2xl font-bold text-white mb-2">Sarah Tanuwijaya</h3>
                                    <p class="text-green-400 font-medium mb-3">CEO TechGrowth Indonesia</p>
                                    <p class="text-gray-300 mb-4">
                                        Membangun TechGrowth dari startup kecil menjadi perusahaan dengan 500+
                                        karyawan dalam 5 tahun. Sarah dikenal dengan pendekatan kepemimpinan yang
                                        manusiawi namun tetap produktif. Under her leadership, perusahaan mencapai
                                        pertumbuhan 300% year-over-year.
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="bg-green-600/20 text-green-400 text-xs px-3 py-1 rounded-full">Startup
                                            Growth</span>
                                        <span class="bg-green-600/20 text-green-400 text-xs px-3 py-1 rounded-full">Team
                                            Management</span>
                                        <span
                                            class="bg-green-600/20 text-green-400 text-xs px-3 py-1 rounded-full">Business
                                            Strategy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- AGENDA -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 text-green-500">Agenda Acara</h2>
                    <div class="bg-gray-800 rounded-xl p-6">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-20">
                                    <div class="text-green-500 font-bold">19:00 - 19:30</div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-1">Registrasi & Networking</h4>
                                    <p class="text-gray-300 text-sm">Coffee break dan networking dengan peserta lain</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-20">
                                    <div class="text-green-500 font-bold">19:30 - 20:30</div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-1">Panel Discussion</h4>
                                    <p class="text-gray-300 text-sm">"Leading with Empathy in Digital Age" dengan kedua
                                        pembicara</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-20">
                                    <div class="text-green-500 font-bold">20:30 - 21:00</div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-1">Q&A Session</h4>
                                    <p class="text-gray-300 text-sm">Sesi tanya jawab langsung dengan pembicara</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-20">
                                    <div class="text-green-500 font-bold">21:00 - 21:30</div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-1">Networking & Closing</h4>
                                    <p class="text-gray-300 text-sm">Networking session dan penutupan acara</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Ticket & Info -->
            <div class="lg:col-span-1">
                <!-- TICKET SECTION -->
                <section id="ticket-section" class="bg-gray-800 rounded-xl p-6 sticky top-24">
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-green-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 2a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7zm1 5a1 1 0 011-1h.01a1 1 0 110 2H9a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Pilihan Tiket
                    </h2>

                    <!-- Pilihan Tiket -->
                    <div class="space-y-4 mb-6">
                        <!-- Regular Ticket -->
                        <div class="border border-green-600 rounded-lg p-4 bg-green-600/10 cursor-pointer">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h4 class="font-bold text-lg text-white">Regular Ticket</h4>
                                    <p class="text-gray-400 text-sm">Early bird hingga 15 Nov</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-xl font-bold text-green-500">Rp 150.000</div>
                                    <div class="text-green-500 text-sm font-medium">Tersedia</div>
                                </div>
                            </div>
                            <ul class="text-sm text-gray-300 space-y-1">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Akses talk show 2.5 jam
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Workbook & materials
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Coffee break & snack
                                </li>
                            </ul>
                        </div>

                        <!-- VIP Ticket -->
                        <div class="border border-green-600 rounded-lg p-4 bg-green-600/10 cursor-pointer">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <div class="flex items-center">
                                        <h4 class="font-bold text-lg text-white">VIP Ticket</h4>
                                        <span class="ml-2 bg-green-600 text-white text-xs px-2 py-1 rounded">⭐
                                            Exclusive</span>
                                    </div>
                                    <p class="text-gray-400 text-sm">Limited seats available</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-xl font-bold text-green-500">Rp 300.000</div>
                                    <div class="text-yellow-500 text-sm font-medium">5 kursi tersisa</div>
                                </div>
                            </div>
                            <ul class="text-sm text-gray-300 space-y-1">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Semua fasilitas Regular Ticket
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Priority seating (baris depan)
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Exclusive meet & greet dengan pembicara
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Premium gift package
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Action Button - DIUBAH -->
                   

                    <!-- Info Tambahan -->
                    <div class="border-t border-gray-700 pt-4 space-y-3">
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Durasi: <strong>2.5 jam</strong> (19:00 - 21:30)</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Kapasitas: <strong>150 peserta</strong></span>
                        </div>
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.707.293l4 4a1 1 0 01-1.414 1.414l-4-4A1 1 0 0112 2zM12 14a1 1 0 01.707.293l4 4a1 1 0 01-1.414 1.414l-4-4A1 1 0 0112 14z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Format: <strong>In-person & Live Streaming</strong></span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- TESTIMONIAL SECTION -->
    <section class="bg-gradient-to-r from-green-900/20 to-gray-900/30 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center text-white">Apa Kata Peserta Sebelumnya</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Testimonial 1 -->
                <div class="bg-gray-800/50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-600/30 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-bold text-white">Budi Santoso</h4>
                            <p class="text-gray-400 text-sm">Manager - Tech Company</p>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">
                        "Talk show yang sangat insightful! Materi yang disampaikan langsung applicable di tempat kerja."
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-800/50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-600/30 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-bold text-white">Sari Dewi</h4>
                            <p class="text-gray-400 text-sm">Startup Founder</p>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">
                        "Networking session-nya sangat valuable. Bisa langsung diskusi dengan pembicara dan peserta lain."
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ticket Selection
            const ticketOptions = document.querySelectorAll('#ticket-section > div.space-y-4 > div');
            ticketOptions.forEach(option => {
                option.addEventListener('click', function() {
                    ticketOptions.forEach(opt => {
                        opt.classList.remove('border-green-600', 'bg-green-600/20');
                        opt.classList.add('border-gray-700');
                    });
                    this.classList.add('border-green-600', 'bg-green-600/20');
                    this.classList.remove('border-gray-700');
                });
            });

            // Smooth scrolling untuk internal links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
@endpush
