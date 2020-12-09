<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocalizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localization', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idx');
            $table->char('model', 50)->nullable();
            $table->text('ru')->nullable();
            $table->text('en')->nullable();
            $table->text('az')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('localization');
    }
}
