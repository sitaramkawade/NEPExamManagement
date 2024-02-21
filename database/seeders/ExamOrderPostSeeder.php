<?php

namespace Database\Seeders;

use App\Models\ExamOrderPost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamOrderPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExamOrderPost::create( [
            'post_name'=>'Chairman & Moderator ',
            'status'=>'1',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            ExamOrderPost::create( [
            'post_name'=>'Paper Setter & Moderator',
            'status'=>'1',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            ExamOrderPost::create( [
            'post_name'=>'Paper Setter',
            'status'=>'1',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            ExamOrderPost::create( [
            'post_name'=>'Examiner',
            'status'=>'1',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            ExamOrderPost::create( [
            'post_name'=>'Moderator',
            'status'=>'1',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );
    }
}
