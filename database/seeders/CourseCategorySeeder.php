<?php

namespace Database\Seeders;

use App\Models\Coursecategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coursecategory::create([

            'course_category'=>'Professional',
        ]);

        Coursecategory::create([

            'course_category'=>'Non Professional',
        ]);
    }
}
