<?php

namespace Database\Seeders;

use App\Models\Role;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            Role::create([
                'id' => $i,
                'role_name' => $faker->word,
                'roletype_id' => $faker->numberBetween(1, 5),
                'college_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
