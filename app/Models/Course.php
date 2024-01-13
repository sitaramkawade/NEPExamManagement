<?php

namespace App\Models;

use App\Models\Course;
use App\Models\College;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $table='courses';
    protected $fillable=[
        'course_code',
        'course_name',
        'fullname',
        'shortname',
        'special_subject',
        'course_type',
        'course_category',
        'college_id',
        'programme_id',
        
    ];
    public function course_classes():HasMany
    {
        return $this->hasMany(Courseclass::class,'course_id','id');
    }

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }


    public function programme(): BelongsTo
    {
        return $this->belongsTo(Programme::class, 'programme_id', 'id');
    }


    public function scopeSearch(Builder $query,string $search)
    {
        return $query->with('college','programme')->where(function ($subquery) use ($search) {
            $subquery->where('course_code', 'like', "%{$search}%")
                ->orWhere('course_name', 'like', "%{$search}%")
                ->orWhere('fullname', 'like', "%{$search}%")
                ->orWhere('shortname', 'like', "%{$search}%")
                ->orWhere('course_type', 'like', "%{$search}%")
                ->orWhere('special_subject', 'like', "%{$search}%")
                ->orWhereHas('college', function ($subQuery) use ($search) {
                    $subQuery->where('college_name', 'like', "%{$search}%");
                }
            )->orWhereHas('programme', function ($subQuery) use ($search) {
                $subQuery->where('programme_name', 'like', "%{$search}%");
            }
        );
        });
    }
    
}
