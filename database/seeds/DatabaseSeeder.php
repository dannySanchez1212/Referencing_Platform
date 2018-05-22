<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleTableSeeder::class);

	    // Add Users
	    $this->call(UserTableSeeder::class);
        // faker eliminar es solo prueba
        //$this->call(fakerTableSeeder::class);
    }
}
