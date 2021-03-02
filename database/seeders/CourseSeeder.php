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
            'weeklycost'=>'150.00',
            'monthlycost'=>'700.00',
        ]);

        DB::table('courses')->insert([
            'course'=>'ENGLISH B1',
            'weeklycost'=>'150.00',
            'monthlycost'=>'700.00',
        ]);
    }
}
