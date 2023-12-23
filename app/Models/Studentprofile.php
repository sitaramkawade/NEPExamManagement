<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Studentprofile extends Model
{
    use HasFactory;
    protected $table='studentprofiles';
    protected $fillable = [
        'student_name_devnagari',
        'student_name_on_adharcard',
        'mother_name_devnagari',
        'father_name',
        'father_name_devnagari',
        'parent_name',
        'parent_mobile_no',
        'title',
        'gender',
        'date_of_birth',
        'nationality',
        'domicile',
        'caste_id',      
        'caste_category_id',
        'is_noncreamylayer',
        'is_minority',
        'is_handicap',
        'maritalstatus_id',    
        'migratestud',
        'profile_photo_path',
        'sign_photo_path',
        'student_id',       
        'profile_complete_status',
    ];
    public function student():BelongsTo
    {
    return $this->belongsTo(Student::class,'student_id','id');
    }
}
