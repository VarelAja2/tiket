<nav
    class="bg-gradient-to-r from-white via-gray-50 to-white shadow-xl border-b border-gray-200 sticky top-0 backdrop-blur-md bg-white/90">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Left Section -->
            <div class="flex items-center">
                <!-- Quick Stats (Desktop Only) -->
                <div class="hidden lg:flex items-center space-x-6 ml-48">
                    <div class="flex items-center space-x-2 px-3 py-1.5 rounded-lg bg-gray-50 border border-gray-200">
                        <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                        <span class="text-sm font-medium text-gray-700">System Online</span>
                    </div>
                    @php
                        $todayBookings = App\Models\Booking::whereDate('created_at', today())->count();
                        $pendingCount = App\Models\Booking::where('status', 'pending')->count();
                    @endphp
                    <div class="relative group">
                        <div
                            class="flex items-center space-x-2 px-3 py-1.5 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-ticket-alt text-blue-600"></i>
                            <span class="text-sm font-semibold text-gray-800">{{ $todayBookings }}</span>
                            <span class="text-xs text-gray-600">Today</span>
                            @if ($pendingCount > 0)
                                <span
                                    class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center animate-bounce">
                                    {{ $pendingCount }}
                                </span>
                            @endif
                        </div>
                        <div
                            class="absolute hidden group-hover:block w-48 mt-2 bg-white rounded-xl shadow-xl border border-gray-200 p-4 z-50">
                            <div class="space-y-2">
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-gray-600">Pending</span>
                                    <span class="text-sm font-bold text-red-600">{{ $pendingCount }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-gray-600">Today's Total</span>
                                    <span class="text-sm font-bold text-gray-800">{{ $todayBookings }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="flex items-center space-x-6">
                <!-- Notifications -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="relative p-2 rounded-xl hover:bg-gray-100 transition-colors group">
                        <div class="w-8 h-8 flex items-center justify-center">
                            <i class="fas fa-bell text-gray-600 text-lg group-hover:text-gray-800"></i>
                        </div>
                        <span
                            class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center animate-pulse">
                            3
                        </span>
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-red-500/10 to-pink-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </button>

                    <!-- Notifications Dropdown -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-3 w-80 bg-white rounded-2xl shadow-2xl border border-gray-200 py-3 z-50 overflow-hidden">
                        <!-- Header -->
                        <div class="px-4 pb-3 border-b border-gray-100">
                            <div class="flex justify-between items-center">
                                <h3 class="font-bold text-gray-800">Notifications</h3>
                                <button class="text-xs text-blue-600 hover:text-blue-800 font-medium">
                                    Mark all as read
                                </button>
                            </div>
                        </div>

                        <!-- Notification Items -->
                        <div class="max-h-96 overflow-y-auto">
                            <!-- Notification 1 -->
                            <a href="#"
                                class="flex items-start px-4 py-3 hover:bg-gray-50 border-b border-gray-100">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-calendar-check text-blue-600"></i>
                                    </div>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-800">New event created</p>
                                    <p class="text-xs text-gray-600 mt-0.5">"Summer Festival 2024" is now live</p>
                                    <p class="text-xs text-gray-500 mt-1">2 minutes ago</p>
                                </div>
                                <div class="w-2 h-2 rounded-full bg-blue-500 mt-2"></div>
                            </a>

                            <!-- Notification 2 -->
                            <a href="#"
                                class="flex items-start px-4 py-3 hover:bg-gray-50 border-b border-gray-100">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-ticket-alt text-green-600"></i>
                                    </div>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-800">New booking</p>
                                    <p class="text-xs text-gray-600 mt-0.5">5 tickets purchased for concert</p>
                                    <p class="text-xs text-gray-500 mt-1">15 minutes ago</p>
                                </div>
                                <div class="w-2 h-2 rounded-full bg-green-500 mt-2"></div>
                            </a>

                            <!-- Notification 3 -->
                            <a href="#" class="flex items-start px-4 py-3 hover:bg-gray-50">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                        <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                                    </div>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-800">System Alert</p>
                                    <p class="text-xs text-gray-600 mt-0.5">Storage usage at 85%</p>
                                    <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
                                </div>
                                <div class="w-2 h-2 rounded-full bg-yellow-500 mt-2"></div>
                            </a>
                        </div>

                        <!-- Footer -->
                        <div class="px-4 pt-3 border-t border-gray-100">
                            <a href="#"
                                class="block text-center text-sm font-medium text-blue-600 hover:text-blue-800 py-2">
                                View all notifications
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Search -->
                <div class="hidden md:block relative">
                    <div class="relative">
                        <input type="text" placeholder="Search..."
                            class="w-48 lg:w-64 pl-10 pr-4 py-2.5 rounded-xl border border-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-sm">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <kbd class="px-1.5 py-0.5 text-xs bg-gray-200 text-gray-600 rounded">⌘K</kbd>
                        </div>
                    </div>
                </div>

                <!-- User Profile -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center space-x-3 px-4 py-2 rounded-xl hover:bg-gray-100 transition-all duration-300 group">
                        <!-- Avatar -->
                        <div class="relative">
                            <div
                                class="w-10 h-10 rounded-xl bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center shadow-lg overflow-hidden">
                                @if (Auth::user()->profile_photo_path)
                                    <img src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <i class="fas fa-user text-white"></i>
                                @endif
                            </div>
                            <!-- Online Indicator -->
                            <div
                                class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 border-white">
                            </div>
                        </div>

                        <!-- User Info -->
                        <div class="hidden lg:block text-left">
                            <div class="flex items-center space-x-2">
                                <span class="font-bold text-gray-800 text-sm">{{ Auth::user()->name }}</span>
                                <i
                                    class="fas fa-chevron-down text-xs text-gray-500 transition-transform duration-300 transform group-hover:rotate-180"></i>
                            </div>
                            <span class="text-xs text-gray-600">{{ Auth::user()->email }}</span>
                        </div>

                        <!-- Active Glow Effect -->
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-3 w-64 bg-white rounded-2xl shadow-2xl border border-gray-200 py-3 z-50 overflow-hidden">
                        <!-- Header -->
                        <div class="px-4 pb-4 border-b border-gray-100">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-12 h-12 rounded-xl bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                                    @if (Auth::user()->profile_photo_path)
                                        <img src="{{ Auth::user()->profile_photo_path }}"
                                            alt="{{ Auth::user()->name }}"
                                            class="w-full h-full object-cover rounded-xl">
                                    @else
                                        <i class="fas fa-user text-white text-xl"></i>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800">{{ Auth::user()->name }}</h3>
                                    <p class="text-xs text-gray-600">{{ Auth::user()->email }}</p>
                                    <span
                                        class="inline-block mt-1 px-2 py-0.5 text-xs bg-gradient-to-r from-blue-100 to-blue-50 text-blue-700 rounded-full font-medium">
                                        {{ ucfirst(Auth::user()->role) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Menu Items -->
                        <div class="py-2">
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors group">
                                <div
                                    class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-blue-100 transition-colors">
                                    <i class="fas fa-user-cog text-gray-600 group-hover:text-blue-600"></i>
                                </div>
                                <span class="font-medium">Profile Settings</span>
                            </a>

                            <a href="#"
                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors group">
                                <div
                                    class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-green-100 transition-colors">
                                    <i class="fas fa-cog text-gray-600 group-hover:text-green-600"></i>
                                </div>
                                <span class="font-medium">Preferences</span>
                            </a>

                            <a href="#"
                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors group">
                                <div
                                    class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-purple-100 transition-colors">
                                    <i class="fas fa-question-circle text-gray-600 group-hover:text-purple-600"></i>
                                </div>
                                <span class="font-medium">Help & Support</span>
                            </a>
                        </div>

                        <!-- Logout -->
                        <div class="pt-2 border-t border-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors group">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors">
                                        <i class="fas fa-sign-out-alt text-red-600"></i>
                                    </div>
                                    <span class="font-medium">Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Search Bar (Hidden on Desktop) -->
<div class="md:hidden bg-gray-50 border-b border-gray-200 px-4 py-3">
    <div class="relative">
        <input type="text" placeholder="Search..."
            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-sm">
        <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
            <i class="fas fa-search text-gray-400"></i>
        </div>
    </div>
</div>

<style>
    /* Custom animations */
    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-3px);
        }
    }

    .animate-bounce {
        animation: bounce 2s infinite;
    }

    /* Smooth scrolling for dropdown */
    .max-h-96 {
        max-height: 24rem;
    }

    /* Gradient border effect */
    .border-gradient {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
            linear-gradient(to right, #3b82f6, #8b5cf6) border-box;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

<script>
    // Search shortcut (Cmd/Ctrl + K)
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[placeholder="Search..."]');

        document.addEventListener('keydown', function(e) {
            if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                e.preventDefault();
                if (searchInput) {
                    searchInput.focus();
                }
            }

            // Escape to close dropdowns
            if (e.key === 'Escape') {
                const dropdowns = document.querySelectorAll('[x-data*="open"]');
                dropdowns.forEach(dropdown => {
                    dropdown.__x.$data.open = false;
                });
            }
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('[x-data*="open"]')) {
                const dropdowns = document.querySelectorAll('[x-data*="open"]');
                dropdowns.forEach(dropdown => {
                    if (dropdown.__x && dropdown.__x.$data) {
                        dropdown.__x.$data.open = false;
                    }
                });
            }
        });

        // Mark notifications as read on click
        const notificationItems = document.querySelectorAll('[href="#"]');
        notificationItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const indicator = this.querySelector('.w-2.h-2');
                if (indicator) {
                    indicator.classList.add('opacity-0');
                }
            });
        });
    });
</script>
