<?php

namespace Database\Seeders;

use App\Models\Caste;
use App\Models\Taluka;
use App\Models\Student;
use App\Models\University;
use App\Models\Addresstype;
use Illuminate\Support\Str;
use App\Models\Patternclass;
use App\Models\CasteCategory;
use Illuminate\Database\Seeder;
use App\Models\Educationalcourse;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class StudentProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

       $student = Student::create([
        'student_name' => 'Puri Ashutosh Laxman',
        'mother_name' => 'Jayshree',
        'mobile_no' => '9373545745',
        'memid' => '28341',
        'abcid' => '123456789012',
        'aadhar_card_no' => '210987654321',
        'email' => 'ashutoshpuri2000@gmail.com',
        'email_verified_at' => now(),
        'password' => Hash::make('123456789'),
        'remember_token' => Str::random(10),
        'current_step'=>6,
        'is_profile_complete'=>1,
        'patternclass_id'=>Patternclass::first()->id
        ]);

        $student->studentprofile()->create([
            'student_name_on_adharcard'=>'Puri Ashutosh Laxman',
            'father_name'=>'Laxman',
            'gender'=>'M',
            'date_of_birth'=>'2000-05-25',
            'nationality'=>'Indian',
            'profile_photo_path'=>$faker->imageUrl($width = 640, $height = 480, 'nature'),
            'sign_photo_path'=>$faker->imageUrl($width = 640, $height = 480, 'nature'),
            'caste_id'=>Caste::inRandomOrder()->first()->id,
            'caste_category_id'=>CasteCategory::inRandomOrder()->first()->id,
            'is_noncreamylayer'=>0,
            'is_handicap'=>0,
        ]);

        $student->studentaddress()->create([
            'taluka_id' => Taluka::inRandomOrder()->first()->id,
            'pincode' => 422605,
            'village_name' => 'Sangamner Kh',
            'locality_name' => 'Sangamner Kh',
            'address' =>'Near Kuber Empire , Khandgoan Road',
            'is_same' => 0,
            'addresstype_id' => Addresstype::inRandomOrder()->first()->id,
            'is_completed' => 1,
        ]);

        $student->studentaddress()->create( [
            'taluka_id' => Taluka::inRandomOrder()->latest()->first()->id,
            'pincode' => 422605,
            'village_name' => 'Akole',
            'locality_name' => 'Akole',
            'address' =>'Near Akole Bus Stand',
            'is_same' => 0,
            'addresstype_id' => Addresstype::inRandomOrder()->latest()->first()->id,
            'is_completed' => 1,
        ]);

        $student->educationalcourses()->create([
           'boarduniversity_id' =>University::inRandomOrder()->first()->id,
           'educationalcourse_id' =>Educationalcourse::inRandomOrder()->first()->id,
           'passing_year' =>'2023',
           'passing_month' =>'May',
           'grade' =>'A+',
           'seat_number' =>12345,
           'percentage' =>80.66,
           'cgpa' =>7.30,
        ]);

    }
}
