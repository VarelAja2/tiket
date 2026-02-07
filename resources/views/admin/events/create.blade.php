@extends('layouts.app')

@section('title', 'Tambah Event Baru')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <div class="flex items-center space-x-2 text-sm text-gray-600 mb-2">
                            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">
                                Dashboard
                            </a>
                            <i class="fas fa-chevron-right text-xs"></i>
                            <a href="{{ route('admin.events.index') }}" class="hover:text-blue-600 transition-colors">
                                Event
                            </a>
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span class="text-gray-900 font-medium">Tambah Baru</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center shadow-md">
                                <i class="fas fa-plus text-white text-lg"></i>
                            </div>
                            <div>
                                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Tambah Event Baru</h1>
                                <p class="text-gray-600 mt-1">Buat event menarik untuk pengguna Anda</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin.events.index') }}"
                        class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all shadow-sm">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg animate-slide-in">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-500 text-lg"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-triangle text-red-500 text-lg"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan dalam pengisian form</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Main Form -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data"
                    id="eventForm">
                    @csrf

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-6">
                        <!-- Left Column - Main Info -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Basic Information -->
                            <div class="space-y-4">
                                <div class="flex items-center space-x-2">
                                    <div class="w-1 h-6 bg-blue-600 rounded-full"></div>
                                    <h2 class="text-lg font-semibold text-gray-900">Informasi Dasar Event</h2>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Title -->
                                    <div class="md:col-span-2">
                                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                                            Judul Event <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('title') border-red-500 @enderror"
                                            placeholder="Contoh: Konser Musik Jazz Night" required>
                                        @error('title')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Category -->
                                    <div>
                                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">
                                            Kategori <span class="text-red-500">*</span>
                                        </label>
                                        <select id="category_id" name="category_id"
                                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('category_id') border-red-500 @enderror"
                                            required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Short Description -->
                                <div>
                                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">
                                        Deskripsi Singkat
                                    </label>
                                    <textarea id="short_description" name="short_description" rows="2"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('short_description') border-red-500 @enderror"
                                        placeholder="Jelaskan event secara singkat (maks. 500 karakter)">{{ old('short_description') }}</textarea>
                                    <div class="flex justify-between items-center mt-1">
                                        <p class="text-xs text-gray-500">Maksimal 500 karakter</p>
                                        <span id="shortDescCount" class="text-xs text-gray-500">0/500</span>
                                    </div>
                                    @error('short_description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Full Description -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                                        Deskripsi Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="description" name="description" rows="5"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('description') border-red-500 @enderror"
                                        placeholder="Jelaskan event secara detail" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Date & Time -->
                            <div class="space-y-4">
                                <div class="flex items-center space-x-2">
                                    <div class="w-1 h-6 bg-blue-600 rounded-full"></div>
                                    <h2 class="text-lg font-semibold text-gray-900">Tanggal & Waktu</h2>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Start Date -->
                                    <div>
                                        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">
                                            Tanggal Mulai <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-calendar-alt text-gray-400"></i>
                                            </div>
                                            <input type="date" id="start_date" name="start_date"
                                                value="{{ old('start_date') }}"
                                                class="w-full pl-10 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('start_date') border-red-500 @enderror"
                                                required>
                                        </div>
                                        @error('start_date')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- End Date -->
                                    <div>
                                        <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">
                                            Tanggal Selesai
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-calendar-alt text-gray-400"></i>
                                            </div>
                                            <input type="date" id="end_date" name="end_date"
                                                value="{{ old('end_date') }}"
                                                class="w-full pl-10 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('end_date') border-red-500 @enderror">
                                        </div>
                                        @error('end_date')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Start Time -->
                                    <div>
                                        <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">
                                            Waktu Mulai <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-clock text-gray-400"></i>
                                            </div>
                                            <input type="time" id="start_time" name="start_time"
                                                value="{{ old('start_time', '09:00') }}"
                                                class="w-full pl-10 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('start_time') border-red-500 @enderror"
                                                required>
                                        </div>
                                        @error('start_time')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- End Time -->
                                    <div>
                                        <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">
                                            Waktu Selesai
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-clock text-gray-400"></i>
                                            </div>
                                            <input type="time" id="end_time" name="end_time"
                                                value="{{ old('end_time', '17:00') }}"
                                                class="w-full pl-10 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('end_time') border-red-500 @enderror">
                                        </div>
                                        @error('end_time')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="space-y-4">
                                <div class="flex items-center space-x-2">
                                    <div class="w-1 h-6 bg-blue-600 rounded-full"></div>
                                    <h2 class="text-lg font-semibold text-gray-900">Lokasi Event</h2>
                                </div>

                                <!-- Location Name -->
                                <div>
                                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nama Tempat <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="location" name="location" value="{{ old('location') }}"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('location') border-red-500 @enderror"
                                        placeholder="Contoh: Gedung Serba Guna" required>
                                    @error('location')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                                        Alamat Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="address" name="address" rows="3"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('address') border-red-500 @enderror"
                                        placeholder="Masukkan alamat lengkap tempat event" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- City -->
                                    <div>
                                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">
                                            Kota <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="city" name="city" value="{{ old('city') }}"
                                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('city') border-red-500 @enderror"
                                            placeholder="Contoh: Jakarta" required>
                                        @error('city')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Age Rating -->
                                    <div>
                                        <label for="age_rating" class="block text-sm font-medium text-gray-700 mb-1">
                                            Rating Usia
                                        </label>
                                        <select id="age_rating" name="age_rating"
                                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('age_rating') border-red-500 @enderror">
                                            <option value="">Semua Umur</option>
                                            <option value="SU" {{ old('age_rating') == 'SU' ? 'selected' : '' }}>SU -
                                                Semua Umur</option>
                                            <option value="13+" {{ old('age_rating') == '13+' ? 'selected' : '' }}>13+
                                            </option>
                                            <option value="17+" {{ old('age_rating') == '17+' ? 'selected' : '' }}>17+
                                            </option>
                                            <option value="21+" {{ old('age_rating') == '21+' ? 'selected' : '' }}>21+
                                            </option>
                                        </select>
                                        @error('age_rating')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Sidebar -->
                        <div class="space-y-6">
                            <!-- Image Upload -->
                            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl border border-gray-200 p-5">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Gambar Event</h3>

                                <!-- Image Preview -->
                                <div class="mb-4">
                                    <div
                                        class="relative w-full h-48 bg-gray-100 rounded-lg overflow-hidden border-2 border-dashed border-gray-300 hover:border-blue-400 transition-colors">
                                        <img id="imagePreview" src="{{ asset('images/default-event.jpg') }}"
                                            alt="Preview Gambar" class="w-full h-full object-cover">
                                        <div
                                            class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-10 transition-all">
                                            <div class="text-center">
                                                <i class="fas fa-camera text-gray-400 text-2xl"></i>
                                                <p class="text-sm text-gray-400 mt-1">Klik untuk upload</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- File Input -->
                                <div>
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                        Upload Gambar <span class="text-red-500">*</span>
                                    </label>
                                    <input type="file" id="image" name="image" accept="image/*"
                                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all"
                                        required>
                                    <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, GIF, WebP. Maksimal 5MB</p>
                                    @error('image')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Pricing -->
                            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl border border-gray-200 p-5">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Harga & Kapasitas</h3>

                                <!-- Free Event Toggle -->
                                <div class="flex items-center mb-4">
                                    <input type="checkbox" id="is_free" name="is_free" value="1"
                                        class="h-5 w-5 text-blue-600 rounded focus:ring-blue-500 border-gray-300"
                                        {{ old('is_free') ? 'checked' : '' }}>
                                    <label for="is_free" class="ml-2 text-sm font-medium text-gray-700">
                                        Event Gratis
                                    </label>
                                </div>

                                <!-- Price Fields -->
                                <div id="priceFields" class="space-y-4">
                                    <!-- Base Price -->
                                    <div>
                                        <label for="base_price" class="block text-sm font-medium text-gray-700 mb-1">
                                            Harga Normal <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">Rp</span>
                                            </div>
                                            <input type="number" id="base_price" name="base_price"
                                                value="{{ old('base_price', 0) }}" min="0" step="1000"
                                                class="w-full pl-12 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('base_price') border-red-500 @enderror">
                                        </div>
                                        @error('base_price')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Discount Price -->
                                    <div>
                                        <label for="discount_price" class="block text-sm font-medium text-gray-700 mb-1">
                                            Harga Diskon
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">Rp</span>
                                            </div>
                                            <input type="number" id="discount_price" name="discount_price"
                                                value="{{ old('discount_price') }}" min="0" step="1000"
                                                class="w-full pl-12 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('discount_price') border-red-500 @enderror">
                                        </div>
                                        @error('discount_price')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Discount Period -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div>
                                            <label for="discount_start"
                                                class="block text-sm font-medium text-gray-700 mb-1">
                                                Diskon Mulai
                                            </label>
                                            <input type="date" id="discount_start" name="discount_start"
                                                value="{{ old('discount_start') }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors text-sm">
                                        </div>
                                        <div>
                                            <label for="discount_end"
                                                class="block text-sm font-medium text-gray-700 mb-1">
                                                Diskon Berakhir
                                            </label>
                                            <input type="date" id="discount_end" name="discount_end"
                                                value="{{ old('discount_end') }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors text-sm">
                                        </div>
                                    </div>
                                </div>

                                <!-- Capacity -->
                                <div class="mt-4">
                                    <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">
                                        Kapasitas <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-users text-gray-400"></i>
                                        </div>
                                        <input type="number" id="capacity" name="capacity"
                                            value="{{ old('capacity', 100) }}" min="1"
                                            class="w-full pl-10 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('capacity') border-red-500 @enderror"
                                            required>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">Jumlah kursi/kapasitas maksimal</p>
                                    @error('capacity')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status & Settings -->
                            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl border border-gray-200 p-5">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Status & Pengaturan</h3>

                                <!-- Status -->
                                <div class="mb-4">
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                        Status <span class="text-red-500">*</span>
                                    </label>
                                    <select id="status" name="status"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors @error('status') border-red-500 @enderror"
                                        required>
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                            Published</option>
                                    </select>
                                    @error('status')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Featured Event -->
                                <div class="flex items-center">
                                    <input type="checkbox" id="is_featured" name="is_featured" value="1"
                                        class="h-5 w-5 text-blue-600 rounded focus:ring-blue-500 border-gray-300"
                                        {{ old('is_featured') ? 'checked' : '' }}>
                                    <label for="is_featured" class="ml-2 text-sm font-medium text-gray-700">
                                        Tampilkan sebagai Featured Event
                                    </label>
                                </div>
                            </div>

                            <!-- Additional Info -->
                            <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl border border-gray-200 p-5">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Tambahan</h3>

                                <div class="space-y-4">
                                    <!-- Whats Included -->
                                    <div>
                                        <label for="whats_included" class="block text-sm font-medium text-gray-700 mb-1">
                                            Yang Termasuk
                                        </label>
                                        <textarea id="whats_included" name="whats_included" rows="2"
                                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors text-sm"
                                            placeholder="Contoh: Sertifikat, Makan siang, Goodie bag">{{ old('whats_included') }}</textarea>
                                        <p class="text-xs text-gray-500 mt-1">Pisahkan dengan koma</p>
                                    </div>

                                    <!-- Requirements -->
                                    <div>
                                        <label for="requirements" class="block text-sm font-medium text-gray-700 mb-1">
                                            Persyaratan
                                        </label>
                                        <textarea id="requirements" name="requirements" rows="2"
                                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors text-sm"
                                            placeholder="Persyaratan yang harus dipenuhi peserta">{{ old('requirements') }}</textarea>
                                    </div>

                                    <!-- Terms & Conditions -->
                                    <div>
                                        <label for="terms_conditions"
                                            class="block text-sm font-medium text-gray-700 mb-1">
                                            Syarat & Ketentuan
                                        </label>
                                        <textarea id="terms_conditions" name="terms_conditions" rows="2"
                                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-colors text-sm"
                                            placeholder="Syarat dan ketentuan event">{{ old('terms_conditions') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-info-circle mr-1"></i>
                                Pastikan semua data telah diisi dengan benar
                            </div>
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.events.index') }}"
                                    class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all">
                                    <i class="fas fa-times mr-2"></i>
                                    Batal
                                </a>
                                <button type="submit"
                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-sm font-medium rounded-lg text-white hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all shadow-md hover:shadow-lg">
                                    <i class="fas fa-save mr-2"></i>
                                    Simpan Event
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 bg-white bg-opacity-80 flex items-center justify-center z-50 hidden">
        <div class="text-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>
            <p class="mt-4 text-gray-600 font-medium">Menyimpan event...</p>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        @keyframes slide-in {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slide-in 0.5s ease-out;
        }

        /* Custom file input styling */
        input[type="file"]::-webkit-file-upload-button {
            visibility: hidden;
        }

        input[type="file"]::before {
            content: 'Pilih File';
            display: inline-block;
            background: linear-gradient(to bottom, #f9f9f9, #e3e3e3);
            border: 1px solid #999;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
        }

        input[type="file"]:hover::before {
            border-color: black;
        }

        input[type="file"]:active::before {
            background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image preview
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');
            const previewContainer = imagePreview.parentElement;

            imageInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        previewContainer.classList.remove('border-dashed');
                        previewContainer.classList.add('border-solid', 'border-blue-400');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Click preview to trigger file input
            previewContainer.addEventListener('click', function() {
                imageInput.click();
            });

            // Free event toggle
            const isFreeCheckbox = document.getElementById('is_free');
            const priceFields = document.getElementById('priceFields');
            const basePriceInput = document.getElementById('base_price');

            function togglePriceFields() {
                if (isFreeCheckbox.checked) {
                    priceFields.style.display = 'none';
                    basePriceInput.value = 0;
                    basePriceInput.required = false;
                } else {
                    priceFields.style.display = 'block';
                    basePriceInput.required = true;
                }
            }

            isFreeCheckbox.addEventListener('change', togglePriceFields);
            togglePriceFields(); // Initial call

            // Date validation
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const discountStartInput = document.getElementById('discount_start');
            const discountEndInput = document.getElementById('discount_end');

            // Set minimum dates for end dates
            startDateInput.addEventListener('change', function() {
                const minDate = this.value;
                endDateInput.min = minDate;

                if (endDateInput.value && endDateInput.value < minDate) {
                    endDateInput.value = minDate;
                }
            });

            discountStartInput.addEventListener('change', function() {
                const minDate = this.value;
                discountEndInput.min = minDate;

                if (discountEndInput.value && discountEndInput.value < minDate) {
                    discountEndInput.value = minDate;
                }
            });

            // Character counter for short description
            const shortDescInput = document.getElementById('short_description');
            const shortDescCounter = document.getElementById('shortDescCount');

            function updateCharacterCount() {
                const length = shortDescInput.value.length;
                shortDescCounter.textContent = `${length}/500`;

                if (length > 500) {
                    shortDescCounter.classList.remove('text-gray-500');
                    shortDescCounter.classList.add('text-red-500');
                } else {
                    shortDescCounter.classList.remove('text-red-500');
                    shortDescCounter.classList.add('text-gray-500');
                }
            }

            shortDescInput.addEventListener('input', updateCharacterCount);
            updateCharacterCount(); // Initial count

            // Form submission
            const eventForm = document.getElementById('eventForm');
            const loadingOverlay = document.getElementById('loadingOverlay');

            eventForm.addEventListener('submit', function(e) {
                // Show loading
                loadingOverlay.classList.remove('hidden');

                // Validate short description length
                if (shortDescInput.value.length > 500) {
                    e.preventDefault();
                    loadingOverlay.classList.add('hidden');
                    alert('Deskripsi singkat tidak boleh lebih dari 500 karakter');
                    shortDescInput.focus();
                    return false;
                }

                // Validate discount price is less than base price
                const basePrice = parseFloat(basePriceInput.value) || 0;
                const discountPrice = parseFloat(document.getElementById('discount_price').value) || 0;

                if (discountPrice > 0 && discountPrice >= basePrice) {
                    e.preventDefault();
                    loadingOverlay.classList.add('hidden');
                    alert('Harga diskon harus kurang dari harga normal');
                    document.getElementById('discount_price').focus();
                    return false;
                }

                // Validate discount period
                const discountStart = discountStartInput.value;
                const discountEnd = discountEndInput.value;

                if (discountStart && discountEnd && discountEnd < discountStart) {
                    e.preventDefault();
                    loadingOverlay.classList.add('hidden');
                    alert('Tanggal akhir diskon tidak boleh sebelum tanggal mulai diskon');
                    return false;
                }
            });

            // Auto-hide loading after 10 seconds (safety net)
            setTimeout(() => {
                loadingOverlay.classList.add('hidden');
            }, 10000);
        });
    </script>
@endpush
