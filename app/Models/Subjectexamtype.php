<?php

namespace App\Models;

use App\Models\SubjectExamTypeMaster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjectexamtype extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='subjectexamtypes';
    protected $fillable=[
        'examtype',
        'description',
        'active',
    ];

    public function subjectexamtypes():HasMany
    {
        return $this->hasMany(SubjectExamTypeMaster::class,'examtype_id','id');
    }
}
