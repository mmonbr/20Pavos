<?php

namespace App;

use App\Events\UserSubscribed;
use App\Events\UserUnsubscribed;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Sofa\Eloquence\Eloquence;

class User extends Authenticatable
{
use Notifiable;
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
        'password',
        'email',
        'is_subscribed',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return bool
     */
    public function isSubscribed()
    {
        return !!$this->is_subscribed;
    }

    public function subscribe()
    {
        $this->is_subscribed = true;
        $this->save();

        event(new UserSubscribed($this));
    }

    public function unsubscribe()
    {
        $this->is_subscribed = false;
        $this->save();

        event(new UserUnsubscribed($this));
    }

    public function updateCredentials($data)
    {
        $this->update([
            'username' => $data['username'],
            'email'    => $data['email'],
        ]);

        if (isset($data['is_subscribed'])) {
            $this->subscribe();
        } else {
            $this->unsubscribe();
        }

        if (isset($data['password']) && !empty($data['password'])) {
            $this->updatePassword($data['password']);
        }

        return $this;
    }

    protected function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    protected function updatePassword($password)
    {
        $this->password = $password;
        $this->save();
    }
}
