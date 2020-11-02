<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'user_id'=> 1,
                'name' => 'Thông báo'.($i),
                'notify' => 'Đây là Nội dung thông báo '.($i),
                'created_at' => Carbon::now()
            ]);
        }

    }
}