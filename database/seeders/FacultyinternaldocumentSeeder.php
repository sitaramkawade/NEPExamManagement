<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facultyinternaldocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultyinternaldocumentSeeder extends Seeder
{
    public function run(): void
    {
        Facultyinternaldocument::create( [
            'academicyear_id'=>4,
            'faculty_id'=>1,
            'subject_id'=>607,
            'internaltooldocument_id'=>1,
            'document_fileName'=>NULL,
            'document_filePath'=>NULL,
            'departmenthead_id'=>1,
            'verifybyfaculty_id'=>NULL,
            'verificationremark'=>NULL,
            'freeze_by_faculty'=>0,
            'freeze_by_hod'=>0,
            'status'=>0,
            'created_at'=>'2024-03-19 01:50:32',
            'updated_at'=>'2024-03-19 01:50:32',
            'deleted_at'=>NULL
            ] );

            Facultyinternaldocument::create( [
            'academicyear_id'=>4,
            'faculty_id'=>1,
            'subject_id'=>607,
            'internaltooldocument_id'=>2,
            'document_fileName'=>NULL,
            'document_filePath'=>NULL,
            'departmenthead_id'=>1,
            'verifybyfaculty_id'=>NULL,
            'verificationremark'=>NULL,
            'freeze_by_faculty'=>0,
            'freeze_by_hod'=>0,
            'status'=>0,
            'created_at'=>'2024-03-19 01:50:32',
            'updated_at'=>'2024-03-19 01:50:32',
            'deleted_at'=>NULL
            ] );

            Facultyinternaldocument::create( [
            'academicyear_id'=>4,
            'faculty_id'=>1,
            'subject_id'=>607,
            'internaltooldocument_id'=>3,
            'document_fileName'=>NULL,
            'document_filePath'=>NULL,
            'departmenthead_id'=>1,
            'verifybyfaculty_id'=>NULL,
            'verificationremark'=>NULL,
            'freeze_by_faculty'=>0,
            'freeze_by_hod'=>0,
            'status'=>0,
            'created_at'=>'2024-03-19 01:50:32',
            'updated_at'=>'2024-03-19 01:50:32',
            'deleted_at'=>NULL
            ] );

            Facultyinternaldocument::create( [
            'academicyear_id'=>4,
            'faculty_id'=>1,
            'subject_id'=>1199,
            'internaltooldocument_id'=>4,
            'document_fileName'=>NULL,
            'document_filePath'=>NULL,
            'departmenthead_id'=>1,
            'verifybyfaculty_id'=>NULL,
            'verificationremark'=>NULL,
            'freeze_by_faculty'=>0,
            'freeze_by_hod'=>0,
            'status'=>0,
            'created_at'=>'2024-03-19 02:05:24',
            'updated_at'=>'2024-03-19 02:05:24',
            'deleted_at'=>NULL
            ] );

            Facultyinternaldocument::create( [
            'academicyear_id'=>4,
            'faculty_id'=>1,
            'subject_id'=>1199,
            'internaltooldocument_id'=>5,
            'document_fileName'=>NULL,
            'document_filePath'=>NULL,
            'departmenthead_id'=>1,
            'verifybyfaculty_id'=>NULL,
            'verificationremark'=>NULL,
            'freeze_by_faculty'=>0,
            'freeze_by_hod'=>0,
            'status'=>0,
            'created_at'=>'2024-03-19 02:05:24',
            'updated_at'=>'2024-03-19 02:05:24',
            'deleted_at'=>NULL
            ] );
    }
}
