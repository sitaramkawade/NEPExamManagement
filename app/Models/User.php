<?php

namespace App\Models;

use App\Models\Role;
use App\Models\College;
use App\Models\Department;
use App\Models\Studenthelpline;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\User\UserRegisterMailNotification;
use App\Notifications\User\UserResetPasswordNotification;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new UserRegisterMailNotification);
    }


    protected $guard="user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_contact_no',
        'college_id',
        'department_id',
        'is_active',
        'role_id',
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

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class,'college_id','id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class,'college_id','id');
    }
    
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function scopeSearch(Builder $query,string $search)
    {
        return $query->where('name', 'like', "%{$search}%")
        ->orWhere('email', 'like', "%{$search}%");
       
    }



    // public function studenthelplines(): HasMany
    // {
    //     return $this->hasMany(Studenthelpline::class, 'approve_by', 'id');
    // }

}
