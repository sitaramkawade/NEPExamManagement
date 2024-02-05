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
            'course_name'=>'B.A.',
            'fullname'=>'Bachelor of Arts',
            'special_subject'=>NULL,
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>1,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>2,
            'course_code'=>'102',
            'course_name'=>'B.Com.',
            'fullname'=>'Bachelor of Commerce',
            'special_subject'=>NULL,
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>2,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>3,
            'course_code'=>'103',
            'course_name'=>'B.Sc.',
            'fullname'=>'Bachelor of Science',
            'special_subject'=>NULL,
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>4,
            'course_code'=>'104',
            'course_name'=>'B.Sc.(Computer Science )',
            'fullname'=>'Bachelor of Computer Science',
            'special_subject'=>NULL,
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>1,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>5,
            'course_code'=>'105',
            'course_name'=>'B.C.A.(Science)',
            'fullname'=>'Bachelor of Computer Applications (Science)',
            'special_subject'=>NULL,
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>1,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>6,
            'course_code'=>'106',
            'course_name'=>'B.B.A.',
            'fullname'=>'Bachelor of Business Administration',
            'special_subject'=>NULL,
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>5,
            'course_category_id'=>1,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>7,
            'course_code'=>'107',
            'course_name'=>'B.B.A.(CA)',
            'fullname'=>'Bachelor of Business Administration(Computer Application)',
            'special_subject'=>NULL,
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>5,
            'course_category_id'=>1,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>8,
            'course_code'=>'108',
            'course_name'=>'B.Voc.(Software Development)',
            'fullname'=>'Bachelor Vocation',
            'special_subject'=>'Software Development',
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>4,
            'course_category_id'=>1,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>9,
            'course_code'=>'109',
            'course_name'=>'B.Voc.(Hospitality & Tourism)',
            'fullname'=>'Bachelor Vocation',
            'special_subject'=>'Hospitality & Tourism',
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>4,
            'course_category_id'=>1,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>10,
            'course_code'=>'110',
            'course_name'=>'B.Voc.(Dairy Product & Processing)',
            'fullname'=>'Bachelor Vocation',
            'special_subject'=>'Dairy Product & Processing',
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>4,
            'course_category_id'=>1,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>11,
            'course_code'=>'111',
            'course_name'=>'B.Voc.(Account & Taxation)',
            'fullname'=>'Bachelor Vocation',
            'special_subject'=>'Account & Taxation',
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>4,
            'course_category_id'=>1,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>12,
            'course_code'=>'112',
            'course_name'=>'B.Voc.(Agriculture and soil Science)',
            'fullname'=>'Bachelor Vocation',
            'special_subject'=>'Agriculture and soil Science',
            'course_type'=>'UG',
            'college_id'=>1,
            'programme_id'=>4,
            'course_category_id'=>1,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>14,
            'course_code'=>'114',
            'course_name'=>'M.A. ECONOMICS',
            'fullname'=>'Master of Arts',
            'special_subject'=>'ECONOMICS',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>1,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>15,
            'course_code'=>'115',
            'course_name'=>'M.A. ENGLISH',
            'fullname'=>'Master of Arts',
            'special_subject'=>'ENGLISH',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>1,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>16,
            'course_code'=>'116',
            'course_name'=>'M.A. HINDI',
            'fullname'=>'Master of Arts',
            'special_subject'=>'HINDI',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>1,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>17,
            'course_code'=>'117',
            'course_name'=>'M.A. MARATHI',
            'fullname'=>'Master of Arts',
            'special_subject'=>'MARATHI',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>1,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>18,
            'course_code'=>'118',
            'course_name'=>'M.A. POLITICS',
            'fullname'=>'Master of Arts',
            'special_subject'=>'POLITICS',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>1,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>19,
            'course_code'=>'119',
            'course_name'=>'M.A. SANSKRIT',
            'fullname'=>'Master of Arts',
            'special_subject'=>'SANSKRIT',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>1,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>20,
            'course_code'=>'120',
            'course_name'=>'M.Sc. ZOOLOGY',
            'fullname'=>'Master of Science',
            'special_subject'=>'ZOOLOGY',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>21,
            'course_code'=>'121',
            'course_name'=>'M.Sc. COMPUTER SCIENCE',
            'fullname'=>'Master of Science',
            'special_subject'=>'COMPUTER SCIENCE',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>1,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>22,
            'course_code'=>'122',
            'course_name'=>'M.Sc.BOTANY',
            'fullname'=>'Master of Science',
            'special_subject'=>'BOTANY',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>23,
            'course_code'=>'123',
            'course_name'=>'M.Sc. ANALYTICAL CHEMISTRY',
            'fullname'=>'Master of Science',
            'special_subject'=>'ANALYTICAL CHEMISTRY',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>24,
            'course_code'=>'124',
            'course_name'=>'M.Sc. ELECTRONICS',
            'fullname'=>'Master of Science',
            'special_subject'=>'ELECTRONICS',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>25,
            'course_code'=>'125',
            'course_name'=>'M.Sc. GEOGRAPHY',
            'fullname'=>'Master of Science',
            'special_subject'=>'GEOGRAPHY',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>26,
            'course_code'=>'126',
            'course_name'=>'M.Sc. MATHEMATICS',
            'fullname'=>'Master of Science',
            'special_subject'=>'MATHEMATICS',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>27,
            'course_code'=>'127',
            'course_name'=>'M.Sc. ORGANIC CHEMISTRY',
            'fullname'=>'Master of Science',
            'special_subject'=>'ORGANIC CHEMISTRY',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>28,
            'course_code'=>'128',
            'course_name'=>'M.Sc. PHYSICS',
            'fullname'=>'Master of Science',
            'special_subject'=>'PHYSICS',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>3,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>29,
            'course_code'=>'129',
            'course_name'=>'M. COM. (ADV. CO. A/CING & COST SYS.)',
            'fullname'=>'Master Of Commerce',
            'special_subject'=>'ADV. CO. A/CING & COST SYS.',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>2,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>30,
            'course_code'=>'130',
            'course_name'=>'M.COM.  (ADV. A/CING & TAXATION )',
            'fullname'=>'Master Of Commerce',
            'special_subject'=>'ADV. A/CING & TAXATION ',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>2,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>31,
            'course_code'=>'131',
            'course_name'=>'M.COM. (BUSINESS ADMINISTRATION)',
            'fullname'=>'Master Of Commerce',
            'special_subject'=>'BUSINESS ADMINISTRATION',
            'course_type'=>'PG',
            'college_id'=>1,
            'programme_id'=>2,
            'course_category_id'=>2,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>32,
            'course_code'=>'1001',
            'course_name'=>'Ph.D.',
            'fullname'=>'Doctor of Philosophy',
            'special_subject'=>NULL,
            'course_type'=>'PHD',
            'college_id'=>1,
            'programme_id'=>5,
            'course_category_id'=>3,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>33,
            'course_code'=>'1001',
            'course_name'=>'Ph.D.',
            'fullname'=>'Doctor of Philosophy',
            'special_subject'=>'MARATHI',
            'course_type'=>'PHD',
            'college_id'=>1,
            'programme_id'=>5,
            'course_category_id'=>3,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );
                        
            Course::create( [
            'id'=>34,
            'course_code'=>'1003',
            'course_name'=>'Ph.D.',
            'fullname'=>'Doctor of Philosophy',
            'special_subject'=>'SANSKRIT',
            'course_type'=>'PHD',
            'college_id'=>1,
            'programme_id'=>5,
            'course_category_id'=>3,
            'created_at'=>'2024-02-05 06:57:54',
            'updated_at'=>'2024-02-05 06:57:54',
            'deleted_at'=>NULL
            ] );

    }
}
