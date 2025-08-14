<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateSalariesTable extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('salaries', function (Blueprint $table) {
//             $table->id();
//             $table->string('employee_name');
//             $table->integer('days_present'); // Jumlah hari masuk
//             $table->integer('days_sick')->default(0); // Jumlah hari sakit
//             $table->integer('days_leave')->default(0); // Jumlah hari izin
//             $table->decimal('salary', 10, 2); // Gaji
//             $table->string('month'); // Bulan pembayaran
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('salaries');
//     }
// }
