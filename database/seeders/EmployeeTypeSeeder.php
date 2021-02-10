<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_types')->insert([
            'employeetype' => 'DIRECTOR',
        ]);

        DB::table('employee_types')->insert([
            'employeetype' => 'ADMINISTRATION',
        ]);

        DB::table('employee_types')->insert([
            'employeetype' => 'TEACHER',
        ]);
    }
}
