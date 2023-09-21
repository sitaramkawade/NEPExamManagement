<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\FacultyRegisteMailNotification;

class Faculty extends Authenticatable  
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'faculty';
    protected $table="faculties";
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'email_verified_at',
        'password',
        'profile_photo_path',
        'unipune_id',
        'qualification',
        'role_id',
        'department_id',
        'college_id',
        'active',
        'last_login',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function role()
    {
     return $this->belongsTo(Role::class,'role_id','id');
    }
    public function exampanels()
    {
        return $this->hasMany(Exampanel::class,'faculty_id','id');
    }
    public function department()
    {
     return $this->belongsTo(Department::class,'department_id','id');
    }
    public function college()
    {
     return $this->belongsTo(College::class,'college_id','id');
    }

    public function facultybankaccount()
    {
        return $this->hasOne(Facultybankaccount::class,'faculty_id','id');
    }
    public function sendEmailVerificationNotification()
    {
        $this->notify(new FacultyRegisteMailNotification);
    }
}
