<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SensorController extends Controller
{
    public function index($id)
    {
        $site = Site::find($id);
        $user = Auth::user();
        $sensors = $site->sensors;
        return view('sensor.index', compact('sensors', 'user'));
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
