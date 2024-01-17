<?php

namespace App\Imports\User\AdmissionData;

use App\Models\Admissiondata;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdmissionDataImport implements ToModel ,WithHeadingRow
{

    public function model(array $row)
    {
        return new Admissiondata([
           'subject_code'     => $row['subject_code'],
           'memid'     => $row['memid'],
           'stud_name'    => $row['stud_name'],
           'user_id'    => $row['user_id'],
           'patternclass_id'    => $row['patternclass_id'],
           'subject_id'    => $row['subject_id'],
           'academicyear_id'    => $row['academicyear_id'],
           'department_id'    => $row['department_id'],
           'college_id'    => $row['college_id'],
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
