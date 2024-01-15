<?php

namespace App\Models;

use App\Models\College;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    use HasFactory;
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
        return $this->hasMany(Faculty::class,'department_id','id');
    }
    public function facultyhead()
    {
        return $this->hasMany(Facultyhead::class,'department_id','id');
    }
    public function faculties(): BelongsToMany 
    {
        return $this->belongsToMany(Faculty::class,'facultyheads','faculty_id', 'department_id','id');
         
    }
    public function subject():HasMany
    {
        return $this->hasMany(Subject::class,'department_id','id');
    }
    public function subjectbuckets():HasMany
    {
        return $this->hasMany(Subjectbucket::class,'department_id','id');
    }
    public function college():BelongsTo
    {
        return $this->belongsTo(College::class,'college_id','id');
    }

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where('dept_name', 'like', "%{$search}%")
        ->where('short_name', 'like', "%{$search}%");
       
    }
}
