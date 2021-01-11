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
                $table->uuid('id')->primary();
                $table->string('name');
                $table->string('username')->unique();
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
                $table->dateTime('last_activity')->nullable();
                $table->string('website')->nullable();
                $table->dateTime('email_verified_at')->nullable();
                $table->enum('email_notify_enabled', ['yes', 'no'])->default('yes')->index();
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            }
        );
        DB::statement('ALTER TABLE `users` ADD FULLTEXT INDEX users_username_index (name, username)');
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
