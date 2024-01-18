<?php

namespace Database\Seeders;

use App\Models\Subjectcategory;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'id' => $i,
                'subjectcategory' => $faker->word,
                'subjectcategory_shortname' => $faker->lexify('???'),
                'active' => $faker->numberBetween(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
