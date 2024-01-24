<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create( [
            'role_name'=>'super admin',
            'roletype_id'=>1,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'admin',
            'roletype_id'=>1,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'clerk',
            'roletype_id'=>3,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            // Role::create( [
            // 'id'=>4,
            // 'role_name'=>'faculty',
            // 'roletype_id'=>2,

            // 'college_id'=>1,
            // 'created_at'=>'2021-05-20 00:02:57',
            // 'updated_at'=>'2021-05-19 00:02:57'
            // ] );



            Role::create( [
            'role_name'=>'coe',
            'roletype_id'=>1,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'admissionclerk',
            'roletype_id'=>3,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'Principal and Head',
            'roletype_id'=>2,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'Assistant Professor ',
            'roletype_id'=>2,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'Assistant Professor and Head',
            'roletype_id'=>2,
            'college_id'=>1,
            'created_at'=>'2021-05-14 07:06:54',
            'updated_at'=>'2021-05-13 07:06:54'
            ] );



            Role::create( [
            'role_name'=>'Associate Professor and Head',
            'roletype_id'=>2,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'Associate Professor ',
            'roletype_id'=>2,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'Assistant Professor and Head',
            'roletype_id'=>2,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'Professor',
            'roletype_id'=>2,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'Professor and Head',
            'roletype_id'=>2,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'Marketing Officer',
            'roletype_id'=>5,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'General Clerk(Seating Arrangement)',
            'roletype_id'=>3,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'CAP Director',
            'roletype_id'=>1,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'Assistant CAP Director',
            'roletype_id'=>1,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'CAP Clerk',
            'roletype_id'=>3,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );



            Role::create( [
            'role_name'=>'Assistant to Supervisor',
            'roletype_id'=>3,
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
    }
}
