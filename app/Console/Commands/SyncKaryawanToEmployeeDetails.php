<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\EmployeeDetail;

class SyncKaryawanToEmployeeDetails extends Command
{
    protected $signature = 'sync:karyawan-to-employee-details';
    protected $description = 'Sinkronisasi data karyawan dari tabel users ke tabel employee_details';

    public function handle()
    {
        $karyawans = User::where('usertype', 'karyawan')->get();

        foreach ($karyawans as $user) {
            EmployeeDetail::updateOrCreate(
                ['user_id' => $user->id], // Hubungkan dengan ID user
                [
                    'nama_karyawan' => $user->name,
                    'masuk' => 0, // Default value
                    'sakit' => 0, // Default value
                    'izin' => 0, // Default value
                    'gaji' => null, // Kosongkan jika tidak ada nilai
                    'bulan' => null, // Kosongkan jika tidak ada nilai
                ]
            );
        }

        $this->info('Sinkronisasi selesai!');
    }
}

