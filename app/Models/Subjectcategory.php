<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjectcategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table="subjectcategories";
    protected $fillable = [
        'subjectcategory',
        'subjectcategory_shortname',
        'active',
    ];

    public function subject():HasMany
    {
        return $this->hasMany(Subject::class,'subjectcategory_id','id')->withTrashed(); //ok
    }
    public function subjectbuckets():HasMany
    {
        return $this->hasMany(Subjectbucket::class,'subjectcategory_id','id')->withTrashed();
    }

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where(function ($subquery) use ($search) {
            $subquery->where('subjectcategory', 'like', "%{$search}%")
                ->orWhere('subjectcategory_shortname', 'like', "%{$search}%")
                ->orWhere('active', 'like', "%{$search}%");
        });
    }
}
