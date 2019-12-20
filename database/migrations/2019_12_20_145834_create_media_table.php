<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('model_type', 191);
			$table->bigInteger('model_id')->unsigned();
			$table->string('collection_name', 191);
			$table->string('name', 191);
			$table->string('file_name', 191);
			$table->string('mime_type', 191)->nullable();
			$table->integer('size')->unsigned();
			$table->text('manipulations');
			$table->text('custom_properties');
			$table->text('responsive_images');
			$table->integer('order_column')->unsigned()->nullable();
			$table->timestamps();
			$table->index(['model_type','model_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('media');
	}

}
