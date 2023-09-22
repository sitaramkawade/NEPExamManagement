<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasteCategory extends Model
{
    use HasFactory;
    protected $table='caste_categories';
    protected $fillable=[
        'caste_category',
        'caste_category_desc',
        'reservation',
        'is_active',
  
  
        
    ];

}
