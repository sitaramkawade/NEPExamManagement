<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\ExamTimetable;
use App\Models\Timetableslot;
use App\Models\ExamPatternclass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamTimetable extends Model
{
    use HasFactory,SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table='exam_timetables';
    protected $fillable=[
        'subject_id',
        'exam_patternclasses_id',
        'examdate',
        'timeslot_id',
        'status',
    ];


    public function exampatternclass(): BelongsTo
    {
        return $this->belongsTo(ExamPatternclass::class, 'exam_patternclasses_id', 'id')->withTrashed();
    }
   
    public function timetableslot(): BelongsTo
    {
        return $this->belongsTo(Timetableslot::class, 'timeslot_id','id')->withTrashed();
    }
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id')->withTrashed();
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('exampatternclass.patternclass.courseclass.course', 'exampatternclass.patternclass.courseclass.classyear', 'exampatternclass.exam','exampatternclass.patternclass.pattern','subject','timetableslot')
        ->where('examdate', 'like', "%{$search}%")
        ->orWhere(function ($subquery) use ($search) {
            $subquery->orWhereHas('exampatternclass.patternclass.courseclass.course', function ($subQuery) use ($search) {
                $subQuery->where('course_name', 'like', "%{$search}%");
            })->orWhereHas('exampatternclass.patternclass.pattern', function ($subQuery) use ($search) {
                $subQuery->where('pattern_name', 'like', "%{$search}%");
            })->orWhereHas('exampatternclass.patternclass.courseclass.classyear', function ($subQuery) use ($search) {
                $subQuery->where('classyear_name', 'like', "%{$search}%");
            })->orWhereHas('exampatternclass.exam', function ($subQuery) use ($search) {
                $subQuery->where('exam_name', 'like', "%{$search}%");
             })->orWhereHas('timetableslot', function ($subQuery) use ($search) {
                 $subQuery->where('timeslot', 'like', "%{$search}%");
            })->orWhereHas('subject', function ($subQuery) use ($search) {
                $subQuery->where('subject_name', 'like', "%{$search}%");
            });
        });

    }
    
}
