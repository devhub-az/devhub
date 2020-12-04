<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->increments('id');
            $table->string('avatar')->default('default.jpg');
            $table->string('background')->nullable();
            $table->string('username', 191)->unique('username');
            $table->string('name', 50)->nullable();
            $table->string('surname', 50)->nullable();
            $table->string('about', 50)->nullable();
            $table->integer('karma')->nullable()->default(0);
            $table->integer('rating')->nullable()->default(0);
            $table->string('email', 191)->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->string('remember_token', 100)->nullable();
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
        Schema::drop('users');
    }

}
