<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard="admin";

   // @var array <int, string>

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        
    ];

  //  @var array <int, string>

    protected $hidden=[
        'password',
        'remember_token',
    ];

   // @var array<string,<string></string>

    protected $casts=[
        'email_verified_at'=>'datetime',
        'password'=>'hashed',
    ];

}
