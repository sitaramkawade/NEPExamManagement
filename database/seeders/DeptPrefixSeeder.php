<?php

namespace Database\Seeders;

use App\Models\DeptPrefix;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeptPrefixSeeder extends Seeder
{

    public function run(): void
    {
        DeptPrefix::create( [
            'dept_id'=>1,
            'pattern_id'=>3,
            'prefix'=>'DCS',
            'postfix'=>'S',
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );

        DeptPrefix::create( [
            'dept_id'=>12,
            'pattern_id'=>2,
            'prefix'=>'MAR',
            'postfix'=>'M',
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
    }
}