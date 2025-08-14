<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'usertype',
        'password',
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            if ($user->usertype === 'karyawan') {
                \App\Models\EmployeeDetail::create([
                    'nama_karyawan' => $user->name,
                    'masuk' => 0, // Default value
                    'sakit' => 0, // Default value
                    'izin' => 0, // Default value
                    'gaji' => null, // Kosongkan jika tidak ada nilai
                    'bulan' => null, // Kosongkan jika tidak ada nilai
                ]);
            }
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function employeeDetail()
    {
        return $this->hasOne(EmployeeDetail::class, 'user_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
