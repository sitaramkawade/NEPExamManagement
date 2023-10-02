<?php

namespace Database\Seeders;

use App\Models\Courseclass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CourseclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Courseclass::create( [
            'id'=>1,
            'classyear_id'=>1,
            'course_id'=>1,
            'nextyearclass_id'=>2,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>2,
            'classyear_id'=>2,
            'course_id'=>1,
            'nextyearclass_id'=>3,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>3,
            'classyear_id'=>3,
            'course_id'=>1,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>4,
            'classyear_id'=>1,
            'course_id'=>2,
            'nextyearclass_id'=>5,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>5,
            'classyear_id'=>2,
            'course_id'=>2,
            'nextyearclass_id'=>6,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>6,
            'classyear_id'=>3,
            'course_id'=>2,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>7,
            'classyear_id'=>1,
            'course_id'=>3,
            'nextyearclass_id'=>8,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>8,
            'classyear_id'=>2,
            'course_id'=>3,
            'nextyearclass_id'=>9,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>9,
            'classyear_id'=>3,
            'course_id'=>3,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>10,
            'classyear_id'=>1,
            'course_id'=>4,
            'nextyearclass_id'=>11,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>11,
            'classyear_id'=>2,
            'course_id'=>4,
            'nextyearclass_id'=>12,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>12,
            'classyear_id'=>3,
            'course_id'=>4,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>13,
            'classyear_id'=>1,
            'course_id'=>5,
            'nextyearclass_id'=>14,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>14,
            'classyear_id'=>2,
            'course_id'=>5,
            'nextyearclass_id'=>15,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>15,
            'classyear_id'=>3,
            'course_id'=>5,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>16,
            'classyear_id'=>1,
            'course_id'=>6,
            'nextyearclass_id'=>17,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>17,
            'classyear_id'=>2,
            'course_id'=>6,
            'nextyearclass_id'=>18,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>18,
            'classyear_id'=>3,
            'course_id'=>6,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>19,
            'classyear_id'=>1,
            'course_id'=>7,
            'nextyearclass_id'=>20,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>20,
            'classyear_id'=>2,
            'course_id'=>7,
            'nextyearclass_id'=>21,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>21,
            'classyear_id'=>3,
            'course_id'=>7,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>22,
            'classyear_id'=>1,
            'course_id'=>8,
            'nextyearclass_id'=>23,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>23,
            'classyear_id'=>2,
            'course_id'=>8,
            'nextyearclass_id'=>24,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>24,
            'classyear_id'=>3,
            'course_id'=>8,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>25,
            'classyear_id'=>1,
            'course_id'=>9,
            'nextyearclass_id'=>26,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>26,
            'classyear_id'=>2,
            'course_id'=>9,
            'nextyearclass_id'=>27,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>27,
            'classyear_id'=>3,
            'course_id'=>9,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>28,
            'classyear_id'=>1,
            'course_id'=>10,
            'nextyearclass_id'=>29,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>29,
            'classyear_id'=>2,
            'course_id'=>10,
            'nextyearclass_id'=>30,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>30,
            'classyear_id'=>3,
            'course_id'=>10,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>31,
            'classyear_id'=>1,
            'course_id'=>11,
            'nextyearclass_id'=>32,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>32,
            'classyear_id'=>2,
            'course_id'=>11,
            'nextyearclass_id'=>33,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>33,
            'classyear_id'=>3,
            'course_id'=>11,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>34,
            'classyear_id'=>1,
            'course_id'=>12,
            'nextyearclass_id'=>35,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>35,
            'classyear_id'=>2,
            'course_id'=>12,
            'nextyearclass_id'=>36,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>36,
            'classyear_id'=>3,
            'course_id'=>12,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>37,
            'classyear_id'=>1,
            'course_id'=>13,
            'nextyearclass_id'=>38,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>38,
            'classyear_id'=>2,
            'course_id'=>13,
            'nextyearclass_id'=>39,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>39,
            'classyear_id'=>3,
            'course_id'=>13,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>40,
            'classyear_id'=>1,
            'course_id'=>14,
            'nextyearclass_id'=>41,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>41,
            'classyear_id'=>2,
            'course_id'=>14,
            'nextyearclass_id'=>42,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>42,
            'classyear_id'=>3,
            'course_id'=>14,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>43,
            'classyear_id'=>1,
            'course_id'=>15,
            'nextyearclass_id'=>44,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>44,
            'classyear_id'=>2,
            'course_id'=>15,
            'nextyearclass_id'=>45,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>45,
            'classyear_id'=>3,
            'course_id'=>15,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>46,
            'classyear_id'=>1,
            'course_id'=>16,
            'nextyearclass_id'=>47,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>47,
            'classyear_id'=>2,
            'course_id'=>16,
            'nextyearclass_id'=>48,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>48,
            'classyear_id'=>3,
            'course_id'=>16,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>49,
            'classyear_id'=>1,
            'course_id'=>17,
            'nextyearclass_id'=>50,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>50,
            'classyear_id'=>2,
            'course_id'=>17,
            'nextyearclass_id'=>51,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>51,
            'classyear_id'=>3,
            'course_id'=>17,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>52,
            'classyear_id'=>1,
            'course_id'=>18,
            'nextyearclass_id'=>53,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>53,
            'classyear_id'=>2,
            'course_id'=>18,
            'nextyearclass_id'=>54,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>54,
            'classyear_id'=>3,
            'course_id'=>18,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>55,
            'classyear_id'=>1,
            'course_id'=>19,
            'nextyearclass_id'=>56,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>56,
            'classyear_id'=>2,
            'course_id'=>19,
            'nextyearclass_id'=>57,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>57,
            'classyear_id'=>3,
            'course_id'=>19,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>58,
            'classyear_id'=>1,
            'course_id'=>20,
            'nextyearclass_id'=>59,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>59,
            'classyear_id'=>2,
            'course_id'=>20,
            'nextyearclass_id'=>60,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>60,
            'classyear_id'=>3,
            'course_id'=>20,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>61,
            'classyear_id'=>1,
            'course_id'=>21,
            'nextyearclass_id'=>62,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>62,
            'classyear_id'=>2,
            'course_id'=>21,
            'nextyearclass_id'=>63,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>63,
            'classyear_id'=>3,
            'course_id'=>21,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>64,
            'classyear_id'=>1,
            'course_id'=>22,
            'nextyearclass_id'=>65,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>65,
            'classyear_id'=>2,
            'course_id'=>22,
            'nextyearclass_id'=>66,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>66,
            'classyear_id'=>3,
            'course_id'=>22,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>67,
            'classyear_id'=>1,
            'course_id'=>23,
            'nextyearclass_id'=>68,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>68,
            'classyear_id'=>2,
            'course_id'=>23,
            'nextyearclass_id'=>69,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>69,
            'classyear_id'=>3,
            'course_id'=>23,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>70,
            'classyear_id'=>1,
            'course_id'=>24,
            'nextyearclass_id'=>71,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>71,
            'classyear_id'=>2,
            'course_id'=>24,
            'nextyearclass_id'=>72,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>72,
            'classyear_id'=>3,
            'course_id'=>24,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>73,
            'classyear_id'=>1,
            'course_id'=>25,
            'nextyearclass_id'=>74,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>74,
            'classyear_id'=>2,
            'course_id'=>25,
            'nextyearclass_id'=>75,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>75,
            'classyear_id'=>3,
            'course_id'=>25,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>76,
            'classyear_id'=>1,
            'course_id'=>26,
            'nextyearclass_id'=>77,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>77,
            'classyear_id'=>2,
            'course_id'=>26,
            'nextyearclass_id'=>78,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>78,
            'classyear_id'=>3,
            'course_id'=>26,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>79,
            'classyear_id'=>1,
            'course_id'=>27,
            'nextyearclass_id'=>80,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>80,
            'classyear_id'=>2,
            'course_id'=>27,
            'nextyearclass_id'=>81,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>81,
            'classyear_id'=>3,
            'course_id'=>27,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>82,
            'classyear_id'=>1,
            'course_id'=>28,
            'nextyearclass_id'=>83,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>83,
            'classyear_id'=>2,
            'course_id'=>28,
            'nextyearclass_id'=>84,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>84,
            'classyear_id'=>3,
            'course_id'=>28,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>85,
            'classyear_id'=>4,
            'course_id'=>29,
            'nextyearclass_id'=>86,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>86,
            'classyear_id'=>5,
            'course_id'=>29,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>87,
            'classyear_id'=>4,
            'course_id'=>30,
            'nextyearclass_id'=>88,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>88,
            'classyear_id'=>5,
            'course_id'=>30,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>89,
            'classyear_id'=>4,
            'course_id'=>31,
            'nextyearclass_id'=>90,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>90,
            'classyear_id'=>5,
            'course_id'=>31,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>91,
            'classyear_id'=>4,
            'course_id'=>32,
            'nextyearclass_id'=>92,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>92,
            'classyear_id'=>5,
            'course_id'=>32,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>93,
            'classyear_id'=>4,
            'course_id'=>33,
            'nextyearclass_id'=>94,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>94,
            'classyear_id'=>5,
            'course_id'=>33,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>95,
            'classyear_id'=>4,
            'course_id'=>34,
            'nextyearclass_id'=>96,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>96,
            'classyear_id'=>5,
            'course_id'=>34,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>97,
            'classyear_id'=>4,
            'course_id'=>35,
            'nextyearclass_id'=>98,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>98,
            'classyear_id'=>5,
            'course_id'=>35,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>99,
            'classyear_id'=>4,
            'course_id'=>36,
            'nextyearclass_id'=>100,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>100,
            'classyear_id'=>5,
            'course_id'=>36,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>101,
            'classyear_id'=>4,
            'course_id'=>37,
            'nextyearclass_id'=>102,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>102,
            'classyear_id'=>5,
            'course_id'=>37,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>103,
            'classyear_id'=>4,
            'course_id'=>38,
            'nextyearclass_id'=>104,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>104,
            'classyear_id'=>5,
            'course_id'=>38,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>105,
            'classyear_id'=>4,
            'course_id'=>39,
            'nextyearclass_id'=>106,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>106,
            'classyear_id'=>5,
            'course_id'=>39,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>107,
            'classyear_id'=>4,
            'course_id'=>40,
            'nextyearclass_id'=>108,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>108,
            'classyear_id'=>5,
            'course_id'=>40,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>109,
            'classyear_id'=>4,
            'course_id'=>41,
            'nextyearclass_id'=>110,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>110,
            'classyear_id'=>5,
            'course_id'=>41,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>111,
            'classyear_id'=>4,
            'course_id'=>42,
            'nextyearclass_id'=>112,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>112,
            'classyear_id'=>5,
            'course_id'=>42,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>113,
            'classyear_id'=>4,
            'course_id'=>43,
            'nextyearclass_id'=>114,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>114,
            'classyear_id'=>5,
            'course_id'=>43,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>115,
            'classyear_id'=>4,
            'course_id'=>44,
            'nextyearclass_id'=>116,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>116,
            'classyear_id'=>5,
            'course_id'=>44,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>117,
            'classyear_id'=>4,
            'course_id'=>45,
            'nextyearclass_id'=>118,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>118,
            'classyear_id'=>5,
            'course_id'=>45,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>119,
            'classyear_id'=>4,
            'course_id'=>46,
            'nextyearclass_id'=>120,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>120,
            'classyear_id'=>5,
            'course_id'=>46,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>121,
            'classyear_id'=>4,
            'course_id'=>47,
            'nextyearclass_id'=>122,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>122,
            'classyear_id'=>5,
            'course_id'=>47,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>123,
            'classyear_id'=>4,
            'course_id'=>48,
            'nextyearclass_id'=>124,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>124,
            'classyear_id'=>5,
            'course_id'=>48,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>125,
            'classyear_id'=>4,
            'course_id'=>49,
            'nextyearclass_id'=>126,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
                        
            Courseclass::create( [
            'id'=>126,
            'classyear_id'=>5,
            'course_id'=>49,
            'nextyearclass_id'=>NULL,
            'college_id'=>1,
            'created_at'=>'2023-09-06 02:53:00',
            'updated_at'=>'2023-09-06 02:53:00'
            ] );
            Schema::enableForeignKeyConstraints();
        
    }
}
