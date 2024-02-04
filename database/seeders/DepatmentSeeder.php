<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create( [
            'id'=>1,
            'dept_name'=>'Computer Science',
            'short_name'=>'B.Sc.(CS)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
            ] );

        Department::create( [
            'id'=>2,
            'dept_name'=>'Electronics',
            'short_name'=>'B.Sc.(Ele.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>3,
            'dept_name'=>'Physics',
            'short_name'=>'B.Sc.(CS)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>5,
            'dept_name'=>'Botany',
            'short_name'=>'B.Sc.(Bot.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>6,
            'dept_name'=>'Chemistry',
            'short_name'=>'B.Sc.(Chem.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>7,
            'dept_name'=>'Zoology',
            'short_name'=>'B.Sc.(Zoo.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>8,
            'dept_name'=>'Statistics',
            'short_name'=>'B.Sc.(Stat.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>9,
            'dept_name'=>'Microbiology',
            'short_name'=>'B.Sc.(Micro.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>10,
            'dept_name'=>'Mathematics',
            'short_name'=>'B.Sc.(Math)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>11,
            'dept_name'=>'Commerce',
            'short_name'=>'B.Com',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>12,
            'dept_name'=>'Marathi',
            'short_name'=>'B.A(Mar.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>13,
            'dept_name'=>'Hindi',
            'short_name'=>'B.A(Hin.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>14,
            'dept_name'=>'English',
            'short_name'=>'B.A(Eng.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>15,
            'dept_name'=>'Geography',
            'short_name'=>'B.A(Geo.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>16,
            'dept_name'=>'Economics',
            'short_name'=>'B.A(Eco.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>17,
            'dept_name'=>'Politics',
            'short_name'=>'B.A(Pol.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>18,
            'dept_name'=>'History',
            'short_name'=>'B.A(His.)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>19,
            'dept_name'=>'Yoga',
            'short_name'=>'B.A(Yoga)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>20,
            'dept_name'=>'Sanskrit',
            'short_name'=>'B.A(Sanskrit)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>21,
            'dept_name'=>'Philosophy',
            'short_name'=>'B.A(Philosophy)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>22,
            'dept_name'=>'B.Voc. Software Development',
            'short_name'=>'B.Voc.(SD)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>23,
            'dept_name'=>'B.Voc. Hospitality & Tourism',
            'short_name'=>'B.Voc.(HT)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>24,
            'dept_name'=>'B.Voc. Dairy',
            'short_name'=>'B.Voc.(DPP)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>25,
            'dept_name'=>'B.Voc. Agri',
            'short_name'=>'B.Voc.(ASS)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>26,
            'dept_name'=>'B.Voc. Account',
            'short_name'=>'B.Voc.(AT)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>27,
            'dept_name'=>'BBA(Computer Application)',
            'short_name'=>'BBA(CA)',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>28,
            'dept_name'=>'BBA',
            'short_name'=>'BBA',
            'created_at'=>'2021-05-20 05:32:57',
            'updated_at'=>'2021-05-19 05:32:57'
        ] );

        Department::create( [
            'id'=>29,
            'dept_name'=>'BCA Science',
            'short_name'=>'BCA',
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

        Department::create( [
            'id'=>30,
            'dept_name'=>'PG',
            'short_name'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

        Department::create( [
            'id'=>31,
            'dept_name'=>'Department of Studies & Research in English',
            'short_name'=>'Department of Studies & Research in English',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>32,
            'dept_name'=>'Exam Department',
            'short_name'=>'Exam',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>33,
            'dept_name'=>'Phisical Education',
            'short_name'=>'Phisical Education',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

        Department::create( [
            'id'=>34,
            'dept_name'=>'Library',
            'short_name'=>'Lib',
            'created_at'=>'2021-12-08 06:01:04',
            'updated_at'=>'2021-12-08 06:01:04'
        ] );

    }
}
