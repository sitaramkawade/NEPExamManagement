<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Caste extends Model
{
    use HasFactory;
    protected $table='castes';
    protected $fillable=[
        'sno',
        'caste_name',
        'caste_category_id',
        'is_active',
    ];


    public function caste_category(): BelongsTo
    {
        return $this->belongsTo(Castecategory::class, 'caste_category_id', 'id');
    }


}
