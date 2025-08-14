<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    use HasFactory;

    protected $table = 'employee_details';

    protected $fillable = [
        'user_id',
        'nama_karyawan',
        'masuk',
        'sakit',
        'izin',
        'gaji' => 3500000,
        'bulan',
    ];

    // public function kehadiran()
    // {
    //     return $this->hasMany(Kehadiran::class, 'employee_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_detail_id', 'id');
    }
}
