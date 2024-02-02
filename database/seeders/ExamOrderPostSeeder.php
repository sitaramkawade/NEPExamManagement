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
                     'post_name'=>'Chairman & Moderator',
                     'status'=>'1',               
                     ] );

        ExamOrderPost::create( [
                     'id'=>2,
                     'post_name'=>' Moderator',
                     'status'=>'1',               
                     ] );
        ExamOrderPost::create( [
                     'id'=>3,
                     'post_name'=>' Paper Setter',
                     'status'=>'1',               
                     ] );
        ExamOrderPost::create( [
                     'id'=>4,
                     'post_name'=>' Examiner',
                     'status'=>'1',               
                     ] );
    }
}
