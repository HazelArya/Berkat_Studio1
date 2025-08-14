<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateKehadiranTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('kehadiran', function (Blueprint $table) {
//             $table->id();
//             $table->unsignedBigInteger('employee_id');
//             $table->timestamp('waktu_masuk')->nullable();
//             $table->timestamp('waktu_pulang')->nullable();
//             $table->timestamps();

//             // Foreign key to employee_details table
//             $table->foreign('employee_id')
//                   ->references('id')
//                   ->on('employee_details')
//                   ->onDelete('cascade');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('kehadiran');
//     }
// }
