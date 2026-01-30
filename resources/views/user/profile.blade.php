@extends('guest.layouts.app')

@section('content')
    <div
        class="min-h-screen bg-gradient-to-b from-gray-50 via-white to-blue-50/30 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="container mx-auto px-4 py-12">
            <!-- Header -->
            <div class="mb-10 animate-fade-in-up">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-3">Profile Saya</h1>
                <p class="text-gray-600 dark:text-gray-300">Kelola informasi profil dan akun Anda</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Profile Info & Stats -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Profile Card -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                        <!-- Avatar & Basic Info -->
                        <div class="text-center mb-6">
                            <div class="relative inline-block">
                                <div
                                    class="w-32 h-32 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 mx-auto mb-4 overflow-hidden border-4 border-white dark:border-gray-800 shadow-lg">
                                    <div
                                        class="w-full h-full flex items-center justify-center text-white text-4xl font-bold">
                                        {{ substr(Auth::user()->name ?? 'John Doe', 0, 1) }}
                                    </div>
                                </div>
                                <button onclick="changeAvatar()"
                                    class="absolute bottom-4 right-4 w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition-colors shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>

                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ Auth::user()->name ?? 'John Doe' }}</h2>
                            <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->email ?? 'john.doe@example.com' }}
                            </p>

                            <div
                                class="inline-flex items-center mt-2 px-3 py-1 rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Verified Member
                            </div>
                        </div>

                        <!-- Membership Info -->
                        <div class="space-y-4 mb-6">
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <div class="font-medium text-gray-900 dark:text-white">Membership</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">Premium Plan</div>
                                    </div>
                                </div>
                                <button onclick="upgradeMembership()"
                                    class="px-3 py-1 text-sm bg-gradient-to-r from-red-600 to-pink-600 text-white rounded-lg hover:from-red-700 hover:to-pink-700 transition-colors">
                                    Upgrade
                                </button>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <div class="font-medium text-gray-900 dark:text-white">Member Since</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">Jan 2023</div>
                                    </div>
                                </div>
                                <span class="text-2xl font-bold text-gray-900 dark:text-white">1+ Year</span>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="grid grid-cols-3 gap-3 mb-6">
                            <div
                                class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 p-4 rounded-xl text-center">
                                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                                    {{ Auth::user()->tickets_count ?? 12 }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Tiket</div>
                            </div>
                            <div
                                class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 p-4 rounded-xl text-center">
                                <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">
                                    {{ Auth::user()->wishlist_count ?? 8 }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Wishlist</div>
                            </div>
                            <div
                                class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 p-4 rounded-xl text-center">
                                <div class="text-2xl font-bold text-green-600 dark:text-green-400">
                                    {{ Auth::user()->points ?? 2450 }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Points</div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <button onclick="showEditProfile()"
                                class="w-full py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98]">
                                Edit Profile
                            </button>
                            <a href="{{ route('now-playing') }}"
                                class="w-full py-3 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:border-blue-500 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-300 text-center block">
                                Lihat Tiket Saya
                            </a>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            Aktivitas Terbaru
                        </h3>

                        <div class="space-y-4">
                            @php
                                $activities = [
                                    [
                                        'icon' => '🎬',
                                        'action' => 'Membeli tiket',
                                        'title' => 'Avengers: Endgame',
                                        'time' => '2 jam lalu',
                                    ],
                                    [
                                        'icon' => '❤️',
                                        'action' => 'Menambahkan ke wishlist',
                                        'title' => 'Spider-Man: No Way Home',
                                        'time' => 'Kemarin',
                                    ],
                                    [
                                        'icon' => '⭐',
                                        'action' => 'Memberi rating',
                                        'title' => 'The Batman',
                                        'time' => '3 hari lalu',
                                    ],
                                    [
                                        'icon' => '📱',
                                        'action' => 'Update profile',
                                        'title' => 'Foto profil diperbarui',
                                        'time' => '1 minggu lalu',
                                    ],
                                ];
                            @endphp

                            @foreach ($activities as $activity)
                                <div
                                    class="flex items-start p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg transition-colors">
                                    <div
                                        class="w-10 h-10 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-lg flex items-center justify-center mr-3">
                                        <span class="text-xl">{{ $activity['icon'] }}</span>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $activity['action'] }}
                                        </div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">{{ $activity['title'] }}</div>
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 text-right">
                                        {{ $activity['time'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column: Profile Settings -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Account Settings -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Pengaturan Akun</h3>
                            <button onclick="showAllSettings()"
                                class="px-4 py-2 text-sm bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                Semua Pengaturan
                            </button>
                        </div>

                        <form id="profile-form" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Personal Information -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Informasi Pribadi
                                </h4>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">
                                            Nama Lengkap <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="name"
                                            value="{{ Auth::user()->name ?? 'John Doe' }}"
                                            class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                            placeholder="Masukkan nama lengkap">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">
                                            Email <span class="text-red-500">*</span>
                                        </label>
                                        <input type="email" name="email"
                                            value="{{ Auth::user()->email ?? 'john.doe@example.com' }}"
                                            class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                            placeholder="email@example.com">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">
                                            Nomor Telepon
                                        </label>
                                        <input type="tel" name="phone"
                                            value="{{ Auth::user()->phone ?? '+62 812-3456-7890' }}"
                                            class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                            placeholder="+62 812-3456-7890">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">
                                            Tanggal Lahir
                                        </label>
                                        <input type="date" name="birth_date"
                                            value="{{ Auth::user()->birth_date ?? '1990-01-01' }}"
                                            class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                    </div>
                                </div>
                            </div>

                            <!-- Security Settings -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Keamanan Akun
                                </h4>

                                <div class="space-y-4">
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div>
                                                <div class="font-medium text-gray-900 dark:text-white">Password</div>
                                                <div class="text-sm text-gray-600 dark:text-gray-400">••••••••</div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="changePassword()"
                                            class="px-4 py-2 text-sm bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors">
                                            Ganti
                                        </button>
                                    </div>

                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                            <div>
                                                <div class="font-medium text-gray-900 dark:text-white">Two-Factor
                                                    Authentication</div>
                                                <div class="text-sm text-gray-600 dark:text-gray-400">Tambahkan keamanan
                                                    ekstra</div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="enable2FA()"
                                            class="px-4 py-2 text-sm bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition-colors">
                                            Aktifkan
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Preferences -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                    Preferensi Notifikasi
                                </h4>

                                <div class="space-y-3">
                                    <label
                                        class="flex items-center justify-between p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg cursor-pointer">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div>
                                                <div class="font-medium text-gray-900 dark:text-white">Email Notification
                                                </div>
                                                <div class="text-sm text-gray-600 dark:text-gray-400">Pembaruan tiket &
                                                    event</div>
                                            </div>
                                        </div>
                                        <input type="checkbox" class="toggle-checkbox" checked>
                                    </label>

                                    <label
                                        class="flex items-center justify-between p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg cursor-pointer">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <div>
                                                <div class="font-medium text-gray-900 dark:text-white">Reminder</div>
                                                <div class="text-sm text-gray-600 dark:text-gray-400">Pengingat sebelum
                                                    film dimulai</div>
                                            </div>
                                        </div>
                                        <input type="checkbox" class="toggle-checkbox" checked>
                                    </label>

                                    <label
                                        class="flex items-center justify-between p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg cursor-pointer">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-yellow-600 mr-3" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <div>
                                                <div class="font-medium text-gray-900 dark:text-white">Promo & Diskon</div>
                                                <div class="text-sm text-gray-600 dark:text-gray-400">Informasi promo
                                                    terbaru</div>
                                            </div>
                                        </div>
                                        <input type="checkbox" class="toggle-checkbox">
                                    </label>
                                </div>
                            </div>

                            <!-- Danger Zone -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.346 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                    Zona Berbahaya
                                </h4>

                                <div class="space-y-3">
                                    <button type="button" onclick="showDeleteModal()"
                                        class="w-full py-3 border-2 border-red-600 text-red-600 font-semibold rounded-xl hover:bg-red-50 dark:hover:bg-red-900/20 transition-all duration-300">
                                        Hapus Akun
                                    </button>

                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="w-full py-3 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:border-red-500 hover:text-red-600 dark:hover:text-red-400 transition-all duration-300 text-center block">
                                        Keluar dari Semua Perangkat
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Recent Tickets -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center justify-between">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm3 1h6v4H7V5zm8 8h-6v-4h6v4zm0 2h-6v4h6v-4zM7 15h2v4H7v-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Tiket Terbaru
                            </span>
                            <a href="{{ route('now-playing') }}"
                                class="text-sm text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                                Lihat Semua
                            </a>
                        </h3>

                        <div class="space-y-4">
                            @php
                                $recentTickets = [
                                    [
                                        'movie' => 'Avengers: Endgame',
                                        'date' => '15 Des 2023',
                                        'time' => '19:45',
                                        'status' => 'active',
                                    ],
                                    [
                                        'movie' => 'The Batman',
                                        'date' => '18 Des 2023',
                                        'time' => '21:00',
                                        'status' => 'active',
                                    ],
                                    [
                                        'movie' => 'Spider-Man: No Way Home',
                                        'date' => '20 Des 2023',
                                        'time' => '20:30',
                                        'status' => 'upcoming',
                                    ],
                                ];
                            @endphp

                            @foreach ($recentTickets as $ticket)
                                <div
                                    class="flex items-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-r from-red-600 to-pink-600 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $ticket['movie'] }}
                                        </div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">{{ $ticket['date'] }} •
                                            {{ $ticket['time'] }}</div>
                                    </div>
                                    <div>
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-medium {{ $ticket['status'] == 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' }}">
                                            {{ $ticket['status'] == 'active' ? 'Aktif' : 'Mendatang' }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="edit-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div
            class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-md w-full mx-4 shadow-2xl transform transition-all duration-300 scale-95">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Edit Profile</h3>
            <div class="space-y-4">
                <input type="text" placeholder="Nama Lengkap"
                    class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="email" placeholder="Email"
                    class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="flex space-x-3 pt-4">
                    <button onclick="closeEditModal()"
                        class="flex-1 py-3 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:border-gray-400 transition-colors">
                        Batal
                    </button>
                    <button onclick="saveProfile()"
                        class="flex-1 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-colors">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-md w-full mx-4 shadow-2xl">
            <div
                class="w-16 h-16 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.346 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 text-center">Hapus Akun?</h3>
            <p class="text-gray-600 dark:text-gray-300 text-center mb-8">
                Semua data termasuk tiket dan wishlist akan dihapus permanen. Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex space-x-3">
                <button onclick="closeDeleteModal()"
                    class="flex-1 py-3 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:border-gray-400 transition-colors">
                    Batal
                </button>
                <button onclick="confirmDeleteAccount()"
                    class="flex-1 py-3 bg-gradient-to-r from-red-600 to-pink-600 text-white font-semibold rounded-xl hover:from-red-700 hover:to-pink-700 transition-colors">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        // Modal Functions
        function showEditProfile() {
            const modal = document.getElementById('edit-modal');
            const content = modal.querySelector('.scale-95');
            modal.classList.remove('hidden');
            setTimeout(() => content.classList.remove('scale-95'), 10);
        }

        function closeEditModal() {
            const modal = document.getElementById('edit-modal');
            const content = modal.querySelector('.scale-95');
            content.classList.add('scale-95');
            setTimeout(() => modal.classList.add('hidden'), 300);
        }

        function showDeleteModal() {
            const modal = document.getElementById('delete-modal');
            modal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
        }

        // Profile Functions
        function changeAvatar() {
            showToast('Fitur upload foto profil akan segera hadir!', 'info');
        }

        function upgradeMembership() {
            showToast('Upgrade membership dalam pengembangan', 'info');
        }

        function changePassword() {
            showToast('Fitur ganti password akan segera hadir!', 'info');
        }

        function enable2FA() {
            showToast('Two-Factor Authentication akan segera hadir!', 'info');
        }

        function showAllSettings() {
            showToast('Semua pengaturan akan segera tersedia!', 'info');
        }

        function saveProfile() {
            // In production, this would submit form via AJAX
            closeEditModal();
            showToast('Profile berhasil diperbarui!', 'success');
        }

        function confirmDeleteAccount() {
            closeDeleteModal();
            showToast('Fitur hapus akun dalam pengembangan', 'warning');
        }

        // Toast Notification
        function showToast(message, type = 'info') {
            const types = {
                success: {
                    icon: '<path fill="currentColor" fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>',
                    color: 'text-green-500'
                },
                error: {
                    icon: '<path fill="currentColor" fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>',
                    color: 'text-red-500'
                },
                warning: {
                    icon: '<path fill="currentColor" fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>',
                    color: 'text-yellow-500'
                },
                info: {
                    icon: '<path fill="currentColor" fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>',
                    color: 'text-blue-500'
                }
            };

            // Create toast element
            const toast = document.createElement('div');
            toast.className =
                'fixed bottom-4 right-4 bg-gray-800 text-white px-6 py-3 rounded-xl shadow-2xl transform translate-x-full transition-transform duration-300 z-50 max-w-sm';
            toast.innerHTML = `
        <div class="flex items-center">
            <svg class="w-6 h-6 mr-3 ${types[type].color}">${types[type].icon}</svg>
            <div>
                <p class="font-medium">${message}</p>
            </div>
        </div>
    `;

            document.body.appendChild(toast);

            // Animate in
            setTimeout(() => toast.classList.remove('translate-x-full'), 10);

            // Remove after 3 seconds
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Toggle switch styling
        document.addEventListener('DOMContentLoaded', function() {
            const toggleCheckboxes = document.querySelectorAll('.toggle-checkbox');

            toggleCheckboxes.forEach(checkbox => {
                // Add custom styling
                const parent = checkbox.parentElement;
                const toggleSwitch = document.createElement('div');
                toggleSwitch.className =
                    'relative w-12 h-6 bg-gray-300 dark:bg-gray-600 rounded-full cursor-pointer transition-colors';
                toggleSwitch.innerHTML = `
            <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full transition-transform"></div>
        `;

                checkbox.classList.add('hidden');
                parent.appendChild(toggleSwitch);

                // Update initial state
                if (checkbox.checked) {
                    toggleSwitch.classList.add('bg-green-500', 'dark:bg-green-600');
                    toggleSwitch.querySelector('div').style.transform = 'translateX(24px)';
                }

                // Toggle on click
                toggleSwitch.addEventListener('click', () => {
                    checkbox.checked = !checkbox.checked;
                    if (checkbox.checked) {
                        toggleSwitch.classList.remove('bg-gray-300', 'dark:bg-gray-600');
                        toggleSwitch.classList.add('bg-green-500', 'dark:bg-green-600');
                        toggleSwitch.querySelector('div').style.transform = 'translateX(24px)';
                    } else {
                        toggleSwitch.classList.remove('bg-green-500', 'dark:bg-green-600');
                        toggleSwitch.classList.add('bg-gray-300', 'dark:bg-gray-600');
                        toggleSwitch.querySelector('div').style.transform = 'translateX(0)';
                    }
                });
            });
        });
    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Custom toggle switch */
        .toggle-checkbox:checked+div {
            background-color: #10b981;
        }

        .toggle-checkbox:checked+div>div {
            transform: translateX(24px);
        }

        /* Avatar gradient animation */
        @keyframes gradientShift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .w-32.h-32 {
            background-size: 200% 200%;
            animation: gradientShift 3s ease infinite;
        }

        /* Glass morphism effects */
        .backdrop-blur-sm {
            backdrop-filter: blur(8px);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }

        .dark ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #2563eb, #7c3aed);
        }

        /* Smooth transitions */
        * {
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
        }
    </style>
@endsection
