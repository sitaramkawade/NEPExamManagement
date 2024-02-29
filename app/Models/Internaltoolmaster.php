<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Internaltoolmaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='internaltoolmasters';
    protected $fillable=[
        'toolname',
        'course_type',
        'status',
    ];
}
