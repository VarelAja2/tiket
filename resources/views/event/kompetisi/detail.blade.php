@extends('guest.layouts.app')

@section('content')
    <style>
        .competition-gradient {
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(239, 68, 68, 0.7) 50%, rgba(0, 0, 0, 0.3) 100%);
        }

        @media (max-width: 768px) {
            .competition-gradient {
                background: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(239, 68, 68, 0.7) 50%, rgba(0, 0, 0, 0.5) 100%);
            }
        }
    </style>

    <!-- COMPETITION HERO SECTION -->
    <section class="relative bg-gray-900">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="competition-gradient absolute inset-0 z-10"></div>
            <div class="w-full h-full bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')">
            </div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-4 py-12 md:py-20 relative z-20">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                <!-- Competition Poster -->
                <div class="w-full md:w-1/3 lg:w-1/4 flex justify-center md:justify-start">
                    <div class="w-64 md:w-full max-w-xs rounded-xl overflow-hidden shadow-2xl shadow-red-900/30">
                        <div class="aspect-[2/3] bg-cover bg-center"
                            style="background-image: url('https://images.unsplash.com/photo-1492684223066-e9e4aab4d25e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                            <div
                                class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                KOMPETISI
                            </div>
                            <div class="absolute bottom-4 right-4 bg-black/80 text-white text-xs px-2 py-1 rounded">
                                <div class="font-semibold">PRIZE</div>
                                <div class="text-lg font-bold">Rp 100 JT</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Competition Info -->
                <div class="w-full md:w-2/3 lg:w-3/4 text-center md:text-left">
                    <!-- Category Badge -->
                    <div class="inline-block bg-red-600 text-white text-sm font-bold px-3 py-1 rounded-full mb-4">
                        BUSINESS PLAN • STARTUP • INNOVATION
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Startup Pitch Competition 2023</h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 text-gray-300 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Pendaftaran: 1-30 November 2023</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Grand Final: 15 Desember 2023</span>
                        </div>
                    </div>

                    <!-- Prize Pool -->
                    <div class="mb-8">
                        <div class="text-gray-400 text-sm mb-2">Total Hadiah</div>
                        <div class="text-4xl md:text-5xl font-bold text-red-500 mb-2">Rp 100.000.000</div>
                        <div class="text-gray-300">
                            + Mentorship Program & Investor Meeting
                        </div>
                    </div>

                    <!-- Registration Status -->
                    <div class="flex flex-wrap items-center gap-6 justify-center md:justify-start">
                        <div class="text-center md:text-left">
                            <div class="text-gray-400 text-sm">Biaya Pendaftaran</div>
                            <div class="text-3xl font-bold text-red-500">Rp 250.000</div>
                            <div class="text-gray-400 text-sm">/tim (max 3 orang)</div>
                        </div>

                        <div class="text-center md:text-left">
                            <div class="text-gray-400 text-sm">Pendaftar</div>
                            <div class="text-3xl font-bold text-white">142</div>
                            <div class="text-gray-400 text-sm">tim telah bergabung</div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <a href="#registration"
                                class="px-8 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                        clip-rule="evenodd" />
                                </svg>
                                Daftar Sekarang
                            </a>

                            <a href="#guidelines"
                                class="px-8 py-3 bg-transparent border-2 border-red-600 text-red-600 font-bold rounded-lg hover:bg-red-600 hover:text-white transition-colors duration-300 transform hover:scale-105 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                Lihat Panduan
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
            <!-- Left Column: Deskripsi & Timeline -->
            <div class="lg:col-span-2 space-y-8">
                <!-- COMPETITION OVERVIEW -->
                <section>
                    <h2 class="text-2xl font-bold mb-4 flex items-center text-red-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                clip-rule="evenodd" />
                        </svg>
                        Tentang Kompetisi
                    </h2>

                    <div class="bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            <strong>Startup Pitch Competition 2023</strong> adalah kompetisi bisnis plan tahunan
                            yang mencari startup terbaik dengan ide bisnis inovatif dan scalable. Kompetisi ini
                            terbuka untuk semua startup di Indonesia yang sedang dalam tahap <strong>pre-seed hingga seed
                                stage</strong>.
                        </p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Tahun ini fokus pada tema <strong>"Sustainable Innovation for Better Future"</strong>
                            dengan prioritas pada startup di bidang teknologi, sustainability, healthcare, dan
                            financial inclusion. Pemenang akan mendapatkan total hadiah <strong>Rp 100 juta</strong>
                            plus akses ke jaringan investor dan program akselerasi.
                        </p>
                        <p class="text-gray-300 leading-relaxed">
                            Kompetisi terdiri dari beberapa tahap: <strong>seleksi proposal, bootcamp, semi-final,
                                dan grand final</strong>. Peserta akan mendapatkan mentorship dari para founder unicorn
                            dan venture capital ternama.
                        </p>
                    </div>
                </section>

                <!-- TIMELINE -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-red-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        Timeline Kompetisi
                    </h2>

                    <div class="bg-gray-800 rounded-xl p-6">
                        <div class="space-y-6">
                            <!-- Phase 1 -->
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center mr-4 font-bold">
                                    1
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-center mb-1">
                                        <h3 class="text-lg font-bold text-white">Pendaftaran & Submission</h3>
                                        <span class="bg-red-600/20 text-red-400 text-xs px-3 py-1 rounded-full">
                                            Sedang Berlangsung
                                        </span>
                                    </div>
                                    <p class="text-gray-400 mb-2">1 - 30 November 2023</p>
                                    <p class="text-gray-300 text-sm">
                                        Kirim proposal bisnis dan pitch deck melalui platform kami
                                    </p>
                                </div>
                            </div>

                            <!-- Phase 2 -->
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center mr-4 font-bold">
                                    2
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-white">Seleksi Proposal</h3>
                                    <p class="text-gray-400 mb-2">1 - 7 Desember 2023</p>
                                    <p class="text-gray-300 text-sm">
                                        Penilaian proposal oleh panel juri, 50 tim terpilih masuk bootcamp
                                    </p>
                                </div>
                            </div>

                            <!-- Phase 3 -->
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center mr-4 font-bold">
                                    3
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-white">Bootcamp & Mentoring</h3>
                                    <p class="text-gray-400 mb-2">9 - 10 Desember 2023</p>
                                    <p class="text-gray-300 text-sm">
                                        Intensive workshop dan mentoring dengan para expert
                                    </p>
                                </div>
                            </div>

                            <!-- Phase 4 -->
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center mr-4 font-bold">
                                    4
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-white">Grand Final</h3>
                                    <p class="text-gray-400 mb-2">15 Desember 2023</p>
                                    <p class="text-gray-300 text-sm">
                                        Final pitching di depan panel investor dan announcement pemenang
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- JUDGES -->
                <section>
                    <h2 class="text-2xl font-bold mb-6 text-red-500">Panel Juri & Mentor</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Judge 1 -->
                        <div class="bg-gray-800 rounded-xl p-6 hover:shadow-xl hover:shadow-red-900/20 transition-shadow">
                            <div class="flex items-start mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mr-4 text-xl font-bold text-white">
                                    VJ
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-white">Vania J. Wijaya</h3>
                                    <p class="text-red-400 font-medium">Partner - East Ventures</p>
                                    <p class="text-gray-400 text-sm">Investor & Startup Advisor</p>
                                </div>
                            </div>
                            <p class="text-gray-300 text-sm">
                                Berpengalaman lebih dari 10 tahun dalam venture capital, telah mendanai 50+ startup di SEA.
                            </p>
                        </div>

                        <!-- Judge 2 -->
                        <div class="bg-gray-800 rounded-xl p-6 hover:shadow-xl hover:shadow-red-900/20 transition-shadow">
                            <div class="flex items-start mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mr-4 text-xl font-bold text-white">
                                    RP
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-white">Rizky Pratama</h3>
                                    <p class="text-red-400 font-medium">CEO - TechGrowth Indonesia</p>
                                    <p class="text-gray-400 text-sm">Serial Entrepreneur</p>
                                </div>
                            </div>
                            <p class="text-gray-300 text-sm">
                                Founder 3 startup exits dengan pengalaman membangun bisnis dari nol hingga scale.
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Registration & Prizes -->
            <div class="lg:col-span-1">
                <!-- REGISTRATION SECTION -->
                <section id="registration" class="bg-gray-800 rounded-xl p-6 sticky top-24">
                    <h2 class="text-2xl font-bold mb-6 flex items-center text-red-500">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        Pendaftaran Kompetisi
                    </h2>

                    <!-- Requirements -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-3">PERSYARATAN PESERTA</h3>
                        <ul class="text-sm text-gray-300 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Startup stage: pre-seed hingga seed
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Maksimal 3 anggota per tim
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Memiliki MVP atau prototype
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Berdiri maksimal 3 tahun
                            </li>
                        </ul>
                    </div>

                    <!-- Prize Breakdown -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm font-medium mb-3">RINCIAN HADIAH</h3>
                        <div class="space-y-3">
                            <div class="bg-gray-900 rounded-lg p-4 border-l-4 border-red-500">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div class="text-yellow-400 text-2xl">🥇</div>
                                        <h4 class="font-bold text-white">Juara 1</h4>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-red-500">Rp 50.000.000</div>
                                        <div class="text-gray-400 text-sm">+ Incubation Program</div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-900 rounded-lg p-4 border-l-4 border-red-500">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div class="text-gray-300 text-2xl">🥈</div>
                                        <h4 class="font-bold text-white">Juara 2</h4>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-red-500">Rp 30.000.000</div>
                                        <div class="text-gray-400 text-sm">+ Mentorship 6 bulan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button - DIUBAH -->
                    <a href="{{ route('competition.register', ['event_id' => $event_id ?? 'kompetisi-startup-pitch-competition']) }}"
                        class="block w-full py-3 bg-red-600 text-white text-center font-bold rounded-lg hover:bg-red-700 transition-colors duration-300 mb-4">
                        Daftar Kompetisi
                    </a>

                    <!-- Info Tambahan -->
                    <div class="border-t border-gray-700 pt-4">
                        <div class="flex items-center text-sm text-gray-400 mb-2">
                            <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Deadline: <strong>30 November 2023</strong></span>
                        </div>
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Kuota: <strong>200 tim</strong> (142 terdaftar)</span>
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
            // Ticket Selection (jika ada)
            const ticketOptions = document.querySelectorAll('#registration > div.space-y-4 > div');
            if (ticketOptions.length > 0) {
                ticketOptions.forEach(option => {
                    option.addEventListener('click', function() {
                        ticketOptions.forEach(opt => {
                            opt.classList.remove('border-red-600', 'bg-red-600/20');
                            opt.classList.add('border-gray-700');
                        });
                        this.classList.add('border-red-600', 'bg-red-600/20');
                        this.classList.remove('border-gray-700');
                    });
                });
            }
        });
    </script>
@endpush
