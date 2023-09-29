<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Studentaddress extends Model
{
    use HasFactory;

    protected $table= 'studentaddresses';
    protected $fillable=[
                        'taluka_id',
                        'village_name',
                        'pincode',
                        'address',
                        'addresstype_id',
                        'c_locality_name',
                        'student_id',                      
                        'is_addresssame',
                        'is_competed',
    ];
        

    public function student():BelongsTo
    {
    return $this->belongsTo(Student::class,'student_id','id');
    }
    public function taluka():BelongsTo
    {
    return $this->belongsTo(Taluka::class,'c_taluka_id','id');
    }
    public function talukap():BelongsTo
    {
    return $this->belongsTo(Taluka::class,'p_taluka_id','id');
    }
}
