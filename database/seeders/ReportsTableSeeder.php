<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportsTableSeeder extends Seeder
{
    public function run()
    {
        Report::create([
            'title' => 'Laporan Kegiatan Bulan Januari',
            'date' => '2024-01-31',
            'description' => 'Detail kegiatan selama bulan Januari.',
            'status' => 'completed',
        ]);

        Report::create([
            'title' => 'Laporan Kegiatan Bulan Februari',
            'date' => '2024-02-28',
            'description' => 'Detail kegiatan selama bulan Februari.',
            'status' => 'completed',
        ]);
    }
}
