<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maritalstatus extends Model
{
    use HasFactory;

    protected $table='maritalstatuses';
    protected $fillable=[        
        'marital_name',
        'is_active',
    ];
    
 
}
