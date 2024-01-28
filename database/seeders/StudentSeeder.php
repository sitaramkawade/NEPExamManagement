<?php

namespace Database\Seeders;

use App\Models\College;
use App\Models\Student;
use App\Models\Department;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\Patternclass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        
        $patternClassIds = Patternclass::pluck('id')->toArray();
        $departmentIds = Department::pluck('id')->toArray();
        $collegeIds = College::pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            Student::create([
                'prn' => $faker->unique()->randomNumber(),
                'memid' => $faker->unique()->randomNumber(),
                'eligibilityno' => $faker->unique()->randomNumber(),
                'abcid' => $faker->unique()->randomNumber(),
                'aadhar_card_no' => $faker->unique()->randomNumber(),
                'student_name' => $faker->name,
                'mother_name' => $faker->name,
                'mobile_no' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'email_verified' => $faker->boolean,
                'mobile_no_verified_at' => now(),
                'mobile_no_verified' => $faker->boolean,
                'password' => Hash::make('123456789'),
                'last_login' => now(),
                'patternclass_id' => $faker->randomElement($patternClassIds),
                'department_id' => $faker->randomElement($departmentIds),
                'college_id' => $faker->randomElement($collegeIds),
                'total_steps' => 6,
                'current_step' => 0,
                'is_profile_complete' => 0,
                'status' => $faker->boolean,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
