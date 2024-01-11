<?php

namespace App\Models;

use App\Models\College;
use App\Models\Courseclass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Courseclass extends Model
{
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='course_classes';
    protected $fillable=[
        'course_id',
        'classyear_id',       
        'nextyearclass_id',        
        'college_id',
    ];
    public function course(): BelongsTo
    {
     return $this->belongsTo(Course::class,'course_id','id');
    }
    public function courseclass(): BelongsTo
    {
     return $this->belongsTo(Courseclass::class,'nextyearclass_id','id');
    }
    public function patterns(): BelongsToMany
    {
        
        return $this->belongsToMany(Pattern::class,'pattern_classes','class_id', 'pattern_id','id')
        ->withPivot('status','sem1_total_marks',
        'sem2_total_marks',
        'sem1_credits',
        'sem2_credits',
        'totalnosubjects',
        'id')
        ->wherePivot('status','1');
       
    }
    public function patternclasses()
    {
        return $this->hasMany(PatternClass::class,'class_id','id');
    }
    public function classyear(): BelongsTo
    {
     return $this->belongsTo(Classyear::class,'classyear_id','id');
    }

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class,'college_id','id');
    }
    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('course', 'college', 'classyear')->where(function ($subquery) use ($search) {
            $subquery->orWhereHas('course', function ($subQuery) use ($search) {
                $subQuery->where('course_name', 'like', "%{$search}%");
            })->orWhereHas('college', function ($subQuery) use ($search) {
                $subQuery->where('college_name', 'like', "%{$search}%");
            })->orWhereHas('classyear', function ($subQuery) use ($search) {
                $subQuery->where('classyear_name', 'like', "%{$search}%");
            });
        });
    }
}
