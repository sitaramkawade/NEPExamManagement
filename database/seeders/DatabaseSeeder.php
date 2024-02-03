<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\ExamSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\BlockSeeder;
use Database\Seeders\CasteSeeder;
use Database\Seeders\GradeSeeder;
use Database\Seeders\LoginSeeder;
use Database\Seeders\MonthSeeder;
use Database\Seeders\StateSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\NoticeSeeder;
use Database\Seeders\TalukaSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\SansthaSeeder;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\BuildingSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\FormTypeSeeder;
use Database\Seeders\RateheadSeeder;
use Database\Seeders\ReligionSeeder;
use Database\Seeders\RoletypeSeeder;
use Database\Seeders\SemesterSeeder;
use Database\Seeders\CapmasterSeeder;
use Database\Seeders\ClassyearSeeder;
use Database\Seeders\DepatmentSeeder;
use Database\Seeders\ExamorderSeeder;
use Database\Seeders\ExamPanelSeeder;
use Database\Seeders\ProgrammeSeeder;
use Database\Seeders\BloodgroupSeeder;
use Database\Seeders\AddresstypeSeeder;
use Database\Seeders\CourseclassSeeder;
use Database\Seeders\FacultyHeadSeeder;
use Database\Seeders\SubjecttypeSeeder;
use Database\Seeders\AcademicyearSeeder;
use Database\Seeders\GendermasterSeeder;
use Database\Seeders\PatternclassSeeder;
use Database\Seeders\PrefixmasterSeeder;
use Database\Seeders\PreviousYearSeeder;
use Database\Seeders\AdmissionDataSeeder;
use Database\Seeders\CasteCategorySeeder;
use Database\Seeders\DepatmenttypeSeeder;
use Database\Seeders\ExamFeeMasterSeeder;
use Database\Seeders\ExamOrderPostSeeder;
use Database\Seeders\ExamTimeTableSeeder;
use Database\Seeders\SubjectBucketSeeder;
use Database\Seeders\SubjectcreditSeeder;
use Database\Seeders\TimeTableSlotSeeder;
use Database\Seeders\BanknamemasterSeeder;
use Database\Seeders\CourseCategorySeeder;
use Database\Seeders\ExamFeeCoursesSeeder;
use Database\Seeders\FacultyProfileSeeder;
use Database\Seeders\StudentProfileSeeder;
use Database\Seeders\StudmenumasterSeeder;
use Database\Seeders\BoarduniversitySeeder;
use Database\Seeders\StudentHelplineSeeder;
use Database\Seeders\SubjectcategorySeeder;
use Database\Seeders\ExamPatternclassSeeder;
use Database\Seeders\EducationalcourseSeeder;
use Database\Seeders\HodAppointSubjectSeeder;
use Database\Seeders\ClassStudmenumasterSeeder;
use Database\Seeders\StudenthelplineQuerySeeder;
use Database\Seeders\ExamBacklogFeeCoursesSeeder;
use Database\Seeders\StudenthelplineDocumentSeeder;
use Database\Seeders\StudentHelplineUploadedDocumentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LoginSeeder::class,
            GradeSeeder::class,
            PreviousYearSeeder::class,
            MonthSeeder::class,
            AcademicyearSeeder::class,
            ProgrammeSeeder::class,
            RoletypeSeeder::class,
            SubjectcategorySeeder::class,
            SubjecttypeSeeder::class,
            BloodgroupSeeder::class,
            ReligionSeeder::class,
            GendermasterSeeder::class,
            AddresstypeSeeder::class,
            ClassyearSeeder::class,
            BoarduniversitySeeder::class,
            PrefixmasterSeeder::class,
            BanknamemasterSeeder::class,
            SemesterSeeder::class,
            SubjectcreditSeeder::class,
            StudmenumasterSeeder::class,
            DepatmenttypeSeeder::class,
            TimeTableSlotSeeder::class,
            ExamSeeder::class,
            StudenthelplineQuerySeeder::class,
            CasteCategorySeeder::class,
            ApplyFeeSeeder::class,
            FormTypeSeeder::class,
            CountrySeeder::class,
            CourseCategorySeeder::class,
            ExamFeeMasterSeeder::class,                     // ApplyFeeSeeder , FormTypeSeeder
            NoticeSeeder::class,                            // User
            CasteSeeder::class,                             // CasteCategorySeeder
            StateSeeder::class,                             // CountrySeeder
            DistrictSeeder::class,                          // StateSeeder
            TalukaSeeder::class,                            // DistrictSeeder
            StudenthelplineDocumentSeeder::class,           // StudenthelplineQuerySeeder
            SansthaSeeder::class,                           // College , University
            PatternSeeder::class,                           // College
            CapmasterSeeder::class,                         // College , Exam
            CourseSeeder::class,                            // College , Programme
            RoleSeeder::class,                              // College , Roletype
            EducationalcourseSeeder::class,                 // Programme
            DepatmentSeeder::class,                         // College ,DepatmenttypeSeeder
            CourseclassSeeder::class,                       // classyear,course ,courseclass,college
            PatternclassSeeder::class,                      // Pattern , Patternclass
            ExamPatternclassSeeder::class,                  // Exam ,Patternclass ,CapmasterSeeder
            StudentProfileSeeder::class,                    // Patterncalss , caste , castecategory , Addresstype ,University, Educationalcourse
            SubjectSeeder::class,                           // subjectcategory , subjecttype , patternclass , classyear , department , college
            SubjectBucketSeeder::class,                     // department , patternclass , subjectcategory ,subject , academicyear
            FacultyProfileSeeder::class,                    // college  ,department , role ,facultybanck account
            AdmissionDataSeeder::class,                     // User,College,Patternclass,Subject,Academicyear
            StudentHelplineSeeder::class,                   // Student , Studenthelplinequery ,User
            StudentHelplineUploadedDocumentSeeder::class,   // Studenthelpline,Studenthelplinedocument
            StudentSeeder::class,                           // Patternclass , Department , College
            ExamFeeCoursesSeeder::class,                    // Patternclass, Examfeemaster
            FacultyHeadSeeder::class,                       // Faculty, Department
            HodAppointSubjectSeeder::class,                 // Faculty, Subject, Patternclass
            ExamOrderPostSeeder::class,
            // ExamPanelSeeder::class,
            // ExamorderSeeder::class,
            // ExamTimeTableSeeder::class,
            // BuildingSeeder::class,
        ]);
    }
}
