<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Coursecategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        Course::create( [
            'id'=>1,
            'course_code'=>'101',
            'course_name'=>'B.A. ENGLISH',
            'fullname'=>'Bachelor of Arts',
            'shortname'=>'B.A.',
            'special_subject'=>'ENGLISH',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:52',
            'updated_at'=>'2023-09-06 00:04:52'
            ] );
            
            
                        
            
            
            
                        
            Course::create( [
            'id'=>2,
            'course_code'=>'103',
            'course_name'=>'B.A. MARATHI',
            'fullname'=>'Bachelor of Arts',
            'shortname'=>'B.A.',
            'special_subject'=>'MARATHI',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>3,
            'course_code'=>'104',
            'course_name'=>'B.A. HINDI',
            'fullname'=>'Bachelor of Arts',
            'shortname'=>'B.A.',
            'special_subject'=>'HINDI',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>4,
            'course_code'=>'106',
            'course_name'=>'B.A. ECONOMICS',
            'fullname'=>'Bachelor of Arts',
            'shortname'=>'B.A.',
            'special_subject'=>'ECONOMICS',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>5,
            'course_code'=>'107',
            'course_name'=>'B.A. POLITICS',
            'fullname'=>'Bachelor of Arts',
            'shortname'=>'B.A.',
            'special_subject'=>'POLITICS',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>6,
            'course_code'=>'109',
            'course_name'=>'B.A. PHILOSOPHY',
            'fullname'=>'Bachelor of Arts',
            'shortname'=>'B.A.',
            'special_subject'=>'PHILOSOPHY',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>7,
            'course_code'=>'110',
            'course_name'=>'B.A. GEOGRAPHY',
            'fullname'=>'Bachelor of Arts',
            'shortname'=>'B.A.',
            'special_subject'=>'GEOGRAPHY',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>8,
            'course_code'=>'112',
            'course_name'=>'B.A. SANSKRIT',
            'fullname'=>'Bachelor of Arts',
            'shortname'=>'B.A.',
            'special_subject'=>'SANSKRIT',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>9,
            'course_code'=>'113',
            'course_name'=>'B.Com. BANKING AND FINANCE',
            'fullname'=>'Bachelor of Commerce',
            'shortname'=>'B.Com.',
            'special_subject'=>'BANKING AND FINANCE',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>2,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>10,
            'course_code'=>'115',
            'course_name'=>'B.Com. BUSINESS ADMINISTRATION AND MANAGEMENT',
            'fullname'=>'Bachelor of Commerce',
            'shortname'=>'B.Com.',
            'special_subject'=>'BUSINESS ADMINISTRATION AND MANAGEMENT',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>2,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>11,
            'course_code'=>'116',
            'course_name'=>'B.Com. ACCOUNTING, COSTING AND TAXATION',
            'fullname'=>'Bachelor of Commerce',
            'shortname'=>'B.Com.',
            'special_subject'=>'ACCOUNTING, COSTING AND TAXATION',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>2,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>12,
            'course_code'=>'118',
            'course_name'=>'B.Sc. COMPUTER SCIENCE',
            'fullname'=>'Bachelor of Science',
            'shortname'=>'B.Sc.',
            'special_subject'=>'COMPUTER SCIENCE',
            'course_type'=>'UG',
             'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>3,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>13,
            'course_code'=>'119',
            'course_name'=>'B.Sc. PHYSICS',
            'fullname'=>'Bachelor of Science',
            'shortname'=>'B.Sc.',
            'special_subject'=>'PHYSICS',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>3,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>14,
            'course_code'=>'121',
            'course_name'=>'B.Sc. CHEMISTRY',
            'fullname'=>'Bachelor of Science',
            'shortname'=>'B.Sc.',
            'special_subject'=>'CHEMISTRY',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>3,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>15,
            'course_code'=>'122',
            'course_name'=>'B.Sc. BOTANY',
            'fullname'=>'Bachelor of Science',
            'shortname'=>'B.Sc.',
            'special_subject'=>'BOTANY',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>3,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>16,
            'course_code'=>'124',
            'course_name'=>'B.Sc. ZOOLOGY',
            'fullname'=>'Bachelor of Science',
            'shortname'=>'B.Sc.',
            'special_subject'=>'ZOOLOGY',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>3,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>17,
            'course_code'=>'125',
            'course_name'=>'B.Sc. ELECTRONICS',
            'fullname'=>'Bachelor of Science',
            'shortname'=>'B.Sc.',
            'special_subject'=>'ELECTRONICS',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>3,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>18,
            'course_code'=>'127',
            'course_name'=>'B.Sc. MATHEMATICS',
            'fullname'=>'Bachelor of Science',
            'shortname'=>'B.Sc.',
            'special_subject'=>'MATHEMATICS',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>3,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>19,
            'course_code'=>'128',
            'course_name'=>'B.Sc. STATISTICS',
            'fullname'=>'Bachelor of Science',
            'shortname'=>'B.Sc.',
            'special_subject'=>'STATISTICS',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>3,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>20,
            'course_code'=>'130',
            'course_name'=>'B.Sc. MICROBIOLOGY',
            'fullname'=>'Bachelor of Science',
            'shortname'=>'B.Sc.',
            'special_subject'=>'MICROBIOLOGY',
            'course_type'=>'UG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>3,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>21,
            'course_code'=>'131',
            'course_name'=>'B.Voc. SOFTWARE DEVELOPMENT',
            'fullname'=>'Bachelor of Vocation',
            'shortname'=>'B.Voc.',
            'special_subject'=>'SOFTWARE DEVELOPMENT',
            'course_type'=>'UG',
             'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>4,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>22,
            'course_code'=>'133',
            'course_name'=>'B.Voc. HOSPITALITY & TOURISM',
            'fullname'=>'Bachelor of Vocation',
            'shortname'=>'B.Voc.',
            'special_subject'=>'HOSPITALITY & TOURISM',
            'course_type'=>'UG',
             'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>4,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>23,
            'course_code'=>'134',
            'course_name'=>'B.Voc. DAIRY PRODUCT & PROCESSING',
            'fullname'=>'Bachelor of Vocation',
            'shortname'=>'B.Voc.',
            'special_subject'=>'DAIRY PRODUCT & PROCESSING',
            'course_type'=>'UG',
             'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>4,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>24,
            'course_code'=>'136',
            'course_name'=>'B.Voc. ACCOUNT & TAXATION',
            'fullname'=>'Bachelor of Vocation',
            'shortname'=>'B.Voc.',
            'special_subject'=>'ACCOUNT & TAXATION',
            'course_type'=>'UG',
             'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>4,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>25,
            'course_code'=>'137',
            'course_name'=>'B.Voc. AGRICULTURE AND SOIL SCIENCE',
            'fullname'=>'Bachelor of Vocation',
            'shortname'=>'B.Voc.',
            'special_subject'=>'AGRICULTURE AND SOIL SCIENCE',
            'course_type'=>'UG',
             'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>4,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>26,
            'course_code'=>'139',
            'course_name'=>'B.B.A.',
            'fullname'=>'Bachelor of Business Administration',
            'shortname'=>'B.B.A.',
            'special_subject'=>'Business Administration',
            'course_type'=>'UG',
             'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>4,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>27,
            'course_code'=>'140',
            'course_name'=>'B.B.A.C.A.',
            'fullname'=>'Bachelor of Business Administration (Computer Application)',
            'shortname'=>'B.B.A.C.A.',
            'special_subject'=>'COMPUTER APPLICATION',
            'course_type'=>'UG',
             'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>4,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>28,
            'course_code'=>'142',
            'course_name'=>'B.C.A.(Under Science)',
            'fullname'=>'Bachelor of Computer Application (Under Science)',
            'shortname'=>'B.C.A.',
            'special_subject'=>'COMPUTER SCIENCE',
            'course_type'=>'UG',
             'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>4,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>29,
            'course_code'=>'143',
            'course_name'=>'M.A. ENGLISH',
            'fullname'=>'Master of Arts',
            'shortname'=>'M.A.',
            'special_subject'=>'ENGLISH',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>30,
            'course_code'=>'145',
            'course_name'=>'M.A. MARATHI',
            'fullname'=>'Master of Arts',
            'shortname'=>'M.A.',
            'special_subject'=>'MARATHI',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>31,
            'course_code'=>'146',
            'course_name'=>'M.A. HINDI',
            'fullname'=>'Master of Arts',
            'shortname'=>'M.A.',
            'special_subject'=>'HINDI',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>32,
            'course_code'=>'148',
            'course_name'=>'M.A. ECONOMICS',
            'fullname'=>'Master of Arts',
            'shortname'=>'M.A.',
            'special_subject'=>'ECONOMICS',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>33,
            'course_code'=>'149',
            'course_name'=>'M.A. POLITICS',
            'fullname'=>'Master of Arts',
            'shortname'=>'M.A.',
            'special_subject'=>'POLITICS',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>34,
            'course_code'=>'151',
            'course_name'=>'M.A. PHILOSOPHY',
            'fullname'=>'Master of Arts',
            'shortname'=>'M.A.',
            'special_subject'=>'PHILOSOPHY',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>35,
            'course_code'=>'152',
            'course_name'=>'M.A. GEOGRAPHY',
            'fullname'=>'Master of Arts',
            'shortname'=>'M.A.',
            'special_subject'=>'GEOGRAPHY',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>36,
            'course_code'=>'154',
            'course_name'=>'M.A. SANSKRIT',
            'fullname'=>'Master of Arts',
            'shortname'=>'M.A.',
            'special_subject'=>'SANSKRIT',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>37,
            'course_code'=>'155',
            'course_name'=>'M.Com. BANKING AND FINANCE',
            'fullname'=>'Master of Commerce',          
            'shortname'=>'M.Com.',
            'special_subject'=>'BANKING AND FINANCE',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>38,
            'course_code'=>'157',
            'course_name'=>'M.Com. BUSINESS ADMINISTRATION AND MANAGEMENT',
            'fullname'=>'Master of Commerce',          
            'shortname'=>'M.Com.',
            'special_subject'=>'BUSINESS ADMINISTRATION AND MANAGEMENT',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>39,
            'course_code'=>'158',
            'course_name'=>'M.Com. ACCOUNTING, COSTING AND TAXATION',
            'fullname'=>'Master of Commerce',          
            'shortname'=>'M.Com.',
            'special_subject'=>'ACCOUNTING, COSTING AND TAXATION',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>40,
            'course_code'=>'160',
            'course_name'=>'M.Sc. COMPUTER SCIENCE',
            'fullname'=>'Master of Science',
            'shortname'=>'M.Sc.',
            'special_subject'=>'COMPUTER SCIENCE',
            'course_type'=>'PG',
             'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>41,
            'course_code'=>'161',
            'course_name'=>'M.Sc. PHYSICS',
            'fullname'=>'Master of Science',
            'shortname'=>'M.Sc.',
            'special_subject'=>'PHYSICS',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>42,
            'course_code'=>'163',
            'course_name'=>'M.Sc. CHEMISTRY',
            'fullname'=>'Master of Science',
            'shortname'=>'M.Sc.',
            'special_subject'=>'CHEMISTRY',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>43,
            'course_code'=>'164',
            'course_name'=>'M.Sc. BOTANY',
            'fullname'=>'Master of Science',
            'shortname'=>'M.Sc.',
            'special_subject'=>'BOTANY',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>44,
            'course_code'=>'166',
            'course_name'=>'M.Sc. ZOOLOGY',
            'fullname'=>'Master of Science',
            'shortname'=>'M.Sc.',
            'special_subject'=>'ZOOLOGY',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>45,
            'course_code'=>'167',
            'course_name'=>'M.Sc. ELECTRONICS',
            'fullname'=>'Master of Science',
            'shortname'=>'M.Sc.',
            'special_subject'=>'ELECTRONICS',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>46,
            'course_code'=>'169',
            'course_name'=>'M.Sc. MATHEMATICS',
            'fullname'=>'Master of Science',
            'shortname'=>'M.Sc.',
            'special_subject'=>'MATHEMATICS',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>47,
            'course_code'=>'170',
            'course_name'=>'M.Sc. STATISTICS',
            'fullname'=>'Master of Science',
            'shortname'=>'M.Sc.',
            'special_subject'=>'STATISTICS',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
            
                        
            Course::create( [
            'id'=>48,
            'course_code'=>'172',
            'course_name'=>'M.Sc. MICROBIOLOGY',
            'fullname'=>'Master of Science',
            'shortname'=>'M.Sc.',
            'special_subject'=>'MICROBIOLOGY',
            'course_type'=>'PG',
            'course_category_id'=>Coursecategory::inRandomOrder()->first()->id,
            'college_id'=>1,
            'programme_id'=>1,
            'created_at'=>'2023-09-06 00:04:00',
            'updated_at'=>'2023-09-06 00:04:00'
            ] );
            
           

    }
}
