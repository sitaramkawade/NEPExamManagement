<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Academicyear extends Model
{
    use HasFactory;
    protected $table='academicyears';
    protected $fillable=[
        'year_name',
        'active'

    ];
    public function subjectbuckets():HasMany
    {
        return $this->hasMany(Subjectbucket::class,'academicyear_id','id');
    }
}
