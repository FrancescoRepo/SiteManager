<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'Model', 'Latitude', 'Longitude', 'MaxValue', 'MinValue'
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function type()
    {
        return $this->belongsTo(SensorType::class);
    }

    public function brand()
    {
        return $this->belongsTo(SensorBrand::class);
    }

    public function sensorData()
    {
        return $this->hasMany(SensorData::class);
    }
}
