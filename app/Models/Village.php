<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $table='villages';
    protected $fillable=[      
        
        'village_code',
        'village_name',
        'village_name_local',
        'taluka_id',
        
    ];
}
