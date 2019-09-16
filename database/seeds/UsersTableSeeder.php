<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        User::create([
            'name' => 'Salvador Villegas',
            'email' => 'chava@figured.com',
            'is_admin' => 1,
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'is_admin' => 0,
            'password' => bcrypt('secret'),
        ]);
    }
}
