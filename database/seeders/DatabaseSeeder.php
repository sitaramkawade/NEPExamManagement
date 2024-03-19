<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DeptPrefixSeeder;
use Database\Seeders\InternalToolDocumentSeeder;
use Database\Seeders\FacultyinternaldocumentSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            GradeSeeder::class,
            PreviousYearSeeder::class,
            MonthSeeder::class,
            AcademicyearSeeder::class,
            ProgrammeSeeder::class,
            RoletypeSeeder::class,
            SubjectBucketTypeMasterSeeder::class,
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
            ExamOrderPostSeeder::class,
            BuildingSeeder::class,
            CourseCategorySeeder::class,
            ExamFeeMasterSeeder::class,                     // ApplyFeeSeeder , FormTypeSeeder
            CasteSeeder::class,                             // CasteCategorySeeder
            StateSeeder::class,                             // CountrySeeder
            DistrictSeeder::class,                          // StateSeeder
            TalukaSeeder::class,                            // DistrictSeeder
            StudenthelplineDocumentSeeder::class,           // StudenthelplineQuerySeeder
            CollegeSeeder::class,                           // Sanstha, University
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
            FacultyProfileSeeder::class,                    // college  ,department , role ,facultybanck account
            LoginSeeder::class,                             // College , Patternclass
            NoticeSeeder::class,                            // User
            SubjectverticalSeeder::class,                   // Subjectbuckettype
            SubjectSeeder::class,                           // subjectcategory , subjecttype , patternclass , classyear , department , college
            SubjectBucketSeeder::class,                     // department , patternclass , subjectcategory ,subject , academicyear
            // AdmissionDataSeeder::class,                     // User,College,Patternclass,Subject,Academicyear
            AshutoshAdmissionDataSeeder::class,             // User,College,Patternclass,Subject,Academicyear
            StudentHelplineSeeder::class,                   // Student , Studenthelplinequery ,User
            StudentHelplineUploadedDocumentSeeder::class,   // Studenthelpline,Studenthelplinedocument
            StudentSeeder::class,                           // Patternclass , Department , College
            ExamFeeCoursesSeeder::class,                    // Patternclass, Examfeemaster
            FacultyHeadSeeder::class,                       // Faculty, Department
            HodAppointSubjectSeeder::class,                 // Faculty, Subject, Patternclass
            ExamOrderPostSeeder::class,
            SubjectTypeMasterSeeder::class,                 // Subjectcategory, Subjecttype
            InternalToolMasterSeeder::class,
            InternalToolDocumentMasterSeeder::class,
            InternalToolDocumentSeeder::class,
            InternalToolAuditorSeeder::class,               // Patternclass, Faculty, Academicyear,
            CourseTypeMasterSeeder::class,
            DeptPrefixSeeder::class,
            FacultyinternaldocumentSeeder::class,           // Academicyear, Faculty, Subject, Internaltooldocumentmaster,
        ]);
    }
}
