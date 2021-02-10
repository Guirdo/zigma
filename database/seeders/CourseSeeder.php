<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'course'=>'ENGLISH A1',
            'cost'=>'150.00',
        ]);

        DB::table('courses')->insert([
            'course'=>'ENGLISH B1',
            'cost'=>'150.00',
        ]);
    }
}
