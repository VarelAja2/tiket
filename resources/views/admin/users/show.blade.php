@extends('layouts.app')

@section('title', 'Detail Pengguna: ' . $user->name)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Pengguna</h1>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
                <a href="{{ route('admin.users.edit', $user) }}"
                    class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column: User Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- User Profile -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Profil Pengguna</h2>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mr-6">
                            <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center">
                                @if ($user->profile_photo_path)
                                    <img class="h-24 w-24 rounded-full" src="{{ $user->profile_photo_url }}"
                                        alt="{{ $user->name }}">
                                @else
                                    <i class="fas fa-user text-gray-400 text-4xl"></i>
                                @endif
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Nama Lengkap</p>
                                    <p class="font-medium">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Email</p>
                                    <p class="font-medium">{{ $user->email }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Telepon</p>
                                    <p class="font-medium">{{ $user->phone ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Role</p>
                                    <span
                                        class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $user->role == 'admin' ? 'Admin' : 'Customer' }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Status Akun</p>
                                    <span
                                        class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Verifikasi Email</p>
                                    @if ($user->email_verified_at)
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i>Terverifikasi
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i>Belum Verifikasi
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm text-gray-600">Tanggal Registrasi</p>
                                <p class="font-medium">{{ $user->created_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Booking Terbaru</h2>
                        <span class="text-sm text-gray-600">Total: {{ $user->bookings->count() }} booking</span>
                    </div>

                    <div class="space-y-4">
                        @forelse($user->bookings->take(5) as $booking)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-medium text-gray-900">Booking #{{ $booking->booking_code }}</p>
                                        <p class="text-sm text-gray-600">
                                            {{ $booking->event->title ?? 'Event tidak ditemukan' }}</p>
                                        <p class="text-sm text-gray-500">{{ $booking->created_at->format('d M Y H:i') }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium text-gray-900">Rp
                                            {{ number_format($booking->total_amount, 0, ',', '.') }}</p>
                                        <span
                                            class="px-2 py-1 text-xs rounded-full 
                                    {{ $booking->status == 'confirmed'
                                        ? 'bg-green-100 text-green-800'
                                        : ($booking->status == 'pending'
                                            ? 'bg-yellow-100 text-yellow-800'
                                            : 'bg-red-100 text-red-800') }}">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada booking</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Right Column: Stats & Actions -->
            <div class="space-y-6">
                <!-- Statistics -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Statistik</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Booking</span>
                            <span class="font-bold">{{ $user->bookings->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Tiket</span>
                            <span class="font-bold">{{ $user->tickets->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Pembelian</span>
                            <span class="font-bold">Rp
                                {{ number_format($user->bookings->sum('total_amount'), 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Booking Sukses</span>
                            <span class="font-bold">{{ $user->bookings->where('status', 'confirmed')->count() }}</span>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Aksi</h2>
                    <div class="space-y-3">
                        <form action="{{ route('admin.users.toggle-status', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="w-full px-4 py-2 {{ $user->is_active ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }} text-white rounded-lg"
                                {{ $user->id === auth()->id() && $user->is_active ? 'disabled' : '' }}>
                                {{ $user->is_active ? 'Nonaktifkan Akun' : 'Aktifkan Akun' }}
                            </button>
                        </form>

                        @if (!$user->email_verified_at)
                            <form action="{{ route('admin.users.verify-email', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                                    Verifikasi Email
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg"
                                {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                Hapus Pengguna
                            </button>
                        </form>
                    </div>
                </div>

                <!-- User Timeline -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas</h2>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-user-plus text-blue-600 text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Registrasi Akun</p>
                                <p class="text-sm text-gray-500">{{ $user->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        @if ($user->email_verified_at)
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-check-circle text-green-600 text-sm"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Email Diverifikasi</p>
                                    <p class="text-sm text-gray-500">{{ $user->email_verified_at->format('d M Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if ($user->bookings->isNotEmpty())
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center">
                                        <i class="fas fa-shopping-cart text-purple-600 text-sm"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Booking Pertama</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $user->bookings->first()->created_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
