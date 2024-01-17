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

use Database\Seeders\ExamTimeTableSeeder;
use Database\Seeders\CasteCategorySeeder;
use Database\Seeders\DepatmenttypeSeeder;
use Database\Seeders\SubjectCreditSeeder;
use Database\Seeders\BanknamemasterSeeder;
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
            StudenthelplineQuerySeeder::class,
            StudenthelplineDocumentSeeder::class,
            LoginSeeder::class,
            GradeSeeder::class,
            PreviousYearSeeder::class,
            MonthSeeder::class,
            SansthaSeeder::class,
            AcademicyearSeeder::class,
            ProgrammeSeeder::class,
            DepatmenttypeSeeder::class,
            DepatmentSeeder::class,
            CourseSeeder::class,
            RoletypeSeeder::class,
            RoleSeeder::class,
            SubjectcategorySeeder::class,
            SubjecttypeSeeder::class,
            CourseclassSeeder::class,
            PatternclassSeeder::class,
            StudmenumasterSeeder::class,
            ClassStudmenumasterSeeder::class,
            BloodgroupSeeder::class,
            ReligionSeeder::class,
            CasteCategorySeeder::class,
            CasteSeeder::class,
            GendermasterSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            DistrictSeeder::class,
            TalukaSeeder::class,
            AddresstypeSeeder::class,
            ClassyearSeeder::class,
            BoarduniversitySeeder::class,
            EducationalcourseSeeder::class,
            PrefixmasterSeeder::class,
            BanknamemasterSeeder::class,
            SemesterSeeder::class,
            SubjectcreditSeeder::class,
            StudentProfileSeeder::class,

            ExamSeeder::class,
            // ExamTimeTableSeeder::class

            SubjectSeeder::class,
            ExamPatternclassSeeder::class
            SubjectBucketSeeder::class,
            FacultyProfileSeeder::class,


        ]);
    }
}
