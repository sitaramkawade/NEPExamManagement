<?php

namespace App\Models;

use App\Models\Patternclass;
use App\Models\Examfeemaster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exambacklogfeecourse extends Model
{
    use HasFactory,SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table='exambacklogfeecourses';
    protected $fillable=[
        'backlogfee',
        'sem',
        'patternclass_id',
        'examfees_id',
        'active_status',
        'approve_status',
    ];


    public function patternclass(): BelongsTo
    {
        return $this->belongsTo(Patternclass::class, 'patternclass_id', 'id')->withTrashed();
    }

    public function examfee(): BelongsTo
    {
        return $this->belongsTo(Examfeemaster::class, 'examfees_id', 'id')->withTrashed();
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('patternclass.courseclass.course', 'patternclass.courseclass.classyear', 'patternclass.pattern','examfee')
        ->where('backlogfee', 'like', "%{$search}%")
        ->orWhere('sem', 'like', "%{$search}%")
        ->orWhere(function ($subquery) use ($search) {
            $subquery->orWhereHas('patternclass.courseclass.course', function ($subQuery) use ($search) {
                $subQuery->where('course_name', 'like', "%{$search}%");
            })->orWhereHas('patternclass.pattern', function ($subQuery) use ($search) {
                $subQuery->where('pattern_name', 'like', "%{$search}%");
            })->orWhereHas('patternclass.courseclass.classyear', function ($subQuery) use ($search) {
                $subQuery->where('classyear_name', 'like', "%{$search}%");
            })->orWhereHas('examfee', function ($subQuery) use ($search) {
                $subQuery->where('fee_type', 'like', "%{$search}%");
            });
        });

    }
}
