<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaigns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('plan_id')->unsigned()->nullable()->index();
			$table->integer('clicks')->nullable();
			$table->integer('views')->nullable();
			$table->integer('user_id')->unsigned()->nullable()->index();
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
		Schema::drop('campaigns');
	}

}
