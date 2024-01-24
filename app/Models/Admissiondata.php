<?php

namespace App\Models;

use App\Models\User;
use App\Models\College;
use App\Models\Subject;
use App\Models\Department;
use App\Models\Academicyear;
use App\Models\Patternclass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admissiondata extends Model
{
    use HasFactory ,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='admissiondatas';
    protected $fillable=[
        'memid',
        'stud_name',
        'user_id',
        'patternclass_id',
        'subject_id',
        'academicyear_id',
        'college_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function academicyear(): BelongsTo
    {
        return $this->belongsTo(Academicyear::class, 'academicyear_id', 'id');
    }


    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }

    public function patternclass(): BelongsTo
    {
        return $this->belongsTo(Patternclass::class, 'patternclass_id', 'id');
    }



    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('patternclass.courseclass.course', 'patternclass.courseclass.classyear', 'user','academicyear','college','subject')
        ->orWhere('memid', 'like', "%{$search}%")
        ->orWhere('stud_name', 'like', "%{$search}%")
        ->orWhere(function ($subquery) use ($search) {
            $subquery->orWhereHas('patternclass.courseclass.course', function ($subQuery) use ($search) {
                $subQuery->where('course_name', 'like', "%{$search}%");
            })->orWhereHas('patternclass.pattern', function ($subQuery) use ($search) {
                $subQuery->where('pattern_name', 'like', "%{$search}%");
            })->orWhereHas('patternclass.courseclass.classyear', function ($subQuery) use ($search) {
                $subQuery->where('classyear_name', 'like', "%{$search}%");
            })->orWhereHas('user', function ($subQuery) use ($search) {
                $subQuery->where('name', 'like', "%{$search}%");
            })->orWhereHas('academicyear', function ($subQuery) use ($search) {
                $subQuery->where('year_name', 'like', "%{$search}%");
            })->orWhereHas('college', function ($subQuery) use ($search) {
                $subQuery->where('college_name', 'like', "%{$search}%");
            })->orWhereHas('subject', function ($subQuery) use ($search) {
                $subQuery->where('subject_name', 'like', "%{$search}%");
            });
        });

    }
}
