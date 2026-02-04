@extends('layouts.app') <!-- PASTIKAN INI -->

@section('title', 'Kelola Promo')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Kelola Promo</h1>
            <a href="{{ route('admin.promos.create') }}"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Promo
            </a>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-tags text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total Promo</p>
                        <p class="text-2xl font-bold">{{ $totalPromos ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Promo Aktif</p>
                        <p class="text-2xl font-bold">{{ $activePromos ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-600">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Promo Kadaluarsa</p>
                        <p class="text-2xl font-bold">{{ $expiredPromos ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white shadow rounded-lg p-4 mb-6">
            <form action="{{ route('admin.promos.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari promo/kode..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <div>
                    <select name="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="">Semua Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Kadaluarsa</option>
                        <option value="upcoming" {{ request('status') == 'upcoming' ? 'selected' : '' }}>Mendatang</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div>
                    <select name="type"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="">Semua Tipe</option>
                        <option value="percentage" {{ request('type') == 'percentage' ? 'selected' : '' }}>Diskon Persen
                        </option>
                        <option value="fixed_amount" {{ request('type') == 'fixed_amount' ? 'selected' : '' }}>Potongan
                            Harga</option>
                        <option value="free_ticket" {{ request('type') == 'free_ticket' ? 'selected' : '' }}>Tiket Gratis
                        </option>
                        <option value="buy_one_get_one" {{ request('type') == 'buy_one_get_one' ? 'selected' : '' }}>Buy 1
                            Get 1</option>
                    </select>
                </div>

                <div class="flex space-x-2">
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 flex-1">
                        Filter
                    </button>
                    <a href="{{ route('admin.promos.index') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Promo
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Diskon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Periode</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kuota
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($promos as $promo)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if ($promo->image_url)
                                            <img src="{{ $promo->image_url }}" alt="{{ $promo->title }}"
                                                class="w-16 h-12 object-cover rounded mr-3">
                                        @else
                                            <div
                                                class="w-16 h-12 bg-gray-200 rounded flex items-center justify-center mr-3">
                                                <i class="fas fa-tag text-gray-400"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-medium text-gray-900">{{ $promo->title }}</div>
                                            <div class="text-sm text-gray-500">
                                                {{ Str::limit($promo->short_description ?? $promo->description, 50) }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <code class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-sm font-mono">
                                        {{ $promo->promo_code }}
                                    </code>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if ($promo->type == 'percentage')
                                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-sm">
                                                {{ $promo->discount_value }}% OFF
                                            </span>
                                        @elseif($promo->type == 'fixed_amount')
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-sm">
                                                Rp {{ number_format($promo->discount_value, 0, ',', '.') }}
                                            </span>
                                        @elseif($promo->type == 'free_ticket')
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">
                                                Tiket Gratis
                                            </span>
                                        @else
                                            <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded text-sm">
                                                Buy 1 Get 1
                                            </span>
                                        @endif
                                    </div>
                                    @if ($promo->min_purchase)
                                        <div class="text-xs text-gray-500 mt-1">Min. Rp
                                            {{ number_format($promo->min_purchase, 0, ',', '.') }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="font-medium">{{ $promo->valid_from->format('d M Y') }}</div>
                                        <div class="text-gray-500">s/d</div>
                                        <div class="font-medium">{{ $promo->valid_until->format('d M Y') }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($promo->usage_limit)
                                        <div class="text-sm">
                                            <span class="font-medium">{{ $promo->used_count ?? 0 }}</span>
                                            <span class="text-gray-500">/{{ $promo->usage_limit }}</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                            <div class="bg-red-600 h-2 rounded-full"
                                                style="width: {{ min(100, (($promo->used_count ?? 0) / $promo->usage_limit) * 100) }}%">
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-500">Unlimited</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col space-y-2">
                                        @if ($promo->is_active)
                                            @if ($promo->valid_until < now())
                                                <span
                                                    class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full text-center">
                                                    Kadaluarsa
                                                </span>
                                            @elseif($promo->valid_from > now())
                                                <span
                                                    class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-full text-center">
                                                    Mendatang
                                                </span>
                                            @else
                                                <span
                                                    class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full text-center">
                                                    Aktif
                                                </span>
                                            @endif
                                        @else
                                            <span
                                                class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded-full text-center">
                                                Nonaktif
                                            </span>
                                        @endif

                                        <form action="{{ route('admin.promos.toggle-status', $promo) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-xs text-blue-600 hover:text-blue-800">
                                                {{ $promo->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.promos.edit', $promo) }}"
                                            class="text-yellow-600 hover:text-yellow-900" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.promos.destroy', $promo) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus promo ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada promo ditemukan.
                                    <a href="{{ route('admin.promos.create') }}" class="text-red-600 hover:underline">
                                        Tambah promo pertama
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($promos->hasPages())
            <div class="mt-4">
                {{ $promos->links() }}
            </div>
        @endif
    </div>

    <script>
        function copyPromoCode(code) {
            navigator.clipboard.writeText(code).then(function() {
                alert('Kode promo ' + code + ' berhasil disalin!');
            }, function(err) {
                console.error('Gagal menyalin: ', err);
            });
        }
    </script>
@endsection
