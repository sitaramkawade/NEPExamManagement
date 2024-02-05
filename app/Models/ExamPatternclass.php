<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Capmaster;
use App\Models\Examorder;
use App\Models\Patternclass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamPatternclass extends Model
{
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='exam_patternclasses';
    protected $fillable=[
        'exam_id',
        'patternclass_id',
        'result_date',
        'launch_status',
        'start_date',
        'end_date',
        'latefee_date',
        'intmarksstart_date',
        'intmarksend_date',
        'finefee_date',
        'capmaster_id',
        'capscheduled_date',
        'papersettingstart_date',
        'papersubmission_date',
        'placeofmeeting',
        'description',
    ];

    public function patternclass(): BelongsTo
    {
        return $this->belongsTo(Patternclass::class, 'patternclass_id', 'id');
    }

    public function order()
    {
        return $this->hasMany(Examorder::class,'exam_patternclass_id','id');
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

    public function capmaster(): BelongsTo
    {
        return $this->belongsTo(Capmaster::class, 'capmaster_id', 'id');
    }


    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('patternclass.courseclass.course', 'patternclass.courseclass.classyear', 'patternclass.pattern','exam','capmaster')
        ->where('result_date', 'like', "%{$search}%")
        ->orWhere('start_date', 'like', "%{$search}%")
        ->orWhere('end_date', 'like', "%{$search}%")
        ->orWhere('latefee_date', 'like', "%{$search}%")
        ->orWhere('latefee_date', 'like', "%{$search}%")
        ->orWhere('intmarksstart_date', 'like', "%{$search}%")
        ->orWhere('intmarksend_date', 'like', "%{$search}%")
        ->orWhere('finefee_date', 'like', "%{$search}%")
        ->orWhere('capscheduled_date', 'like', "%{$search}%")
        ->orWhere('papersettingstart_date', 'like', "%{$search}%")
        ->orWhere('papersettingstart_date', 'like', "%{$search}%")
        ->orWhere('papersubmission_date', 'like', "%{$search}%")
        ->orWhere('placeofmeeting', 'like', "%{$search}%")
        ->orWhere(function ($subquery) use ($search) {
            $subquery->orWhereHas('patternclass.courseclass.course', function ($subQuery) use ($search) {
                $subQuery->where('course_name', 'like', "%{$search}%");
            })->orWhereHas('patternclass.pattern', function ($subQuery) use ($search) {
                $subQuery->where('pattern_name', 'like', "%{$search}%");
            })->orWhereHas('patternclass.courseclass.classyear', function ($subQuery) use ($search) {
                $subQuery->where('classyear_name', 'like', "%{$search}%");
            })->orWhereHas('capmaster', function ($subQuery) use ($search) {
                $subQuery->where('cap_name', 'like', "%{$search}%");
            })->orWhereHas('exam', function ($subQuery) use ($search) {
                $subQuery->where('exam_name', 'like', "%{$search}%");
            });
        });

    }
}
