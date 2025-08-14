<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'customer_name',
        'user_id',
        'package_id', 
        'booking_date', 
        'class', 
        'time_slot', 
        'client_note',
        'price', // Menambahkan kolom harga
        'status',
        'no_telp', 
        'snap_token' // Menambahkan kolom status
    ];

    // Relationship with the Package model
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with the Admin model (if necessary, adjust as needed)
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    
    // Optionally, you can create methods for status, if needed
    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_COMPLETED = 'completed';

    /**
     * Get the human-readable status
     */
    public function getStatusLabel()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return 'Pending';
            case self::STATUS_CONFIRMED:
                return 'Confirmed';
            case self::STATUS_COMPLETED:
                return 'Completed';
            default:
                return 'Unknown';
        }
    }
}
