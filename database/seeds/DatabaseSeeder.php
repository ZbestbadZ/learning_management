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
        $classes = [
            UserSeeder::class,
            NotifySeeder::class,
            SubjectSeeder::class,
            ProgressSeeder::class,
        ];

        $this->call($classes);
    }
}