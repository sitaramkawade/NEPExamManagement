<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subjectbucket extends Model
{
    use HasFactory;
    protected $table='subjectbuckets';
    protected $fillable=[
    'department_id',
    'patternclass_id',
    'subject_division',
    'subjectcategory_id',
    'subject_categoryno',
    'subject_id',
    'academicyear_id',
    'status',
    ];
    public function department(): BelongsTo
    {
     return $this->belongsTo(Department::class,'department_id','id');
    }
    public function patternclass(): BelongsTo
    {
     return $this->belongsTo(Patternclass::class,'patternclass_id','id');
    }
    public function subjectcategory(): BelongsTo
    {
     return $this->belongsTo(Subjectcategory::class,'subjectcategory_id','id');
    }
    public function subject(): BelongsTo
    {
     return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function academicyear(): BelongsTo
    {
     return $this->belongsTo(Academicyear::class,'academicyear_id','id');
    }

}
