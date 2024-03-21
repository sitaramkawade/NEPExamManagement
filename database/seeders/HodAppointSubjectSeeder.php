<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Subject;
use Faker\Factory as Faker;
use App\Models\Patternclass;
use Illuminate\Database\Seeder;
use App\Models\Hodappointsubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HodAppointSubjectSeeder extends Seeder
{
    public function run(): void
    {
        Hodappointsubject::create( [
            'faculty_id'=>1,
            'subject_id'=>607,
            'patternclass_id'=>5,
            'appointby_id'=>1,
            'status'=>1,
            'created_at'=>'2024-03-19 12:28:57',
            'updated_at'=>'2024-03-19 12:28:57'
        ] );
        Hodappointsubject::create( [
            'faculty_id'=>1,
            'subject_id'=>1199,
            'patternclass_id'=>6,
            'appointby_id'=>1,
            'status'=>1,
            'created_at'=>'2024-03-19 12:28:57',
            'updated_at'=>'2024-03-19 12:28:57'
        ] );
    }
}
