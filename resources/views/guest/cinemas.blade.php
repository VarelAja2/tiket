@extends('guest.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 pt-24">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-8">Bioskop Partner</h1>
        
        <!-- City Filter -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Pilih Kota</h2>
            <div class="flex flex-wrap gap-2">
                @php $cities = ['Jakarta', 'Bandung', 'Surabaya', 'Medan', 'Semarang', 'Yogyakarta', 'Malang', 'Bali'] @endphp
                @foreach($cities as $city)
                <button class="city-btn px-4 py-2 {{ $loop->first ? 'bg-red-600 text-white' : 'bg-gray-800 text-gray-300' }} rounded-lg hover:bg-gray-700 transition-colors">
                    {{ $city }}
                </button>
                @endforeach
            </div>
        </div>

        <!-- Cinema Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pb-12">
            @php 
            $cinemas = [
                ['name' => 'XXI Plaza Indonesia', 'location' => 'Jakarta Pusat', 'studios' => 12, 'logo' => '🎬'],
                ['name' => 'CGV Grand Indonesia', 'location' => 'Jakarta Pusat', 'studios' => 10, 'logo' => '🎥'],
                ['name' => 'Cinema 31 BSD City', 'location' => 'Tangerang Selatan', 'studios' => 8, 'logo' => '🏢'],
                ['name' => 'XXI Taman Anggrek', 'location' => 'Jakarta Barat', 'studios' => 9, 'logo' => '🎬'],
                ['name' => 'CGV Central Park', 'location' => 'Jakarta Barat', 'studios' => 11, 'logo' => '🎥'],
                ['name' => 'Cinema 31 Pondok Indah', 'location' => 'Jakarta Selatan', 'studios' => 7, 'logo' => '🏢'],
            ]
            @endphp
            
            @foreach($cinemas as $cinema)
            <div class="bg-gray-800 rounded-xl p-6 hover:border-red-600 border border-transparent transition-all duration-300 hover:scale-[1.02]">
                <div class="flex items-start mb-4">
                    <div class="w-16 h-16 bg-red-600 rounded-lg flex items-center justify-center mr-4 text-2xl">
                        {{ $cinema['logo'] }}
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">{{ $cinema['name'] }}</h3>
                        <p class="text-gray-400 flex items-center mt-1">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            {{ $cinema['location'] }}
                        </p>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <div class="text-gray-400 text-sm">Studio</div>
                        <div class="font-bold">{{ $cinema['studios }} studio</div>
                    </div>
                    <div>
                        <div class="text-gray-400 text-sm">Fasilitas</div>
                        <div class="font-bold">Dolby Atmos, IMAX</div>
                    </div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Kursi nyaman premium
                    </div>
                    <div class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Food court lengkap
                    </div>
                    <div class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Parking luas
                    </div>
                </div>
                
                <a href="{{ route('cinema.detail', ['id' => $loop->iteration]) }}" 
                   class="block mt-6 py-3 bg-red-600 text-white text-center rounded-lg hover:bg-red-700 transition-colors">
                    Lihat Jadwal
                </a>
            </div>
            @endforeach
        </div>

        <!-- Map Section -->
        <div class="bg-gray-800 rounded-xl p-6 mb-12">
            <h2 class="text-2xl font-bold mb-6">Lokasi Bioskop</h2>
            <div class="h-64 bg-gradient-to-br from-blue-900/20 to-gray-900 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <span class="text-6xl mb-4">🗺️</span>
                    <p class="text-gray-300">Peta lokasi bioskop akan tampil di sini</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // City filter functionality
    const cityButtons = document.querySelectorAll('.city-btn');
    cityButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            cityButtons.forEach(b => {
                b.classList.remove('bg-red-600', 'text-white');
                b.classList.add('bg-gray-800', 'text-gray-300');
            });
            this.classList.remove('bg-gray-800', 'text-gray-300');
            this.classList.add('bg-red-600', 'text-white');
        });
    });
});
</script>
@endsection