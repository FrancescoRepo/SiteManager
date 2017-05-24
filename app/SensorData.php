<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

    public function error()
    {
        return $this->belongsTo(Error::class);
    }
}
