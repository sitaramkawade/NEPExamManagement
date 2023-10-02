<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boarduniversity extends Model
{
    use HasFactory;
    protected $table='boarduniversities';
    protected $fillable=[
        'boarduniversity_name',
        'is_active'

    ];
}
