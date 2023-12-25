<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class District extends Model
{
    use HasFactory;
    protected $table='districts';
    protected $fillable=[
        
        'district_code',
        'district_name',
        'state_id',
      
        
    ];

    public function talukas():HasMany
    {
        return $this->hasMany(Taluka::class,'district_id','id');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
   
}
