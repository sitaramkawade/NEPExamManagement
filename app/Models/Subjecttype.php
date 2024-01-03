<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subjecttype extends Model
{
    use HasFactory;
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
}
