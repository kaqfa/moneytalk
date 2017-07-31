<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(20),
            'email' => str_random(25).'@email.com',
            'password' => bcrypt('rahasia123')
        ]);
    }
}
