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
        Schema::create('driver_cars', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('approved')->default(0);
            $table->tinyInteger('available')->default(1);
            $table->foreignId('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreignId('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->string('color_ar');
            $table->string('color_en');
            $table->string('car_image')->comment('image');
            $table->string('car_licence_image')->comment('image');
            $table->string('document_image')->comment('image');
            $table->string('car_plate_num');
            $table->string('car_plate_txt');
            $table->string('factory_year');
            $table->string('car_body_id')->comment('number of 4asaeh')->nullable();
            $table->integer('chairs');
            $table->tinyInteger('air')->default(0);
            $table->tinyInteger('bags')->default(0);
            $table->string('lat');
            $table->string('lng');
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('brand_ar');
            $table->string('brand_en');
            $table->string('brand_image');
            $table->foreignId('modell_id')->references('id')->on('modells')->onDelete('cascade');
            $table->string('modell_ar');
            $table->string('modell_en');
            $table->string('modell_image');
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
        Schema::dropIfExists('driver_cars');
    }
};
