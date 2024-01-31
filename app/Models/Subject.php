<?php

namespace App\Models;

use App\Models\College;
use App\Models\Hodappointsubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;

class Subject extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='subjects';
    protected $fillable=[
        'subject_sem',
        'subjectcategory_id',
        'subject_no',
        'subject_order',
        'subject_code',
        'subject_name_prefix',
        'subject_shortname',
        'subject_name',
        'subjecttype_id',
        'subjectexam_type',
        'subject_credit',
        'is_project',
        'subject_maxmarks',
        'subject_maxmarks_int',
        'subject_maxmarks_intpract',
        'subject_maxmarks_ext',
        'subject_totalpassing',
        'subject_intpassing',
        'subject_intpractpassing',
        'subject_extpassing',
        'subject_optionalgroup',
        'department_id',
        'status',
        'patternclass_id',
        'classyear_id',// fy or sy or ty
        'user_id',// user who add
        'faculty_id',// faculty who add
        'college_id',
    ];

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }
    public function subjectcategories(): BelongsTo
    {
     return $this->belongsTo(Subjectcategory::class,'subjectcategory_id','id');
    }
    public function department(): BelongsTo
    {
     return $this->belongsTo(Department::class,'department_id','id');
    }
    public function subjecttypes(): BelongsTo
    {
     return $this->belongsTo(Subjecttype::class,'subjecttype_id','id');
    }
    public function patternclass(): BelongsTo
    {
     return $this->belongsTo(Patternclass::class,'patternclass_id','id');
    }
    public function classyear(): BelongsTo
    {
     return $this->belongsTo(Classyear::class,'classyear_id','id');
    }
    public function subjectbuckets():HasMany
    {
        return $this->hasMany(Subjectbucket::class,'subject_id','id');
    }
    public function hodappointsubjects():HasMany
    {
        return $this->hasMany(Hodappointsubject::class,'subject_id','id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('subjectcategories', 'subjecttypes', 'classyear', 'department', 'college')
            ->where('subject_name', 'like', "%{$search}%")
            ->orWhere('subject_credit', 'like', "%{$search}%")
            ->orWhereHas('subjectcategories', function ($query) use ($search) {
                $query->where('subjectcategory', 'like', "%{$search}%");
            })
            ->orWhereHas('subjecttypes', function ($query) use ($search) {
                $query->where('type_name', 'like', "%{$search}%");
            })
            ->orWhereHas('department', function ($query) use ($search) {
                $query->where('dept_name', 'like', "%{$search}%");
            })
            ->orWhereHas('college', function ($query) use ($search) {
                $query->where('college_name', 'like', "%{$search}%");
            })
            ->orWhereHas('classyear', function ($query) use ($search) {
                $query->where('classyear_name', 'like', "%{$search}%");
            });
    }

}


