<?php

namespace Database\Seeders;

use App\Models\Banknamemaster;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BanknamemasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banknamemaster::create( [
        'bank_name'=>'State Bank Of India',
        'bank_shortform'=>'SBI',
        'is_active'=>1,
        'created_at'=>'2023-09-25 05:10:43',
        'updated_at'=>'2023-09-25 05:10:43'
        ] );

        Banknamemaster::create( [
        'bank_name'=>'Bank Of Maharashtra',
        'bank_shortform'=>'BOM',
        'is_active'=>1,
        'created_at'=>'2023-09-25 05:10:43',
        'updated_at'=>'2023-09-25 05:10:43'
        ] );

        Banknamemaster::create( [
        'bank_name'=>'Central Bank Of India',
        'bank_shortform'=>'CBI',
        'is_active'=>1,
        'created_at'=>'2023-09-25 05:10:43',
        'updated_at'=>'2023-09-25 05:10:43'
        ] );
    }
}
