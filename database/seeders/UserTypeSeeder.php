<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'usertype' => 'ADMINISTRATOR',
        ]);

        UserType::create([
            'usertype' => 'EMPLOYEE',
        ]);

        UserType::create([
            'usertype' => 'TEACHER',
        ]);
    }
}
