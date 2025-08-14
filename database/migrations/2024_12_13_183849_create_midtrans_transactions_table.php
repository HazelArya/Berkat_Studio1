<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMidtransTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('midtrans_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('transaction_id')->nullable();
            $table->string('payment_type');
            $table->decimal('gross_amount', 15, 2);
            $table->string('transaction_status');
            $table->string('payment_method');
            $table->json('transaction_details')->nullable();  // Menyimpan data transaksi dalam format JSON jika perlu
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('midtrans_transactions');
    }
};