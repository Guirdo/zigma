<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'Eliseo',
            'lastname'=>'Nava',
            'gender'=>'2',
            'email' => 'admin@gmail.com',
            'address'=>'xxxxxxxxx', 
            'phonenumber'=>'1234567890',
            'employee_type_id' => 1,
        ]);

        Employee::create([
            'name' => 'Raquel',
            'lastname'=>'Bobadilla',
            'gender'=>'1',
            'email' => 'raquel.b@gmail.com',
            'address'=>'xxxxxxxxx', 
            'phonenumber'=>'1234567890',
            'employee_type_id' => 3,
        ]);
    }
}
