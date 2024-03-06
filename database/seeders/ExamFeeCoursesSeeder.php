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
            
            'fee'=>30,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>1,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:52',
            'updated_at'=>'2021-07-04 11:45:52'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>1360,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>2,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:53',
            'updated_at'=>'2021-07-04 11:45:53'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>145,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>3,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:52',
            'updated_at'=>'2021-07-04 11:45:52'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>145,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>4,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:52',
            'updated_at'=>'2021-07-04 11:45:52'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>0,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>5,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:52',
            'updated_at'=>'2021-07-04 11:45:52'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>0,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>6,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:52',
            'updated_at'=>'2021-07-04 11:45:52'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>0,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>7,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:53',
            'updated_at'=>'2021-07-04 11:45:53'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>20,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>8,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:52',
            'updated_at'=>'2021-07-04 11:45:52'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>0,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>9,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:52',
            'updated_at'=>'2021-07-04 11:45:52'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>0,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>10,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:52',
            'updated_at'=>'2021-07-04 11:45:52'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>150,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>11,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:52',
            'updated_at'=>'2021-07-04 11:45:52'
            ] );
            
            
                        
            Examfeecourse::create( [
            
            'fee'=>1000,
            'sem'=>1,
            'patternclass_id'=>53,
            'examfees_id'=>12,
            'active_status'=>1,
            'approve_status'=>1,
            'created_at'=>'2021-07-04 11:45:52',
            'updated_at'=>'2021-07-04 11:45:52'
            ] );
            
            Examfeecourse::create( [
                'fee'=>1001,
                'sem'=>1,
                'patternclass_id'=>53,
                'examfees_id'=>13,
                'active_status'=>1,
                'approve_status'=>1,
                'created_at'=>'2021-07-04 11:45:52',
                'updated_at'=>'2021-07-04 11:45:52'
            ] );
           
    }
}
