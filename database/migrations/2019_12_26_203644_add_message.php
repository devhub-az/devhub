<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->unsignedInteger('from_id');
            $table->unsignedInteger('to_id');
            $table->foreign('from_id', 'from')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('to_id', 'to')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
            $table->text('content');
            $table->dateTime('read_at')->nullable();
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
        Schema::drop('messages');
    }
}
