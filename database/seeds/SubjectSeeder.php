<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('subjects')->insert([
                'name' => 'Tên môn học' . ($i + 1),
                'ma_mh' => 'INT3307_' . ($i + 1),
                'giang_vien' => 'TS.Dương Lê Minh',
                'email_gv' => 'minhdl@vnu.uet.edu.vn',
                'ki_hoc' => 'Học kì I năm 2020 - 2021',
                'description' => 'Đây là môn học yêu thích của bạn'
            ]);
        }
    }
}