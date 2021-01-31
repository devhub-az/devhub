<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taggables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taggable_type')->default('');
            $table->uuid('taggable_id');
            $table->integer('hub_id');
            $table->timestamps();
            $table->dateTime('created_at')->nullable()->default(null)->change();
            $table->dateTime('updated_at')->nullable()->default(null)->change();

            $table->index('taggable_id');
            $table->index('hub_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taggables');
    }
}
