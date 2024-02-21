<?php

namespace App\Models;

use App\Models\SubjectBucketTypeMaster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjectcategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
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
        return $this->hasMany(Subjectbucket::class,'subjectcategory_id','id')->withTrashed();
    }
    public function buckettype()
    {
        return $this->belongsTo(SubjectBucketTypeMaster::class, 'subjectbuckettype_id','id');
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('buckettype')
            ->where(function ($query) use ($search) {
                $query->orWhereHas('buckettype', function ($query) use ($search) {
                    $query->where('buckettype_name', 'like', "%{$search}%");
                })
                ->orWhere('subjectcategory', 'like', "%{$search}%")
                ->orWhere('subjectcategory_shortname', 'like', "%{$search}%");
            });
    }
}
