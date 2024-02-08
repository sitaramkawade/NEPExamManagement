<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Student;
use App\Models\Patternclass;
use App\Models\StudentExamforms;
use App\Models\Studentexamformfee;
use Illuminate\Database\Eloquent\Model;
use App\Models\Extracreditsubjectexamform;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examformmaster extends Model
{
    use HasFactory;
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


    public function patternclass()
    {
      return $this->belongsTo(Patternclass::class,'patternclass_id','id');
    }

    public function student()
    {
      return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function exam()
    {
      return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }
    
    public function studentexamformfees()
    {
      return $this->hasMany(Studentexamformfee::class,'examformmaster_id','id');
    }
    
    public function studentexamforms()
    { 
      return $this->hasMany(StudentExamforms::class,'examformmaster_id','id');
    }
    
    public function studentextracreditexamforms()
    { 
      return $this->hasMany(Extracreditsubjectexamform::class,'examformmaster_id','id');
    }
   
    
//     public function checkforminwardstatus()
// {
//    // dd($this);
//     $exam=Exam::where('status','1')->first();
//    if(!is_null($exam))
//     if(is_null($this->where('inwardstatus','1')->where('exam_id',$exam->id)))
//       return 1;  
//        else  return 0;  //form not inwarded for active exam
//     else return 0;
// }
}
