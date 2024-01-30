<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Examfeemaster;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamFeeMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        Examfeemaster::create([
            'id'=>1,
            'fee_name' => 'Form Fee',
            'remark' => 'Form Fee',
            'default_professional_fee' => 30,
            'default_non_professional_fee' => 20,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>2,
            'fee_name' => 'Exam Fee',
            'remark' => 'Exam Fee',
            'default_professional_fee' => 1200,
            'default_non_professional_fee' => 800,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>3,
            'fee_name' => 'CAP Fee',
            'remark' => 'CAP Fee',
            'default_professional_fee' => 145,
            'default_non_professional_fee' => 85,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>4,
            'fee_name' => 'Statement of Marks Fee',
            'remark' => 'Statement of Marks Fee',
            'default_professional_fee' => 145,
            'default_non_professional_fee' => 85,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>5,
            'fee_name' => 'Passing Certificate Fee',
            'remark' => 'Passing Certificate Fee',
            'default_professional_fee' => 145,
            'default_non_professional_fee' => 85,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>6,
            'fee_name' => 'Project Fee/Dissertation',
            'remark' => 'Project Fee/Dissertation',
            'default_professional_fee' => null,
            'default_non_professional_fee' => null,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>7,
            'fee_name' => 'EVS Fee',
            'remark' => 'EVS Fee',
            'default_professional_fee' => null,
            'default_non_professional_fee' => null,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>8,
            'fee_name' => 'Internal Marks Fee',
            'remark' => 'Internal Marks Fee',
            'default_professional_fee' => 20,
            'default_non_professional_fee' => 20,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>9,
            'fee_name' => 'Departmental Fee',
            'remark' => 'Departmental Fee',
            'default_professional_fee' => 0,
            'default_non_professional_fee' => 0,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>10,
            'fee_name' => 'Transcript Fee',
            'remark' => 'Transcript Fee',
            'default_professional_fee' => 0,
            'default_non_professional_fee' => 0,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>11,
            'fee_name' => 'Late Fee',
            'remark' => 'Late Fee',
            'default_professional_fee' => 150,
            'default_non_professional_fee' => 150,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>12,
            'fee_name' => 'Fine Fee',
            'remark' => 'Fine Fee',
            'default_professional_fee' => 1000,
            'default_non_professional_fee' => 1000,
            'form_type_id' => 1,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>13,
            'fee_name' => 'Backlog Subject Exam Fee',
            'remark' => 'Backlog Subject Exam Fee',
            'default_professional_fee' => null,
            'default_non_professional_fee' => null,
            'form_type_id' => 4,
            'apply_fee_id' => 1,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>14,
            'fee_name' => 'Photocopy Form Fee',
            'remark' => 'Photocopy Form Fee',
            'default_professional_fee' => null,
            'default_non_professional_fee' => null,
            'form_type_id' => 2,
            'apply_fee_id' => 2,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>15,
            'fee_name' => 'Photocopy Fee',
            'remark' => 'Photocopy Fee',
            'default_professional_fee' => null,
            'default_non_professional_fee' => null,
            'form_type_id' => 2,
            'apply_fee_id' => 2,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>16,
            'fee_name' => 'Revaluation Form Fee',
            'remark' => 'Revaluation Form Fee',
            'default_professional_fee' => null,
            'default_non_professional_fee' => null,
            'form_type_id' => 3,
            'apply_fee_id' => 3,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>17,
            'fee_name' => 'Revaluation Subject Fee',
            'remark' => 'Revaluation Subject Fee',
            'default_professional_fee' => null,
            'default_non_professional_fee' => null,
            'form_type_id' => 3,
            'apply_fee_id' => 3,
            'active_status' => 1,
            'approve_status' => 0,
        ]);

        Examfeemaster::create([
            'id'=>18,
            'fee_name' => 'Revaluation Fine Fee',
            'remark' => 'Revaluation Fine Fee',
            'default_professional_fee' => 1000,
            'default_non_professional_fee' => 1000,
            'form_type_id' => 3,
            'apply_fee_id' => 3,
            'active_status' => 1,
            'approve_status' => 0,
        ]);
        
    }
}
