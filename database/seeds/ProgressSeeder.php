<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            for ($j = 1; $j <= 20; $j++) {
                DB::table('progresses')->insert([
                    'user_id' => $j+1,
                    'subject_id' => $i,
                    'score' => rand(5, 10),
                    'rate' => 'Có ý thức chăm chỉ trong học tập'
                ]);
            }
        }
    }
}