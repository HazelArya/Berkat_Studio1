<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('package', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nama paket
            $table->string('image'); // Lokasi gambar
            $table->decimal('rating', 2, 1); // Rating (misalnya 4.5)
            $table->enum('class', ['reguler', 'vip', 'vvip']); // Jenis class
            // Menyimpan deskripsi dan harga untuk setiap jenis class
            $table->text('description_reguler'); // Deskripsi untuk reguler
            $table->text('description_vip'); // Deskripsi untuk vip
            $table->text('description_vvip'); // Deskripsi untuk vvip
            $table->decimal('price_reguler', 10, 2); // Harga untuk reguler
            $table->decimal('price_vip', 10, 2); // Harga untuk vip
            $table->decimal('price_vvip', 10, 2); // Harga untuk vvip
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package');
    }
};
