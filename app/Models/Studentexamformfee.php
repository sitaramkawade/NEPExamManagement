<?php

namespace App\Models;

use App\Models\Examfeemaster;
use App\Models\Examformmaster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Studentexamformfee extends Model
{
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table="studentexamformfees";
    protected $fillable = [
    'examformmaster_id',
    'examfees_id',
    'fee_amount'
    ];

    public function examformmaster()
    {         
        return $this->belongsTo(Examformmaster::class,'examformmaster_id','id')->withTrashed();

    }
    
    public function examfees()
    {         
        return $this->belongsTo(Examfeemaster::class,'examfees_id','id')->withTrashed();

    }
}
