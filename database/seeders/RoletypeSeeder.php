<?php

namespace Database\Seeders;

use App\Models\Roletype;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RoletypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            Roletype::create([
                'id' => $i,
                'roletype_name' => $faker->word,
                'status' => $faker->numberBetween(0,1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
