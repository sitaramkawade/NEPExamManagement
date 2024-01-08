<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classyear extends Model
{
    use HasFactory;
    protected $table='classyears';
    protected $fillable=[
    'classyear_name',
    'class_degree_name',
    'status',
    ];
    public function subject():HasMany
    {
        return $this->hasMany(Subject::class,'classyear_id','id')->withTrashed();
    }
    public function course_classes():HasMany
    {
        return $this->hasMany(Courseclass::class,'classyear_id','id')->withTrashed();
    }
}
