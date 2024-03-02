<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studmenumaster extends Model
{
    use HasFactory;
    protected $table='studmenumasters';
    protected $fillable=[
        'menu_name',
        'status',
    ];

    

}
