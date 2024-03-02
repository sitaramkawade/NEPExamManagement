<?php

namespace Database\Seeders;

use App\Models\Examorderpost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamOrderPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Examorderpost::create( [
            'post_name'=>'Chairman & Moderator ',
            'status'=>'1',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            Examorderpost::create( [
            'post_name'=>'Paper Setter & Moderator',
            'status'=>'1',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            Examorderpost::create( [
            'post_name'=>'Paper Setter',
            'status'=>'1',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            Examorderpost::create( [
            'post_name'=>'Examiner',
            'status'=>'1',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            Examorderpost::create( [
            'post_name'=>'Moderator',
            'status'=>'1',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );
    }
}
