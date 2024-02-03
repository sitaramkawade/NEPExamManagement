<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use App\Models\Hodappointsubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Patternclass extends Model
{
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];
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
        'credit',
        'sem1_totalnosubjects',
        'sem2_totalnosubjects',

    ];
    public function subjects():HasMany
    {
        return $this->hasMany(Subject::class,'patternclass_id','id');
    }
    public function hodappointsubjects():HasMany
    {
        return $this->hasMany(Hodappointsubject::class,'patternclass_id','id');
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

    public function getclass()
    {
        return $this->belongsTo(CourseClass::class,'class_id','id');
    }

    // public function getclass(): HasManyThrough
    // {
    //     return $this->hasManyThrough(Course::class, CourseClass::class,'course_id','class_id','id','id');
    // }
    // public function getclass(): HasManyThrough
    // {
    //     return $this->hasManyThrough(CourseClass::class, Course::class, 'id', 'course_id', 'id', 'class_id');
    // }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('courseclass.course', 'courseclass.classyear', 'pattern')
        ->where('sem1_total_marks', 'like', "%{$search}%")
        ->orWhere('sem2_total_marks', 'like', "%{$search}%")
        ->orWhere('sem1_credits', 'like', "%{$search}%")
        ->orWhere('sem2_credits', 'like', "%{$search}%")
        ->orWhere('sem1_totalnosubjects', 'like', "%{$search}%")
        ->orWhere('sem2_totalnosubjects', 'like', "%{$search}%")
        ->orWhere(function ($subquery) use ($search) {
            $subquery->orWhereHas('courseclass.course', function ($subQuery) use ($search) {
                $subQuery->where('course_name', 'like', "%{$search}%");
            })->orWhereHas('pattern', function ($subQuery) use ($search) {
                $subQuery->where('pattern_name', 'like', "%{$search}%");
            })->orWhereHas('courseclass.classyear', function ($subQuery) use ($search) {
                $subQuery->where('classyear_name', 'like', "%{$search}%");
            });
        });

    }
}
