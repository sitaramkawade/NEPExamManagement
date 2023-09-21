<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultybankaccount extends Model
{
    use HasFactory;
    protected $table="facultybankaccounts";
    protected $fillable = [
        'faculty_id',
        'account_no',
        'bank_address',
        'bank_name',
        'branch_name',
        'branch_code',
        'account_type',
        'ifsc_code',
        'micr_code',
        'acc_verified', 
    ];
    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }
}
