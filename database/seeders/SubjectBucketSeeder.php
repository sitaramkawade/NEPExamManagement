<?php

namespace Database\Seeders;

use App\Models\Subjectbucket;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectBucketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subjectbucket::create( [
            'id'=>1,
            'department_id'=>1,
            'patternclass_id'=>34,
            'subject_division'=>'A',
            'subjectcategory_id'=>1,
            'subject_categoryno'=>1,
            'subject_id'=>1,
            'academicyear_id'=>1,
            'status'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );

        Subjectbucket::create( [
            'id'=>2,
            'department_id'=>2,
            'patternclass_id'=>'36',
            'subject_division'=>'B',
            'subjectcategory_id'=>2,
            'subject_categoryno'=>2,
            'subject_id'=>2,
            'academicyear_id'=>1,
            'status'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );

        Subjectbucket::create( [
            'id'=>3,
            'department_id'=>3,
            'patternclass_id'=>32,
            'subject_division'=>'B',
            'subjectcategory_id'=>3,
            'subject_categoryno'=>3,
            'subject_id'=>3,
            'academicyear_id'=>1,
            'status'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );
    }
}
