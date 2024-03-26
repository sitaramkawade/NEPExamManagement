<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Department;
use Faker\Factory as Faker;
use App\Models\Academicyear;
use App\Models\Patternclass;
use App\Models\Subjectbucket;
use App\Models\Subjectvertical;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectBucketSeeder extends Seeder
{
    public function run(): void
    {

        Subjectbucket::create([
            'department_id' => 1,
            'patternclass_id' => 10,
            'subjectvertical_id' =>3,
            'subject_division' => 'A' ,
            'subject_id' => 231,
            'academicyear_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Subjectbucket::create([
            'department_id' => 1,
            'patternclass_id' => 10,
            'subjectvertical_id' =>3,
            'subject_division' => 'A' ,
            'subject_id' => 232,
            'academicyear_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Subjectbucket::create([
            'department_id' => 1,
            'patternclass_id' => 10,
            'subjectvertical_id' =>3,
            'subject_division' => 'A' ,
            'subject_id' => 233,
            'academicyear_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Subjectbucket::create([
            'department_id' => 1,
            'patternclass_id' => 10,
            'subjectvertical_id' =>3,
            'subject_division' => 'A' ,
            'subject_id' => 234,
            'academicyear_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Subjectbucket::create([
            'department_id' => 1,
            'patternclass_id' => 10,
            'subjectvertical_id' =>3,
            'subject_division' => 'A' ,
            'subject_id' => 235,
            'academicyear_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Subjectbucket::create([
            'department_id' => 1,
            'patternclass_id' => 11,
            'subjectvertical_id' =>3,
            'subject_division' => 'A' ,
            'subject_id' => 1,
            'academicyear_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Subjectbucket::create([
            'department_id' => 1,
            'patternclass_id' => 12,
            'subjectvertical_id' =>3,
            'subject_division' => 'A' ,
            'subject_id' => 1,
            'academicyear_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);




        // $faker = Faker::create();

        // $subjectVerticalIds = Subjectvertical::pluck('id')->toArray();
        // $patternClassIds = Patternclass::pluck('id')->toArray();
        // $departmentIds = Department::pluck('id')->toArray();
        // $subjectIds = Subject::pluck('id')->toArray();
        // $academicYearIds = Academicyear::where('active',1)->pluck('id')->toArray();

        // for ($i = 1; $i <= 20; $i++) {
        //     Subjectbucket::create([
        //         'department_id' =>  $faker->randomElement($departmentIds),
        //         'patternclass_id' => $faker->randomElement($patternClassIds),
        //         'subjectvertical_id' => $faker->randomElement($subjectVerticalIds),
        //         'subject_division' => $faker->randomElement(['A', 'B','C','D']),
        //         // 'subject_categoryno' => $faker->numberBetween(1, 3),
        //         'subject_id' => $faker->randomElement($subjectIds),
        //         'academicyear_id' => $faker->randomElement($academicYearIds),
        //         'status' => $faker->randomElement([1]),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
