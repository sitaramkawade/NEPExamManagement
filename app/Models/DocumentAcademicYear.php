<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentAcademicYear extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['start_date','end_date','deleted_at'];
    protected $table='document_academic_years';
    protected $fillable=[
        'year_name',
        'description',
        'active',
        'start_date',
        'end_date',
    ];
}
