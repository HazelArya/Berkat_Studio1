<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('employee_details', function (Blueprint $table) {
        $table->id(); // Primary Key
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
        $table->string('nama_karyawan');
        $table->integer('masuk')->default(0);
        $table->integer('sakit')->default(0);
        $table->integer('izin')->default(0);
        $table->decimal('gaji', 10, 2);
        $table->string('bulan');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_details');
    }
};
