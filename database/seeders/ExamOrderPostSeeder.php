<?php

namespace Database\Seeders;

use App\Models\ExamOrderPost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ExamOrderPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExamOrderPost::create( [
            'id'=>1,
            'post_name'=>'Chairman & Moderator ',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            ExamOrderPost::create( [
            'id'=>2,
            'post_name'=>'Paper Setter & Moderator',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            ExamOrderPost::create( [
            'id'=>3,
            'post_name'=>'Paper Setter',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            ExamOrderPost::create( [
            'id'=>4,
            'post_name'=>'Examiner',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );

            ExamOrderPost::create( [
            'id'=>6,
            'post_name'=>'Moderator',
            'created_at'=>'2021-12-22 15:46:32',
            'updated_at'=>'2021-12-22 15:46:32'
            ] );
    }
}
