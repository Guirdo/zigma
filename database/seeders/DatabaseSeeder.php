<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //Catalogue
            UserTypeSeeder::class,
            EmployeeTypeSeeder::class,

            //Main
            CourseSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
        ]);
    }
}
