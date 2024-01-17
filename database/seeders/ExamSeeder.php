<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=Exam::create(
            [ 'exam_name'=>'Nov 2022',
             'exam_sessions'=>'1',
             'status'=>'1',]
         );
    }
}
