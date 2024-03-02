<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classstudentmenumaster extends Model
{
    use HasFactory;
    protected $table="class_studmenumasters";
    protected $fillable = [
        'studmenumaster_id',
        'patternclass_id',
        'user_id',
        'college_id',
        'isactive',
    ];
}
