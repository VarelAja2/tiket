@extends('layouts.app')

@section('title', 'Edit Promo')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Edit Promo</h1>
            <a href="{{ route('admin.promos.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.promos.update', $promo) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Basic Information -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar</h3>

                            <div class="space-y-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                                        Judul Promo <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text" id="title" name="title"
                                        value="{{ old('title', $promo->title) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">
                                        Deskripsi Singkat
                                    </label>
                                    <input type="text" id="short_description" name="short_description"
                                        value="{{ old('short_description', $promo->short_description) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Deskripsi singkat untuk tampilan">
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                                        Deskripsi Lengkap <span class="text-red-600">*</span>
                                    </label>
                                    <textarea id="description" name="description" rows="3"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>{{ old('description', $promo->description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Discount Information -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Diskon</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">
                                        Tipe Diskon <span class="text-red-600">*</span>
                                    </label>
                                    <select id="type" name="type"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                        <option value="">Pilih Tipe</option>
                                        <option value="percentage"
                                            {{ old('type', $promo->type) == 'percentage' ? 'selected' : '' }}>Diskon Persen
                                        </option>
                                        <option value="fixed_amount"
                                            {{ old('type', $promo->type) == 'fixed_amount' ? 'selected' : '' }}>Potongan
                                            Harga</option>
                                        <option value="free_ticket"
                                            {{ old('type', $promo->type) == 'free_ticket' ? 'selected' : '' }}>Tiket Gratis
                                        </option>
                                        <option value="buy_one_get_one"
                                            {{ old('type', $promo->type) == 'buy_one_get_one' ? 'selected' : '' }}>Buy 1 Get
                                            1</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="discount_value" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nilai Diskon <span class="text-red-600">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="number" id="discount_value" name="discount_value"
                                            value="{{ old('discount_value', $promo->discount_value) }}" min="0"
                                            step="0.01"
                                            class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            required>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span id="discount_prefix" class="text-gray-500">
                                                @if ($promo->type == 'percentage')
                                                    %
                                                @elseif($promo->type == 'fixed_amount')
                                                    Rp
                                                @elseif($promo->type == 'buy_one_get_one')
                                                    B1G1
                                                @else
                                                    Qty
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="min_purchase" class="block text-sm font-medium text-gray-700 mb-1">
                                        Minimum Pembelian
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500">Rp</span>
                                        </div>
                                        <input type="number" id="min_purchase" name="min_purchase"
                                            value="{{ old('min_purchase', $promo->min_purchase) }}" min="0"
                                            step="1000"
                                            class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                    </div>
                                </div>

                                <div>
                                    <label for="max_discount" class="block text-sm font-medium text-gray-700 mb-1">
                                        Maksimal Diskon
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500">Rp</span>
                                        </div>
                                        <input type="number" id="max_discount" name="max_discount"
                                            value="{{ old('max_discount', $promo->max_discount) }}" min="0"
                                            step="1000"
                                            class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Promo Code & Image -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Kode & Gambar Promo</h3>

                            <div class="space-y-4">
                                <div>
                                    <label for="promo_code" class="block text-sm font-medium text-gray-700 mb-1">
                                        Kode Promo <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text" id="promo_code" name="promo_code"
                                        value="{{ old('promo_code', $promo->promo_code) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                    <p class="mt-1 text-xs text-gray-500">Kode promo harus unik dan mudah diingat</p>
                                </div>

                                <div>
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                                        Gambar Promo
                                    </label>

                                    <!-- Current Image -->
                                    @if ($promo->image_url)
                                        <div class="mb-3">
                                            <p class="text-sm text-gray-600 mb-1">Gambar saat ini:</p>
                                            <img src="{{ $promo->image_url }}" alt="{{ $promo->title }}"
                                                class="w-32 h-24 object-cover rounded-lg">
                                        </div>
                                    @endif

                                    <input type="file" id="image" name="image" accept="image/*"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        onchange="previewImage(this)">
                                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah gambar</p>

                                    <div id="imagePreview" class="mt-3">
                                        <img id="preview" class="w-32 h-24 object-cover rounded-lg border hidden">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Validity Period -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Periode Berlaku</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="valid_from" class="block text-sm font-medium text-gray-700 mb-1">
                                        Mulai Berlaku <span class="text-red-600">*</span>
                                    </label>
                                    <input type="date" id="valid_from" name="valid_from"
                                        value="{{ old('valid_from', $promo->valid_from->format('Y-m-d')) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                </div>

                                <div>
                                    <label for="valid_until" class="block text-sm font-medium text-gray-700 mb-1">
                                        Berakhir <span class="text-red-600">*</span>
                                    </label>
                                    <input type="date" id="valid_until" name="valid_until"
                                        value="{{ old('valid_until', $promo->valid_until->format('Y-m-d')) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Usage Limits -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Batasan Penggunaan</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="usage_limit" class="block text-sm font-medium text-gray-700 mb-1">
                                        Batas Penggunaan
                                    </label>
                                    <input type="number" id="usage_limit" name="usage_limit"
                                        value="{{ old('usage_limit', $promo->usage_limit) }}" min="1"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Kosongkan untuk unlimited">
                                    <p class="mt-1 text-xs text-gray-500">Jumlah maksimal penggunaan promo</p>
                                </div>

                                <div>
                                    <label for="user_limit" class="block text-sm font-medium text-gray-700 mb-1">
                                        Batas per User
                                    </label>
                                    <input type="number" id="user_limit" name="user_limit"
                                        value="{{ old('user_limit', $promo->user_limit) }}" min="1"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Kosongkan untuk unlimited">
                                    <p class="mt-1 text-xs text-gray-500">Maksimal penggunaan per pengguna</p>
                                </div>
                            </div>

                            @if ($promo->usage_limit)
                                <div class="mt-3 p-3 bg-gray-50 rounded-lg">
                                    <p class="text-sm font-medium text-gray-700">Penggunaan Saat Ini:</p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span class="text-sm text-gray-600">{{ $promo->used_count ?? 0 }} /
                                            {{ $promo->usage_limit }}</span>
                                        <span
                                            class="text-sm font-medium">{{ round((($promo->used_count ?? 0) / $promo->usage_limit) * 100) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-red-600 h-2 rounded-full"
                                            style="width: {{ min(100, (($promo->used_count ?? 0) / $promo->usage_limit) * 100) }}%">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1"
                                    {{ old('is_active', $promo->is_active) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700">Aktifkan promo</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <a href="{{ route('admin.promos.index') }}"
                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-300">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium transition duration-300">
                        Update Promo
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.classList.add('hidden');
                preview.src = '';
            }
        }

        // Update discount prefix based on type
        document.getElementById('type').addEventListener('change', function() {
            const prefix = document.getElementById('discount_prefix');
            const discountInput = document.getElementById('discount_value');

            switch (this.value) {
                case 'percentage':
                    prefix.textContent = '%';
                    discountInput.disabled = false;
                    break;
                case 'fixed_amount':
                    prefix.textContent = 'Rp';
                    discountInput.disabled = false;
                    break;
                case 'free_ticket':
                    prefix.textContent = 'Qty';
                    discountInput.disabled = false;
                    break;
                case 'buy_one_get_one':
                    prefix.textContent = 'B1G1';
                    discountInput.value = '1';
                    discountInput.disabled = true;
                    break;
            }
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize discount type
            document.getElementById('type').dispatchEvent(new Event('change'));
        });
    </script>
@endsection
