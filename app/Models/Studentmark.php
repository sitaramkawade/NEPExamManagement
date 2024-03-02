<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\PatternClass;

use App\Models\Subject;
use App\Models\Exam;

class Studentmark extends Model
{
    use HasFactory;
    protected $table='studentmarks';
    protected $fillable=[
        'prn',
        'seatno',
        'student_id',
        'subject_id',
        'sem',
        'int_marks',
        'ext_marks',
        'practical_marks',
        'project_marks',
        'oral',
        'subject_grade',
        'grade',
        'grade_point',
        'total',
        'int_ordinace_flag',
        'int_ordinance_one_marks',
        'ext_ordinace_flag',
        'ext_ordinance_one_marks',
        'practical_ordinace_flag',
        'practical_ordinance_one_marks',
        'exam_id',
        'patternclass_id',
        'int_practical_marks',
        'total_ordinace_flag',
        'total_ordinance_one_marks',
        'total_ordinancefour_marks',
        'ext_practical_marks',
    ];
    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }
    public function patternclasse()
    {
        return $this->belongsTo(PatternClass::class, 'patternclass_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function photocopyexamsubjects()
    {
        return $this->hasMany(Photocopyexamsubject::class,'studentmark_id','id');
    }

}
