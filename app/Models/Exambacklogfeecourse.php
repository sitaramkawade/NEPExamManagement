<?php

namespace App\Models;

use App\Models\Patternclass;
use App\Models\Examfeemaster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exambacklogfeecourse extends Model
{
    use HasFactory,SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table='exambacklogfeecourses';
    protected $fillable=[
        'exambacklogfeecourses',
        'backlogfee',
        'sem',
        'patternclass_id',
        'examfees_id',
        'active_status',
        'approve_status',
    ];


    public function patternclass(): BelongsTo
    {
        return $this->belongsTo(Patternclass::class, 'patternclass_id', 'id');
    }

    public function examfee(): BelongsTo
    {
        return $this->belongsTo(Examfeemaster::class, 'examfees_id', 'id');
    }
}
