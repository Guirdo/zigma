<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'course'=>'ENGLISH A1',
            'weeklycost'=>'150.00',
            'monthlycost'=>'700.00',
        ]);

        Course::create([
            'course'=>'ENGLISH B1',
            'weeklycost'=>'150.00',
            'monthlycost'=>'700.00',
        ]);
    }
}
