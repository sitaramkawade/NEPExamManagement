<?php

namespace Database\Seeders;

use App\Models\Prefixmaster;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrefixmasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prefixmaster::create( [
        'prefix'=>'Doctorate',
        'prefix_shortform'=>'Dr.',
        'is_active'=>1,
        'created_at'=>'2023-09-25 05:10:43',
        'updated_at'=>'2023-09-25 05:10:43'
        ] );

        Prefixmaster::create( [
        'prefix'=>'Professor',
        'prefix_shortform'=>'Prof.',
        'is_active'=>1,
        'created_at'=>'2023-09-25 05:10:43',
        'updated_at'=>'2023-09-25 05:10:43'
        ] );

        Prefixmaster::create( [
        'prefix'=>'Engineer',
        'prefix_shortform'=>'Eng.',
        'is_active'=>1,
        'created_at'=>'2023-09-25 05:10:43',
        'updated_at'=>'2023-09-25 05:10:43'
        ] );
    }
}
