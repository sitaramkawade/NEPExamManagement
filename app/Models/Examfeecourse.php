<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examfeecourse extends Model
{
    use HasFactory,SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table='examfeecourses';
    protected $fillable=[
        'fee',
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
