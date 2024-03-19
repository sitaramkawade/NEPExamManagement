<?php

namespace App\Models;

use App\Models\Hodappointsubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Internaltooldocumentmaster;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facultyinternaldocument extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='facultyinternaldocuments';
    protected $fillable=[
        'academicyear_id',
        'faculty_id',
        'subject_id',
        'internaltooldocument_id',
        'document_fileName',
        'document_filePath',
        'departmenthead_id',
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

    public function internaltooldocument():BelongsTo
    {
        return $this->belongsTo(Internaltooldocument::class,'internaltooldocument_id','id');
    }

    public function departmenthead():BelongsTo
    {
        return $this->belongsTo(Hodappointsubject::class,'departmenthead_id','id');
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->with('faculty', 'internaltooldocumentmaster', 'subject', 'academicyear')
            ->WhereHas('faculty', function ($query) use ($search) {
                $query->where('faculty_name', 'like', "%{$search}%");
            })
            ->orWhereHas('internaltooldocumentmaster', function ($query) use ($search) {
                $query->where('doc_name', 'like', "%{$search}%");
            })
            ->orWhereHas('subject', function ($query) use ($search) {
                $query->where('subject_name', 'like', "%{$search}%");
            })
            ->orWhereHas('academicyear', function ($query) use ($search) {
                $query->where('year_name', 'like', "%{$search}%");
            });
    }
}
