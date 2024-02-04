<?php

namespace App\Models;

use App\Models\College;
use App\Models\Roletype;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='roles';
    protected $fillable=[
        'role_name',
        'roletype_id',
        'college_id',
    ];

    public function roletype()
    {
     return $this->belongsTo(Roletype::class,'roletype_id','id')->withTrashed();
    }

    public function college()
    {
     return $this->belongsTo(College::class,'college_id','id')->withTrashed();
    }

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->with('college', 'roletype')->where(function ($subquery) use ($search) {
            $subquery->where('role_name', 'like', "%{$search}%")
                ->orWhereHas('college', function ($subquery) use ($search) {
                    $subquery->where('college_name', 'like', "%{$search}%");
                })
                ->orWhereHas('roletype', function ($subquery) use ($search) {
                    $subquery->where('roletype_name', 'like', "%{$search}%");
                });
        });

    }
}
