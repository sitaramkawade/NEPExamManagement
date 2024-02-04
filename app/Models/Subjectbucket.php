<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjectbucket extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='subjectbuckets';
    protected $fillable=[
    'department_id',
    'patternclass_id',
    'subject_division',
    'subjectcategory_id',
    'subject_categoryno',
    'subject_id',
    'academicyear_id',
    'status',
    ];
    public function department(): BelongsTo
    {
     return $this->belongsTo(Department::class,'department_id','id')->withTrashed();
    }
    public function patternclass(): BelongsTo
    {
     return $this->belongsTo(Patternclass::class,'patternclass_id','id')->withTrashed();
    }
    public function subjectcategory(): BelongsTo
    {
     return $this->belongsTo(Subjectcategory::class,'subjectcategory_id','id');
    }
    public function subject(): BelongsTo
    {
     return $this->belongsTo(Subject::class,'subject_id','id')->withTrashed();
    }
    public function academicyear(): BelongsTo
    {
     return $this->belongsTo(Academicyear::class,'academicyear_id','id')->withTrashed();
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('subject', 'department', 'academicyear',)
            ->Where('status', 'like', "%{$search}%")
            ->orWhereHas('academicyear', function ($query) use ($search) {
                $query->where('year_name', 'like', "%{$search}%");
            })
            ->orWhereHas('department', function ($query) use ($search) {
                $query->where('dept_name', 'like', "%{$search}%");
            })
            ->orWhereHas('subject', function ($query) use ($search) {
                $query->where('subject_name', 'like', "%{$search}%");
            });
    }

}
