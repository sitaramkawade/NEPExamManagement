<?php

namespace App\Models;

use App\Models\ExamPatternclass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory,SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table='exams';
    protected $fillable=[
        'exam_name',
        'status',
        'exam_sessions'
    ];

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where('exam_name', 'like', "%{$search}%")
        ->orWhere('exam_sessions', 'like', "%{$search}%");
    }


    public function exampatternclasses()
    {
        return $this->hasMany(ExamPatternclass::class);
    }
}
