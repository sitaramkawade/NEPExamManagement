<?php

namespace Database\Seeders;

use App\Models\CasteCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CasteCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CasteCategory::create( [
            'id'=>1,
            'caste_category'=>'SC',
            'caste_category_desc'=>'Scheduled Castes',
            'reservation'=>13,
            'is_active'=>1,
            'created_at'=>'2023-09-22 13:05:36',
            'updated_at'=>'2023-09-22 13:05:36',
            ] );
            CasteCategory::create( [
                'id'=>2,
                'caste_category'=>'ST',
                'caste_category_desc'=>'Scheduled Tribes',
                'reservation'=>7,
                'is_active'=>1,
                'created_at'=>'2023-09-22 13:05:36',
                'updated_at'=>'2023-09-22 13:05:36',
                ] );
                CasteCategory::create( [
                    'id'=>3,
                    'caste_category'=>'DT(A)',
                    'caste_category_desc'=>'De-notified Tribes(A)',
                    'reservation'=>3,
                    'is_active'=>1,
                    'created_at'=>'2023-09-22 13:05:36',
                    'updated_at'=>'2023-09-22 13:05:36',
                    ] );
                    CasteCategory::create( [
                        'id'=>4,
                        'caste_category'=>'NT(B)',
                        'caste_category_desc'=>'Nomadic Tribes(B)',
                        'reservation'=>2.5,
                        'is_active'=>1,
                        'created_at'=>'2023-09-22 13:05:36',
                        'updated_at'=>'2023-09-22 13:05:36',
                        ] );
                        CasteCategory::create( [
                            'id'=>5,
                            'caste_category'=>'NT(C)',
                            'caste_category_desc'=>'Nomadic Tribes(C)',
                            'reservation'=>3.5,
                            'is_active'=>1,
                            'created_at'=>'2023-09-22 13:05:36',
                            'updated_at'=>'2023-09-22 13:05:36',
                            ] );
                            CasteCategory::create( [
                                'id'=>6,
                                'caste_category'=>'NT(D)',
                                'caste_category_desc'=>'Nomadic Tribes(D)',
                                'reservation'=>2,
                                'is_active'=>1,
                                'created_at'=>'2023-09-22 13:05:36',
                                'updated_at'=>'2023-09-22 13:05:36',
                                ] );
                                CasteCategory::create( [
                                    'id'=>7,
                                    'caste_category'=>'OBC',
                                    'caste_category_desc'=>'Other Backward Classes',
                                    'reservation'=>19,
                                    'is_active'=>1,
                                    'created_at'=>'2023-09-22 13:05:36',
                                    'updated_at'=>'2023-09-22 13:05:36',
                                    ] );
                                    
 
             
                     
    }
}
