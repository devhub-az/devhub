<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('favorite.favorites_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid(config('favorite.user_foreign_key'))->index()->comment('user_id');
            $table->uuidMorphs('favoriteable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(config('favorite.favorites_table'));
    }
}
