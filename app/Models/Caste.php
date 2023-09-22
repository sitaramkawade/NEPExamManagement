<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caste extends Model
{
    use HasFactory;
    protected $table='castes';
    protected $fillable=[
        
        'caste_name',
        'caste_category_id',
        'is_active',
    ];

}
