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
                        'locality_name',
                        'student_id',                      
                        'address_type',
                        'is_same',
                        'is_completed',
                        'addresstype_id'
    ];
        

    public function student():BelongsTo
    {
    return $this->belongsTo(Student::class,'student_id','id');
    }
    public function taluka():BelongsTo
    {
    return $this->belongsTo(Taluka::class,'taluka_id','id');
    }
   
    // public function addresstype():BelongsTo
    // {
    // return $this->belongsTo(Addresstype::class,'addresstype_id','id');
    // }
}
