<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\Roletype;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='designations';
    protected $fillable=[
        'designation',
        'roletype_id',
        'is_active',
    ];

    public function roletype()
    {
        return $this->belongsTo(Roletype::class, 'roletype_id','id');
    }

    public function faculties()
    {
        return $this->hasMany(Faculty::class, 'designation_id','id');
    }
}
