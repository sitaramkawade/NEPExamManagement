<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubjectExamTypeMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectExamTypeMasterSeeder extends Seeder
{
    public function run(): void
    {
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>1,
            'examtype_id'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>1,
            'examtype_id'=>4,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>1,
            'examtype_id'=>6,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>1,
            'examtype_id'=>8,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>2,
            'examtype_id'=>2,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>2,
            'examtype_id'=>7,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>2,
            'examtype_id'=>5,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>3,
            'examtype_id'=>5,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>3,
            'examtype_id'=>6,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>3,
            'examtype_id'=>4,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        SubjectExamTypeMaster::create( [
            'subjecttype_id'=>3,
            'examtype_id'=>2,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
    }
}
