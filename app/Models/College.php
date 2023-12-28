<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
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
    ];
    public function sanstha(): BelongsTo
    {
        return $this->belongsTo(Sanstha::class,'sanstha_id','id');
    }
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id','id');
    }
    public function roles()
    {
        return $this->hasMany(Role::class,'roletype_id','id')->withTrashed();
    }
}
