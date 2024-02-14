<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Department;
use Faker\Factory as Faker;
use App\Models\Academicyear;
use App\Models\Patternclass;
use App\Models\Subjectbucket;
use App\Models\Subjectcategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectBucketSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $subjectCategoryIds = Subjectcategory::pluck('id')->toArray();
        $patternClassIds = Patternclass::pluck('id')->toArray();
        $departmentIds = Department::pluck('id')->toArray();
        $subjectIds = Subject::pluck('id')->toArray();
        $academicYearIds = Academicyear::pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            Subjectbucket::create([
                'department_id' =>  $faker->randomElement($departmentIds),
                'patternclass_id' => $faker->randomElement($patternClassIds),
                'subjectcategory_id' => $faker->randomElement($subjectCategoryIds),
                // 'subject_division' => $faker->randomElement(['A', 'B','C','D']),
                // 'subject_categoryno' => $faker->numberBetween(1, 3),
                'subject_id' => $faker->randomElement($subjectIds),
                'academicyear_id' => $faker->randomElement($academicYearIds),
                'status' => $faker->randomElement([1]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
