<?php

namespace App\Models;

use App\Models\Internaltoolview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Internaltooldocumentmaster extends Model
{
    use HasFactory;
    protected $table='internaltooldocumentmasters';
    protected $fillable=[
        'internaltooldoc_name',
        'course_type',
        'status',
    ];

    public function internaltoolviews():HasMany
    {
        return $this->hasMany(Internaltoolview::class,'internaltooldoc_id','id');
    }
}
