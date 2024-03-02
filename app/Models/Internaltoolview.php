<?php

namespace App\Models;

use App\Models\Internaltoolmaster;
use App\Models\Internaltooldocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Internaltoolview extends Model
{
    use HasFactory;
    protected $table = 'internaltoolviews';
    protected $fillable = [
        'internaltooldocument_id',
        'internaltoolmaster_id',
        'internal_tool_document_is_multiple',
        'internal_tool_document_status',
        'internal_tool_document_status',
        'internal_tool_master_id',
        'internal_tool_master_toolname',
        'internal_tool_master_course_type',
        'internal_tool_master_status',
    ];

    public function internaltooldocumentmaster(): BelongsTo
    {
        return $this->belongsTo(Internaltooldocumentmaster::class,'internaltooldocument_id','id');
    }

    public function internaltoolmaster(): BelongsTo
    {
        return $this->belongsTo(Internaltoolmaster::class,'internaltoolmaster_id','id');
    }



    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where(function ($subquery) use ($search) {
            $subquery->where('internal_tool_master_id', 'like', "%{$search}%")
            ->orWhere('toolname', 'like', "%{$search}%")
            ->orWhere('course_type', 'like', "%{$search}%")
            ->orWhere('internal_tool_document_id', 'like', "%{$search}%")
            ->orWhere('internaldoc_name', 'like', "%{$search}%")
            ->orWhere('is_multiple', 'like', "%{$search}%");
        });
    }
}
