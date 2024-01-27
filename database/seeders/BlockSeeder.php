<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $data1=Building::create( [
            'id'=>1,
            'building_name'=>'Bandulal',
            'priority'=>1,
            'status'=>1
        ] );

        $data1->Blocks()->create([
            'building_id'=>$data1->id,
            'classname'=>'Bvoc',
            'block'=>'A',
            'capacity'=>'30',
            'noofblocks'=>'2',
            'status'=>'1',                   
        ]);
        
        // $data1->Blocks()->create([
        //     'building_id'=>$data1->id,
        //     'classname'=>'Bsc',
        //     'block'=>'B',
        //     'capacity'=>'30',
        //     'noofblocks'=>'2',
        //     'status'=>'1',                    
        // ]);

        // $data1->Blocks()->create([
        //     'building_id'=>$data1->id,
        //     'classname'=>'Bcs',
        //     'block'=>'c',
        //     'capacity'=>'40',
        //     'noofblocks'=>'1',
        //     'status'=>'0',                    
        // ]);

    }
}
