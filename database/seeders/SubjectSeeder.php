<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Subject;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            Subject::create([
                'id' => $i,
                'subject_sem' => $faker->numberBetween(1, 6),
                'subjectcategory_id' => $faker->numberBetween(1, 10),
                'subject_no' => $faker->numberBetween(1, 100),
                'subject_code' => $faker->numberBetween(1, 1000),
                'subject_shortname' => $faker->lexify('???'),
                'subject_name' => $faker->word,
                'subjecttype_id' => $faker->numberBetween(1, 5),
                'subjectexam_type' => $faker->randomElement(['INTERNAL', 'EXTERNAL']),
                'subject_credit' => $faker->numberBetween(1, 5),
                'subject_maxmarks' => $faker->numberBetween(80, 100),
                'subject_maxmarks_int' => $faker->numberBetween(20, 30),
                'subject_maxmarks_intpract' => $faker->numberBetween(10, 15),
                'subject_maxmarks_ext' => $faker->numberBetween(60, 70),
                'subject_totalpassing' => $faker->numberBetween(35, 45),
                'subject_intpassing' => $faker->numberBetween(15, 20),
                'subject_intpractpassing' => $faker->numberBetween(5, 10),
                'subject_extpassing' => $faker->numberBetween(25, 35),
                'subject_optionalgroup' => $faker->lexify('???'),
                'patternclass_id' => $faker->numberBetween(1, 3),
                'classyear_id' => $faker->numberBetween(1, 3),
                'department_id' => $faker->numberBetween(1, 3),
                'college_id' => 1,
                'status' => $faker->numberBetween(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
