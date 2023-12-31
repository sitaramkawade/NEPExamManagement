<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sanstha extends Model
{
    use HasFactory;
    protected $table='sansthas';
    protected $fillable = [
        'sanstha_name',
        'sanstha_address',
        'sanstha_chairman_name',
        'sanstha_website_url',
        'sanstha_contact_no',
        'status',
    ];
    
    public function colleges(): HasMany
    {
        return $this->hasMany(College::class,'sanstha_id','id');
    }

}
