<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}
