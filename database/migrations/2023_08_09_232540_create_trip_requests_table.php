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
        Schema::create('trip_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreignId('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreignId('driver_car_id')->references('id')->on('driver_cars')->onDelete('cascade');
            $table->foreignId('trip_id')->nullable()->references('id')->on('trips')->onDelete('cascade');
            $table->date('trip_date');
            $table->time('trip_time');
            $table->double('price')->nullable();
            $table->integer('chairs');
            $table->integer('num_of_hours')->default(0);
            $table->integer('wait_hours')->default(0);
            $table->dateTime('accept_at')->nullable();
            $table->dateTime('reject_at')->nullable();
            $table->dateTime('user_cancel_at')->nullable();
            $table->string('user_cancel_reason')->nullable();
            $table->integer('user_rate')->nullable();
            $table->integer('user_rate_txt')->nullable();
            $table->integer('driver_rate')->nullable();
            $table->integer('driver_rate_txt')->nullable();
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
        Schema::dropIfExists('trip_requests');
    }
};
