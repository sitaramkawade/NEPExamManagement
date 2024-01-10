<?php

namespace App\Models;

use App\Models\User;
use App\Models\Student;
use App\Models\Studenthelplinequery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Studenthelplineuploadeddocument;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Studenthelpline extends Model
{
    use HasFactory , SoftDeletes;
    protected $table= 'student_helplines';
    protected $dates = ['deleted_at'];
    protected $fillable=[
        'student_id',
        'student_helpline_query_id',
        'status',
        'old_query',
        'new_query',
        'description',
        'remark',
        'approve_by',
        'verified_by',
    ];


    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function studenthelplinequery(): BelongsTo
    {
        return $this->belongsTo(Studenthelplinequery::class, 'student_helpline_query_id', 'id');
    }

    public function studenthelplineuploadeddocuments(): HasMany
    {
        return $this->hasMany(Studenthelplineuploadeddocument::class, 'student_helpline_id', 'id');
    }

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->with('student','studenthelplinequery')->where(function ($subquery) use ($search) {
            $subquery->where('remark', 'like', "%{$search}%")
            ->orWhere('remark', 'like', "%{$search}%")
            ->orWhere('verified_by', 'like', "%{$search}%")
            ->orWhere('new_query', 'like', "%{$search}%")
            ->orWhereHas('student', function ($subQuery) use ($search) {
                    $subQuery->where('student_name', 'like', "%{$search}%");
                }
            )
            ->orWhereHas('studenthelplinequery', function ($subQuery) use ($search) {
                    $subQuery->where('query_name', 'like', "%{$search}%");
                }
            );
        });
    }

    public function approved(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approve_by', 'id');
    }

    public function verified(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by', 'id');
    }
}
