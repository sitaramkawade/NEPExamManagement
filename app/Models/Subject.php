<?php

namespace App\Models;

use App\Models\College;
use App\Models\ExamPanel;
use App\Models\Subjecttype;
use App\Models\StudentExamform;
use App\Models\Subjectvertical;
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
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='subjects';
    protected $fillable=[
        'subject_sem',
        'subjectvertical_id',
        'subject_order',
        'subject_code',
        'subject_name_prefix',
        'subject_name',
        'subjectcategory_id',
        'subject_type',
        'subject_credit',
        'subject_maxmarks',
        'subject_maxmarks_int',
        'subject_maxmarks_intpract',
        'subject_maxmarks_ext',
        'is_panel',
        'no_of_sets',
        'subject_totalpassing',
        'subject_intpassing',
        'subject_intpractpassing',
        'subject_extpassing',
        'subject_optionalgroup',
        'patternclass_id',
        'classyear_id',// fy or sy or ty
        'user_id',// user who add
        'faculty_id',// faculty who add
        'department_id',
        'college_id',
        'status',
    ];

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'college_id', 'id')->withTrashed();
    }

    public function subjectcategories(): BelongsTo
    {
     return $this->belongsTo(Subjectcategory::class,'subjectcategory_id','id')->withTrashed(); // ok
    }

    public function subjectverticals(): BelongsTo
    {
     return $this->belongsTo(Subjectvertical::class,'subjectvertical_id','id')->withTrashed(); //ok
    }

    public function department(): BelongsTo
    {
     return $this->belongsTo(Department::class,'department_id','id')->withTrashed();
    }

    public function subjecttype(): BelongsTo
    {
     return $this->belongsTo(Subjecttype::class,'subject_type','type_name')->withTrashed(); //ok
    }

    public function patternclass(): BelongsTo
    {
     return $this->belongsTo(Patternclass::class,'patternclass_id','id')->withTrashed();
    }

    public function classyear(): BelongsTo
    {
     return $this->belongsTo(Classyear::class,'classyear_id','id')->withTrashed();
    }

    public function subjectbuckets():HasMany
    {
        return $this->hasMany(Subjectbucket::class,'subject_id','id')->withTrashed();
    }

    public function hodappointsubjects():HasMany
    {
        return $this->hasMany(Hodappointsubject::class,'subject_id','id')->withTrashed();
    }

    public function studentexamforms():HasMany
    {
        return $this->hasMany(StudentExamform::class,'subject_id','id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->withTrashed();
    }

    public function exampanels()
    {
        return $this->hasMany(ExamPanel::class,'subject_id','id')->withTrashed();
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('subjectverticals', 'subjectcategories', 'classyear', 'department', 'college')
            ->where('subject_name', 'like', "%{$search}%")
            ->orWhere('subject_credit', 'like', "%{$search}%")
            ->orWhereHas('subjectcategories', function ($query) use ($search) {
                $query->where('subjectcategory', 'like', "%{$search}%");
            })
            ->orWhereHas('subjectverticals', function ($query) use ($search) {
                $query->where('subject_vertical', 'like', "%{$search}%");
            })
            ->orWhereHas('subjecttype', function ($query) use ($search) {
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


