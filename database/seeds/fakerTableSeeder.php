<?php

use Illuminate\Database\Seeder;
Use Faker\Factory;
use App\User;
use App\Role;
USE App\Applications;

class fakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$variable =10;
    	$faker = Factory::create();
        foreach (range(1,10) as $index) {        	
        //$role_admin = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = $faker->name;
        $user->email = $faker->email;
        $user->phone_number=$faker->tollFreePhoneNumber;
        $user->country_code='+58';
        $user->password = bcrypt('12345');
        $user->save();
       // $user->roles()->attach($role_admin);

        $Applications = new Applications();
        $Applications->contact_by_email=true;
        $Applications->contact_by_phone=true;
        $Applications->prequal_link=$faker->url;
        $Applications->source_id=$faker->randomDigitNotNull;
        $Applications->source_display_name=$faker->name;
        $Applications->source_key_name=$faker->name;
        $Applications->save();
        }
    }
}
