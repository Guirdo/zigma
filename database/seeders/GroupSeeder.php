<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'days'=>'Saturday',
            'starthour'=>'12:00:00',
            'finalhour'=>'17:00:00',
            'firstdate'=>'2021-02-22',
            'teacher_id'=>'2',
            'course_id'=>'1',
        ]);
    }
}
