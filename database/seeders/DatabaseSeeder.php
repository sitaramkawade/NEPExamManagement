<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\ExamSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\CasteSeeder;
use Database\Seeders\GradeSeeder;
use Database\Seeders\LoginSeeder;
use Database\Seeders\MonthSeeder;
use Database\Seeders\StateSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\TalukaSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\SansthaSeeder;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\ReligionSeeder;
use Database\Seeders\RoletypeSeeder;
use Database\Seeders\SemesterSeeder;
use Database\Seeders\CapmasterSeeder;
use Database\Seeders\ClassyearSeeder;
use Database\Seeders\DepatmentSeeder;
use Database\Seeders\ProgrammeSeeder;
use Database\Seeders\BloodgroupSeeder;
use Database\Seeders\AddresstypeSeeder;
use Database\Seeders\CourseclassSeeder;
use Database\Seeders\SubjecttypeSeeder;
use Database\Seeders\AcademicyearSeeder;
use Database\Seeders\GendermasterSeeder;
use Database\Seeders\PatternclassSeeder;
use Database\Seeders\PrefixmasterSeeder;

use Database\Seeders\PreviousYearSeeder;
use Database\Seeders\CasteCategorySeeder;
use Database\Seeders\DepatmenttypeSeeder;
use Database\Seeders\ExamTimeTableSeeder;
use Database\Seeders\SubjectBucketSeeder;
use Database\Seeders\SubjectcreditSeeder;
use Database\Seeders\BanknamemasterSeeder;
use Database\Seeders\FacultyProfileSeeder;
use Database\Seeders\StudentProfileSeeder;
use Database\Seeders\StudmenumasterSeeder;
use Database\Seeders\BoarduniversitySeeder;
use Database\Seeders\SubjectcategorySeeder;
use Database\Seeders\ExamPatternclassSeeder;
use Database\Seeders\EducationalcourseSeeder;
use Database\Seeders\ClassStudmenumasterSeeder;
use Database\Seeders\StudenthelplineQuerySeeder;
use Database\Seeders\StudenthelplineDocumentSeeder;

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
            ExamSeeder::class,
            StudenthelplineQuerySeeder::class,
            CasteCategorySeeder::class,
            CountrySeeder::class,
            CasteSeeder::class,                     // CasteCategorySeeder
            StateSeeder::class,                     // CountrySeeder
            DistrictSeeder::class,                  // StateSeeder
            TalukaSeeder::class,                    // DistrictSeeder
            StudenthelplineDocumentSeeder::class,   // StudenthelplineQuerySeeder
            SansthaSeeder::class,                   // College , University
            CapmasterSeeder::class,                 // College , Exam
            CourseSeeder::class,                    // College , Programme
            RoleSeeder::class,                      // College , Roletype
            EducationalcourseSeeder::class,         // Programme
            DepatmentSeeder::class,                 // College ,DepatmenttypeSeeder
            CourseclassSeeder::class,               // classyear,course ,courseclass,college
            PatternclassSeeder::class,              // Pattern , Patternclass
            ExamPatternclassSeeder::class,          // Exam ,Patternclass ,CapmasterSeeder
            ClassStudmenumasterSeeder::class,       // StudmenumasterSeeder ,Pattern Class ,user , college
            StudentProfileSeeder::class,            // Patterncalss , caste , castecategory , Addresstype ,University, Educationalcourse
            SubjectSeeder::class,                   // subjectcategory , subjecttype , patternclass , classyear , department , college
            SubjectBucketSeeder::class,             // department , patternclass , subjectcategory ,subject , academicyear
            FacultyProfileSeeder::class,            // college  ,department , role ,facultybanck account

            // ExamTimeTableSeeder::class

        ]);
    }
}
