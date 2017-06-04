<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'PI', 'BusinessName'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
