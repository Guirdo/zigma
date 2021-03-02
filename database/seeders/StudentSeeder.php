<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'enrollment'=>'21001',
            'name' => 'Paola',
            'lastname'=>'Ramirez',
            'birthday'=>date('Y-m-d',mktime(0,0,0,1,17,1997)),
            'gender'=>'1',
            'email' => 'paola.r@gmail.com',
            'address'=>'xxxxxxxxx', 
            'phonenumber'=>'1234567890',
        ]);
    }
}
