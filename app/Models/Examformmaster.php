<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examformmaster extends Model
{
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='examformmasters';
    protected $fillable=[
    'medium_instruction',
     'totalfee',
     'inwardstatus',
     'inwarddate',
     'feepaidstatus',
     'printstatus',
      'hallticketstatus',
       'student_id',
      'college_id',
      'exam_id',
      'patternclass_id',
    ];
}
