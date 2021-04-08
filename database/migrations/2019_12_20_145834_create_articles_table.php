<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 191)->index();
            $table->string('slug')->unique();
            $table->json('body');
            $table->uuid('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement('ALTER TABLE articles ADD FULLTEXT INDEX articles_title (title)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
