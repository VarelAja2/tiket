@extends('admin.layouts.app')

@section('title', 'Tambah Event Baru')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Tambah Event Baru</h1>
            <a href="{{ route('admin.events.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Left Column -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Basic Information -->
                        <div class="border-b pb-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar</h3>

                            <div class="space-y-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                                        Judul Event <span class="text-red-600">*</span>
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
                                        Deskripsi Singkat <span class="text-red-600">*</span>
                                    </label>
                                    <textarea id="short_description" name="short_description" rows="2"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                                        Deskripsi Lengkap <span class="text-red-600">*</span>
                                    </label>
                                    <textarea id="description" name="description" rows="4"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Event Details -->
                        <div class="border-b pb-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Detail Event</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="event_date" class="block text-sm font-medium text-gray-700 mb-1">
                                        Tanggal Event <span class="text-red-600">*</span>
                                    </label>
                                    <input type="date" id="event_date" name="event_date" value="{{ old('event_date') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                </div>

                                <div>
                                    <label for="event_time" class="block text-sm font-medium text-gray-700 mb-1">
                                        Waktu Event <span class="text-red-600">*</span>
                                    </label>
                                    <input type="time" id="event_time" name="event_time" value="{{ old('event_time') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                </div>

                                <div>
                                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">
                                        Lokasi <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text" id="location" name="location" value="{{ old('location') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                </div>

                                <div>
                                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">
                                        Durasi
                                    </label>
                                    <input type="text" id="duration" name="duration" value="{{ old('duration') }}"
                                        placeholder="Contoh: 2h 30m"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                </div>

                                <div>
                                    <label for="release_year" class="block text-sm font-medium text-gray-700 mb-1">
                                        Tahun Rilis
                                    </label>
                                    <input type="number" id="release_year" name="release_year"
                                        value="{{ old('release_year') }}" min="1900" max="{{ date('Y') + 5 }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                </div>

                                <div>
                                    <label for="age_rating" class="block text-sm font-medium text-gray-700 mb-1">
                                        Rating Usia <span class="text-red-600">*</span>
                                    </label>
                                    <select id="age_rating" name="age_rating"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                        <option value="">Pilih Rating</option>
                                        <option value="SU" {{ old('age_rating') == 'SU' ? 'selected' : '' }}>SU (Semua
                                            Umur)</option>
                                        <option value="13+" {{ old('age_rating') == '13+' ? 'selected' : '' }}>13+
                                        </option>
                                        <option value="17+" {{ old('age_rating') == '17+' ? 'selected' : '' }}>17+
                                        </option>
                                        <option value="21+" {{ old('age_rating') == '21+' ? 'selected' : '' }}>21+
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Harga</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">
                                        Harga Normal <span class="text-red-600">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500">Rp</span>
                                        </div>
                                        <input type="number" id="price" name="price" value="{{ old('price') }}"
                                            min="0" step="1000"
                                            class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                            required>
                                    </div>
                                </div>

                                <div>
                                    <label for="discount_price" class="block text-sm font-medium text-gray-700 mb-1">
                                        Harga Diskon
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500">Rp</span>
                                        </div>
                                        <input type="number" id="discount_price" name="discount_price"
                                            value="{{ old('discount_price') }}" min="0" step="1000"
                                            class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                    </div>
                                </div>

                                <div>
                                    <label for="promo_code" class="block text-sm font-medium text-gray-700 mb-1">
                                        Kode Promo
                                    </label>
                                    <input type="text" id="promo_code" name="promo_code"
                                        value="{{ old('promo_code') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                </div>

                                <div>
                                    <label for="promo_discount" class="block text-sm font-medium text-gray-700 mb-1">
                                        Diskon Promo (%)
                                    </label>
                                    <input type="number" id="promo_discount" name="promo_discount"
                                        value="{{ old('promo_discount') }}" min="0" max="100"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Image Upload -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                                Gambar Event <span class="text-red-600">*</span>
                            </label>
                            <input type="file" id="image" name="image" accept="image/*"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                onchange="previewImage(this)" required>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <div id="imagePreview" class="mt-3">
                                <img id="preview" class="w-full h-64 object-cover rounded-lg border hidden">
                            </div>
                        </div>

                        <!-- Category & Genres -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">
                                Kategori <span class="text-red-600">*</span>
                            </label>
                            <select id="category_id" name="category_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Genre
                            </label>
                            <div class="space-y-2 max-h-48 overflow-y-auto p-2 border border-gray-300 rounded-lg">
                                @foreach ($genres as $genre)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                            {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}
                                            class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-700">{{ $genre->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Rating -->
                        <div>
                            <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">
                                Rating (0-10)
                            </label>
                            <input type="number" id="rating" name="rating" value="{{ old('rating') }}"
                                min="0" max="10" step="0.1"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <!-- Seats -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="total_seats" class="block text-sm font-medium text-gray-700 mb-1">
                                    Total Kursi <span class="text-red-600">*</span>
                                </label>
                                <input type="number" id="total_seats" name="total_seats"
                                    value="{{ old('total_seats') }}" min="1"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    required>
                            </div>

                            <div>
                                <label for="available_seats" class="block text-sm font-medium text-gray-700 mb-1">
                                    Kursi Tersedia <span class="text-red-600">*</span>
                                </label>
                                <input type="number" id="available_seats" name="available_seats"
                                    value="{{ old('available_seats', old('total_seats')) }}" min="0"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    required>
                            </div>
                        </div>

                        <!-- Status Options -->
                        <div class="space-y-4 p-4 border border-gray-300 rounded-lg">
                            <h4 class="font-medium text-gray-900">Status & Opsi</h4>

                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="is_active" value="1"
                                        {{ old('is_active', true) ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-700">Aktif</span>
                                </label>

                                <label class="flex items-center">
                                    <input type="checkbox" name="is_coming_soon" value="1"
                                        {{ old('is_coming_soon') ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-700">Coming Soon</span>
                                </label>

                                <label class="flex items-center">
                                    <input type="checkbox" name="is_featured" value="1"
                                        {{ old('is_featured') ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-700">Featured</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <a href="{{ route('admin.events.index') }}"
                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-300">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium transition duration-300">
                        Simpan Event
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

        // Auto set available seats when total seats changes
        document.getElementById('total_seats')?.addEventListener('change', function() {
            const availableSeats = document.getElementById('available_seats');
            if (availableSeats && !availableSeats.value) {
                availableSeats.value = this.value;
            }
        });
    </script>
@endsection
