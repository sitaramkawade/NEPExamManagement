<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create( [ 'name' => 'user', 'email' => 'user@gmail.com', 'email_verified_at' => now(), 'password' => Hash::make('123456789'), 'remember_token' => Str::random(10),] );

        Faculty::create( [
            'faculty_name' => 'faculty',
            'email' => 'faculty@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
        ] );

        Student::create( [
            'student_name' => 'student',
            'email' => 'student@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
        ] );
    }
}