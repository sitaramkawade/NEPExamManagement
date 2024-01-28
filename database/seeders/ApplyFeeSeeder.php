<?php

namespace Database\Seeders;

use App\Models\Applyfeemaster;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplyFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Applyfeemaster::create([
            'id'=>1,
            'name' => 'Course Wise',
        ]);

        Applyfeemaster::create([
            'id'=>2,
            'name' => 'Subject Wise',
        ]);

        Applyfeemaster::create([
            'id'=>3,
            'name' => 'SEM Wise',
        ]);

        Applyfeemaster::create([
            'id'=>4,
            'name' => 'Class Wise',
        ]);
    }
}
