<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Subjectcategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            Subjectcategory::create([
                'subjectcategory' => $faker->word,
                'subjectcategory_shortname' => $faker->lexify('???'),
                'active' => $faker->numberBetween(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
