<?php

namespace Database\Seeders;

use App\Models\Subjecttype;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjecttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subjecttype::create( [
            'id'=>1,
            'type_name'=>'Theory',
            'type_shortname'=>'TH',
            'active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        
        Subjecttype::create( [
            'id'=>2,
            'type_name'=>'Practical',
            'type_shortname'=>'PR',
            'active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );

        Subjecttype::create( [
            'id'=>3,
            'type_name'=>'Project',
            'type_shortname'=>'PRJ',
            'active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );

        Subjecttype::create( [
            'id'=>4,
            'type_name'=>'Skill',
            'type_shortname'=>'SKILL',
            'active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );

        Subjecttype::create( [
            'id'=>5,
            'type_name'=>'Grade',
            'type_shortname'=>'GRD',
            'active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );

        Subjecttype::create( [
            'id'=>6,
            'type_name'=>'Theory/Practical',
            'type_shortname'=>'TH/PR',
            'active'=>1,
            'created_at'=>'2023-09-05 21:23:00',
            'updated_at'=>'2023-09-05 21:23:00'
        ] );
        
    }
}
