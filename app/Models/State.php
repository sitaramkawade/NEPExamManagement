<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table= 'states';
    protected $fillable=[
       
        'state_code',
        'state_name',
        'census_code',
        'state_or_UT',
        'country_id',
        
        
      
        
    ];
}
