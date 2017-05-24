<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    public function sensorData()
    {
        return $this->hasMany(SensorData::class);
    }
}
