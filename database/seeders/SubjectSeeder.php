<?php

namespace Database\Seeders;
use App\Models\College;
use App\Models\Subject;

use App\Models\Semester;
use App\Models\Classyear;
use App\Models\Department;
use App\Models\Subjecttype;
use Faker\Factory as Faker;
use App\Models\Patternclass;
use App\Models\Subjectcredit;
use App\Models\Subjectcategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $semisters = Semester::pluck('semester')->toArray();
        $subjectCategoryIds = Subjectcategory::pluck('id')->toArray();
        $subjectCategories = Subjectcategory::pluck('subjectcategory_shortname')->toArray();
        $subjectTypeIds = Subjecttype::pluck('id')->toArray();
        $subjectCredits = Subjectcredit::pluck('credit')->toArray();
        $patternClassIds = Patternclass::pluck('id')->toArray();
        $classYearIds = Classyear::pluck('id')->toArray();
        $departmentIds = Department::pluck('id')->toArray();
        $collegeIds = College::pluck('id')->toArray();
        for ($i = 1; $i <= 20; $i++) {
            Subject::create([
                'subject_sem' => $faker->randomElement($semisters),
                'subjectcategory_id' => $faker->randomElement($subjectCategoryIds),
                'subject_no' => $faker->numberBetween(1, 100),
                'subject_order' => $faker->numberBetween(1, 100),
                'subject_code' => $faker->numberBetween(1, 1000),
                'subject_name_prefix' => $faker->randomElement($subjectCategories).'-'.$faker->numberBetween(1, 10),
                'subject_shortname' => $faker->lexify('???'),
                'subject_name' => $faker->word,
                'subjecttype_id' => $faker->randomElement($subjectTypeIds),
                'subjectexam_type' => $faker->randomElement(['INTERNAL', 'EXTERNAL']),
                'subject_credit' => $faker->randomElement($subjectCredits),
                'subject_maxmarks' => $faker->numberBetween(80, 100),
                'subject_maxmarks_int' => $faker->numberBetween(20, 30),
                'subject_maxmarks_intpract' => $faker->numberBetween(10, 15),
                'subject_maxmarks_ext' => $faker->numberBetween(60, 70),
                'subject_totalpassing' => $faker->numberBetween(35, 45),
                'subject_intpassing' => $faker->numberBetween(15, 20),
                'subject_intpractpassing' => $faker->numberBetween(5, 10),
                'subject_extpassing' => $faker->numberBetween(25, 35),
                'subject_optionalgroup' => $faker->lexify('???'),
                'patternclass_id' => $faker->numberBetween(1, 3),
                'classyear_id' => $faker->randomElement($classYearIds),
                'department_id' => $faker->randomElement($departmentIds),
                'college_id' =>  $faker->randomElement($collegeIds),
                'status' => $faker->numberBetween(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
