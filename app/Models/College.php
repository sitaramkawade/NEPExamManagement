<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class College extends Model
{
    use HasFactory;
    protected $table='colleges';
    protected $fillable=[
        'college_name',
        'college_address',
        'college_website_url',
        'college_email',
        'college_contact_no',
        'college_logo_path',
        'sanstha_id',
        'university_id',
        'status',
        'is_default'
    ];
    public function sanstha(): BelongsTo
    {
        return $this->belongsTo(Sanstha::class,'sanstha_id','id');
    }
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id','id');
    }

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where('college_name', 'like', "%{$this->search}%")
        ->Orwhere('college_email', 'like', "%{$this->search}%")
        ->orWhere('college_address', 'like', "%{$this->search}%");
    }
            
    
}
