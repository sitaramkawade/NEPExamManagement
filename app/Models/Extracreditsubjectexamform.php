<?php

namespace App\Models;

use App\Models\Extracreditsubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extracreditsubjectexamform extends Model
{
    
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table="extracreditsubjectexamforms";
    public $fillable = [
        'prn',
        'select_status',
        'exam_id',
        'student_id',
        'subject_id',
        'course_id',
        'examformmaster_id',
    ];
    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id','id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Extracreditsubject::class,'subject_id','id');
    }

    public function examformmaster()
    {         
        return $this->belongsTo(Examformmaster::class,'examformmaster_id','id');

    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
