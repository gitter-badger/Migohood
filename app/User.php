<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    [
      'name',
      'lastname',
      'email',
      'avatar',
      'password',

      'stars',
      'recommends',
      'votes',
      'comments'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the Spaces for the User.
     */
    public function spaces()
    {
       return $this->hasMany('App\Space');
    }

    /**
     * Get the Offices for the User.
     */
    public function offices()
    {
       return $this->hasMany('App\Office');
    }


    /**
     * Get the Services for the User.
     */
    public function services()
    {
       return $this->hasMany('App\Service');
    }

}
