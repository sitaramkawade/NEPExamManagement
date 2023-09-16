<?php

namespace Database\Seeders;

use App\Models\Subjecttype;
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
            'type_shortname'=>'Th',
            'active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );
            
            
                        
            Subjecttype::create( [
            'id'=>2,
            'type_name'=>'Practical',
            'type_shortname'=>'Pr',
            'active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );
            
            
                        
            Subjecttype::create( [
            'id'=>3,
            'type_name'=>'Project',
            'type_shortname'=>'Pro',
            'active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );
            
            
                        
            Subjecttype::create( [
            'id'=>4,
            'type_name'=>'OJT',
            'type_shortname'=>'OJT',
            'active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );
            
            
                        
            Subjecttype::create( [
            'id'=>5,
            'type_name'=>'FILED PROJECT',
            'type_shortname'=>'FP',
            'active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
            ] );
            
            
    }
}
