<?php

namespace Database\Seeders;

use App\Models\Subjectexamtype;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectExamTypeSeeder extends Seeder
{
    public function run(): void
    {
        Subjectexamtype::create( [
            'id'=>1,
            'examtype'=>'IE',
            'description'=>'INTERNAL & EXTERNAL',
            'is_active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        Subjectexamtype::create( [
            'id'=>2,
            'examtype'=>'IP',
            'description'=>'INTERNAL & PRACTICAL',
            'is_active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        Subjectexamtype::create( [
            'id'=>3,
            'examtype'=>'IG',
            'description'=>'INTERNAL & GRADE',
            'is_active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        Subjectexamtype::create( [
            'id'=>4,
            'examtype'=>'I',
            'description'=>'INTERNAL',
            'is_active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        Subjectexamtype::create( [
            'id'=>5,
            'examtype'=>'P',
            'description'=>'PROJECT & DESERTATION',
            'is_active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        Subjectexamtype::create( [
            'id'=>6,
            'examtype'=>'G',
            'description'=>'ONLY GRADE',
            'is_active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        Subjectexamtype::create( [
            'id'=>7,
            'examtype'=>'IEP',
            'description'=>'INTERNAL PRACTICAL & EXTERNAL PRACTICAL',
            'is_active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        Subjectexamtype::create( [
            'id'=>8,
            'examtype'=>'IEG',
            'description'=>'INTERNAL & EXTERNAL GRADE',
            'is_active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );


        Subjectexamtype::create( [
            'id'=>9,
            'examtype'=>'E',
            'description'=>'ONLY EXTERNAL',
            'is_active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
    }
}
