<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Models\Timetableslot;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimeTableSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        
        $end_time = Carbon::now();

        $start_time = $end_time->copy()->addHours(2);


        $end_time->addHours(2);

        $timeslot = $end_time->copy()->addHours(2);

        Timetableslot::create([
            'start_time' => $start_time->format('H:i:s.u'),
            'end_time' => $end_time->format('H:i:s.u'),
            'timeslot' => $timeslot->format('H:i:s.u'),
            'slot' => rand(11,99),
            'isactive' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
