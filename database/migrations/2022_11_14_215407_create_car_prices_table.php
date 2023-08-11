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
        Schema::create('car_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_category_id')->references('id')->on('car_categories')->onDelete('restrict');
            $table->foreignId('department_id')->references('id')->on('departments')->onDelete('restrict');
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('restrict');
            $table->foreignId('modell_id')->references('id')->on('modells')->onDelete('restrict');
            $table->string('factory_year')->nullable();
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
        Schema::dropIfExists('car_prices');
    }
};
