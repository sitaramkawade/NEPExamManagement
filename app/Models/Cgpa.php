<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cgpa extends Model
{
    use HasFactory; 
    protected $table="cgpas";
    protected $fillable = [
            'max_gp',
            'min_gp',
            'grade',
            'description',
    ];
}
