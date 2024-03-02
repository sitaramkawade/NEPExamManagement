<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjectvertical extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table="subjectverticals";
    protected $fillable = [
    'subject_vertical',
    'subjectvertical_shortname',
    'subjectbuckettype_id',
    'is_active',
    ];

    public function subjects():HasMany
    {
        return $this->hasMany(Subject::class,'subjectvertical_id','id')->withTrashed();
    }
    public function subjectbuckets():HasMany
    {
        return $this->hasMany(Subjectbucket::class,'subjectvertical_id','id')->withTrashed();
    }
    public function buckettype()
    {
        return $this->belongsTo(Subjectbuckettypemaster::class, 'subjectbuckettype_id','id');
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('buckettype')
            ->where(function ($query) use ($search) {
                $query->orWhereHas('buckettype', function ($query) use ($search) {
                    $query->where('buckettype_name', 'like', "%{$search}%");
                })
                ->orWhere('subject_vertical', 'like', "%{$search}%")
                ->orWhere('subjectvertical_shortname', 'like', "%{$search}%");
            });
    }
}
