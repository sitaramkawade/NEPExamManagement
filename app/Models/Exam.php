<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;
    protected $table='exams';
    protected $fillable=[
        'exam_name',
        'status',
        'exam_sessions'
    ];

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where('exam_name', 'like', "%{$search}%")
        ->orWhere('status', 'like', "%{$search}%")
        ->orWhere('exam_sessions', 'like', "%{$search}%");
    }
}
