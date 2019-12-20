<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsViewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts_views', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('post_id')->nullable();
			$table->string('title', 50)->nullable();
			$table->string('url', 50)->nullable();
			$table->string('session_id', 50)->nullable();
			$table->string('user_id', 50)->nullable();
			$table->string('ip', 50)->nullable();
			$table->text('agent', 16777215)->nullable();
			$table->timestamps();
			$table->unique(['ip','post_id'], 'ip');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts_views');
	}

}
