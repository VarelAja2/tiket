<aside
    class="w-64 bg-gradient-to-b from-white to-gray-50 text-gray-900 h-screen fixed left-0 top-0 z-50 pt-2 border-r border-gray-200 shadow-xl overflow-y-auto">
    <!-- Logo/Header Sidebar -->
    <div class="p-6 border-b border-gray-200 bg-white">
        <div class="flex items-center space-x-3">
            <div
                class="w-10 h-10 bg-gradient-to-r from-gray-700 to-gray-900 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fa-solid fa-user-tie text-white text-lg"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold bg-gradient-to-r from-gray-800 to-gray-900 bg-clip-text text-transparent">
                    Admin Panel</h2>
                <p class="text-xs text-gray-600">Event Management System</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <div class="p-4">
        <nav class="space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-gray-100 hover:to-gray-200 hover:border-l-4 hover:border-gray-700 hover:pl-3 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-gray-100 to-gray-200 border-l-4 border-gray-700 pl-3 shadow-inner' : '' }}">
                <div class="relative">
                    <div
                        class="w-10 h-10 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i
                            class="fas fa-tachometer-alt text-lg {{ request()->routeIs('admin.dashboard') ? 'text-gray-800' : 'text-gray-600' }}"></i>
                    </div>
                    @if (request()->routeIs('admin.dashboard'))
                        <div class="absolute -top-1 -right-1 w-2 h-2 bg-gray-700 rounded-full animate-pulse"></div>
                    @endif
                </div>
                <div class="ml-3 flex-1">
                    <span
                        class="font-medium group-hover:text-gray-900 {{ request()->routeIs('admin.dashboard') ? 'text-gray-900 font-semibold' : 'text-gray-800' }}">Dashboard</span>
                    <p class="text-xs text-gray-600 group-hover:text-gray-700 hidden md:block">Overview & Analytics</p>
                </div>
                <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-gray-800"></i>
            </a>

            <!-- Event Management -->
            <a href="{{ route('admin.events.index') }}"
                class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-gray-100 hover:to-gray-200 hover:border-l-4 hover:border-gray-700 hover:pl-3 {{ request()->routeIs('admin.events.*') ? 'bg-gradient-to-r from-gray-100 to-gray-200 border-l-4 border-gray-700 pl-3 shadow-inner' : '' }}">
                <div class="relative">
                    <div
                        class="w-10 h-10 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i
                            class="fas fa-calendar-alt text-lg {{ request()->routeIs('admin.events.*') ? 'text-gray-800' : 'text-gray-600' }}"></i>
                    </div>
                    @php
                        $totalEvents = App\Models\Event::count();
                    @endphp
                    @if ($totalEvents > 0)
                        <span
                            class="absolute -top-2 -right-2 bg-gray-800 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                            {{ $totalEvents }}
                        </span>
                    @endif
                </div>
                <div class="ml-3 flex-1">
                    <span
                        class="font-medium group-hover:text-gray-900 {{ request()->routeIs('admin.events.*') ? 'text-gray-900 font-semibold' : 'text-gray-800' }}">Events</span>
                    <p class="text-xs text-gray-600 group-hover:text-gray-700 hidden md:block">Manage all events</p>
                </div>
                <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-gray-800"></i>
            </a>

            <!-- Category Management -->
            <a href="{{ route('admin.categories.index') }}"
                class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-gray-100 hover:to-gray-200 hover:border-l-4 hover:border-gray-700 hover:pl-3 {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-gray-100 to-gray-200 border-l-4 border-gray-700 pl-3 shadow-inner' : '' }}">
                <div
                    class="w-10 h-10 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i
                        class="fas fa-tags text-lg {{ request()->routeIs('admin.categories.*') ? 'text-gray-800' : 'text-gray-600' }}"></i>
                </div>
                <div class="ml-3 flex-1">
                    <span
                        class="font-medium group-hover:text-gray-900 {{ request()->routeIs('admin.categories.*') ? 'text-gray-900 font-semibold' : 'text-gray-800' }}">Categories</span>
                    <p class="text-xs text-gray-600 group-hover:text-gray-700 hidden md:block">Event categories</p>
                </div>
                <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-gray-800"></i>
            </a>

            <!-- Banner Management -->
            <a href="{{ route('admin.banners.index') }}"
                class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-gray-100 hover:to-gray-200 hover:border-l-4 hover:border-gray-700 hover:pl-3 {{ request()->routeIs('admin.banners.*') ? 'bg-gradient-to-r from-gray-100 to-gray-200 border-l-4 border-gray-700 pl-3 shadow-inner' : '' }}">
                <div
                    class="w-10 h-10 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i
                        class="fas fa-images text-lg {{ request()->routeIs('admin.banners.*') ? 'text-gray-800' : 'text-gray-600' }}"></i>
                </div>
                <div class="ml-3 flex-1">
                    <span
                        class="font-medium group-hover:text-gray-900 {{ request()->routeIs('admin.banners.*') ? 'text-gray-900 font-semibold' : 'text-gray-800' }}">Banners</span>
                    <p class="text-xs text-gray-600 group-hover:text-gray-700 hidden md:block">Homepage banners</p>
                </div>
                <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-gray-800"></i>
            </a>

            <!-- Booking Management -->
            <a href="{{ route('admin.bookings.index') }}"
                class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-gray-100 hover:to-gray-200 hover:border-l-4 hover:border-gray-700 hover:pl-3 {{ request()->routeIs('admin.bookings.*') ? 'bg-gradient-to-r from-gray-100 to-gray-200 border-l-4 border-gray-700 pl-3 shadow-inner' : '' }}">
                <div class="relative">
                    <div
                        class="w-10 h-10 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i
                            class="fas fa-ticket-alt text-lg {{ request()->routeIs('admin.bookings.*') ? 'text-gray-800' : 'text-gray-600' }}"></i>
                    </div>
                    @php
                        $pendingBookings = App\Models\Booking::where('status', 'pending')->count();
                    @endphp
                    @if ($pendingBookings > 0)
                        <span
                            class="absolute -top-2 -right-2 bg-gray-800 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center animate-pulse">
                            {{ $pendingBookings }}
                        </span>
                    @endif
                </div>
                <div class="ml-3 flex-1">
                    <span
                        class="font-medium group-hover:text-gray-900 {{ request()->routeIs('admin.bookings.*') ? 'text-gray-900 font-semibold' : 'text-gray-800' }}">Bookings</span>
                    <p class="text-xs text-gray-600 group-hover:text-gray-700 hidden md:block">Ticket orders</p>
                </div>
                <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-gray-800"></i>
            </a>

            <!-- User Management -->
            <a href="{{ route('admin.users.index') }}"
                class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-gray-100 hover:to-gray-200 hover:border-l-4 hover:border-gray-700 hover:pl-3 {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-gray-100 to-gray-200 border-l-4 border-gray-700 pl-3 shadow-inner' : '' }}">
                <div
                    class="w-10 h-10 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i
                        class="fas fa-users text-lg {{ request()->routeIs('admin.users.*') ? 'text-gray-800' : 'text-gray-600' }}"></i>
                </div>
                <div class="ml-3 flex-1">
                    <span
                        class="font-medium group-hover:text-gray-900 {{ request()->routeIs('admin.users.*') ? 'text-gray-900 font-semibold' : 'text-gray-800' }}">Users</span>
                    <p class="text-xs text-gray-600 group-hover:text-gray-700 hidden md:block">User accounts</p>
                </div>
                <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-gray-800"></i>
            </a>

            <!-- Cinema Management -->
            <a href="{{ route('admin.cinemas.index') }}"
                class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-gray-100 hover:to-gray-200 hover:border-l-4 hover:border-gray-700 hover:pl-3 {{ request()->routeIs('admin.cinemas.*') ? 'bg-gradient-to-r from-gray-100 to-gray-200 border-l-4 border-gray-700 pl-3 shadow-inner' : '' }}">
                <div
                    class="w-10 h-10 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i
                        class="fas fa-film text-lg {{ request()->routeIs('admin.cinemas.*') ? 'text-gray-800' : 'text-gray-600' }}"></i>
                </div>
                <div class="ml-3 flex-1">
                    <span
                        class="font-medium group-hover:text-gray-900 {{ request()->routeIs('admin.cinemas.*') ? 'text-gray-900 font-semibold' : 'text-gray-800' }}">Cinemas</span>
                    <p class="text-xs text-gray-600 group-hover:text-gray-700 hidden md:block">Manage cinemas</p>
                </div>
                <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-gray-800"></i>
            </a>

            <!-- Separator -->
            <div class="pt-6 border-t border-gray-300">
                <div class="px-4 mb-2">
                    <span class="text-xs font-semibold text-gray-700 uppercase tracking-wider">Settings</span>
                </div>
            </div>

            <!-- Settings -->
            <a href="#"
                class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-gray-100 hover:to-gray-200 hover:border-l-4 hover:border-gray-700 hover:pl-3">
                <div
                    class="w-10 h-10 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-cog text-gray-600 text-lg"></i>
                </div>
                <div class="ml-3 flex-1">
                    <span class="font-medium text-gray-800 group-hover:text-gray-900">Settings</span>
                    <p class="text-xs text-gray-600 group-hover:text-gray-700 hidden md:block">System settings</p>
                </div>
                <i class="fas fa-chevron-right text-xs text-gray-500"></i>
            </a>

            <!-- Reports -->
            <a href="#"
                class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-gray-100 hover:to-gray-200 hover:border-l-4 hover:border-gray-700 hover:pl-3">
                <div
                    class="w-10 h-10 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-chart-bar text-gray-600 text-lg"></i>
                </div>
                <div class="ml-3 flex-1">
                    <span class="font-medium text-gray-800 group-hover:text-gray-900">Reports</span>
                    <p class="text-xs text-gray-600 group-hover:text-gray-700 hidden md:block">Analytics & reports</p>
                </div>
                <i class="fas fa-chevron-right text-xs text-gray-500"></i>
            </a>

            <!-- Audit Log -->
            <a href="#"
                class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-gray-100 hover:to-gray-200 hover:border-l-4 hover:border-gray-700 hover:pl-3">
                <div
                    class="w-10 h-10 rounded-lg bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-history text-gray-600 text-lg"></i>
                </div>
                <div class="ml-3 flex-1">
                    <span class="font-medium text-gray-800 group-hover:text-gray-900">Audit Log</span>
                    <p class="text-xs text-gray-600 group-hover:text-gray-700 hidden md:block">Activity history</p>
                </div>
                <i class="fas fa-chevron-right text-xs text-gray-500"></i>
            </a>
        </nav>
    </div>

    <!-- Bottom Actions -->
    <div
        class="sticky bottom-0 left-0 right-0 p-4 border-t border-gray-300 bg-gradient-to-t from-white to-gray-50/95 backdrop-blur-sm">
        <!-- View Website -->
        <a href="{{ route('home') }}" target="_blank"
            class="group flex items-center justify-between px-4 py-3 bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl hover:from-gray-200 hover:to-gray-300 transition-all duration-300 border border-gray-300 hover:border-gray-400 mb-3">
            <div class="flex items-center">
                <div
                    class="w-8 h-8 rounded-lg bg-gradient-to-r from-gray-700 to-gray-900 flex items-center justify-center group-hover:scale-110 transition-transform mr-3">
                    <i class="fas fa-external-link-alt text-white text-sm"></i>
                </div>
                <div>
                    <span class="font-medium text-gray-900">View Website</span>
                    <p class="text-xs text-gray-700">Live preview</p>
                </div>
            </div>
            <i
                class="fas fa-arrow-up-right-from-square text-gray-700 group-hover:translate-x-1 transition-transform"></i>
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-between px-4 py-3 bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl hover:from-gray-200 hover:to-gray-300 transition-all duration-300 border border-gray-300 hover:border-gray-400 group">
                <div class="flex items-center">
                    <div
                        class="w-8 h-8 rounded-lg bg-gradient-to-r from-gray-700 to-gray-900 flex items-center justify-center group-hover:scale-110 transition-transform mr-3">
                        <i class="fas fa-sign-out-alt text-white text-sm"></i>
                    </div>
                    <div>
                        <span class="font-medium text-gray-900">Logout</span>
                        <p class="text-xs text-gray-700">Secure logout</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-700 group-hover:translate-x-1 transition-transform"></i>
            </button>
        </form>
    </div>
</aside>

<!-- Mobile Overlay -->
<div class="fixed inset-0 bg-black/30 z-40 hidden" id="sidebarOverlay"></div>

<style>
    /* Custom scrollbar untuk tema terang */
    aside {
        scrollbar-width: thin;
        scrollbar-color: rgba(107, 114, 128, 0.5) rgba(0, 0, 0, 0.05);
    }

    aside::-webkit-scrollbar {
        width: 6px;
    }

    aside::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.05);
        border-radius: 10px;
    }

    aside::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #6b7280, #374151);
        border-radius: 10px;
    }

    aside::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #4b5563, #1f2937);
    }

    /* Smooth animations */
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.7;
        }
    }

    /* Glow effect for active items */
    .shadow-inner {
        box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.05);
    }

    /* Fix untuk sticky bottom */
    .sticky {
        position: sticky;
        z-index: 10;
    }

    /* Hover effects */
    .group:hover .group-hover\:scale-110 {
        transform: scale(1.1);
    }

    .group:hover .group-hover\:translate-x-1 {
        transform: translateX(0.25rem);
    }

    /* Active menu item styling */
    .active-menu {
        background: linear-gradient(to right, #f3f4f6, #e5e7eb);
        border-left: 4px solid #374151;
        padding-left: 12px;
    }
</style>

<script>
    // Toggle sidebar on mobile
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('aside');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
                sidebarOverlay.classList.toggle('hidden');
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            });
        }

        // Close sidebar when clicking on a link (mobile)
        const sidebarLinks = document.querySelectorAll('aside a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 768) {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                }
            });
        });

        // Highlight current active menu
        const currentPath = window.location.pathname;
        const menuLinks = document.querySelectorAll('aside a[href]');

        menuLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href === currentPath || currentPath.startsWith(href + '/')) {
                link.classList.add('active-menu');
            }
        });
    });
</script>