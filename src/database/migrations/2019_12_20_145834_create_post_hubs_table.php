<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostHubsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_hubs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('posts_id')->index();
			$table->unsignedInteger('hub_id')->index();
			$table->unique(['posts_id', 'hub_id']);

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post_hubs');
	}

}
