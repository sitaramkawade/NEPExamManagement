<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\FacultyRegisteMailNotification;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Notifications\Faculty\FacultyResetPasswordNotification;

class Faculty extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // public function sendPasswordResetNotification()
    // {
    //     $this->notify(new FacultyResetPasswordNotification);
    // }

    protected $dates=['deleted_at'];
    protected $guard = 'faculty';
    protected $table="faculties";
    protected $fillable = [
        'prefix',
        'faculty_name',
        'email',
        'date_of_birth',
        'gender',
        'category',
        'mobile_no',
        'current_address',
        'permanant_address',
        'pan',
        'active',
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
        // 'faculty_verified',
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
    public function role(): BelongsTo
    {
     return $this->belongsTo(Role::class,'role_id','id');
    }
    public function exampanels()
    {
        return $this->hasMany(Exampanel::class,'faculty_id','id');
    }
    public function department(): BelongsTo
    {
     return $this->belongsTo(Department::class,'department_id','id');
    }
    public function college(): BelongsTo
    {
     return $this->belongsTo(College::class,'college_id','id');
    }

    public function facultybankaccount()
    {
        return $this->hasOne(Facultybankaccount::class,'faculty_id','id')->withTrashed();
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new FacultyRegisteMailNotification);
    }
    // public function facultyhead()
    // {
    //     return $this->hasMany(Facultyhead::class,'faculty_id','id');
    // }
    public function departments(): BelongsToMany
    {
        // return $this->belongsToMany(Department::class, Facultyhead::class,
        // 'faculty_id', 'department_id','id');
        return $this->belongsToMany(Department::class,'facultyheads','faculty_id', 'department_id','id')
        ->withPivot('status','department_id')
        ->wherePivot('status','1');

    }
    public function getdepartment($deptid)
    {
        return Department::where('id',$deptid)->first()->dept_name;
    }


}
