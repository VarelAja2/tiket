@extends('guest.layouts.app')

@section('content')
    <style>
        /* Custom CSS for workshop */
        .synopsis-content {
            max-height: 100px;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .synopsis-content.expanded {
            max-height: 1000px;
        }

        .read-more-btn::after {
            content: '▼';
            display: inline-block;
            margin-left: 5px;
            transition: transform 0.3s;
            font-size: 12px;
        }

        .read-more-btn.expanded::after {
            transform: rotate(180deg);
        }

        .hero-gradient-workshop {
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(124, 58, 237, 0.7) 50%, rgba(0, 0, 0, 0.3) 100%);
        }

        @media (max-width: 768px) {
            .hero-gradient-workshop {
                background: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(124, 58, 237, 0.7) 50%, rgba(0, 0, 0, 0.5) 100%);
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Expand synopsis
            const readMoreBtn = document.getElementById('read-more-btn');
            const synopsisContent = document.getElementById('synopsis-content');

            if (readMoreBtn && synopsisContent) {
                readMoreBtn.addEventListener('click', function() {
                    synopsisContent.classList.toggle('expanded');
                    readMoreBtn.classList.toggle('expanded');
                    readMoreBtn.querySelector('span').textContent =
                        synopsisContent.classList.contains('expanded') ? 'Lebih Sedikit' : 'Selengkapnya';
                });
            }

            // Ticket selection
            const ticketOptions = document.querySelectorAll('.ticket-option');
            ticketOptions.forEach(option => {
                option.addEventListener('click', function() {
                    ticketOptions.forEach(opt => {
                        opt.classList.remove('border-purple-600', 'bg-purple-600/10');
                        opt.classList.add('border-gray-700');
                    });
                    this.classList.remove('border-gray-700');
                    this.classList.add('border-purple-600', 'bg-purple-600/10');
                });
            });
        });
    </script>

    <!-- HERO WORKSHOP SECTION -->
    <section class="relative bg-gray-900">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="hero-gradient-workshop absolute inset-0 z-10"></div>
            <div class="w-full h-full bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')">
            </div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-4 py-12 md:py-20 relative z-20">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                <!-- Workshop Poster -->
                <div class="w-full md:w-1/3 lg:w-1/4 flex justify-center md:justify-start">
                    <div class="w-64 md:w-full max-w-xs rounded-xl overflow-hidden shadow-2xl shadow-purple-900/30">
                        <div class="aspect-[2/3] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div
                                class="absolute top-4 left-4 bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                WORKSHOP
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Workshop Info -->
                <div class="w-full md:w-2/3 lg:w-3/4 text-center md:text-left">
                    <!-- Category Badge -->
                    <div class="inline-block bg-purple-600 text-white text-sm font-bold px-3 py-1 rounded-full mb-4">
                        DIGITAL MARKETING & STRATEGI BISNIS
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Workshop Digital Marketing Mastery</h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 text-gray-300 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Selasa, 18 November 2023 • 13:00 - 18:00 WIB</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Co-Working Space Digital Hub, Bandung</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Sarah Wijaya (Digital Marketing Expert)</span>
                        </div>
                    </div>

                    <!-- Rating & Participants -->
                    <div class="flex items-center justify-center md:justify-start mb-8">
                        <div class="flex items-center mr-6">
                            <div class="text-yellow-400 text-2xl mr-2">★★★★★</div>
                            <div>
                                <div class="text-2xl font-bold">4.9</div>
                                <div class="text-gray-400 text-sm">/5.0 Rating</div>
                            </div>
                        </div>
                        <div class="text-gray-300">
                            <div class="font-bold">180+</div>
                            <div class="text-gray-400 text-sm">marketer bergabung</div>
                        </div>
                    </div>

                    <!-- Price & Action Buttons -->
                    <div class="flex flex-wrap items-center gap-6 justify-center md:justify-start">
                        <div class="text-center md:text-left">
                            <div class="text-gray-400 text-sm">Mulai dari</div>
                            <div class="text-3xl font-bold text-purple-500">Rp 350.000</div>
                            <div class="text-gray-400 text-sm">Early bird hingga 15 Nov</div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <a href="#ticket-section"
                                class="px-8 py-3 bg-purple-600 text-white font-bold rounded-lg hover:bg-purple-700 transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                Daftar Sekarang
                            </a>

                            <a href="#"
                                class="px-8 py-3 bg-transparent border-2 border-purple-600 text-purple-600 font-bold rounded-lg hover:bg-purple-600 hover:text-white transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                                Simpan ke Wishlist
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
            <!-- Left Column: Deskripsi & Materi -->
            <div class="lg:col-span-2 space-y-8">
                <!-- DESKRIPSI SECTION -->
                <section>
                    <h2 class="text-2xl font-bold mb-4 flex items-center text-purple-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        Deskripsi Workshop
                    </h2>

                    <div id="synopsis-content" class="synopsis-content bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            <strong>Workshop Digital Marketing Mastery</strong> adalah program intensif selama 5 jam yang
                            dirancang khusus untuk pemilik bisnis, marketing manager, startup founder, dan professional
                            yang ingin menguasai strategi digital marketing terkini. Dalam workshop ini, Anda akan belajar
                            langsung dari praktisi dengan pengalaman 10+ tahun di industri digital.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Workshop ini mengadopsi metode <strong>hands-on learning</strong> di mana setiap peserta akan
                            langsung mempraktekkan tools dan strategi yang diajarkan. Anda akan mendapatkan akses ke
                            platform premium seperti Google Ads, Facebook Business Manager, dan berbagai tools analytics
                            selama workshop berlangsung.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Materi workshop mencakup strategi lengkap dari <strong>market research, content creation,
                                social media management, paid advertising, hingga conversion optimization</strong>. Setelah
                            workshop, peserta mampu membuat kampanye digital marketing yang efektif dan terukur.
                        </p>
                        <p class="text-gray-300 leading-relaxed">
                            Workshop ini telah diikuti oleh <strong>180+ peserta</strong> dengan rating kepuasan
                            <strong>4.9/5.0</strong>. Peserta mendapatkan toolkit lengkap yang bisa langsung diaplikasikan
                            di bisnis mereka.
                        </p>
                    </div>

                    <button id="read-more-btn"
                        class="read-more-btn mt-4 text-purple-500 font-semibold hover:text-purple-400 transition-colors duration-300">
                        <span>Selengkapnya</span>
                    </button>
                </section>

                <!-- MATERI PEMBAHASAN -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-purple-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                        </svg>
                        Materi Workshop Lengkap
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <!-- Materi 1 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-purple-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        1</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Market Research & Persona Development
                                        </h3>
                                        <p class="text-gray-400">Identifikasi target market dan pengembangan buyer persona
                                            yang akurat</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Materi 2 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-purple-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        2</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Content Strategy & Creation</h3>
                                        <p class="text-gray-400">Membuat konten yang menarik dan sesuai dengan target
                                            audience</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Materi 3 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-purple-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        3</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Social Media Marketing Mastery</h3>
                                        <p class="text-gray-400">Strategi optimalisasi Instagram, Facebook, TikTok, dan
                                            LinkedIn</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <!-- Materi 4 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-purple-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        4</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Paid Advertising (Google & Social
                                            Ads)</h3>
                                        <p class="text-gray-400">Membuat dan mengoptimasi kampanye berbayar yang efektif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Materi 5 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-purple-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        5</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">SEO & Conversion Optimization</h3>
                                        <p class="text-gray-400">Teknik SEO dan optimasi website untuk meningkatkan
                                            konversi</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Materi 6 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-purple-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        6</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Analytics & Performance Tracking</h3>
                                        <p class="text-gray-400">Mengukur dan menganalisa performa kampanye marketing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- PEMBICARA SECTION -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 text-purple-500">Trainer & Fasilitator</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Trainer 1 -->
                        <div
                            class="bg-gray-800 rounded-xl p-6 hover:shadow-xl hover:shadow-purple-900/20 transition-shadow">
                            <div class="flex items-start mb-4">
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-purple-600 to-purple-800 rounded-full flex items-center justify-center mr-4 text-2xl font-bold text-white">
                                    SW
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white">Sarah Wijaya</h3>
                                    <p class="text-purple-400 font-medium">Digital Marketing Director - GrowthLab</p>
                                    <p class="text-gray-400 text-sm mt-1">12+ tahun pengalaman</p>
                                </div>
                            </div>
                            <p class="text-gray-300">
                                Expert digital marketing dengan spesialisasi growth hacking dan performance marketing.
                                Berhasil membantu 50+ brand meningkatkan revenue hingga 300% melalui strategi digital.
                            </p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="bg-purple-600/20 text-purple-400 text-xs px-3 py-1 rounded-full">Growth
                                    Hacking</span>
                                <span class="bg-purple-600/20 text-purple-400 text-xs px-3 py-1 rounded-full">Performance
                                    Marketing</span>
                                <span class="bg-purple-600/20 text-purple-400 text-xs px-3 py-1 rounded-full">Social Media
                                    Expert</span>
                            </div>
                        </div>

                        <!-- Trainer 2 -->
                        <div
                            class="bg-gray-800 rounded-xl p-6 hover:shadow-xl hover:shadow-purple-900/20 transition-shadow">
                            <div class="flex items-start mb-4">
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-purple-600 to-purple-800 rounded-full flex items-center justify-center mr-4 text-2xl font-bold text-white">
                                    AR
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white">Andi Rahman, M.Sc</h3>
                                    <p class="text-purple-400 font-medium">SEO & Analytics Specialist</p>
                                    <p class="text-gray-400 text-sm mt-1">8+ tahun pengalaman</p>
                                </div>
                            </div>
                            <p class="text-gray-300">
                                Ahli SEO dan data analytics dengan pengalaman mengoptimasi website perusahaan besar.
                                Certified Google Analytics dan Google Ads professional.
                            </p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="bg-purple-600/20 text-purple-400 text-xs px-3 py-1 rounded-full">SEO
                                    Expert</span>
                                <span class="bg-purple-600/20 text-purple-400 text-xs px-3 py-1 rounded-full">Google
                                    Analytics</span>
                                <span class="bg-purple-600/20 text-purple-400 text-xs px-3 py-1 rounded-full">Data
                                    Analysis</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Ticket & Info -->
            <div class="lg:col-span-1">
                <!-- TICKET SECTION -->
                <section id="ticket-section" class="bg-gray-800 rounded-xl p-6 sticky top-24">
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-purple-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 2a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7zm1 5a1 1 0 011-1h.01a1 1 0 110 2H9a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Pilihan Tiket Workshop
                    </h2>

                    <!-- Tanggal & Waktu -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-2">TANGGAL & WAKTU</h3>
                        <div class="bg-gray-900 rounded-lg p-4 border-l-4 border-purple-500">
                            <div class="flex items-center text-gray-300 mb-2">
                                <svg class="w-5 h-5 text-purple-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-semibold">Selasa, 18 November 2023</span>
                            </div>
                            <div class="flex items-center text-gray-300">
                                <svg class="w-5 h-5 text-purple-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>13:00 - 18:00 WIB (5 jam)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Pilihan Tiket -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-3">PILIHAN TIKET</h3>
                        <div class="space-y-4">
                            <!-- Basic Workshop -->
                            <div
                                class="ticket-option border border-purple-600 rounded-lg p-4 bg-purple-600/10 cursor-pointer">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <div class="flex items-center">
                                            <h4 class="font-bold text-lg text-white">Basic Workshop</h4>
                                            <span class="ml-2 bg-purple-600 text-white text-xs px-2 py-1 rounded">🎯
                                                Hands-on</span>
                                        </div>
                                        <p class="text-gray-400 text-sm">Pendaftaran hingga 16 Nov 2023</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-purple-500">Rp 350.000</div>
                                        <div class="text-green-500 text-sm font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Tersedia
                                        </div>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-300 space-y-1 pl-1">
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Akses workshop 5 jam
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Workshop materials & toolkit
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Sertifikat partisipasi
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Coffee break & snack
                                    </li>
                                </ul>
                            </div>

                            <!-- Premium Package -->
                            <div
                                class="ticket-option border border-gray-700 rounded-lg p-4 cursor-pointer hover:border-purple-600">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <div class="flex items-center">
                                            <h4 class="font-bold text-lg text-white">Premium Package</h4>
                                            <span class="ml-2 bg-yellow-600 text-white text-xs px-2 py-1 rounded">🔥 Best
                                                Value</span>
                                        </div>
                                        <p class="text-gray-400 text-sm">Termasuk post-workshop consultation</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-purple-500">Rp 500.000</div>
                                        <div class="text-green-500 text-sm font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Tersedia
                                        </div>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-300 space-y-1 pl-1">
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Semua fasilitas Basic Workshop
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        1-on-1 consultation session (30 menit)
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Premium templates & tools bundle
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Access to private member group
                                    </li>
                                </ul>
                            </div>

                            <!-- Corporate Package -->
                            <div
                                class="ticket-option border border-gray-700 rounded-lg p-4 cursor-pointer hover:border-purple-600">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <div class="flex items-center">
                                            <h4 class="font-bold text-lg text-white">Corporate Package</h4>
                                            <span class="ml-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">🏢 Team
                                                Discount</span>
                                        </div>
                                        <p class="text-gray-400 text-sm">Minimal 3 peserta dari perusahaan sama</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-purple-500">Rp 400.000</div>
                                        <div class="text-xs text-gray-400 line-through">Rp 450.000</div>
                                        <div class="text-green-500 text-sm font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Tersedia
                                        </div>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-300 space-y-1 pl-1">
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Semua fasilitas Premium Package
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Dedicated team seating area
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Team project collaboration session
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Customized company certificate
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    

                    <!-- Info Tambahan -->
                    <div class="border-t border-gray-700 pt-4">
                        <div class="flex items-center text-sm text-gray-400 mb-2">
                            <svg class="w-4 h-4 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Durasi: <strong>5 jam</strong> (hands-on intensive workshop)</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Kuota: <strong>180 peserta</strong> (Basic: 100, Premium: 60, Corporate: 20)</span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- BENEFIT SECTION -->
    <section class="bg-gradient-to-r from-purple-900/20 to-gray-900/30 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center text-white">Tools & Software yang Akan Dipelajari</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Tool 1 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">📊</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Google Analytics</h3>
                    <p class="text-gray-300 text-sm">Analytics & tracking</p>
                </div>

                <!-- Tool 2 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">🎯</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Google Ads</h3>
                    <p class="text-gray-300 text-sm">Paid advertising</p>
                </div>

                <!-- Tool 3 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">📱</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Meta Business</h3>
                    <p class="text-gray-300 text-sm">Social media ads</p>
                </div>

                <!-- Tool 4 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">🔍</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2">SEO Tools</h3>
                    <p class="text-gray-300 text-sm">Search optimization</p>
                </div>
            </div>
        </div>
    </section>

    <!-- EVENT TERKAIT SECTION -->
    <section class="bg-gray-900 border-t border-gray-800 py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-white">Workshop & Training Lainnya</h2>
                <a href="{{ route('now-playing') }}" class="text-purple-500 hover:text-purple-400 font-medium">
                    Lihat Semua Event →
                </a>
            </div>

            <div class="flex overflow-x-auto showtime-scroll pb-4 gap-6">
                <!-- Event 1 -->
                <a href="{{ route('event.seminar.detail', ['slug' => 'seminar-akuntansi-2023']) }}"
                    class="flex-shrink-0 w-64 group">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 group-hover:scale-105 transition-transform duration-300">
                        <div class="aspect-[16/9] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                            <div
                                class="absolute top-2 left-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                SEMINAR
                            </div>
                            <div class="absolute top-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                                <div class="font-semibold">15</div>
                                <div class="text-xs">NOV</div>
                            </div>
                        </div>
                    </div>
                    <h3 class="font-bold mb-1 line-clamp-1 text-white group-hover:text-purple-400">Seminar Akuntansi Modern
                        2023</h3>
                    <div class="flex items-center text-sm text-gray-400 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Sab, 15 Nov • 09:00-16:00</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-blue-500 font-bold">Rp 250.000</div>
                        <span class="bg-blue-600/20 text-blue-400 text-xs px-2 py-1 rounded">Akuntansi</span>
                    </div>
                </a>

                <!-- Event 2 -->
                <a href="{{ route('event.seminar.detail', ['slug' => 'seminar-ai-ml-2023']) }}"
                    class="flex-shrink-0 w-64 group">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 group-hover:scale-105 transition-transform duration-300">
                        <div class="aspect-[16/9] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1518709268805-4e9042af2176?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                            <div
                                class="absolute top-2 left-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                SEMINAR
                            </div>
                            <div class="absolute top-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                                <div class="font-semibold">8</div>
                                <div class="text-xs">DES</div>
                            </div>
                        </div>
                    </div>
                    <h3 class="font-bold mb-1 line-clamp-1 text-white group-hover:text-purple-400">Seminar AI & Machine
                        Learning 2023</h3>
                    <div class="flex items-center text-sm text-gray-400 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Jum, 8 Des • 10:00-17:00</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-blue-500 font-bold">Rp 300.000</div>
                        <span class="bg-blue-600/20 text-blue-400 text-xs px-2 py-1 rounded">Technology</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
