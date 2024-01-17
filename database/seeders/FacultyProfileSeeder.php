<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

       $faculty = Faculty::create([
        'prefix' => 'Dr.',
        'faculty_name' => 'Puri Ashutosh Laxman',
        'email' => 'ashutoshpuri2000@gmail.com',
        'mobile_no' => '9373545745',
        'college_id' => 1,
        'department_id' => 1,
        'role_id' => 1,
        'date_of_birth'=>'2000-05-25',
        'gender'=>'M',
        'category'=>'NT(B)',
        'pan'=>'DXCHH00MMN',
        'current_address' =>'Near Kuber Empire , Khandgoan Road',
        'permanant_address' =>'Near Kuber Empire , Khandgoan Road',
        'email_verified_at' => now(),
        'password' => Hash::make('123456789'),
        'remember_token' => Str::random(10),
        'profile_photo_path'=>$faker->imageUrl($width = 640, $height = 480, 'nature'),
        'unipune_id'=>'UNP123456789',
        'qualification'=>'M.Sc.(Computer Science)',
        'active'=>1,
        ]);

        $faculty->facultybankaccount()->create([
            'faculty_id'=> $faculty->id,
            'account_no'=>'123456789',
            'bank_address'=>'Sangamner Khurd',
            'bank_name'=>'State Bank Of India',
            'branch_name'=>'Sangamner Khurd',
            'branch_code'=>'0447',
            'account_type'=>'S',
            'ifsc_code'=>'SBIN0001155',
            'micr_code'=>'123456789',
            'acc_verified'=>1,
        ]);
    }
}
