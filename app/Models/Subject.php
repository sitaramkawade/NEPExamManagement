<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;
    protected $table='subjects';
    protected $fillable=[
        'subject_sem',
        'subjectcategory_id',         
        'subject_no',
        'subject_code',        
        'subject_shortname',
        'subject_name',
        'subjecttype_id',        
        'subjectexam_type',
        'subject_credit',
        'subject_maxmarks',
        'subject_maxmarks_int',
        'subject_maxmarks_intpract',
        'subject_maxmarks_ext',
        'subject_totalpassing',
        'subject_intpassing',
        'subject_intpractpassing',
        'subject_extpassing',
        'subject_optionalgroup',
        'department_id',
        'status',     
        'patternclass_id',
        'classyear_id',// fy or sy or ty
    ];
    
    public function subjectcategories(): BelongsTo
    {
     return $this->belongsTo(Subjectcategory::class,'subjectcategory_id','id');
    }
    public function department(): BelongsTo
    {
     return $this->belongsTo(Department::class,'department_id','id');
    }
    public function subjecttypes(): BelongsTo
    {
     return $this->belongsTo(Subjecttype::class,'subjecttype_id','id');
    }
    public function patternclass(): BelongsTo
    {
     return $this->belongsTo(Patternclass::class,'patternclass_id','id');
    }
    public function classyear(): BelongsTo
    {
     return $this->belongsTo(Classyear::class,'classyear_id','id');
    }
    public function subjectbuckets():HasMany
    {
        return $this->hasMany(Subjectbucket::class,'subject_id','id');
    }
}
