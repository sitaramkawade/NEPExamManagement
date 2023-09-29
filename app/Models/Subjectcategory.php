<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subjectcategory extends Model
{
    use HasFactory;
    protected $table="subjectcategories";
    protected $fillable = [
    'subjectcategory',
    'subjectcategory_shortname',
    'active',
    ];

    public function subject():HasMany
    {
        return $this->hasMany(Subject::class,'subjectcategory_id','id');
    }
    
}
