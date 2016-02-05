<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Sofa\Eloquence\Eloquence;

class User extends Authenticatable
{
    use Eloquence;

    protected $searchableColumns = [
        'username',
        'email',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'provider',
        'provider_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
