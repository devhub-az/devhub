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
        Schema::create(
            'users',
            function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('avatar')->default('default.png');
//            $table->string('background')->nullable();
//            $table->string('username', 191)->unique('username');
//            $table->string('name', 50)->nullable();
//            $table->string('surname', 50)->nullable();
//            $table->string('about', 200)->nullable();
//            $table->string('email', 191)->unique();
//            $table->dateTime('email_verified_at')->nullable();
//            $table->string('password', 191);
//            $table->string('remember_token', 100)->nullable();
//            $table->timestamps();

                $table->uuid('id')->primary();
                $table->string('name')->unique();
                $table->string('username')->nullable();
                $table->string('avatar')->default('default');
                $table->string('description')->nullable();
                $table->string('email')->unique();
                $table->integer('karma')->nullable()->default(0);
                $table->integer('rating')->nullable()->default(0);
                $table->string('confirm_code', 64)->unique()->nullable();
                $table->tinyInteger('status')->default(false);
                $table->boolean('is_admin')->default(false);
                $table->string('password');
                $table->string('github_url')->nullable();
                $table->string('website')->nullable();
                $table->dateTime('email_verified_at')->nullable();
                $table->enum('email_notify_enabled', ['yes', 'no'])->default('yes')->index();
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            }
        );
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
