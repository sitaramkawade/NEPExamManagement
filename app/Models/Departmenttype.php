<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departmenttype extends Model
{
    use HasFactory;
    protected $table='departmenttypes';
    protected $fillable=[
        'departmenttype',
        'status',
    ];
}
