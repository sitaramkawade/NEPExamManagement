<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Notice;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            Notice::create([
                'title' => $faker->sentence(5),
                'description' => $faker->paragraph(3),
                'start_date' => now(),
                'end_date' => now()->addDays(rand(1, 30)),
                'type' => rand(0, 4),
                'is_active' => rand(0, 1),
                'user_id' => rand(1, count($userIds)), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
