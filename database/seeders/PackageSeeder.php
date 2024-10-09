<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    public function run()
    {
        Package::create([
            'title' => 'Wedding Portrait Package',
            'image' => 'Pernikahan1.jpg',
            'rating' => 4.5,
            'class' => 'reguler',
            'description_reguler' => 'Basic wedding portrait package with standard features.',
            'description_vip' => 'Premium wedding portrait package with additional features.',
            'description_vvip' => 'Exclusive wedding portrait package with all features.',
            'price_reguler' => 11000.00,
            'price_vip' => 21000.00,
            'price_vvip' => 31000.00,
        ]);

        Package::create([
            'title' => 'Family Portrait Package',
            'image' => 'family.jpg',
            'rating' => 4.5,
            'class' => 'vip',
            'description_reguler' => 'Basic family portrait package.',
            'description_vip' => 'Extended family portrait package with additional options.',
            'description_vvip' => 'Top-tier family portrait package with all options.',
           'price_reguler' => 12000.00,
            'price_vip' => 22000.00,
            'price_vvip' => 32000.00,
        ]);

        Package::create([
            'title' => 'Graduation Portrait Package',
            'image' => 'graduation.jpg',
            'rating' => 4.5,
            'class' => 'vip',
            'description_reguler' => 'Basic family portrait package.',
            'description_vip' => 'Extended family portrait package with additional options.',
            'description_vvip' => 'Top-tier family portrait package with all options.',
            'price_reguler' => 13000.00,
            'price_vip' => 23000.00,
            'price_vvip' => 33000.00,
        ]);

        Package::create([
            'title' => 'Poduct Portrait Package',
            'image' => 'product.jpg',
            'rating' => 4.5,
            'class' => 'vip',
            'description_reguler' => 'Basic family portrait package.',
            'description_vip' => 'Extended family portrait package with additional options.',
            'description_vvip' => 'Top-tier family portrait package with all options.',
            'price_reguler' => 14000.00,
            'price_vip' => 24000.00,
            'price_vvip' => 34000.00,
        ]);

        // Tambahkan data contoh lainnya sesuai kebutuhan
    }
}
