@extends('layouts.app')

@section('title', 'Tambah Banner Baru')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Tambah Banner Baru</h1>
            <a href="{{ route('admin.banners.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                                Judul Banner <span class="text-red-600">*</span>
                            </label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1">
                                Subjudul
                            </label>
                            <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                                Deskripsi
                            </label>
                            <textarea id="description" name="description" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('description') }}</textarea>
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                                Gambar Banner <span class="text-red-600">*</span>
                            </label>
                            <input type="file" id="image" name="image" accept="image/*"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                onchange="previewImage(this)" required>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <div id="imagePreview" class="mt-3 hidden">
                                <img id="preview" class="w-64 h-36 object-cover rounded-lg border">
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="button_text" class="block text-sm font-medium text-gray-700 mb-1">
                                Teks Tombol Utama
                            </label>
                            <input type="text" id="button_text" name="button_text" value="{{ old('button_text') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <div>
                            <label for="button_url" class="block text-sm font-medium text-gray-700 mb-1">
                                URL Tombol Utama
                            </label>
                            <input type="url" id="button_url" name="button_url" value="{{ old('button_url') }}"
                                placeholder="https://example.com"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <div>
                            <label for="button_secondary_text" class="block text-sm font-medium text-gray-700 mb-1">
                                Teks Tombol Sekunder
                            </label>
                            <input type="text" id="button_secondary_text" name="button_secondary_text"
                                value="{{ old('button_secondary_text') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <div>
                            <label for="button_secondary_url" class="block text-sm font-medium text-gray-700 mb-1">
                                URL Tombol Sekunder
                            </label>
                            <input type="url" id="button_secondary_url" name="button_secondary_url"
                                value="{{ old('button_secondary_url') }}" placeholder="https://example.com"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <div>
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-1">
                                Urutan <span class="text-red-600">*</span>
                            </label>
                            <input type="number" id="order" name="order" value="{{ old('order', 0) }}"
                                min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">
                                    Tipe Banner <span class="text-red-600">*</span>
                                </label>
                                <select id="type" name="type"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    required>
                                    <option value="main" {{ old('type') == 'main' ? 'selected' : '' }}>Utama</option>
                                    <option value="secondary" {{ old('type') == 'secondary' ? 'selected' : '' }}>Sekunder
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Status
                                </label>
                                <div class="mt-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="is_active" value="1"
                                            {{ old('is_active', true) ? 'checked' : '' }}
                                            class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-600">Aktif</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-medium transition duration-300">
                        Simpan Banner
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const previewDiv = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewDiv.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                previewDiv.classList.add('hidden');
                preview.src = '';
            }
        }
    </script>
@endsection
