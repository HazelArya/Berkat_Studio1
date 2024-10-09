<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('package')->insert([
            'id' => 0 ,
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
    }
}