<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjectcategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="subjectcategories";
    protected $fillable = [
    'subjectcategory',
    'subjectcategory_shortname',
    'subjectbucket_type',
    'is_active',
    ];

    public function subject():HasMany
    {
        return $this->hasMany(Subject::class,'subjectcategory_id','id')->withTrashed();
    }
    public function subjectbuckets():HasMany
    {
        return $this->hasMany(Subjectbucket::class,'subjectcategory_id','id');
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->where(function ($subquery) use ($search) {
            $subquery->where('subjectcategory', 'like', "%{$search}%")
                    ->orWhere('subjectcategory_shortname', 'like', "%{$search}%")
                    ->orWhere('subjectbucket_type', 'like', "%{$search}%");
        });
    }
}
