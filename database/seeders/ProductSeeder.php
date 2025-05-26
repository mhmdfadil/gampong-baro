<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $badges = [
            ['badge' => 'Baru', 'badge_class' => 'bg-primary'],
            ['badge' => 'Diskon', 'badge_class' => 'bg-danger'],
            ['badge' => 'Terlaris', 'badge_class' => 'bg-success'],
            ['badge' => 'Terbatas', 'badge_class' => 'bg-warning'],
            ['badge' => 'Premium', 'badge_class' => 'bg-info'],
            ['badge' => 'Koleksi', 'badge_class' => 'bg-secondary'],
            ['badge' => 'Populer', 'badge_class' => 'bg-dark'],
            ['badge' => 'Rekomendasi', 'badge_class' => 'bg-light text-dark'],
            ['badge' => 'Best Value', 'badge_class' => 'bg-success'],
            ['badge' => 'Eksklusif', 'badge_class' => 'bg-purple'],
            ['badge' => 'Limited Edition', 'badge_class' => 'bg-warning'],
            ['badge' => 'Hot Item', 'badge_class' => 'bg-danger'],
            ['badge' => 'Trending', 'badge_class' => 'bg-info'],
            ['badge' => 'Flash Sale', 'badge_class' => 'bg-danger'],
            ['badge' => 'Hemat', 'badge_class' => 'bg-success'],
        ];

        $categories = [
            'Hasil Pertanian',
            'Kerajinan Tangan',
            'Makanan Olahan',
            'Minuman',
            'Lainnya'
        ];

        foreach (range(1, 15) as $index) {
            $badgeData = $badges[$index - 1];
            Product::create([
                'name' => 'Produk ' . $index,
                'location' => 'Lokasi ' . $index,
                'description' => 'Deskripsi produk ke-' . $index,
                'price' => rand(10000, 50000),
                'original_price' => rand(60000, 100000),
                'rating' => rand(30, 50) / 10,
                'image' => 'https://via.placeholder.com/150?text=Produk+' . $index,
                'category' => $categories[($index - 1) % count($categories)],
                'badge' => $badgeData['badge'],
                'badge_class' => $badgeData['badge_class'],
            ]);
        }
    }
}
