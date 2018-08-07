<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceProviderServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_provider_services', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->integer('service_provider_profile_request_id')->unsigned()->index('sppri');
			$table->integer('service_id')->unsigned()->nullable()->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('service_provider_services');
	}

}
