<?php

namespace App\Models;

use App\Models\ExamPatternclass;
use Illuminate\Database\Eloquent\Model;
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
        return $this->belongsTo(ExamPatternclass::class, 'exam_patternclasses_id', 'id');
    }
}
