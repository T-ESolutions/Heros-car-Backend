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
            $table->string('color_ar')->nullable();
            $table->string('color_en')->nullable();
            $table->string('car_image')->nullable();
            $table->string('car_licence_image')->nullable();
            $table->string('document_image')->nullable();
            $table->string('car_plate_num')->nullable();
            $table->string('car_plate_txt')->nullable();
            $table->string('factory_year')->nullable();
            $table->string('car_body_id')->nullable();
            $table->integer('chairs')->nullable();
            $table->tinyInteger('air')->default(0);
            $table->tinyInteger('bags')->default(0);
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('brand_ar')->nullable();
            $table->string('brand_en')->nullable();
            $table->string('brand_image')->nullable();
            $table->foreignId('modell_id')->references('id')->on('modells')->onDelete('cascade');
            $table->string('modell_ar')->nullable();
            $table->string('modell_en')->nullable();
            $table->string('modell_image')->nullable();
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
