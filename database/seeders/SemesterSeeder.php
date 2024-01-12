<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Semester::create( [
            'id'=>1,
            'semester'=>'1',
            'course_type'=>'UG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Semester::create( [
            'id'=>2,
            'semester'=>'2',
            'course_type'=>'UG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Semester::create( [
            'id'=>3,
            'semester'=>'3',
            'course_type'=>'UG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Semester::create( [
            'id'=>4,
            'semester'=>'4',
            'course_type'=>'UG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Semester::create( [
            'id'=>5,
            'semester'=>'5',
            'course_type'=>'UG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Semester::create( [
            'id'=>6,
            'semester'=>'6',
            'course_type'=>'UG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Semester::create( [
            'id'=>7,
            'semester'=>'7',
            'course_type'=>'UG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Semester::create( [
            'id'=>8,
            'semester'=>'8',
            'course_type'=>'UG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Semester::create( [
            'id'=>9,
            'semester'=>'I',
            'course_type'=>'PG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );
        Semester::create( [
            'id'=>10,
            'semester'=>'II',
            'course_type'=>'PG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );
        Semester::create( [
            'id'=>11,
            'semester'=>'III',
            'course_type'=>'PG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );
        Semester::create( [
            'id'=>12,
            'semester'=>'IV',
            'course_type'=>'PG',
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );
    }
}
