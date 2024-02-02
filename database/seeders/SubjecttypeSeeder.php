<?php

namespace Database\Seeders;

use App\Models\Subjecttype;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjecttypeSeeder extends Seeder
{
    public function run(): void
    {
        User::create( [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
        ] );


        Faculty::create( [
            'faculty_name' => 'faculty',
            'email' => 'faculty@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
        ] );

        Student::create( [
            'student_name' => 'Student Name',
            'mother_name' => 'Mother Name',
            'mobile_no' => '1234567890',
            'memid' => '12345',
            'email' => 'student@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
        ] );


    }
}
