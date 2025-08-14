<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';
    // protected $fillable = ['title', 'date', 'description'];
    protected $casts = [
        'date' => 'datetime', 
    ];

    protected $guarded = ['id'];

     // Menentukan relasi satu-ke-banyak (one-to-many) dengan model Booking
     public function bookings()
    {
        return $this->hasMany(Booking::class, 'booking_date', 'date')
            ->whereMonth('booking_date', '=', DB::raw('MONTH(reports.date)'))
            ->whereYear('booking_date', '=', DB::raw('YEAR(reports.date)'));
    }

}
