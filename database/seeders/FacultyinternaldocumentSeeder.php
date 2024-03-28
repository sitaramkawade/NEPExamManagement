<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facultyinternaldocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultyinternaldocumentSeeder extends Seeder
{
    public function run(): void
    {
        // First Record
        Facultyinternaldocument::where('id', 1)->update([
            'document_fileName' => 'Attendance_66039a645a9ea.jpg',
            'document_filePath' => 'storage/2023-24/Principal_Dr._Gaikwad_Arun_Hari/2293_5/Attendance_66039a645a9ea.jpg',
            'freeze_by_faculty' => 0,
            'updated_at' => '2024-03-27 01:50:32',
        ]);
        Facultyinternaldocument::where('id', 2)->update([
            'document_fileName' => 'Written_Test_Attendace_660245562c2a4.pdf',
            'document_filePath' => 'storage/2023-24/Principal_Dr._Gaikwad_Arun_Hari/2293_5/Written_Test_Attendace_660245562c2a4.pdf',
            'freeze_by_faculty' => 0,
            'updated_at' => '2024-03-27 01:50:32',
        ]);
        Facultyinternaldocument::where('id', 3)->update([
            'document_fileName' => 'Written_Test_Marklist_660245644ca16.png',
            'document_filePath' => 'storage/2023-24/Principal_Dr._Gaikwad_Arun_Hari/2293_5/Written_Test_Marklist_660245644ca16.png',
            'freeze_by_faculty' => 0,
            'updated_at' => '2024-03-27 01:50:32',
        ]);

        // Second Record
        Facultyinternaldocument::where('id', 4)->update([
            'document_fileName' => 'Attendance_66039a645a9ea.jpg',
            'document_filePath' => 'storage/2023-24/Principal_Dr._Gaikwad_Arun_Hari/2293_5/Attendance_66039a645a9ea.jpg',
            'freeze_by_faculty' => 0,
            'updated_at' => '2024-03-27 01:50:32',
        ]);

        Facultyinternaldocument::where('id', 5)->update([
            'document_fileName' => 'Attendance_66039a645a9ea.jpg',
            'document_filePath' => 'storage/2023-24/Principal_Dr._Gaikwad_Arun_Hari/2293_5/Attendance_66039a645a9ea.jpg',
            'freeze_by_faculty' => 0,
            'updated_at' => '2024-03-27 01:50:32',
        ]);
    }
}
