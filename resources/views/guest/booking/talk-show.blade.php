@extends('guest.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold mb-2 text-center">Pemesanan Tiket Talk Show</h1>
            <p class="text-gray-400 text-center mb-8">The Art of Mindful Leadership</p>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Ticket Selection -->
                <div class="lg:col-span-2">
                    <div class="bg-gray-800 rounded-xl p-6 mb-6">
                        <h2 class="text-xl font-bold mb-4">Pilih Jenis Tiket</h2>

                        <div class="space-y-4">
                            <!-- Regular Ticket -->
                            <div class="border border-green-600 rounded-lg p-4">
                                <div class="flex justify-between items-center mb-3">
                                    <div>
                                        <h4 class="font-bold text-lg text-white">Regular Ticket</h4>
                                        <p class="text-gray-400 text-sm">Early bird hingga 15 Nov</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-green-500">Rp 150.000</div>
                                        <div class="text-green-500 text-sm font-medium">Tersedia</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="block text-gray-300 mb-2">Jumlah Tiket</label>
                                    <div class="flex items-center">
                                        <button
                                            class="w-10 h-10 bg-gray-700 rounded-l-lg flex items-center justify-center text-white hover:bg-gray-600">-</button>
                                        <input type="number" value="1" min="1" max="5"
                                            class="w-20 h-10 bg-gray-900 border-y border-gray-700 text-center text-white">
                                        <button
                                            class="w-10 h-10 bg-gray-700 rounded-r-lg flex items-center justify-center text-white hover:bg-gray-600">+</button>
                                    </div>
                                </div>
                            </div>

                            <!-- VIP Ticket -->
                            <div class="border border-green-600 rounded-lg p-4">
                                <div class="flex justify-between items-center mb-3">
                                    <div>
                                        <div class="flex items-center">
                                            <h4 class="font-bold text-lg text-white">VIP Ticket</h4>
                                            <span class="ml-2 bg-green-600 text-white text-xs px-2 py-1 rounded">⭐
                                                Exclusive</span>
                                        </div>
                                        <p class="text-gray-400 text-sm">Limited seats available</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-xl font-bold text-green-500">Rp 300.000</div>
                                        <div class="text-yellow-500 text-sm font-medium">5 kursi tersisa</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="block text-gray-300 mb-2">Jumlah Tiket</label>
                                    <div class="flex items-center">
                                        <button
                                            class="w-10 h-10 bg-gray-700 rounded-l-lg flex items-center justify-center text-white hover:bg-gray-600">-</button>
                                        <input type="number" value="0" min="0" max="2"
                                            class="w-20 h-10 bg-gray-900 border-y border-gray-700 text-center text-white">
                                        <button
                                            class="w-10 h-10 bg-gray-700 rounded-r-lg flex items-center justify-center text-white hover:bg-gray-600">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-800 rounded-xl p-6">
                        <h2 class="text-xl font-bold mb-4">Informasi Pemesan</h2>
                        <form>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-gray-300 mb-2">Nama Lengkap</label>
                                    <input type="text"
                                        class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-green-500">
                                </div>
                                <div>
                                    <label class="block text-gray-300 mb-2">Email</label>
                                    <input type="email"
                                        class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-green-500">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-300 mb-2">Nomor Telepon</label>
                                <input type="tel"
                                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-green-500">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column: Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-800 rounded-xl p-6 sticky top-24">
                        <h2 class="text-xl font-bold mb-4">Ringkasan Pesanan</h2>
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Regular Ticket x1</span>
                                <span class="font-bold">Rp 150.000</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">VIP Ticket x0</span>
                                <span class="font-bold">Rp 0</span>
                            </div>
                            <div class="text-sm text-gray-400">
                                <p>Fasilitas termasuk:</p>
                                <ul class="list-disc pl-5 mt-2 space-y-1">
                                    <li>Akses talk show 2.5 jam</li>
                                    <li>Workbook & materials</li>
                                    <li>Coffee break & snack</li>
                                </ul>
                            </div>
                        </div>

                        <div class="border-t border-gray-700 pt-4 mb-6">
                            <div class="flex justify-between font-bold text-lg">
                                <span>Total</span>
                                <span>Rp 150.000</span>
                            </div>
                        </div>

                        <button
                            class="w-full py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition-colors mb-4">
                            Lanjutkan Pembayaran
                        </button>

                        <div class="text-xs text-gray-400 text-center">
                            <p>Dengan memesan, Anda menyetujui syarat dan ketentuan.</p>
                            <p class="mt-2">Event ID: {{ $event_id ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ticket quantity controls
            document.querySelectorAll('button.w-10').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('input[type="number"]');
                    if (this.textContent === '+') {
                        input.value = parseInt(input.value) + 1;
                    } else {
                        if (parseInt(input.value) > parseInt(input.min)) {
                            input.value = parseInt(input.value) - 1;
                        }
                    }
                    updateOrderSummary();
                });
            });

            // Input change listener
            document.querySelectorAll('input[type="number"]').forEach(input => {
                input.addEventListener('change', function() {
                    updateOrderSummary();
                });
            });

            function updateOrderSummary() {
                const regularQty = parseInt(document.querySelector('input[value="1"]').value) || 0;
                const vipQty = parseInt(document.querySelector('input[value="0"]').value) || 0;

                const regularTotal = regularQty * 150000;
                const vipTotal = vipQty * 300000;
                const total = regularTotal + vipTotal;

                // Update summary display (ini akan diimplementasi lebih lengkap di aplikasi nyata)
                console.log('Regular:', regularQty, 'VIP:', vipQty, 'Total:', total);
            }
        });
    </script>
@endpush
