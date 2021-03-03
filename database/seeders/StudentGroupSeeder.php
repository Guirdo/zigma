<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentGroup;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentGroup::create([
            'student_id'=>'1',
            'group_id'=>'1',
        ]);
    }
}
