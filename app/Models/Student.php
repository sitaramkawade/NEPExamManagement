<?php

namespace App\Models;
use App\Models\Patternclass;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Notifications\StudentRegisteMailNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\Student\StudentResetPasswordNotification;

class Student extends  Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPasswordNotification($token));
    }

    protected $guard="student";
    protected $broker = 'students';
    protected $fillable = [
        'student_name',
        'email',
        'password',
        'last_login',
        'prn',
        'memid',
        'eligibilityno',
        'abcid',
       'aadhar_card_no',
        'mother_name',
        'mobile_no',
     
        'email_verified_at',
        'mobile_no_verified_at',
  
        'patternclass_id',
        'department_id',
        'total_steps',
        'current_step',
        'is_profile_complete',
        'college_id',
        'status',
        

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
    public function sendEmailVerificationNotification()
    {
        $this->notify(new StudentRegisteMailNotification);
    }
    public function studentprofile(): HasOne
    {
        return $this->hasOne(Studentprofile::class, 'student_id', 'id');
    }
    public function studentaddress(): HasMany
    {
        return $this->HasMany(Studentaddress::class, 'student_id', 'id');
    }
    public function educationalcourses(): HasMany
    {
        return $this->HasMany(Studentpreviousexam::class, 'student_id', 'id');
    }

    // public function country() 
    // {
    //     return $this->hasOne(Studentaddress::class, 'student_id', 'id');
    //     // $users = DB::table('studentaddresses')
    //     // ->select(['student_id','talukas.id','talukas.district_id','districts.state_id','countries.id'])
    //     // ->Join('talukas', 'talukas.id', '=', 'studentaddresses.p_taluka_id')
    //     // ->Join('districts','talukas.district_id','=','districts.id')
    //     // ->Join('states','districts.state_id','=','states.id')
    //     // ->Join('countries','states.country_id','=','countries.id')->get();
    //     // return $users;
         
       
    // }
}

