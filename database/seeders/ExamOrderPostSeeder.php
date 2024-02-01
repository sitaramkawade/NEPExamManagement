<?php

namespace Database\Seeders;

use App\Models\ExamOrderPost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ExamOrderPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            ExamOrderPost::create([
                'post_name' => $faker->word,
                // 'start_date' => $faker->dateTimeBetween('now', '+30 days'),
                // 'end_date' => $faker->dateTimeBetween('now', '+60 days'),
                'status' =>$faker->numberBetween(1,0),
            ]);
        }
    }
}
