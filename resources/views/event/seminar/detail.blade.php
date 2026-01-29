@extends('guest.layouts.app')

@section('content')
    <style>
        /* Custom CSS for seminar */
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

        .hero-gradient-seminar {
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(30, 58, 138, 0.7) 50%, rgba(0, 0, 0, 0.3) 100%);
        }

        @media (max-width: 768px) {
            .hero-gradient-seminar {
                background: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(30, 58, 138, 0.7) 50%, rgba(0, 0, 0, 0.5) 100%);
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
                        opt.classList.remove('border-blue-600', 'bg-blue-600/10');
                        opt.classList.add('border-gray-700');
                    });
                    this.classList.remove('border-gray-700');
                    this.classList.add('border-blue-600', 'bg-blue-600/10');
                });
            });
        });
    </script>

    <!-- HERO SEMINAR SECTION -->
    <section class="relative bg-gray-900">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="hero-gradient-seminar absolute inset-0 z-10"></div>
            <div class="w-full h-full bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')">
            </div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-4 py-12 md:py-20 relative z-20">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                <!-- Seminar Poster -->
                <div class="w-full md:w-1/3 lg:w-1/4 flex justify-center md:justify-start">
                    <div class="w-64 md:w-full max-w-xs rounded-xl overflow-hidden shadow-2xl shadow-blue-900/30">
                        <div class="aspect-[2/3] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div
                                class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                SEMINAR
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seminar Info -->
                <div class="w-full md:w-2/3 lg:w-3/4 text-center md:text-left">
                    <!-- Category Badge -->
                    <div class="inline-block bg-blue-600 text-white text-sm font-bold px-3 py-1 rounded-full mb-4">
                        AKUNTANSI & FINANSIAL
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Seminar Akuntansi Modern 2023</h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 text-gray-300 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Sab, 15 November 2023 • 09:00 - 16:00 WIB</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Auditorium Financial Center, Jakarta</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Dr. Budi Santoso, CPA & Tim Expert</span>
                        </div>
                    </div>

                    <!-- Rating & Participants -->
                    <div class="flex items-center justify-center md:justify-start mb-8">
                        <div class="flex items-center mr-6">
                            <div class="text-yellow-400 text-2xl mr-2">★★★★★</div>
                            <div>
                                <div class="text-2xl font-bold">4.8</div>
                                <div class="text-gray-400 text-sm">/5.0 Rating</div>
                            </div>
                        </div>
                        <div class="text-gray-300">
                            <div class="font-bold">250+</div>
                            <div class="text-gray-400 text-sm">profesional bergabung</div>
                        </div>
                    </div>

                    <!-- Price & Action Buttons -->
                    <div class="flex flex-wrap items-center gap-6 justify-center md:justify-start">
                        <div class="text-center md:text-left">
                            <div class="text-gray-400 text-sm">Mulai dari</div>
                            <div class="text-3xl font-bold text-blue-500">Rp 250.000</div>
                            <div class="text-gray-400 text-sm">Early bird hingga 10 Nov</div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <a href="#ticket-section"
                                class="px-8 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                Daftar Sekarang
                            </a>

                            <a href="#"
                                class="px-8 py-3 bg-transparent border-2 border-blue-600 text-blue-600 font-bold rounded-lg hover:bg-blue-600 hover:text-white transition-colors duration-300 transform hover:scale-105 flex items-center">
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
                    <h2 class="text-2xl font-bold mb-4 flex items-center text-blue-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        Deskripsi Seminar
                    </h2>

                    <div id="synopsis-content" class="synopsis-content bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            <strong>Seminar Akuntansi Modern 2023</strong> merupakan acara tahunan bergengsi yang
                            menghadirkan
                            pembahasan terkini tentang perkembangan standar akuntansi internasional, teknologi finansial,
                            dan strategi pengelolaan keuangan di era digital 4.0. Acara ini dirancang khusus untuk para
                            profesional akuntansi, CFO, finance manager, auditor, konsultan, dan akademisi yang ingin
                            mengupdate pengetahuan mereka dengan praktik terbaik industri.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Dalam seminar intensif selama satu hari penuh ini, Anda akan mendapatkan insight mendalam
                            tentang penerapan <strong>SAK ETAP terbaru</strong>, implementasi software akuntansi modern,
                            strategi pengendalian internal yang efektif, dan bagaimana memanfaatkan data analytics untuk
                            pengambilan keputusan finansial yang lebih tepat dan berbasis data.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Acara ini juga memberikan kesempatan <strong>networking eksklusif</strong> dengan para praktisi
                            terkemuka di bidang akuntansi dan finansial dari berbagai perusahaan besar di Indonesia.
                            Anda dapat bertukar pengalaman, membahas studi kasus nyata, dan membangun koneksi profesional
                            yang bermanfaat untuk karir Anda.
                        </p>
                        <p class="text-gray-300 leading-relaxed">
                            Dihadiri oleh <strong>250+ profesional</strong> dari berbagai perusahaan ternama, seminar ini
                            telah mendapatkan rating <strong>4.8/5.0</strong> dari peserta tahun sebelumnya. Jangan lewatkan
                            kesempatan untuk mengembangkan kompetensi Anda di bidang akuntansi modern.
                        </p>
                    </div>

                    <button id="read-more-btn"
                        class="read-more-btn mt-4 text-blue-500 font-semibold hover:text-blue-400 transition-colors duration-300">
                        <span>Selengkapnya</span>
                    </button>
                </section>

                <!-- MATERI PEMBAHASAN -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-blue-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                        </svg>
                        Materi Pembahasan Lengkap
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <!-- Materi 1 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-blue-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        1</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Update SAK ETAP 2023 & Implementasi
                                        </h3>
                                        <p class="text-gray-400">Analisis mendalam perubahan standar akuntansi terbaru dan
                                            strategi implementasi efektif</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Materi 2 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-blue-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        2</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Digital Financial Reporting</h3>
                                        <p class="text-gray-400">Membuat laporan keuangan dengan tools digital modern dan
                                            automation</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Materi 3 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-blue-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        3</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Internal Control & Risk Management
                                        </h3>
                                        <p class="text-gray-400">Sistem pengendalian internal komprehensif untuk perusahaan
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <!-- Materi 4 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-blue-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        4</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Financial Data Analytics & BI Tools
                                        </h3>
                                        <p class="text-gray-400">Analisis data keuangan untuk pengambilan keputusan
                                            berbasis data</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Materi 5 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-blue-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        5</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Tax Planning & Compliance Strategy
                                        </h3>
                                        <p class="text-gray-400">Strategi perencanaan pajak yang efektif dan compliance
                                            management</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Materi 6 -->
                            <div
                                class="bg-gray-800 rounded-xl p-5 hover:bg-gray-750 transition-colors border-l-4 border-blue-500">
                                <div class="flex items-start">
                                    <div
                                        class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0 font-bold">
                                        6</div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1 text-white">Case Study Workshop & Q&A Session
                                        </h3>
                                        <p class="text-gray-400">Studi kasus nyata perusahaan besar dan sesi tanya jawab
                                            interaktif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- PEMBICARA SECTION -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 text-blue-500">Pembicara & Fasilitator</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Pembicara 1 -->
                        <div class="bg-gray-800 rounded-xl p-6 hover:shadow-xl hover:shadow-blue-900/20 transition-shadow">
                            <div class="flex items-start mb-4">
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center mr-4 text-2xl font-bold text-white">
                                    BS
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white">Dr. Budi Santoso, CPA</h3>
                                    <p class="text-blue-400 font-medium">Senior Partner - Santoso & Partners</p>
                                    <p class="text-gray-400 text-sm mt-1">20+ tahun pengalaman</p>
                                </div>
                            </div>
                            <p class="text-gray-300">
                                Pakar akuntansi dengan spesialisasi standar akuntansi internasional. Konsultan untuk 50+
                                perusahaan BUMN dan multinasional. Dosen tamu di beberapa universitas ternama.
                            </p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="bg-blue-600/20 text-blue-400 text-xs px-3 py-1 rounded-full">SAK ETAP
                                    Expert</span>
                                <span class="bg-blue-600/20 text-blue-400 text-xs px-3 py-1 rounded-full">Internal
                                    Audit</span>
                                <span class="bg-blue-600/20 text-blue-400 text-xs px-3 py-1 rounded-full">Financial
                                    Compliance</span>
                            </div>
                        </div>

                        <!-- Pembicara 2 -->
                        <div class="bg-gray-800 rounded-xl p-6 hover:shadow-xl hover:shadow-blue-900/20 transition-shadow">
                            <div class="flex items-start mb-4">
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center mr-4 text-2xl font-bold text-white">
                                    DI
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white">Diana Indriani, M.Acc</h3>
                                    <p class="text-blue-400 font-medium">Finance Director - TechGlobal Corp</p>
                                    <p class="text-gray-400 text-sm mt-1">15+ tahun pengalaman</p>
                                </div>
                            </div>
                            <p class="text-gray-300">
                                Ahli financial technology dengan spesialisasi digital transformation di sektor keuangan.
                                Pengalaman implementasi sistem ERP di perusahaan teknologi terkemuka.
                            </p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="bg-blue-600/20 text-blue-400 text-xs px-3 py-1 rounded-full">FinTech
                                    Expert</span>
                                <span class="bg-blue-600/20 text-blue-400 text-xs px-3 py-1 rounded-full">ERP
                                    Implementation</span>
                                <span class="bg-blue-600/20 text-blue-400 text-xs px-3 py-1 rounded-full">Data
                                    Analytics</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Ticket & Info -->
            <div class="lg:col-span-1">
                <!-- TICKET SECTION -->
                <section id="ticket-section" class="bg-gray-800 rounded-xl p-6 sticky top-24">
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-blue-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 2a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7zm1 5a1 1 0 011-1h.01a1 1 0 110 2H9a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Pilihan Tiket Seminar
                    </h2>

                    <!-- Tanggal & Waktu -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-2">TANGGAL & WAKTU</h3>
                        <div class="bg-gray-900 rounded-lg p-4 border-l-4 border-blue-500">
                            <div class="flex items-center text-gray-300 mb-2">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-semibold">Sabtu, 15 November 2023</span>
                            </div>
                            <div class="flex items-center text-gray-300">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>09:00 - 16:00 WIB (7 jam)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Pilihan Tiket -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-3">PILIHAN TIKET</h3>
                        <div class="space-y-4">
                            <!-- Early Bird -->
                            <div class="ticket-option border border-blue-600 rounded-lg p-4 bg-blue-600/10 cursor-pointer">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <div class="flex items-center">
                                            <h4 class="font-bold text-lg text-white">Early Bird</h4>
                                            <span class="ml-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">💰 Hemat
                                                30%</span>
                                        </div>
                                        <p class="text-gray-400 text-sm">Berlaku hingga 10 Nov 2023</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-blue-500">Rp 250.000</div>
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
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Akses seminar full day
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Materi digital lengkap
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Sertifikat partisipasi
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Coffee break & lunch
                                    </li>
                                </ul>
                            </div>

                            <!-- Regular -->
                            <div
                                class="ticket-option border border-gray-700 rounded-lg p-4 cursor-pointer hover:border-blue-600">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h4 class="font-bold text-lg text-white">Regular</h4>
                                        <p class="text-gray-400 text-sm">11-14 Nov 2023</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-blue-500">Rp 350.000</div>
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
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Semua fasilitas Early Bird
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Goodie bag eksklusif
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        E-book tambahan
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Networking session
                                    </li>
                                </ul>
                            </div>

                            <!-- VIP -->
                            <div
                                class="ticket-option border border-gray-700 rounded-lg p-4 cursor-pointer hover:border-blue-600">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <div class="flex items-center">
                                            <h4 class="font-bold text-lg text-white">VIP Package</h4>
                                            <span class="ml-2 bg-yellow-600 text-white text-xs px-2 py-1 rounded">⭐
                                                Limited</span>
                                        </div>
                                        <p class="text-gray-400 text-sm">Hanya 50 kursi tersedia</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-blue-500">Rp 500.000</div>
                                        <div class="text-yellow-500 text-sm font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Terbatas
                                        </div>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-300 space-y-1 pl-1">
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Semua fasilitas Regular
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        VIP seating area (baris depan)
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Exclusive dinner with speakers
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Premium merchandise package
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Photo session dengan semua pembicara
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    

                    <!-- Info Tambahan -->
                    <div class="border-t border-gray-700 pt-4">
                        <div class="flex items-center text-sm text-gray-400 mb-2">
                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Durasi: <strong>7 jam</strong> (full day seminar)</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Kuota: <strong>250 peserta</strong> (Early Bird: 100, Regular: 100, VIP: 50)</span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- BENEFIT SECTION -->
    <section class="bg-gradient-to-r from-blue-900/20 to-gray-900/30 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center text-white">Apa yang Anda Dapatkan?</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Benefit 1 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">📚</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Knowledge Update</h3>
                    <p class="text-gray-300">Update terbaru standar akuntansi dan praktik terbaik industri</p>
                </div>

                <!-- Benefit 2 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">🤝</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Networking</h3>
                    <p class="text-gray-300">Bertemu 250+ profesional dan praktisi terkemuka</p>
                </div>

                <!-- Benefit 3 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">🏆</span>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Sertifikasi</h3>
                    <p class="text-gray-300">Sertifikat partisipasi yang diakui industri</p>
                </div>
            </div>
        </div>
    </section>

    <!-- EVENT TERKAIT SECTION -->
    <section class="bg-gray-900 border-t border-gray-800 py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-white">Seminar & Workshop Lainnya</h2>
                <a href="{{ route('now-playing') }}" class="text-blue-500 hover:text-blue-400 font-medium">
                    Lihat Semua Event →
                </a>
            </div>

            <div class="flex overflow-x-auto showtime-scroll pb-4 gap-6">
                <!-- Event 1 -->
                <a href="{{ route('event.workshop.detail', ['slug' => 'workshop-digital-marketing']) }}"
                    class="flex-shrink-0 w-64 group">
                    <div
                        class="relative rounded-xl overflow-hidden mb-3 group-hover:scale-105 transition-transform duration-300">
                        <div class="aspect-[16/9] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                            <div
                                class="absolute top-2 left-2 bg-purple-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                WORKSHOP
                            </div>
                            <div class="absolute top-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                                <div class="font-semibold">18</div>
                                <div class="text-xs">NOV</div>
                            </div>
                        </div>
                    </div>
                    <h3 class="font-bold mb-1 line-clamp-1 text-white group-hover:text-blue-400">Workshop Digital Marketing
                        Mastery</h3>
                    <div class="flex items-center text-sm text-gray-400 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Sel, 18 Nov • 13:00-18:00</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-blue-500 font-bold">Rp 350.000</div>
                        <span class="bg-purple-600/20 text-purple-400 text-xs px-2 py-1 rounded">Marketing</span>
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
                    <h3 class="font-bold mb-1 line-clamp-1 text-white group-hover:text-blue-400">Seminar AI & Machine
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
