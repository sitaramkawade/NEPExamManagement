<?php

namespace Database\Seeders;

use App\Models\Academicyear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicyearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Academicyear::create(
            [ 
                'year_name'=>'2023-24',
                'active'=>'1',
             ]
         );
    }
}
