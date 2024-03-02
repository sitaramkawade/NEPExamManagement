<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departmenttype extends Model
{
    use HasFactory,SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table='departmenttypes';
    protected $fillable=[
        'departmenttype',
        'description',
        'status',
    ];

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where('departmenttype', 'like', "%{$search}%")
        ->where('description', 'like', "%{$search}%");
       
    }
}
