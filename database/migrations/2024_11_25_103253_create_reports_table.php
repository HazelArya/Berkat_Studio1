<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Judul laporan
            $table->date('date'); // Tanggal laporan
            $table->text('description')->nullable(); // Deskripsi laporan (opsional)
            $table->enum('status', ['pending', 'in-progress', 'completed'])->default('pending'); // Status laporan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
