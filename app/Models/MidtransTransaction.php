<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidtransTransaction extends Model
{
    use HasFactory;

    // Tentukan properti yang dapat diisi
    protected $fillable = [
        'order_id', 
        'transaction_id', 
        'payment_type', 
        'gross_amount', 
        'transaction_status', 
        'payment_method',
        'transaction_details'
    ];

    // Tentukan nama tabel jika tidak menggunakan konvensi standar
    protected $table = 'midtrans_transactions';
}
