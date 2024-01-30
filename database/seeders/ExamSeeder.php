<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Exam::create(
            [ 'exam_name'=>'Oct-2022',
             'exam_sessions'=>'1',
             'status'=>'0',]
         );
        Exam::create(
            [ 'exam_name'=>'Mar-2023',
             'exam_sessions'=>'2',
             'status'=>'0',]
         );
         Exam::create(
            [ 'exam_name'=>'Oct-2023',
             'exam_sessions'=>'2',
             'status'=>'0',]
         );
        Exam::create(
            [ 'exam_name'=>'Mar-2024',
             'exam_sessions'=>'1',
             'status'=>'0',]
         );
         Exam::create(
            [ 'exam_name'=>'Oct-2024',
             'exam_sessions'=>'2',
             'status'=>'0',]
         );
         Exam::create(
            [ 'exam_name'=>'Mar-2025',
             'exam_sessions'=>'1',
             'status'=>'1',]
         );
    }
}
