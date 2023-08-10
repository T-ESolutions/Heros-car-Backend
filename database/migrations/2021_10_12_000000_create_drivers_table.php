<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('email', 255)->unique()->nullable();
            $table->string('phone')->unique();
            $table->string('password')->nullable();
            $table->string('image')->comment('image');
            $table->string('driver_licence_image')->comment('image');
            $table->string('id_number')->unique()->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->text('fcm_token')->nullable();
            $table->double('rate')->nullable();
            $table->tinyInteger('active')->default(0)->comment('0->unactive and 1->Active');
            $table->tinyInteger('suspend')->default(0)->comment('0->unsuspended and 1->suspended');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('drivers');
    }
}
