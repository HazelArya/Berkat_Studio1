<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
    //  * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('packages')->onDelete('cascade');
            $table->date('booking_date');
            $table->string('time_slot');
            $table->text('client_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
    //  * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
