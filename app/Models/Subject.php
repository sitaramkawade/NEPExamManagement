<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table='subjects';
    protected $fillable=[
        'subject_sem',
        'subjectcategory_id',         
        'subject_no',
        'subject_code',        
        'subject_shortname',
        'subject_name',
        'subjecttype_id',        
        'subjectexam_type',
        'subject_credit',
        'subject_maxmarks',
        'subject_maxmarks_int',
        'subject_maxmarks_intpract',
        'subject_maxmarks_ext',
        'subject_totalpassing',
        'subject_intpassing',
        'subject_intpractpassing',
        'subject_extpassing',
        'subject_optionalgroup',
        'department_id',
         
    ];
}
