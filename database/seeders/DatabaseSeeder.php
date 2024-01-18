<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GradeSeeder;
use Database\Seeders\LoginSeeder;
use Database\Seeders\MonthSeeder;
use Database\Seeders\SemesterSeeder;
use Database\Seeders\PreviousYearSeeder;
use Database\Seeders\SubjectCreditSeeder;
use Database\Seeders\StudentProfileSeeder;
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
            LoginSeeder::class, //1
            GradeSeeder::class, //2
            PreviousYearSeeder::class, //3
            MonthSeeder::class, //4
            AcademicyearSeeder::class, //5
            ProgrammeSeeder::class, //6
            RoletypeSeeder::class, //7
            SubjectcategorySeeder::class, //8
            SubjecttypeSeeder::class, //9
            BloodgroupSeeder::class, //10
            ReligionSeeder::class, // 11
            GendermasterSeeder::class, //12
            AddresstypeSeeder::class, //13
            ClassyearSeeder::class, //14
            BoarduniversitySeeder::class, //15
            PrefixmasterSeeder::class, //16
            BanknamemasterSeeder::class, //17
            SemesterSeeder::class, //18
            SubjectcreditSeeder::class, //19
            StudmenumasterSeeder::class, //20
            DepatmenttypeSeeder::class, //21
            // ExamSeeder::class, //22
            StudenthelplineQuerySeeder::class, //23
            CasteCategorySeeder::class, //24
            CountrySeeder::class, //25
            CasteSeeder::class, //26
            StateSeeder::class, //27
            DistrictSeeder::class, //28
            TalukaSeeder::class, //29
            // CapmasterSeeder::class, //30
            StudenthelplineDocumentSeeder::class, //31
            SansthaSeeder::class, //32
            CourseSeeder::class, //33
            RoleSeeder::class, //34
            EducationalcourseSeeder::class, //35
            DepatmentSeeder::class, //36
            CourseclassSeeder::class, //37
            PatternclassSeeder::class, //38
            ClassStudmenumasterSeeder::class, //39
            StudentProfileSeeder::class, //40
            SubjectSeeder::class, //41
            SubjectBucketSeeder::class, //42
            FacultyProfileSeeder::class, //43
            // ExamTimeTableSeeder::class, //44

        ]);
    }
}
