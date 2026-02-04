<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Dashboard Admin</h1>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Users Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Total Pengguna</p>
                            <p class="text-2xl font-bold">{{ $totalUser }}</p>
                        </div>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <i class="fas fa-shopping-cart text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Total Pesanan</p>
                            <p class="text-2xl font-bold">{{ $totalOrder }}</p>
                            <div class="flex space-x-4 mt-2">
                                <span class="text-sm text-green-600">{{ $orderPaid }} Paid</span>
                                <span class="text-sm text-yellow-600">{{ $orderPending }} Pending</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Events Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                            <i class="fas fa-calendar-alt text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Total Event</p>
                            <p class="text-2xl font-bold">{{ $totalEvents }}</p>
                            <p class="text-sm text-green-600 mt-1">{{ $activeEvents }} Active</p>
                        </div>
                    </div>
                </div>

                <!-- Banners Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 text-red-600">
                            <i class="fas fa-images text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Total Banner</p>
                            <p class="text-2xl font-bold">{{ $totalBanners }}</p>
                            <p class="text-sm text-green-600 mt-1">{{ $activeBanners }} Active</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Recent Events -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Event Terbaru</h2>
                        <a href="{{ route('admin.events.index') }}" class="text-sm text-red-600 hover:text-red-800">
                            Lihat Semua →
                        </a>
                    </div>
                    <div class="space-y-4">
                        @forelse($recentEvents as $event)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <img src="{{ $event->image_url }}" alt="{{ $event->title }}"
                                        class="w-10 h-14 object-cover rounded">
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">{{ Str::limit($event->title, 30) }}</p>
                                        <p class="text-sm text-gray-500">{{ $event->event_date->format('d M Y') }}</p>
                                    </div>
                                </div>
                                <span
                                    class="text-xs px-2 py-1 rounded-full {{ $event->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $event->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada event</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Pesanan Terbaru</h2>
                        <a href="{{ route('admin.orders.index') }}" class="text-sm text-red-600 hover:text-red-800">
                            Lihat Semua →
                        </a>
                    </div>
                    <div class="space-y-4">
                        @forelse($recentOrders as $order)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium text-gray-900">Order #{{ $order->id }}</p>
                                    <p class="text-sm text-gray-500">{{ $order->user->name ?? 'Guest' }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-medium text-gray-900">Rp
                                        {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                                    <span
                                        class="text-xs px-2 py-1 rounded-full 
                            {{ $order->status == 'paid'
                                ? 'bg-green-100 text-green-800'
                                : ($order->status == 'pending'
                                    ? 'bg-yellow-100 text-yellow-800'
                                    : 'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada pesanan</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('admin.banners.index') }}"
                        class="flex items-center p-4 bg-red-50 hover:bg-red-100 rounded-lg transition">
                        <div class="p-3 rounded-full bg-red-100 text-red-600">
                            <i class="fas fa-images"></i>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">Kelola Banner</p>
                            <p class="text-sm text-gray-600">Tambah/edit banner homepage</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.events.index') }}"
                        class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">Kelola Event</p>
                            <p class="text-sm text-gray-600">Tambah/edit event/film</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.promos.index') }}"
                        class="flex items-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <i class="fas fa-percent"></i>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">Kelola Promo</p>
                            <p class="text-sm text-gray-600">Buat/edit promo & diskon</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endsection
    </x-app-layout>
