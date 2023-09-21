<?php

namespace Database\Seeders;

use App\Models\Studmenumaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudmenumasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=Studmenumaster::create(
            [ 'menu_name'=>'Profile',]
         );
         $data=Studmenumaster::create(
            [ 'menu_name'=>'Educational Details',]
         );
         $data=Studmenumaster::create(
            [ 'menu_name'=>'Exam Form',]
         );
         $data=Studmenumaster::create(
            [ 'menu_name'=>'Hall Ticket',]
         );
         $data=Studmenumaster::create(
            [ 'menu_name'=>'Result',]
         );
         $data=Studmenumaster::create(
            [ 'menu_name'=>'Photocopy',]
         );
         $data=Studmenumaster::create(
            [ 'menu_name'=>'Revaluation',]
         );
         $data=Studmenumaster::create(
            [ 'menu_name'=>'Help Desk',]
         );

    }
}
