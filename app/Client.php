<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
