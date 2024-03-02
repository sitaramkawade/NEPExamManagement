<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Internaltooldocument extends Model
{
    use HasFactory;
    protected $table='internaltooldocuments';
    protected $fillable=[
        'internaltooldocument_id',
        'internaltoolmaster_id',
        'evaluationdate',
        'is_multiple',
        'status',
    ];
}
