<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CF', 'Name', 'Surname', 'Email', 'username', 'password', 'Email', 'Phone', 'usertype_id', 'client_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function usertype()
    {
        return $this->belongsTo(UserType::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function sites()
    {
        return $this->belongsToMany(Site::class);
    }
}
