<?php

use App\User;
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
        DB::table('users')->insert([
            'name' => 'admin',
            'ma_sv' => '17020775',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'password' => bcrypt('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'ma_sv' => '17020777',
            'email' => 'user@gmail.com',
            'role' => '0',
            'password' => bcrypt('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'ma_sv' => '17020755',
            'email' => 'user1@gmail.com',
            'role' => '0',
            'password' => bcrypt('123'),
        ]);
        factory(App\User::class, 30)->create();
    }
}