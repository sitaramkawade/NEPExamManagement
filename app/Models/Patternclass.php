<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function subjects():HasMany
    {
        return $this->hasMany(Subject::class,'patternclass_id','id');
    }
    public function pattern()
    {
        return $this->belongsTo(Pattern::class,'pattern_id','id');
    }
    public function courseclass()
    {
         return $this->belongsTo(CourseClass::class,'class_id','id');
    }
    public function subjectbuckets():HasMany
    {
        return $this->hasMany(Subjectbucket::class,'patternclass_id','id');
    }
}
