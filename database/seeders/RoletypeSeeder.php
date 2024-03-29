<?php

namespace Database\Seeders;

use App\Models\Roletype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoletypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roletype::create( [
            'roletype_name'=>'System Admin',
            'status'=>1,
            'created_at'=>'2023-09-11 02:20:55',
            'updated_at'=>'2023-09-11 02:20:55'
            ] );
        Roletype::create( [
            'roletype_name'=>'Teaching',
            'status'=>1,
            'created_at'=>'2023-09-11 02:20:55',
            'updated_at'=>'2023-09-11 02:20:55'
            ] );

            Roletype::create( [
            'roletype_name'=>'Non Teaching',
            'status'=>1,
            'created_at'=>'2023-09-11 02:20:55',
            'updated_at'=>'2023-09-11 02:20:55'
            ] );

            Roletype::create( [
            'roletype_name'=>'Management Member',
            'status'=>1,
            'created_at'=>'2023-09-11 02:20:55',
            'updated_at'=>'2023-09-11 02:20:55'
            ] );

            Roletype::create( [
            'roletype_name'=>'Other',
            'status'=>1,
            'created_at'=>'2023-09-11 02:20:55',
            'updated_at'=>'2023-09-11 02:20:55'
            ] );
    }
}
