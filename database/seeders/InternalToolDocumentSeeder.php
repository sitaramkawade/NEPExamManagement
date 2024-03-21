<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Internaltooldocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InternalToolDocumentSeeder extends Seeder
{
    public function run(): void
    {
        // First Record
        Internaltooldocument::create( [
            'internaltooldoc_id'=>1,
            'internaltoolmaster_id'=>14,
            'is_multiple'=>1,
            'status'=>1,
            'created_at'=>'2023-02-11 16:34:46',
            'updated_at'=>'2023-02-11 16:34:46'
        ] );
        Internaltooldocument::create( [
            'internaltooldoc_id'=>2,
            'internaltoolmaster_id'=>14,
            'is_multiple'=>1,
            'status'=>1,
            'created_at'=>'2023-02-11 16:34:46',
            'updated_at'=>'2023-02-11 16:34:46'
        ] );
        Internaltooldocument::create( [
            'internaltooldoc_id'=>3,
            'internaltoolmaster_id'=>14,
            'is_multiple'=>1,
            'status'=>1,
            'created_at'=>'2023-02-11 16:34:46',
            'updated_at'=>'2023-02-11 16:34:46'
        ] );

        // Second Record
        Internaltooldocument::create( [
            'internaltooldoc_id'=>2,
            'internaltoolmaster_id'=>15,
            'is_multiple'=>1,
            'status'=>1,
            'created_at'=>'2023-02-11 16:34:46',
            'updated_at'=>'2023-02-11 16:34:46'
        ] );
        Internaltooldocument::create( [
            'internaltooldoc_id'=>3,
            'internaltoolmaster_id'=>15,
            'is_multiple'=>1,
            'status'=>1,
            'created_at'=>'2023-02-11 16:34:46',
            'updated_at'=>'2023-02-11 16:34:46'
        ] );

        // Third Record
        Internaltooldocument::create( [
            'internaltooldoc_id'=>5,
            'internaltoolmaster_id'=>16,
            'is_multiple'=>1,
            'status'=>1,
            'created_at'=>'2023-02-11 16:34:46',
            'updated_at'=>'2023-02-11 16:34:46'
        ] );
        Internaltooldocument::create( [
            'internaltooldoc_id'=>6,
            'internaltoolmaster_id'=>16,
            'is_multiple'=>1,
            'status'=>1,
            'created_at'=>'2023-02-11 16:34:46',
            'updated_at'=>'2023-02-11 16:34:46'
        ] );
    }
}
