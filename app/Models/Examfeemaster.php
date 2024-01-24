<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examfeemaster extends Model
{
    use HasFactory,SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table='examfeemasters';
    protected $fillable=[
        'fee_type',
        'remark',
        'active_status',
        'approve_status',
    ];


    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where('fee_type', 'like', "%{$search}%")->orWhere('remark', 'like', "%{$search}%");
    }
}
