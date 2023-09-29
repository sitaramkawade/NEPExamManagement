<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Facultyhead extends Pivot
{
    use HasFactory;
    protected $guard = 'faculty';
    protected $table="facultyheads";
    protected $fillable = [
    'faculty_id',
    'department_id',
    'status',
    ];
    // public function faculty()
    // {
    //     return $this->belongsTo(Faculty::class,'faculty_id','id');
    // }
    // public function department()
    // {
    //  return $this->belongsTo(Department::class,'department_id','id');
    // }
}
