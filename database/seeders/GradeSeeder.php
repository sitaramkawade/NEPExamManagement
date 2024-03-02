<?php

namespace Database\Seeders;

use App\Models\Gradepoint;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = ['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'F'];

        foreach ($grades as $grade) {
            Gradepoint::create([
                'grade_name' => $grade,
            ]);
        }
    }
}
