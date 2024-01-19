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

        for ($i = 1; $i <= 10; $i++) {
            $faculty = Faculty::create([
                'id' => $i,
                'prefix' => $faker->randomElement(['Dr.', 'Eng.', 'Prof.',]),
                'faculty_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'mobile_no' => $faker->numberBetween(1000000000, 9999999999),
                'college_id' => 1,
                'department_id' => $faker->numberBetween(1, 3),
                'role_id' => $faker->numberBetween(1, 3),
                'designation_id' => $faker->numberBetween(1, 3),
                'date_of_birth' => $faker->date,
                'gender' => $faker->randomElement(['M', 'F']),
                'category' => $faker->randomElement(['NT(B)', 'SC', 'ST', 'OBC']),
                'pan' => $faker->regexify('[A-Z]{5}[0-9]{4}[A-Z]{1}'),
                'current_address' => $faker->address,
                'permanant_address' => $faker->address,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'remember_token' => Str::random(10),
                'profile_photo_path' => $faker->imageUrl($width = 640, $height = 480, 'nature'),
                'unipune_id' => 'UNP' . $faker->unique()->randomNumber(9),
                'qualification' => $faker->sentence,
                'active' => $faker->numberBetween(0, 1),
            ]);

            $faculty->facultybankaccount()->create([
                'id' => $i,
                'faculty_id' => $faculty->id,
                'account_no' => $faker->bankAccountNumber,
                'bank_address' => $faker->address,
                'bank_name' => $faker->randomElement(['State Bank Of India', 'Bank Of Maharashtra','Central Bank Of India']),
                'branch_name' => $faker->companySuffix,
                'branch_code' => $faker->numberBetween(1000, 9999),
                'account_type' => $faker->randomElement(['S', 'C']),
                'ifsc_code' => $faker->swiftBicNumber,
                'micr_code' => $faker->numberBetween(100000000, 999999999),
                'acc_verified' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
