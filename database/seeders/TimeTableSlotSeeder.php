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
        
        Timetableslot::create( [
            'timeslot'=>'10:00:00 AM To 12:00:00 AM',
            'slot'=>67,
            'isactive'=>1,
            'start_time'=>'10:00:00',
            'end_time'=>'12:00:00',
            'created_at'=>'2024-03-28 15:43:06',
            'updated_at'=>'2024-03-28 16:16:11',
            'deleted_at'=>NULL
         ] );

        Timetableslot::create( [
            'timeslot'=>'13:00:00 PM To 14:00:00 PM',
            'slot'=>67,
            'isactive'=>1,
            'start_time'=>'13:00:00',
            'end_time'=>'14:00:00',
            'created_at'=>'2024-03-28 15:43:06',
            'updated_at'=>'2024-03-28 16:16:11',
            'deleted_at'=>NULL
         ] );
        Timetableslot::create( [
            'timeslot'=>'14:00:00 PM To 16:00:00 PM',
            'slot'=>67,
            'isactive'=>1,
            'start_time'=>'14:00:00',
            'end_time'=>'16:00:00',
            'created_at'=>'2024-03-28 15:43:06',
            'updated_at'=>'2024-03-28 16:16:11',
            'deleted_at'=>NULL
         ] );
        
    }
}
