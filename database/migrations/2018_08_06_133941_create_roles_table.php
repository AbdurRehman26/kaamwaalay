<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->boolean('can_register')->nullable()->default(0);
                $table->json('scope')->nullable();
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }

}
