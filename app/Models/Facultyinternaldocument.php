<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facultyinternaldocument extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='facultyinternaldocuments';
    protected $fillable=[
        'faculty_id',
        'document_fileName',
        'document_fileTitle',
        'internaltooldocument_id',
        'subject_id',
        'academicyear_id',
        'verifybyfaculty_id',
        'verificationremark',
        'status',
    ];
}
