<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Internaltoolauditor extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='internaltoolauditors';
    protected $fillable=[
        'patternclass_id',
        'faculty_id',
        'academicyear_id',
        'evaluationdate',
        'status',
    ];
}
