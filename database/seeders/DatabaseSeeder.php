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
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
