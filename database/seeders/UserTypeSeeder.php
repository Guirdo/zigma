<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'usertype' => 'ADMINISTRATOR',
        ]);

        DB::table('user_types')->insert([
            'usertype' => 'EMPLOYEE',
        ]);
    }
}
