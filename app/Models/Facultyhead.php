<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facultyhead extends Pivot
{
    use HasFactory, SoftDeletes;
    protected $guard = 'faculty';
    protected $table="facultyheads";
    protected $fillable = [
    'faculty_id',
    'department_id',
    'status',
    ];
    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id')->withTrashed();
    }
    public function department()
    {
     return $this->belongsTo(Department::class,'department_id','id')->withTrashed();
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('faculty', 'department')
        ->orWhere(function ($subquery) use ($search) {
            $subquery->orWhereHas('faculty', function ($subQuery) use ($search) {
                $subQuery->where('faculty_name', 'like', "%{$search}%");
            })->orWhereHas('department', function ($subQuery) use ($search) {
                $subQuery->where('dept_name', 'like', "%{$search}%");
            });
        });
    }
}
