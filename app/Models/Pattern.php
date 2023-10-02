<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pattern extends Model
{
    use HasFactory;
    protected $table='patterns';
    protected $fillable=

    [
        'id',
        'pattern_name',
        'pattern_startyear',
        'pattern_valid',
        'status',
        'college_id',
      
    ];
    public function course_classes(): BelongsToMany
    {  
        return $this->belongsToMany(Courseclass::class,'pattern_classes','pattern_id', 'class_id','id')
        ->withPivot('status','sem1_total_marks',
        'sem2_total_marks',
        'sem1_credits',
        'sem2_credits',
        'totalnosubjects',
        'id'
        )
        ->wherePivot('status','1');
       
    }
    public function patternclass()
    {
        return $this->hasMany(PatternClass::class,'pattern_id','id');
    }
}
