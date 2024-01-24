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
            'subjectcategory'=>'Major',
            'subjectcategory_shortname'=>'DSC',
            'active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );

            Subjectcategory::create( [
            'subjectcategory'=>'Vocational Skill Course (VSC)',
            'subjectcategory_shortname'=>'VSC',
            'active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );

            Subjectcategory::create( [
            'subjectcategory'=>'Indian Knowledge System',
            'subjectcategory_shortname'=>'IKS',
            'active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );

            Subjectcategory::create( [
            'subjectcategory'=>'MINOR',
            'subjectcategory_shortname'=>'M',
            'active'=>2,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );

            Subjectcategory::create( [
            'subjectcategory'=>'Co-curricular Course',
            'subjectcategory_shortname'=>'CC',
            'active'=>2,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );

            Subjectcategory::create( [
            'subjectcategory'=>'Open Elective',
            'subjectcategory_shortname'=>'OE',
            'active'=>2,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );

            Subjectcategory::create( [
            'subjectcategory'=>'Skill Enhancement Course (SEC)',
            'subjectcategory_shortname'=>'SEC',
            'active'=>2,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );

            Subjectcategory::create([
            'subjectcategory'=>'Ability Enhancement Course',
            'subjectcategory_shortname'=>'AEC',
            'active'=>2,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );

            Subjectcategory::create( [
            'subjectcategory'=>'Value Education Courses',
            'subjectcategory_shortname'=>'VEC',
            'active'=>2,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );
    }
}
