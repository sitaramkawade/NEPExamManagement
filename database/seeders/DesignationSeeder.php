<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignationSeeder extends Seeder
{
    public function run(): void
    {
        Designation::create( [
            'id'=>1,
            'designation'=>'Professor',
            'roletype_id'=>2,
            'is_active'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );

        Designation::create( [
            'id'=>2,
            'designation'=>'Assistant Professor',
            'roletype_id'=>2,
            'is_active'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );

        Designation::create( [
            'id'=>3,
            'designation'=>'Assistant Professor And Head',
            'roletype_id'=>2,
            'is_active'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );

        Designation::create( [
            'id'=>4,
            'designation'=>'CHB',
            'roletype_id'=>5,
            'is_active'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );

        Designation::create( [
            'id'=>5,
            'designation'=>'Ad-Hoc',
            'roletype_id'=>1,
            'is_active'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
    }
}
