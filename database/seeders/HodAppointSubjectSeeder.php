<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Subject;
use Faker\Factory as Faker;
use App\Models\Patternclass;
use Illuminate\Database\Seeder;
use App\Models\Hodappointsubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HodAppointSubjectSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $facultyIds = Faculty::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();
        $subjectIds = Subject::pluck('id')->toArray();
        $patternClassIds = Patternclass::pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            Hodappointsubject::create([
                'faculty_id' =>  $faker->randomElement($facultyIds),
                'subject_id' => $faker->randomElement($subjectIds),
                'patternclass_id' => $faker->randomElement($patternClassIds),
                'appointby_id' => $faker->randomElement($userIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
