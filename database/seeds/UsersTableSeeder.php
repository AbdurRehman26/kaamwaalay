<?php

use Illuminate\Database\Seeder;
use App\Data\Models\User;
use App\Data\Models\Role;
use Carbon\Carbon;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    
    protected $signature = 'user-table-seed';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $date = Carbon::now();
        $data = [];
        $data[] =[
            'id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'hassaan.zia@cygnismedia.com',
            'password' => bcrypt('cygnismedia'),
            'role_id' => Role::ADMIN,
            'access_level' => 'full',
            'country_id' => NULL,
            'state_id' => NULL,
            'city_id' => NULL,
            'status' => 'active',
            'activation_key' => bcrypt('cygnismedia'),
            'activated_at' => $date,
            'remember_token' => bcrypt('cygnismedia'),
            'created_at' => $date,
            'updated_at' => $date,
            'deleted_at' => NULL,
        ];
        $i =2;

        $imagesArray = [
            'https://s3-us-west-2.amazonaws.com/s.cdpn.io/328820/profile/profile-512.jpg?1',
            'https://media.licdn.com/dms/image/C4D03AQE3TqYVs-m4mQ/profile-displayphoto-shrink_200_200/0?e=1541030400&v=beta&t=c7P4XGmqCJv7z9JR5xeoU9e1qC1uT9Vo1AaFNxPo_xo',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmoNN5E0NnKTB41bzSN9J1CV0L_VqlrMHM3MFjTTkWHXbJUA42',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7rWwNDM2hUyPZTYrIoQ4cmrgznC93r9aZFRvsoQWYcvuZy5DG',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp9GN6TrHUv4FngRI2PBRUxYOto1qC5aHrejN96iQFBdzVP3Dh',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_waCO6QkMLzsG__DqOpWDdG7loMKZ_GzYlH7kXPWvrCosq4dk',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-NbkK5GFyUDmT4g7ZfYr6oSdRIDNeG0NA_ihu8Rkkv_l3IIvq'
        ];


        $roles = [Role::CUSTOMER,Role::SERVICE_PROVIDER,Role::REVIEWER];

        foreach (range(1,500) as $index) {
            $data[]=[
                'id' => $i,
                'first_name' => $faker->firstName,
                'last_name' =>$faker->LastName,
                'email' => $faker->email,
                'password' => bcrypt('cygnismedia'),
                'role_id' => $roles[array_rand($roles)],
                'access_level' => 'full',
                'country_id' => NULL,
                'state_id' => NULL,
                'city_id' => NULL,
                'profile_image' => $imagesArray[array_rand($imagesArray)],
                'status' => 'active',
                'activation_key' => bcrypt('cygnismedia'),
                'activated_at' => $date,
                'remember_token' => bcrypt('cygnismedia'),
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ];
            $i++;
        } 
        User::insertOnDuplicateKey($data);

    }
}
