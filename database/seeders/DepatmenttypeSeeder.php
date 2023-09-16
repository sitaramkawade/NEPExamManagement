<?php

namespace Database\Seeders;

use App\Models\Departmenttype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepatmenttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data1=Departmenttype::create(
            [ 
                'departmenttype'=>'UG',
                'description'=>'UG Department',
                'status'=>'1'
            ]
         );
         
            Departmenttype::create( [ 
                'departmenttype'=>'PG',
                'description'=>'PG Department',
                'status'=>'1'
            ]);
            Departmenttype::create( [ 
                'departmenttype'=>'UP',
                'description'=>'UG & PG Department',
                'status'=>'1'
            ]);

             Departmenttype::create([ 
                'departmenttype'=>'DD',
                'description'=>'doctorate Department',
                'status'=>'1'
             ]);

             Departmenttype::create([ 
                'departmenttype'=>'AD',
                'description'=>'All Department',
                'status'=>'1'
            ]);
    }
}
