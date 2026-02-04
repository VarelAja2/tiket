<aside class="w-64 bg-gray-900 text-white min-h-screen fixed left-0 top-0 pt-16">
    <div class="p-4">
        <nav class="mt-6">
            <div class="space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Banner Management -->
                <a href="{{ route('admin.banners.index') }}"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg {{ request()->routeIs('admin.banners.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-images mr-3"></i>
                    <span>Banner</span>
                </a>

                <!-- Event Management -->
                <a href="{{ route('admin.events.index') }}"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg {{ request()->routeIs('admin.events.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    <span>Event</span>
                </a>

                <!-- Category Management -->
                <a href="{{ route('admin.categories.index') }}"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg {{ request()->routeIs('admin.categories.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-tags mr-3"></i>
                    <span>Kategori</span>
                </a>

                <!-- Promo Management -->
                <a href="{{ route('admin.promos.index') }}"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg {{ request()->routeIs('admin.promos.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-percent mr-3"></i>
                    <span>Promo</span>
                </a>

                <!-- Cinema Management -->
                <a href="{{ route('admin.cinemas.index') }}"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg {{ request()->routeIs('admin.cinemas.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-film mr-3"></i>
                    <span>Bioskop</span>
                </a>

                <!-- User Management -->
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-users mr-3"></i>
                    <span>Pengguna</span>
                </a>

                <!-- Booking Management -->
                <a href="{{ route('admin.bookings.index') }}"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg {{ request()->routeIs('admin.bookings.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-ticket-alt mr-3"></i>
                    <span>Booking</span>
                </a>

                <!-- Back to Site -->
                <a href="{{ route('home') }}" target="_blank"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg mt-8 border-t border-gray-700 pt-4">
                    <i class="fas fa-external-link-alt mr-3"></i>
                    <span>Lihat Website</span>
                </a>
            </div>
        </nav>
    </div>
</aside>
