<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\College;
use App\Models\Subject;
use App\Models\Department;
use Faker\Factory as Faker;
use App\Models\Academicyear;
use App\Models\Patternclass;
use App\Models\Admissiondata;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdmissionDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = User::pluck('id')->toArray();
        $collegeIds = College::pluck('id')->toArray();
        $patternClassIds = Patternclass::pluck('id')->toArray();
        $subjectIds = Subject::pluck('id')->toArray();
        $academicYearIds = Academicyear::pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            AdmissionData::create([
                'memid' => $faker->randomNumber(),
                'stud_name' => $faker->name,
                'user_id' => $faker->randomElement($userIds),
                'patternclass_id' => $faker->randomElement($patternClassIds),
                'subject_id' => $faker->randomElement($subjectIds),
                'academicyear_id' => $faker->randomElement($academicYearIds),
                'college_id' => $faker->optional()->randomElement($collegeIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
