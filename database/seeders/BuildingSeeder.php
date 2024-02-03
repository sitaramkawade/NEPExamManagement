<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Building::create( [
            'id'=>1,
            'building_name'=>'Bandulal',
            'priority'=>'High',
            'status'=>1
        ] );
        Building::create( [
            'id'=>2,
            'building_name'=>'Bandulal',
            'priority'=>'Low',
            'status'=>1
        ] );

        Building::create( [
            'id'=>3,
            'building_name'=>'Kaudinya1',
            'priority'=>'min',
            'status'=>0
        ] );

        Building::create( [
            'id'=>4,
            'building_name'=>'Parak16',
            'priority'=>'max',
            'status'=>0
        ] );
    }
}
