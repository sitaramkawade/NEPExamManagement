<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjecttype extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="subjecttypes";
    protected $fillable = [
        'type_name',
        'type_shortname',
        'active',
    ];
    public function subject():HasMany
    {
        return $this->hasMany(Subject::class,'subjecttype_id','id')->withTrashed();
    }

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where(function ($subquery) use ($search) {
            $subquery->where('type_name', 'like', "%{$search}%")
                ->orWhere('type_shortname', 'like', "%{$search}%")
                ->orWhere('active', 'like', "%{$search}%");
        });
    }
}
