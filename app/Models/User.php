<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   // 2 way :
   /* $fillable  les column exacte à inseré , le reste à ignorer
    *  protected $fillable = [
        'name', 'email', 'password','adresse','phone_number','departement_id','designation','role_id','image','start_from'
    ];*/

    //or protected $guarded = ['firstname','lastname'];
    //$guarded  les colounm à ignorer,le reste à inseré
    protected $guarded = ['firstname','lastname'];

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
    ];
    public function departement(){
        return $this->hasOne(Departement::class,'id','departement_id');//user has one dep
    }

    public function role(){
        return $this->hasOne(Role::class,'id','role_id');//user has one role
    }

}
