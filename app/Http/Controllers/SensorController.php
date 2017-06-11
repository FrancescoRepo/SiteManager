<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\SensorBrand;
use App\SensorData;
use App\SensorType;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use function Sodium\add;

class SensorController extends Controller
{
    public function index($id)
    {
        $site = Site::find($id);
        $user = Auth::user();
        $sensors = $site->sensors;
        $brands = SensorBrand::all();
        $types = SensorType::all();
        $errors = SensorData::all()->where('error_id', '>', 0);
        $data = array();
        foreach($sensors as $sensor){
            $sensordatas = SensorData::all()->where('sensor_id', '=', $sensor->id)->where('error_id', '=', '');
            $sensorvalues = array();
            $sensordates = array();
            foreach($sensordatas as $sensordata){
                $sensorvalues[] = $sensordata->Value;
                $sensordates[] = $sensordata->Date;
            }
            array_push($data,['model' => $sensor->Model , 'type' => $sensor->type->Description, 'dates' => $sensordates, 'values' => $sensorvalues]);
        }
        return view('sensor.index', compact('sensors', 'user', 'id', 'brands', 'types', 'data', 'errors'));
    }

    public function showAdd($id)
    {
        $site = Site::find($id);
        $brands = SensorBrand::all();
        $types = SensorType::all();

        return view('sensor.insert', compact('site', 'brands', 'types'));
    }

    public function create(Request $request)
    {
        $sensor = new Sensor($request->all());
        $sensor->save();

        $site = Site::find($request->site_id);

        return redirect(route('sensors', $site->id));
    }

    public function edit(Request $request)
    {
        $sensor = Sensor::find($request->id);
        $sensor->update($request->all());

        $response = array(
            'success' => true,
            'data' => $sensor
        );

        return $response;
    }

    public function delete(Request $request)
    {
        Sensor::destroy($request->id);

        $response = array('success' => true);
        return $response;
    }
}
