<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('trip_number')->nullable();
            $table->foreignId('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreignId('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreignId('driver_car_id')->references('id')->on('driver_cars')->onDelete('cascade');
            $table->date('trip_date');
            $table->time('trip_time_from');
            $table->time('trip_time_to');
            $table->integer('chairs');
            $table->tinyInteger('air_cond')->default(0);
            $table->tinyInteger('bags')->default(0);
            $table->string('from_lat');
            $table->string('from_lng');
            $table->text('from_address_ar');
            $table->text('from_address_en');
            $table->string('to_lat');
            $table->string('to_lng');
            $table->text('to_address_ar');
            $table->text('to_address_en');
            $table->string('end_lat')->nullable();
            $table->string('end_lng')->nullable();
            $table->text('end_address_ar')->nullable();
            $table->text('end_address_en')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->dateTime('cancel_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
};
