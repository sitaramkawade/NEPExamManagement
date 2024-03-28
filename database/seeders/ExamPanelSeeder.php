<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Subject;
use App\Models\Exampanel;
use Faker\Factory as Faker;
use App\Models\Examorderpost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamPanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exampanel::create([
        'faculty_id' => 139,
        'examorderpost_id' => 1,
        'subject_id' => 1436,
        'active_status' => 1,
        ]);

        Exampanel::create([
        'faculty_id' => 140,
        'examorderpost_id' => 1,
        'subject_id' => 1437,
        'active_status' => 1,
        ]);
    }
}
