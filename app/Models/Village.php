<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Village extends Model
{
    use HasFactory;
    protected $table='villages';
    protected $fillable=[      
        
        'village_code',
        'village_name',
        'village_name_local',
        'taluka_id',
        
    ];
    public function taluka(): BelongsTo
    {
        return $this->belongsTo(Taluka::class, 'taluka_id', 'id');
    }
    
    public function getCreatedDateFormatAttribute(){
        return $this->created_at->format('M, d Y');
    }
}
