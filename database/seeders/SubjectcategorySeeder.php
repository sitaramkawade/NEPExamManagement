<?php

namespace Database\Seeders;

use App\Models\Subjectcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Subjectcategory::create( [
            'id'=>1,
            'subjectcategory'=>'Major Mandatory',
            'subjectcategory_shortname'=>'DSC',
            'subjectbuckettype_id' => 1,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );
        Subjectcategory::create( [
            'id'=>2,
            'subjectcategory'=>'Major Elective',
            'subjectcategory_shortname'=>'DSE',
            'subjectbuckettype_id' => 1,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );
        Subjectcategory::create( [
            'id'=>3,
            'subjectcategory'=>'Minor',
            'subjectcategory_shortname'=>'M',
            'subjectbuckettype_id' => 2,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        Subjectcategory::create( [
            'id'=>4,
            'subjectcategory'=>'Open Elective',
            'subjectcategory_shortname'=>'OE',
            'subjectbuckettype_id' => 2,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        Subjectcategory::create( [
            'id'=>5,
            'subjectcategory'=>'Vocational Skill Course (VSC)',
            'subjectcategory_shortname'=>'VSC',
            'subjectbuckettype_id' => 1,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        Subjectcategory::create( [
            'id'=>6,
            'subjectcategory'=>'Skill Enhancement Course (SEC)',
            'subjectcategory_shortname'=>'SEC',
            'subjectbuckettype_id' => 3,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        Subjectcategory::create([
            'id'=>7,
            'subjectcategory'=>'Ability Enhancement Course',
            'subjectcategory_shortname'=>'AEC',
            'subjectbuckettype_id' => 3,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        Subjectcategory::create( [
            'id'=>8,
            'subjectcategory'=>'Value Education Courses',
            'subjectcategory_shortname'=>'VEC',
            'subjectbuckettype_id' => 3,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        Subjectcategory::create( [
            'id'=>9,
            'subjectcategory'=>'Indian Knowledge System',
            'subjectcategory_shortname'=>'IKS',
            'subjectbuckettype_id' => 1,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        Subjectcategory::create( [
            'id'=>10,
            'subjectcategory'=>'On Job Training',
            'subjectcategory_shortname'=>'OJT',
            'subjectbuckettype_id' => 1,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        Subjectcategory::create( [
            'id'=>11,
            'subjectcategory'=>'Field Project',
            'subjectcategory_shortname'=>'FP',
            'subjectbuckettype_id' => 1,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        Subjectcategory::create( [
            'id'=>12,
            'subjectcategory'=>'Community Engagement and Service',
            'subjectcategory_shortname'=>'CES',
            'subjectbuckettype_id' => 1,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );

        Subjectcategory::create( [
            'id'=>13,
            'subjectcategory'=>'Co-curricular Course',
            'subjectcategory_shortname'=>'CC',
            'subjectbuckettype_id' => 3,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        Subjectcategory::create( [
            'id'=>14,
            'subjectcategory'=>'Research Project',
            'subjectcategory_shortname'=>'RP',
            'subjectbuckettype_id' => 1,
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
    }
}
