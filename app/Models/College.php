<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Course;
use App\Models\Pattern;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class College extends Model
{
    use HasFactory,SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table='colleges';
    protected $fillable=[
        'college_name',
        'college_address',
        'college_website_url',
        'college_email',
        'college_contact_no',
        'college_logo_path',
        'sanstha_id',
        'university_id',
        'status',
        'is_default'
    ];
    public function sanstha(): BelongsTo
    {
        return $this->belongsTo(Sanstha::class,'sanstha_id','id')->withTrashed();
    }
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id','id')->withTrashed();
    }


    public function courses():HasMany
    {
        return $this->hasMany(Course::class,'college_id','id')->withTrashed();
    }
    
    public function roles()
    {
        return $this->hasMany(Role::class,'roletype_id','id')->withTrashed();
    }

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class, 'college_id', 'id')->withTrashed();
    }
    
    public function patterns()
    {
        return $this->hasMany(Pattern::class)->withTrashed();
    }
    public function scopeSearch(Builder $query,string $search)
    {
        return $query->with('sanstha','university')
       -> where('college_name', 'like', "%{$search}%")
        ->orWhere('college_email', 'like', "%{$search}%")
        ->orWhere('college_address', 'like', "%{$search}%")
        ->orWhere('college_website_url', 'like', "%{$search}%")
        ->orWhere('college_contact_no', 'like', "%{$search}%")
        ->orWhere(function ($subquery) use ($search) {
            $subquery->orWhereHas('sanstha', function ($subQuery) use ($search) {
                $subQuery->where('sanstha_name', 'like', "%{$search}%");
            });
            $subquery->orWhereHas('university', function ($subQuery) use ($search) {
                $subQuery->where('university_name', 'like', "%{$search}%");
            });
        });
    }


 
}
