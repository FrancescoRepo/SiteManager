<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public function address() 
    {
        return $this->belongsTo(Address::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function sensors()
    {
        return $this->hasMany(Sensor::class);
    }
}
