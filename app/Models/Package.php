<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    // Nama tabel yang digunakan oleh model ini
    protected $table = 'packages';

    // Daftar atribut yang dapat diisi
    // protected $fillable = [
    //     'title', 
    //     'image', 
    //     'rating', 
    //     'class', 
    //     'description_reguler', 
    //     'description_vip', 
    //     'description_vvip', 
    //     'price_reguler', 
    //     'price_vip', 
    //     'price_vvip'
    // ];

    protected $guared = ["id"];
}
