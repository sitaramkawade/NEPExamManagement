<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facultyinternaldocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssignToolSeeder extends Seeder
{
    public function run(): void
    {
        // First Record
        Facultyinternaldocument::create( [
            'academicyear_id'=>4,
            'faculty_id'=>1,
            'subject_id'=>607,
            'internaltooldocument_id'=>1,
            'departmenthead_id'=>1,
            'created_at'=>'2024-03-19 01:50:32',
            'updated_at'=>'2024-03-19 01:50:32',
        ] );

        Facultyinternaldocument::create( [
            'academicyear_id'=>4,
            'faculty_id'=>1,
            'subject_id'=>607,
            'internaltooldocument_id'=>2,
            'departmenthead_id'=>1,
            'created_at'=>'2024-03-19 01:50:32',
            'updated_at'=>'2024-03-19 01:50:32',
        ] );

        Facultyinternaldocument::create( [
            'academicyear_id'=>4,
            'faculty_id'=>1,
            'subject_id'=>607,
            'internaltooldocument_id'=>3,
            'departmenthead_id'=>1,
            'created_at'=>'2024-03-19 01:50:32',
            'updated_at'=>'2024-03-19 01:50:32',
        ] );

        // Second Record
        Facultyinternaldocument::create( [
            'academicyear_id'=>4,
            'faculty_id'=>1,
            'subject_id'=>1199,
            'internaltooldocument_id'=>4,
            'departmenthead_id'=>1,
            'created_at'=>'2024-03-19 02:05:24',
            'updated_at'=>'2024-03-19 02:05:24',
        ] );

        Facultyinternaldocument::create( [
            'academicyear_id'=>4,
            'faculty_id'=>1,
            'subject_id'=>1199,
            'internaltooldocument_id'=>5,
            'departmenthead_id'=>1,
            'created_at'=>'2024-03-19 02:05:24',
            'updated_at'=>'2024-03-19 02:05:24',
        ] );

    }
}
