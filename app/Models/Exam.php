<?php

namespace App\Models;

use App\Models\Academicyear;
use App\Models\Exampatternclass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory,SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table='exams';
    protected $fillable=[
        'exam_name',
        'status',
        'academicyear_id',
        'exam_sessions'
    ];

    public function academicyear(): BelongsTo
    {
        return $this->belongsTo(Academicyear::class,'academicyear_id','id')->withTrashed();
    }

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->with('academicyear')
        ->where('exam_name', 'like', "%{$search}%")
        ->orWhere('exam_sessions', 'like', "%{$search}%")
        ->orWhere(function ($subquery) use ($search) {
            $subquery->orWhereHas('academicyear', function ($subQuery) use ($search) {
                $subQuery->where('year_name', 'like', "%{$search}%");
            });
        });
    }


    public function exampatternclasses()
    {
        return $this->hasMany(Exampatternclass::class)->withTrashed();
    }
}
