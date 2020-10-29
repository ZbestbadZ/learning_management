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
        for ($i=1; $i<=20 ; $i++) {
            DB::table('progresses')->insert([
                'user_id'=> $i,
                'subject_id'=> $i,
                'score' => rand(3, 10),
                'rate' => 'danh gia cua giang vien'
            ]);
        }
    }
}