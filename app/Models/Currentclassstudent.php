<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currentclassstudent extends Model
{
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='currentclass_students';
    protected $fillable=[
        'sem',
        'pfstatus',
        'isregular',
        'is_directadmission',
        'patternclass_id',
        'student_id',
        'college_id',
        'academicyear_id',
        'markssheetprint_status',
    ];
}
