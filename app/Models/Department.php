<?php

namespace App\Models;

use App\Models\College;
use App\Models\Departmentprefix;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table="departments";
    protected $fillable = [
        'dept_name',
        'short_name',
        'departmenttype',// type/0 means not active 1=>only ug 2=>only pg 3=>ug,pg 4=>doctorate ,5 =>all
        'college_id',
        'status',

    ];
    public function faculty():HasMany
    {
        return $this->hasMany(Faculty::class,'department_id','id')->withTrashed();
    }
    public function facultyhead()
    {
        return $this->hasMany(Facultyhead::class,'department_id','id')->withTrashed();
    }
    public function faculties(): BelongsToMany
    {
        return $this->belongsToMany(Faculty::class,'facultyheads','faculty_id', 'department_id','id')->withTrashed();
    }
    public function subjects():HasMany
    {
        return $this->hasMany(Subject::class,'department_id','id')->withTrashed();
    }
    public function subjectbuckets():HasMany
    {
        return $this->hasMany(Subjectbucket::class,'department_id','id')->withTrashed();
    }
    public function college():BelongsTo
    {
        return $this->belongsTo(College::class,'college_id','id')->withTrashed();
    }
    public function prefixes():HasMany
    {
        return $this->hasMany(Departmentprefix::class, 'dept_id', 'id')->withTrashed();
    }

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->with('college',)
        ->where('dept_name', 'like', "%{$search}%")
        ->orWhere('short_name', 'like', "%{$search}%")
        ->orWhere(function ($subquery) use ($search) {
            $subquery->orWhereHas('college', function ($subQuery) use ($search) {
                $subQuery->where('college_name', 'like', "%{$search}%");
            });
    });
}
}
