<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    use HasFactory;
    protected $table='patterns';
    protected $fillable=

    [
        'id',
        'pattern_name',
        'pattern_startyear',
        'pattern_valid',
        'status',
        'college_id',
      
    ];
}
