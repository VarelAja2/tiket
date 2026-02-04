@extends('layouts.app')

@section('title', 'Tambah Promo Baru')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Tambah Promo Baru</h1>
            <a href="{{ route('admin.promos.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.promos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                                    <input type="text" id="title" name="title" value="{{ old('title') }}"
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
                                        value="{{ old('short_description') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Deskripsi singkat untuk tampilan">
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                                        Deskripsi Lengkap <span class="text-red-600">*</span>
                                    </label>
                                    <textarea id="description" name="description" rows="3"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>{{ old('description') }}</textarea>
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
                                        <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : '' }}>
                                            Diskon Persen</option>
                                        <option value="fixed_amount" {{ old('type') == 'fixed_amount' ? 'selected' : '' }}>
                                            Potongan Harga</option>
                                        <option value="free_ticket" {{ old('type') == 'free_ticket' ? 'selected' : '' }}>
                                            Tiket Gratis</option>
                                        <option value="buy_one_get_one"
                                            {{ old('type') == 'buy_one_get_one' ? 'selected' : '' }}>Buy 1 Get 1</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="discount_value" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nilai Diskon <span class="text-red-600">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="number" id="discount_value" name="discount_value"
                                            value="{{ old('discount_value') }}" min="0" step="0.01"
                                            class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            required>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span id="discount_prefix" class="text-gray-500">%</span>
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
                                            value="{{ old('min_purchase') }}" min="0" step="1000"
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
                                            value="{{ old('max_discount') }}" min="0" step="1000"
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
                                    <div class="flex space-x-2">
                                        <input type="text" id="promo_code" name="promo_code"
                                            value="{{ old('promo_code') }}"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            required placeholder="Contoh: DISKON50">
                                        <button type="button" onclick="generatePromoCode()"
                                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                                            Generate
                                        </button>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Kode promo harus unik dan mudah diingat</p>
                                </div>

                                <div>
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                                        Gambar Promo
                                    </label>
                                    <input type="file" id="image" name="image" accept="image/*"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        onchange="previewImage(this)">
                                    @error('image')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror

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
                                        value="{{ old('valid_from') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                </div>

                                <div>
                                    <label for="valid_until" class="block text-sm font-medium text-gray-700 mb-1">
                                        Berakhir <span class="text-red-600">*</span>
                                    </label>
                                    <input type="date" id="valid_until" name="valid_until"
                                        value="{{ old('valid_until') }}"
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
                                        value="{{ old('usage_limit') }}" min="1"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Kosongkan untuk unlimited">
                                    <p class="mt-1 text-xs text-gray-500">Jumlah maksimal penggunaan promo</p>
                                </div>

                                <div>
                                    <label for="user_limit" class="block text-sm font-medium text-gray-700 mb-1">
                                        Batas per User
                                    </label>
                                    <input type="number" id="user_limit" name="user_limit"
                                        value="{{ old('user_limit') }}" min="1"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        placeholder="Kosongkan untuk unlimited">
                                    <p class="mt-1 text-xs text-gray-500">Maksimal penggunaan per pengguna</p>
                                </div>
                            </div>
                        </div>

                        <!-- Applicable Events -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Event yang Berlaku</h3>

                            <div class="space-y-2 max-h-48 overflow-y-auto p-3 border border-gray-300 rounded-lg">
                                <div class="mb-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="event_scope" value="all"
                                            {{ old('event_scope', 'all') == 'all' ? 'checked' : '' }} class="mr-2"
                                            onclick="toggleEventSelection('all')">
                                        <span class="text-sm">Semua Event</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="event_scope" value="specific"
                                            {{ old('event_scope') == 'specific' ? 'checked' : '' }} class="mr-2"
                                            onclick="toggleEventSelection('specific')">
                                        <span class="text-sm">Event Tertentu</span>
                                    </label>
                                </div>

                                <div id="eventSelection" class="{{ old('event_scope') == 'specific' ? '' : 'hidden' }}">
                                    <p class="text-sm font-medium text-gray-700 mb-2">Pilih Event:</p>
                                    <div class="space-y-2">
                                        @foreach ($events as $event)
                                            <label class="flex items-center">
                                                <input type="checkbox" name="applicable_events[]"
                                                    value="{{ $event->id }}"
                                                    {{ in_array($event->id, old('applicable_events', [])) ? 'checked' : '' }}
                                                    class="mr-2">
                                                <span class="text-sm text-gray-700">{{ $event->title }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1"
                                    {{ old('is_active', true) ? 'checked' : '' }}
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
                        Simpan Promo
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

        function generatePromoCode() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let code = 'PROMO';

            for (let i = 0; i < 6; i++) {
                code += chars.charAt(Math.floor(Math.random() * chars.length));
            }

            document.getElementById('promo_code').value = code;
        }

        function toggleEventSelection(scope) {
            const eventSelection = document.getElementById('eventSelection');
            const checkboxes = eventSelection.querySelectorAll('input[type="checkbox"]');

            if (scope === 'specific') {
                eventSelection.classList.remove('hidden');
            } else {
                eventSelection.classList.add('hidden');
                checkboxes.forEach(checkbox => checkbox.checked = false);
            }
        }

        // Update discount prefix based on type
        document.getElementById('type').addEventListener('change', function() {
            const prefix = document.getElementById('discount_prefix');
            const discountInput = document.getElementById('discount_value');

            switch (this.value) {
                case 'percentage':
                    prefix.textContent = '%';
                    discountInput.placeholder = 'Contoh: 50';
                    break;
                case 'fixed_amount':
                    prefix.textContent = 'Rp';
                    discountInput.placeholder = 'Contoh: 50000';
                    break;
                case 'free_ticket':
                    prefix.textContent = 'Qty';
                    discountInput.placeholder = 'Jumlah tiket gratis';
                    break;
                case 'buy_one_get_one':
                    prefix.textContent = 'B1G1';
                    discountInput.placeholder = '1';
                    discountInput.value = '1';
                    discountInput.disabled = true;
                    break;
            }
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Set default dates
            const today = new Date().toISOString().split('T')[0];
            const nextMonth = new Date();
            nextMonth.setMonth(nextMonth.getMonth() + 1);
            const nextMonthStr = nextMonth.toISOString().split('T')[0];

            if (!document.getElementById('valid_from').value) {
                document.getElementById('valid_from').value = today;
            }
            if (!document.getElementById('valid_until').value) {
                document.getElementById('valid_until').value = nextMonthStr;
            }

            // Initialize discount type
            document.getElementById('type').dispatchEvent(new Event('change'));
        });
    </script>
@endsection
