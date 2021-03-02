<?php

namespace Database\Seeders;
use App\Models\Concept;

use Illuminate\Database\Seeder;

class ConceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Concept::create([
            'concept'=>'TUITION',
            'cost'=>'0',
        ]);

        Concept::create([
            'concept'=>'ENTRY',
            'cost'=>'200',
        ]);

        Concept::create([
            'concept'=>'CERTIFICATE',
            'cost'=>'50',
        ]);

    }
}
