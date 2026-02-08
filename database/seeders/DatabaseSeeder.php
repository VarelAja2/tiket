<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);

        Banner::create([
            'title' => 'Pesan Tiket Event Tanpa Ribet',
            'subtitle' => 'Nikmati pengalaman menonton terbaik',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse molestiae voluptate quia! Illum vero ipsum at impedit!',
            'image_url' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1925&q=80',
            'button_text' => 'Lihat Film',
            'button_url' => '#',
            'button_secondary_text' => 'Promo Hari Ini',
            'button_secondary_url' => '#',
            'order' => 1,
            'is_active' => true,
            'type' => 'main'
        ]);

        // Category Seeder
        $categories = [
            ['name' => 'Festival', 'slug' => 'festival', 'color' => 'red'],
            ['name' => 'Kompetisi', 'slug' => 'kompetisi', 'color' => 'blue'],
            ['name' => 'Workshop', 'slug' => 'workshop', 'color' => 'green'],
            ['name' => 'Seminar', 'slug' => 'seminar', 'color' => 'purple'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Genre Seeder
        $genres = ['Action', 'Adventure', 'Comedy', 'Drama', 'Horror', 'Sci-Fi', 'Fantasy'];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre,
                'slug' => strtolower($genre),
                'is_active' => true
            ]);
        }

        // Cinema Seeder
        $cinemas = [
            [
                'name' => 'XXI Plaza Indonesia',
                'slug' => 'xxi-plaza-indonesia',
                'location' => 'Jakarta Pusat',
                'studio_count' => 12,
                'facilities' => 'Dolby Atmos, IMAX, 4DX, Food Court'
            ],
            [
                'name' => 'CGV Grand Indonesia',
                'slug' => 'cgv-grand-indonesia',
                'location' => 'Jakarta Pusat',
                'studio_count' => 10,
                'facilities' => 'ScreenX, Gold Class, SweetBox, Starbucks'
            ],
            [
                'name' => 'Cinema 31 BSD City',
                'slug' => 'cinema-31-bsd-city',
                'location' => 'Tangerang Selatan',
                'studio_count' => 8,
                'facilities' => 'Velvet Class, 3D Digital, Cafe, Playground'
            ]
        ];

        foreach ($cinemas as $cinema) {
            Cinema::create($cinema);
        }

        // Tambahkan seeder kategori
        $categories = [
            [
                'name' => 'Festival',
                'slug' => 'festival',
                'description' => 'Event festival musik, film, dan seni',
                'icon' => 'fas fa-music',
                'color' => '#ef4444',
                'is_active' => true
            ],
            [
                'name' => 'Kompetisi',
                'slug' => 'kompetisi',
                'description' => 'Lomba dan kompetisi berbagai bidang',
                'icon' => 'fas fa-trophy',
                'color' => '#3b82f6',
                'is_active' => true
            ],
            [
                'name' => 'Workshop',
                'slug' => 'workshop',
                'description' => 'Pelatihan dan workshop keterampilan',
                'icon' => 'fas fa-chalkboard-teacher',
                'color' => '#10b981',
                'is_active' => true
            ],
            [
                'name' => 'Seminar',
                'slug' => 'seminar',
                'description' => 'Seminar dan konferensi',
                'icon' => 'fas fa-microphone',
                'color' => '#8b5cf6',
                'is_active' => true
            ],
            [
                'name' => 'Konser',
                'slug' => 'konser',
                'description' => 'Pertunjukan musik live',
                'icon' => 'fas fa-guitar',
                'color' => '#f59e0b',
                'is_active' => true
            ],
            [
                'name' => 'Talk Show',
                'slug' => 'talk-show',
                'description' => 'Diskusi dan talk show inspiratif',
                'icon' => 'fas fa-comments',
                'color' => '#ec4899',
                'is_active' => true
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Promo Seeder
        $promos = [
            [
                'title' => 'Diskon 50% Tiket Bioskop',
                'short_description' => 'Diskon spesial setiap hari Senin - Kamis',
                'description' => 'Dapatkan diskon 50% untuk semua tiket bioskop setiap hari Senin sampai Kamis. Berlaku untuk semua film dan semua studio.',
                'promo_code' => 'DISKON50',
                'type' => 'percentage',
                'discount_value' => 50,
                'valid_from' => now(),
                'valid_until' => now()->addMonths(3),
                'usage_limit' => 1000,
                'used_count' => 245,
                'min_purchase' => 50000,
                'is_active' => true,
            ],
            [
                'title' => 'Potongan Rp 20.000',
                'short_description' => 'Potongan langsung untuk pembelian minimal Rp 100.000',
                'description' => 'Dapatkan potongan harga langsung Rp 20.000 untuk pembelian minimal Rp 100.000.',
                'promo_code' => 'HEMAT20K',
                'type' => 'fixed_amount',
                'discount_value' => 20000,
                'valid_from' => now(),
                'valid_until' => now()->addMonth(),
                'usage_limit' => 500,
                'used_count' => 189,
                'min_purchase' => 100000,
                'is_active' => true,
            ],
            [
                'title' => 'Buy 1 Get 1',
                'short_description' => 'Beli 1 tiket dapat 1 tiket gratis',
                'description' => 'Promo spesial untuk film tertentu. Beli 1 tiket dapat 1 tiket gratis untuk film yang sama.',
                'promo_code' => 'B1G1',
                'type' => 'buy_one_get_one',
                'discount_value' => 1,
                'valid_from' => now(),
                'valid_until' => now()->addDays(15),
                'usage_limit' => 200,
                'used_count' => 56,
                'min_purchase' => null,
                'is_active' => true,
            ],
        ];

        foreach ($promos as $promo) {
            Promo::create($promo);
        }
    }
}
