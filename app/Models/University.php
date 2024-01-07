<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\College;
class University extends Model
{
    use HasFactory;
    protected $table='universities';
    protected $fillable=[
        'university_name',
        'university_address',
        'university_website_url',
        'university_email',
        'university_contact_no',
        'university_logo_path',
        'status',
    ];
     
    public function university(): HasMany
    {
        return $this->hasMany(College::class,'university_id','id');
    }


    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where('university_name', 'like', "%{$search}%")
        ->orWhere('university_email', 'like', "%{$search}%")
        ->orWhere('university_address', 'like', "%{$search}%");
    }
}
