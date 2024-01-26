<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Department;
use App\Models\Facultyhead;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultyHeadSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $facultyIds = Faculty::pluck('id')->toArray();
        $departmentIds = Department::pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            Facultyhead::create([
                'faculty_id' =>  $faker->randomElement($facultyIds),
                'department_id' => $faker->randomElement($departmentIds),
                'status' => $faker->randomElement([0,1]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
