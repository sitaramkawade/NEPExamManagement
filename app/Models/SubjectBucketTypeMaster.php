<?php

namespace App\Models;

use App\Models\Subjectcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectBucketTypeMaster extends Model
{
    use HasFactory;
    protected $table='subjectbuckettypemaster';
    protected $fillable=[
    'buckettype_name',
    ];

    public function subjectcategories()
    {
        return $this->hasMany(Subjectcategory::class, 'subjectbuckettype_id','id');
    }
}
