<?php

use Illuminate\Database\Seeder;
use App\Data\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        City::insertOnDuplicateKey(array (
            array (
                'id' => 1,
                'name' => 'Karachi'
            )
        ));
    }
}
