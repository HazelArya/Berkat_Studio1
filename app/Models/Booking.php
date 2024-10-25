<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'booking_date',
        'time_slot',
        'client_note',
    ];

    /**
     * Get the package that this booking is associated with.
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
 