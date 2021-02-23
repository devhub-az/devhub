<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->uuid('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->string('commentable_type')->default('');
            $table->uuid('commentable_id');
            $table->text('body');
            $table->timestamps();
            $table->dateTime('created_at')->nullable()->default(null)->change();
            $table->dateTime('updated_at')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
