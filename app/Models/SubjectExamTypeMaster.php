<?php

namespace App\Models;

use App\Models\Subjecttype;
use App\Models\Subjectexamtype;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectExamTypeMaster extends Model
{
    use HasFactory;
    protected $table='subjectexamtypemaster';
    protected $fillable=[
        'subjecttype_id',
        'examtype_id',
    ];

    public function subjectexamtype()
    {
        return $this->belongsTo(Subjectexamtype::class, 'examtype_id','id')->withTrashed();
    }
    // public function subjecttype()
    // {
    //     return $this->belongsTo(Subjecttype::class, 'subjecttype_id','id')->withTrashed();
    // }
}
