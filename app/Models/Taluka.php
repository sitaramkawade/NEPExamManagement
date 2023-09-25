<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taluka extends Model
{
    use HasFactory;
    protected $table='talukas';
    protected $fillable=[
        
    'taluka_code',
    'taluka_name',
    'district_id',
      
        
    ];
}
