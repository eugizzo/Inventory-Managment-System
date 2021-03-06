<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var string[]
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'phoneNumber',
        'role',
        'dob',
        'status',
        'gender',
    ];

    public function stockOut()
    {
        return $this->hasMany('App\Models\StockOut');
    }
    public function stockIn()
    {
        return $this->hasMany('App\Models\StockIn');
    }
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function branch()
    {
        return $this->hasOne('App\Models\Branch');
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
