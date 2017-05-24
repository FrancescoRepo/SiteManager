<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorBrand extends Model
{
    public function sensors()
    {
        return $this->hasMany(Sensor::class);
    }
}
