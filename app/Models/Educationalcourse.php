<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Educationalcourse extends Model
{
    use HasFactory;
    protected $table='educationalcourses';
    protected $fillable=[

        'course_name',
        'programme_id',
        'is_active',

    ];

    public function programme():BelongsTo
    {
    return $this->belongsTo(Programme::class,'programme_id','id');
    }

   
}
