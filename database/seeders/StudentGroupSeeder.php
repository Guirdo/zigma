<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_groups')->insert([
            'student_id'=>'1',
            'group_id'=>'1',
        ]);
    }
}
