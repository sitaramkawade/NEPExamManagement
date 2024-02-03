<?php

namespace Database\Seeders;

use App\Models\Pattern;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pattern::create( [
            'id'=>1,
            'pattern_name'=>'XYZ',
            'pattern_startyear'=>'2023',
            'pattern_valid'=>'2027',
            'status'=>'1',
            'college_id'=>'1',
            'created_at'=>'2023-09-05 22:18:29',
            'updated_at'=>'2023-09-05 22:18:29'
            ] );

        Pattern::create( [
            'id'=>2,
            'pattern_name'=>'Autonomus',
            'pattern_startyear'=>'2023',
            'pattern_valid'=>'2027',
            'status'=>'1',
            'college_id'=>'1',
            'created_at'=>'2023-09-05 22:18:29',
            'updated_at'=>'2023-09-05 22:18:29'
            ] );

        Pattern::create( [
            'id'=>3,
            'pattern_name'=>'NEP 2023 Pattern',
            'pattern_startyear'=>'2023',
            'pattern_valid'=>'2027',
            'status'=>'1',
            'college_id'=>'1',
            'created_at'=>'2023-09-05 22:18:29',
            'updated_at'=>'2023-09-05 22:18:29'
            ] );
            
            
    }
}
