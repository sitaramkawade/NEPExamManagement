<?php

namespace Database\Seeders;

use App\Models\Subjectcredit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectcreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subjectcredit::create( [
            'id'=>1,
            'credit'=>'1',
            'marks'=>25,
            'passing'=>10,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Subjectcredit::create( [
            'id'=>2,
            'credit'=>'2',
            'marks'=>50,
            'passing'=>20,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Subjectcredit::create( [
            'id'=>3,
            'credit'=>'3',
            'marks'=>75,
            'passing'=>30,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );

        Subjectcredit::create( [
            'id'=>4,
            'credit'=>'4',
            'marks'=>100,
            'passing'=>40,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );
    }
}
