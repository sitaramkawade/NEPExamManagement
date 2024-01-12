<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Studenthelplinequery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentHelplineQuerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Studenthelplinequery::create([
            'query_name' => 'Student Name',
            'is_active' => 1,
        ]);
        Studenthelplinequery::create([
            'query_name' => 'Mother Name',
            'is_active' => 1,
        ]);
        Studenthelplinequery::create([
            'query_name' => 'Mobile Number',
            'is_active' => 1,
        ]);
        Studenthelplinequery::create([
            'query_name' => 'Email ID',
            'is_active' => 1,
        ]);
        Studenthelplinequery::create([
            'query_name' => 'Result Correction',
            'is_active' => 1,
        ]);
        Studenthelplinequery::create([
            'query_name' => 'Performance Cancel',
            'is_active' => 1,
        ]);
        Studenthelplinequery::create([
            'query_name' => 'Result Activation',
            'is_active' => 1,
        ]);
        Studenthelplinequery::create([
            'query_name' => 'Pending Fee',
            'is_active' => 1,
        ]);
        Studenthelplinequery::create([
            'query_name' => 'Exam Form Correction',
            'is_active' => 1,
        ]);
        Studenthelplinequery::create([
            'query_name' => 'Exam Form Subjcet',
            'is_active' => 1,
        ]);
    }
}
