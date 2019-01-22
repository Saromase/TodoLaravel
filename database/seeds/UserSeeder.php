<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add Root User
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@root.fr',
            'password' => bcrypt('password'),
        ]);

        for ($i=0; $i < 15 ; $i++) { 
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
