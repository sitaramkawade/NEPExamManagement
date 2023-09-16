<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courseclass extends Model
{
    use HasFactory;
    protected $table='courseclasses';
    protected $fillable=[
        'course_id',
        'class_name',       
        'degree_name',
        'nextyearclass_id',        
        'college_id',

    ];
}
