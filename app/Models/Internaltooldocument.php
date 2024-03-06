<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Internaltooldocumentmaster;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Internaltooldocument extends Model
{
    use HasFactory;
    protected $table='internaltooldocuments';
    protected $fillable=[
        'internaltooldoc_id',
        'internaltoolmaster_id',
        'evaluationdate',
        'is_multiple',
        'status',
    ];

    public function internaltooldocument(): BelongsTo
    {
        return $this->belongsTo(Internaltooldocumentmaster::class, 'internaltooldoc_id', 'id');
    }
}
