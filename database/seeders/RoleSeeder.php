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
            'id'=>1,
            'role_name'=>'super admin',
            'roletype_id'=>1,
           
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>2,
            'role_name'=>'admin',
            'roletype_id'=>1,
         
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>3,
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
            'id'=>5,
            'role_name'=>'coe',
            'roletype_id'=>1,
           
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>6,
            'role_name'=>'admissionclerk',
            'roletype_id'=>3,
           
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>7,
            'role_name'=>'Principal and Head',
            'roletype_id'=>2,
           
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>8,
            'role_name'=>'Assistant Professor ',
            'roletype_id'=>2,
          
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>9,
            'role_name'=>'Assistant Professor and Head',
            'roletype_id'=>2,
           
            'college_id'=>1,
            'created_at'=>'2021-05-14 07:06:54',
            'updated_at'=>'2021-05-13 07:06:54'
            ] );
            
            
                        
            Role::create( [
            'id'=>10,
            'role_name'=>'Associate Professor and Head',
            'roletype_id'=>2,
            
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>11,
            'role_name'=>'Associate Professor ',
            'roletype_id'=>2,
        
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>12,
            'role_name'=>'Assistant Professor and Head',
            'roletype_id'=>2,
           
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>13,
            'role_name'=>'Professor',
            'roletype_id'=>2,
           
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>14,
            'role_name'=>'Professor and Head',
            'roletype_id'=>2,
       
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>15,
            'role_name'=>'Marketing Officer',
            'roletype_id'=>5,
         
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>16,
            'role_name'=>'General Clerk(Seating Arrangement)',
            'roletype_id'=>3,           
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>17,
            'role_name'=>'CAP Director',
            'roletype_id'=>1,
            
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>18,
            'role_name'=>'Assistant CAP Director',
            'roletype_id'=>1,
         
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>19,
            'role_name'=>'CAP Clerk',
            'roletype_id'=>3,
         
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
                        
            Role::create( [
            'id'=>20,
            'role_name'=>'Assistant to Supervisor',
            'roletype_id'=>3,
         
            'college_id'=>1,
            'created_at'=>'2021-05-20 00:02:57',
            'updated_at'=>'2021-05-19 00:02:57'
            ] );
            
            
            
            
    }
}
