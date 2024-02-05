<?php

namespace Database\Seeders;

use App\Models\BucketType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BucketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BucketType::create( [
            'buckettype_name'=>'Majorbucket',
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        BucketType::create( [
            'buckettype_name'=>'Facultybucket',
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
        BucketType::create( [
            'buckettype_name'=>'Collegebucket',
            'is_active'=>1,
            'created_at'=>'2023-09-06 02:53:21',
            'updated_at'=>'2023-09-06 02:53:21'
        ] );
    }
}
