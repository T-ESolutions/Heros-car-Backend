<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email', 255)->unique()->nullable();
            $table->string('phone')->unique();
            $table->string('password')->nullable();
            $table->string('image')->comment('image')->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->text('fcm_token')->nullable();
            $table->double('rate')->nullable();
            $table->tinyInteger('active')->default(0)->comment('0->unactive and 1->Active');
            $table->tinyInteger('suspend')->default(0)->comment('0->unsuspended and 1->suspended');
            $table->enum('social_type', ['google','facebook','twitter','other','apple'])->default('other');
            $table->text('social_id')->nullable();
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
        Schema::dropIfExists('users');
    }
}
