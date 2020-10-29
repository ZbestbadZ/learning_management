<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20 ; $i++) {
            DB::table('notifies')->insert([
                'user_id'=> $i,
                'name' => 'name_notify'.($i),
                'notify' => 'thong bao',
            ]);
        }

    }
}
