<?php

namespace Database\Seeders;

use App\Models\Patternclass;
use App\Models\Examfeecourse;
use App\Models\Examfeemaster;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ExamFeeCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
                        
        Examfeecourse::create( [
            'fee'=>45,
            'sem'=>1,
            'patternclass_id'=>10,
            'examfees_id'=>13,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:24:30',
            'updated_at'=>'2024-03-15 01:24:30',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>45,
            'sem'=>2,
            'patternclass_id'=>10,
            'examfees_id'=>13,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:24:30',
            'updated_at'=>'2024-03-15 01:24:30',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>75,
            'sem'=>3,
            'patternclass_id'=>11,
            'examfees_id'=>13,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:25:16',
            'updated_at'=>'2024-03-15 01:25:16',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>45,
            'sem'=>4,
            'patternclass_id'=>11,
            'examfees_id'=>13,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:25:41',
            'updated_at'=>'2024-03-15 01:25:41',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>85,
            'sem'=>5,
            'patternclass_id'=>12,
            'examfees_id'=>13,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:27:05',
            'updated_at'=>'2024-03-15 01:27:05',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>60,
            'sem'=>6,
            'patternclass_id'=>12,
            'examfees_id'=>13,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:27:34',
            'updated_at'=>'2024-03-15 01:27:34',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>30,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>1,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>1200,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>2,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>3,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>4,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>5,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>6,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>50,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>7,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>20,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>8,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>9,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>10,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>150,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>11,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>1000,
            'sem'=>NULL,
            'patternclass_id'=>10,
            'examfees_id'=>12,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>30,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>1,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>1200,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>2,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>3,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>4,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>5,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>6,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>50,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>7,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>20,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>8,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>9,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>10,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>150,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>11,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>1000,
            'sem'=>NULL,
            'patternclass_id'=>97,
            'examfees_id'=>12,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>30,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>1,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>1200,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>2,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>3,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>4,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>5,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>6,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>50,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>7,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>20,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>8,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>9,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>10,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>150,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>11,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>1000,
            'sem'=>NULL,
            'patternclass_id'=>11,
            'examfees_id'=>12,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>30,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>1,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>1200,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>2,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>3,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>4,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>145,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>5,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>6,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>50,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>7,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>20,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>8,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>9,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>0,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>10,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>150,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>11,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
                        
            Examfeecourse::create( [
            'fee'=>1000,
            'sem'=>NULL,
            'patternclass_id'=>12,
            'examfees_id'=>12,
            'active_status'=>1,
            'approve_status'=>0,
            'created_at'=>'2024-03-15 01:42:11',
            'updated_at'=>'2024-03-15 01:42:11',
            'deleted_at'=>NULL
            ] );
           
    }
}
