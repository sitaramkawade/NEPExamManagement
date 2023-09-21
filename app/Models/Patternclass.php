<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patternclass extends Model
{
    use HasFactory;
    protected $table='pattern_classes';
    protected $fillable=

    [
        'class_id',
        'pattern_id',
        'status',
        'sem1_total_marks',
        'sem2_total_marks',
        'sem1_credits',
        'sem2_credits',
        'totalnosubjects',
      
    ];
}
