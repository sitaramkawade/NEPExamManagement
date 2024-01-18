<?php

namespace Database\Seeders;

use App\Models\Subjectbucket;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectBucketSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            Subjectbucket::create([
                'id' => $i,
                'department_id' => $faker->numberBetween(1, 4),
                'patternclass_id' => $faker->numberBetween(1, 3),
                'subject_division' => $faker->randomElement(['A', 'B','C','D']),
                'subjectcategory_id' => $faker->numberBetween(1, 10),
                'subject_categoryno' => $faker->numberBetween(1, 3),
                'subject_id' => $faker->numberBetween(1, 10),
                'academicyear_id' => $faker->numberBetween(1, 4),
                'status' => $faker->numberBetween(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
