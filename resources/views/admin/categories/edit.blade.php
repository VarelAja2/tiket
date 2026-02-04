@extends('admin.layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Edit Kategori</h1>
            <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Kategori <span class="text-red-600">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                            required placeholder="Contoh: Festival, Kompetisi, Workshop">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                            Deskripsi
                        </label>
                        <textarea id="description" name="description" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                            placeholder="Deskripsi singkat tentang kategori">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">
                                Icon (Font Awesome)
                            </label>
                            <div class="relative">
                                <input type="text" id="icon" name="icon"
                                    value="{{ old('icon', $category->icon) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="fas fa-calendar">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <a href="https://fontawesome.com/icons" target="_blank"
                                        class="text-sm text-blue-600 hover:text-blue-800" title="Cari icon di Font Awesome">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Contoh: fas fa-calendar, fas fa-music, fas fa-film</p>
                        </div>

                        <div>
                            <label for="color" class="block text-sm font-medium text-gray-700 mb-1">
                                Warna
                            </label>
                            <div class="flex items-center space-x-3">
                                <input type="color" id="color" name="color"
                                    value="{{ old('color', $category->color ?? '#ef4444') }}"
                                    class="w-12 h-12 border-0 rounded cursor-pointer">
                                <input type="text" id="color_hex"
                                    value="{{ old('color', $category->color ?? '#ef4444') }}"
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="#ef4444" onchange="document.getElementById('color').value = this.value">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Status
                        </label>
                        <div class="flex items-center">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="is_active" value="1"
                                    {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700">Aktif (tampilkan di website)</span>
                            </label>
                        </div>
                    </div>

                    <div class="p-4 bg-gray-50 rounded-lg">
                        <h3 class="font-medium text-gray-900 mb-2">Preview Kategori</h3>
                        <div class="flex items-center">
                            <div id="previewIcon" class="w-10 h-10 rounded-lg flex items-center justify-center mr-3"
                                style="background-color: {{ $category->color ? $category->color . '20' : '#fef2f2' }}">
                                <i id="previewIconClass" class="{{ $category->icon ?? 'fas fa-calendar' }}"
                                    style="color: {{ $category->color ?? '#ef4444' }}"></i>
                            </div>
                            <div>
                                <div id="previewName" class="font-medium text-gray-900">{{ $category->name }}</div>
                                <div id="previewDesc" class="text-sm text-gray-500">
                                    {{ $category->description ? Str::limit($category->description, 50) : 'Deskripsi akan muncul di sini' }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-sm text-gray-600">
                            <p><strong>Slug:</strong> {{ $category->slug }}</p>
                            <p><strong>Jumlah Event:</strong> {{ $category->events()->count() }} event</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <a href="{{ route('admin.categories.index') }}"
                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-300">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-medium transition duration-300">
                        Update Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Live preview
        document.getElementById('name').addEventListener('input', function() {
            document.getElementById('previewName').textContent = this.value || '{{ $category->name }}';
        });

        document.getElementById('description').addEventListener('input', function() {
            document.getElementById('previewDesc').textContent = this.value || '{{ $category->description }}';
        });

        document.getElementById('icon').addEventListener('input', function() {
            const previewIcon = document.getElementById('previewIconClass');
            previewIcon.className = this.value || '{{ $category->icon ?? 'fas fa-calendar' }}';
        });

        document.getElementById('color').addEventListener('input', function() {
            const color = this.value;
            const previewIcon = document.getElementById('previewIcon');
            const previewIconClass = document.getElementById('previewIconClass');

            // Update color input text
            document.getElementById('color_hex').value = color;

            // Update preview
            previewIcon.style.backgroundColor = color + '20'; // Add 20 for opacity
            previewIconClass.style.color = color;
        });

        document.getElementById('color_hex').addEventListener('input', function() {
            document.getElementById('color').value = this.value;
            // Trigger color input event
            document.getElementById('color').dispatchEvent(new Event('input'));
        });

        // Initialize preview with current values
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial values
            const nameInput = document.getElementById('name');
            const descInput = document.getElementById('description');
            const iconInput = document.getElementById('icon');
            const colorInput = document.getElementById('color');

            if (nameInput.value !== '{{ $category->name }}') {
                document.getElementById('previewName').textContent = nameInput.value;
            }

            if (descInput.value !== '{{ $category->description }}') {
                document.getElementById('previewDesc').textContent = descInput.value;
            }

            if (iconInput.value !== '{{ $category->icon }}') {
                document.getElementById('previewIconClass').className = iconInput.value;
            }

            // Trigger color preview
            colorInput.dispatchEvent(new Event('input'));
        });
    </script>
@endsection
