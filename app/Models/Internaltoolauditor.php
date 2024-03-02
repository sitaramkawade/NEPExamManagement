<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\Academicyear;
use App\Models\Patternclass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Internaltoolauditor extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='internaltoolauditors';
    protected $fillable=[
        'patternclass_id',
        'faculty_id',
        'academicyear_id',
        'evaluationdate',
        'status',
    ];

    public function patternclass(): BelongsTo
    {
     return $this->belongsTo(Patternclass::class,'patternclass_id','id')->withTrashed();
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id')->withTrashed();
    }

    public function academicyear(): BelongsTo
    {
     return $this->belongsTo(Academicyear::class,'academicyear_id','id')->withTrashed();
    }
}
