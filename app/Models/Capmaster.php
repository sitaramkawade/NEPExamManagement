<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Capmaster extends Model
{
    use HasFactory ,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='capmasters';
    protected $fillable=[
        'cap_name',
        'place',
        'exam_id',
        'status',
        'college_id',
    ];
}
