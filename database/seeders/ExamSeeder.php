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
        // Exam::create( [
        //     'id'=>1,
        //     'exam_name'=>'OCT-NOV 2020',
        //     'status'=>0,
        //     'exam_sessions'=>1,
        //     'academicyear_id'=>1,
        //     'created_at'=>'2021-06-02 21:12:11',
        //     'updated_at'=>'2021-06-08 00:19:19'
        //     ] );
                        
        //     Exam::create( [
        //     'id'=>2,
        //     'exam_name'=>'NOV 2020',
        //     'status'=>0,
        //     'exam_sessions'=>1,
        //     'academicyear_id'=>1,
        //     'created_at'=>'2021-06-21 02:44:13',
        //     'updated_at'=>'2023-08-10 09:08:57'
        //     ] );
                        
        //     Exam::create( [
        //     'id'=>3,
        //     'exam_name'=>'MARCH 2021',
        //     'status'=>0,
        //     'exam_sessions'=>2,
        //     'academicyear_id'=>1,
        //     'created_at'=>'2021-07-20 03:31:07',
        //     'updated_at'=>'2023-08-10 09:09:42'
        //     ] );
                        
        //     Exam::create( [
        //     'id'=>4,
        //     'exam_name'=>'MAY 2021',
        //     'status'=>0,
        //     'exam_sessions'=>2,
        //     'academicyear_id'=>1,
        //     'created_at'=>'2021-07-20 03:31:07',
        //     'updated_at'=>'2021-07-20 03:31:07'
        //     ] );
                        
        //     Exam::create( [
        //     'id'=>5,
        //     'exam_name'=>'OCTOBER 2021',
        //     'status'=>0,
        //     'exam_sessions'=>1,
        //     'academicyear_id'=>2,
        //     'created_at'=>'2021-10-21 03:31:07',
        //     'updated_at'=>'2023-08-10 08:59:32'
        //     ] );
                        
        //     Exam::create( [
        //     'id'=>7,
        //     'exam_name'=>'MARCH 2022',
        //     'status'=>0,
        //     'exam_sessions'=>2,
        //     'academicyear_id'=>2,
        //     'created_at'=>'2021-10-21 03:31:07',
        //     'updated_at'=>'2023-08-10 09:07:54'
        //     ] );
                        
        //     Exam::create( [
        //     'id'=>8,
        //     'exam_name'=>'OCTOBER 2022',
        //     'status'=>1,
        //     'exam_sessions'=>1,
        //     'academicyear_id'=>3,
        //     'created_at'=>'2022-10-21 03:14:50',
        //     'updated_at'=>'2023-08-14 06:25:02'
        //     ] );
                        
        //     Exam::create( [
        //     'id'=>9,
        //     'exam_name'=>'MARCH 2023',
        //     'status'=>0,
        //     'exam_sessions'=>2,
        //     'academicyear_id'=>3,
        //     'created_at'=>'2023-03-20 10:03:01',
        //     'updated_at'=>'2023-08-26 10:07:56'
        //     ] );
                        
        //     Exam::create( [
        //     'id'=>10,
        //     'exam_name'=>'JULY 2023',
        //     'status'=>0,
        //     'exam_sessions'=>2,
        //     'academicyear_id'=>3,
        //     'created_at'=>'2023-07-20 10:03:01',
        //     'updated_at'=>'2023-09-22 11:43:13'
        //     ] );
                        
        //     Exam::create( [
        //     'id'=>11,
        //     'exam_name'=>'OCT-NOV  2023',
        //     'status'=>0,
        //     'exam_sessions'=>1,
        //     'academicyear_id'=>4,
        //     'created_at'=>'2023-08-28 10:03:01',
        //     'updated_at'=>'2023-09-16 12:05:22'
        //     ] );

        //     Exam::create( [
        //     'id'=>12,
        //     'exam_name'=>'MARCH  2024',
        //     'status'=>0,
        //     'exam_sessions'=>1,
        //     'academicyear_id'=>4,
        //     'created_at'=>'2023-08-28 10:03:01',
        //     'updated_at'=>'2023-09-16 12:05:22'
        //     ] );


        Exam::create( [
            'id'=>1,
            'exam_name'=>'OCTOBER  2023',
            'status'=>1,
            'exam_sessions'=>1,
            'academicyear_id'=>3,
            'created_at'=>'2023-08-28 10:03:01',
            'updated_at'=>'2023-09-16 12:05:22'
        ] );

        Exam::create( [
            'id'=>2,
            'exam_name'=>'March  2023',
            'status'=>0,
            'exam_sessions'=>2,
            'academicyear_id'=>3,
            'created_at'=>'2023-08-28 10:03:01',
            'updated_at'=>'2023-09-16 12:05:22'
        ] );

        Exam::create( [
            'id'=>3,
            'exam_name'=>'JULY  2023',
            'status'=>0,
            'exam_sessions'=>1,
            'academicyear_id'=>3,
            'created_at'=>'2023-08-28 10:03:01',
            'updated_at'=>'2023-09-16 12:05:22'
        ] );

        Exam::create( [
            'id'=>4,
            'exam_name'=>'December  2023',
            'status'=>0,
            'exam_sessions'=>2,
            'academicyear_id'=>3,
            'created_at'=>'2023-08-28 10:03:01',
            'updated_at'=>'2023-09-16 12:05:22'
        ] );

        Exam::create( [
            'id'=>5,
            'exam_name'=>'May  2023',
            'status'=>0,
            'exam_sessions'=>1,
            'academicyear_id'=>4,
            'created_at'=>'2023-08-28 10:03:01',
            'updated_at'=>'2023-09-16 12:05:22'
        ] );

        Exam::create( [
            'id'=>6,
            'exam_name'=>'SEPTEMBER  2023',
            'status'=>0,
            'exam_sessions'=>2,
            'academicyear_id'=>4,
            'created_at'=>'2023-08-28 10:03:01',
            'updated_at'=>'2023-09-16 12:05:22'
        ] );
    }
}
