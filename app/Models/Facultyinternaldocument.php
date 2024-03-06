<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Internaltooldocumentmaster;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id')->withTrashed();
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id')->withTrashed();
    }

    public function academicyear()
    {
        return $this->belongsTo(Academicyear::class,'academicyear_id','id')->withTrashed();
    }

    public function internaltooldocumentmaster():BelongsTo
    {
        return $this->belongsTo(Internaltooldocumentmaster::class,'internaltooldocument_id','id');
    }
}
