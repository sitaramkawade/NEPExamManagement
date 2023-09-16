<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table='courses';
    protected $fillable=[
        'course_code',
        'course_name',
        'fullname',
        'shortname',
        'special_subject',
        'course_type',
        'course_category',
        'college_id',
        'programme_id',
        
    ];
}
