<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectBucketTypeMaster extends Model
{
    use HasFactory;
    protected $table='subjectbuckettypemaster';
    protected $fillable=[
    'buckettype_name',
    ];
}
