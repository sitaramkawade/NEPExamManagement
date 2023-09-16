<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roletype extends Model
{
    use HasFactory;

    protected $table='roletypes';
    protected $fillable = [
    'roletype_name',        
    'status',
    ];
    
    
}
