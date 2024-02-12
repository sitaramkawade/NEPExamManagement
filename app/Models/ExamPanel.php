<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\Subject;
use App\Models\ExamOrderPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamPanel extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='exam_panels';
    protected $fillable=[
        'faculty_id',
        'examorderpost_id',
        'subject_id',
        'active_status'
    ];

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id')->withTrashed();
    }

    public function examorderpost(): BelongsTo
    {
        return $this->belongsTo(ExamOrderPost::class,'examorderpost_id','id')->withTrashed();
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class,'subject_id','id')->withTrashed();
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('faculty', 'examorderpost', 'subject')->where(function ($subquery) use ($search) {
            $subquery->orWhereHas('faculty', function ($subQuery) use ($search) {
                $subQuery->where('faculty_name', 'like', "%{$search}%");
            })->orWhereHas('examorderpost', function ($subQuery) use ($search) {
                $subQuery->where('post_name', 'like', "%{$search}%");
            })->orWhereHas('subject', function ($subQuery) use ($search) {
                $subQuery->where('subject_name', 'like', "%{$search}%");
            });
        });
    }
}
