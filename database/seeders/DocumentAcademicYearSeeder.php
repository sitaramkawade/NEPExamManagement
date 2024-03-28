<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentAcademicYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DocumentAcademicYearSeeder extends Seeder
{
    public function run(): void
    {
        DocumentAcademicYear::create( [
            'year_name'=>'2020-21',
            'description'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
            'active'=>0,
            'start_date'=>'2023-09-05 21:23:00',
            'end_date'=>'2023-09-05 21:23:00',
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        DocumentAcademicYear::create( [
            'year_name'=>'2021-22',
            'description'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
            'active'=>0,
            'start_date'=>'2023-09-05 21:23:00',
            'end_date'=>'2023-09-05 21:23:00',
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        DocumentAcademicYear::create( [
            'year_name'=>'2022-23',
            'description'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
            'active'=>0,
            'start_date'=>'2023-09-05 21:23:00',
            'end_date'=>'2023-09-05 21:23:00',
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        DocumentAcademicYear::create( [
            'year_name'=>'2023-24',
            'description'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
            'active'=>1,
            'start_date'=>'2023-09-05 21:23:00',
            'end_date'=>'2025-04-23 04:00:13',
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
    }
}
