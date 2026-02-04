@extends('layouts.app')

@section('title', 'Tambah Pengguna Baru')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Tambah Pengguna Baru</h1>
            <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="space-y-6">
                    <!-- Basic Information -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nama Lengkap <span class="text-red-600">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                    Email <span class="text-red-600">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nomor Telepon
                                </label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Contoh: 081234567890">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">
                                    Role <span class="text-red-600">*</span>
                                </label>
                                <select id="role" name="role"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    required>
                                    <option value="">Pilih Role</option>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Customer</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('role')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Password</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                                    Password <span class="text-red-600">*</span>
                                </label>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                    <button type="button" onclick="togglePassword('password')"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <i class="far fa-eye text-gray-400 hover:text-gray-600"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                                    Konfirmasi Password <span class="text-red-600">*</span>
                                </label>
                                <div class="relative">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required>
                                    <button type="button" onclick="togglePassword('password_confirmation')"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <i class="far fa-eye text-gray-400 hover:text-gray-600"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i> Minimal 8 karakter dengan kombinasi huruf dan angka
                        </p>
                    </div>

                    <!-- Status & Verification -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Status & Verifikasi</h3>

                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input type="checkbox" id="is_active" name="is_active" value="1"
                                    {{ old('is_active', true) ? 'checked' : '' }}
                                    class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                                <label for="is_active" class="ml-2 text-sm text-gray-700">
                                    Akun Aktif (jika tidak dicentang, pengguna tidak dapat login)
                                </label>
                            </div>

                            <div>
                                <label for="email_verified_at" class="block text-sm font-medium text-gray-700 mb-1">
                                    Verifikasi Email
                                </label>
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center">
                                        <input type="radio" id="verify_now" name="email_verification_option"
                                            value="now" class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300"
                                            checked>
                                        <label for="verify_now" class="ml-2 text-sm text-gray-700">
                                            Verifikasi sekarang
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" id="verify_later" name="email_verification_option"
                                            value="later"
                                            class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300">
                                        <label for="verify_later" class="ml-2 text-sm text-gray-700">
                                            Verifikasi nanti
                                        </label>
                                    </div>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">
                                    Jika memilih "verifikasi sekarang", pengguna tidak perlu melakukan verifikasi email saat
                                    pertama login.
                                </p>
                            </div>

                            <!-- Additional Information -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                                    Alamat
                                </label>
                                <textarea id="address" name="address" rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Alamat lengkap pengguna">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('admin.users.index') }}"
                                class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-200">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-200">
                                Simpan Pengguna
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);

            // Update icon
            const icon = field.nextElementSibling.querySelector('i');
            if (type === 'text') {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Date picker for email verification
        document.addEventListener('DOMContentLoaded', function() {
            const verifyNow = document.getElementById('verify_now');
            const verifyLater = document.getElementById('verify_later');

            verifyNow.addEventListener('change', function() {
                if (this.checked) {
                    // Set current datetime for email_verified_at field
                    const now = new Date();
                    const localDateTime = now.toISOString().slice(0, 16);
                    // We'll handle this in the controller based on the radio button value
                }
            });

            verifyLater.addEventListener('change', function() {
                if (this.checked) {
                    // Clear email_verified_at field
                    // We'll handle this in the controller based on the radio button value
                }
            });
        });
    </script>
@endsection

@push('styles')
    <style>
        /* Additional custom styles if needed */
        input[type="datetime-local"] {
            /* Custom styling for datetime input */
        }
    </style>
@endpush
