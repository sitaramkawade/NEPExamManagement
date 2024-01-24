<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Examfeemaster;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamFeeMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Examfeemaster::create([
                'fee_type' => $faker->word,
                'remark' => $faker->word,
                'active_status' => $faker->boolean,
                'approve_status' => $faker->boolean,
            ]);
        }
    }
}
