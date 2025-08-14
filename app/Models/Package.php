<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    // Nama tabel yang digunakan oleh model ini
    protected $table = 'packages';
    protected $guarded = ["id"];

    // Relationship with the Bookings model
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
