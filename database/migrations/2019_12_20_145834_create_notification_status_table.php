<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification_status', function(Blueprint $table)
		{
			$table->integer('id')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('notification_id')->nullable();
			$table->integer('read_status')->nullable();
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
		Schema::drop('notification_status');
	}

}
