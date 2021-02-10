<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Eliseo',
            'lastname'=>'Nava',
            'gender'=>'2',
            'email' => 'admin@gmail.com',
            'address'=>'xxxxxxxxx', 
            'phonenumber'=>'1234567890',
            'employeetype_id' => 1,
        ]);
    }
}
