<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentExamforms extends Model
{
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='student_examforms';
    protected $fillable=[
        'int_status',
        'int_practical_status',
        'ext_status',
        'grade_status',
        'practical_status',
        'project_status',
        'oral_status',
        'exam_id',
        'student_id',
        'subject_id',
        'examformmaster_id',
        'college_id',
    ];


}
