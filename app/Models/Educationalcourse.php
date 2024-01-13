<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Educationalcourse extends Model
{
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='educationalcourses';
    protected $fillable=[

        'course_name',
        'programme_id',
        'is_active',

    ];

    public function programme():BelongsTo
    {
    return $this->belongsTo(Programme::class,'programme_id','id');
    }

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where('course_name', 'like', "%{$search}%");
        // ->orWhere('college_email', 'like', "%{$search}%")
        // ->orWhere('college_address', 'like', "%{$search}%");
    }
   
}
