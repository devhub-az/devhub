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
                $table->string('name')->index();
                $table->string('username')->unique()->index();
                $table->string('avatar')->default('default');
                $table->string('description')->nullable();
                $table->string('email')->unique();
                $table->integer('karma')->nullable()->default(0);
                $table->integer('rating')->nullable()->default(0);
                $table->integer('type')->default(0);
                $table->string('password');
                $table->string('github_id')->nullable();
                $table->string('github_url')->nullable();
                $table->dateTime('email_verified_at')->nullable();
                $table->dateTime('last_active')->nullable();
                $table->enum('email_notify_enabled', ['yes', 'no'])->default('yes')->index();
                $table->rememberToken();
                $table->dateTime('banned_at')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->index(['created_at', 'updated_at']);
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
