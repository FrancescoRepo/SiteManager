<?php

namespace App\Http\Controllers;

use App\Address;
use App\Client;
use App\SensorBrand;
use App\SensorType;
use App\User;
use App\Sensor;
use App\Site;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users(){
        $users = User::all();
        $customers = Client::all();
        $usersTypes = UserType::all();
        return view ('admin.usersadmin', compact('users', 'customers', 'usersTypes'));
    }

    public function client(){
        $customers = Client::all();
        return view ('admin.clientsadmin', compact('customers'));
    }

    public function sites(){
        $sites = Site::all();
        return view ('admin.sitesadmin', compact('sites'));
    }

    public function sensors(){
        $sites = Site::all();
        $sensors = Sensor::all();
        $types = SensorType::all();
        $brands = SensorBrand::all();
        return view ('admin.sensoradmin', compact('sites', 'sensors', 'types', 'brands'));
    }

    public function notAccesible(){
        return view('error');
    }

    public function edit(Request $request, $type)
    {
        $response = array();

        if($type == "user") {
            $user = User::find($request->id);
            $cryptPassword = Hash::make($request->password);
            $request->merge(array('password' => $cryptPassword));

            $user->update($request->all());

            $response = array(
                'success' => 'true'
            );
        } else if($type == "client") {
            $client = Client::find($request->id);
            $client->update($request->all());

            $response = array(
                'success' => 'true'
            );
        } else if($type == "site") {
            $site = Site::find($request->id);
            $address = Address::find($request->AddressID);

            $address->Street = $request->Street;
            $address->Province = $request->Province;
            $address->StreetNumber = $request->StreetNumber;
            $address->save();

            $site->Name = $request->Name;
            $site->Description = $request->Description;
            $site->save();

            $response = array(
                'success' => 'true'
            );
        } else if($type == "sensor") {
            $sensor = Sensor::find($request->id);
            $sensor->update($request->all());
        }

        return $response;
    }

    public function delete(Request $request, $type)
    {
        if($type == "user") {
            User::destroy($request->id);

            $response = array(
                'success' => 'true'
            );
        } else if($type == "client") {
            Client::destroy($request->id);

            $response = array(
                'success' => 'true'
            );
        } else if($type == "site") {
            Site::destroy($request->id);

            $response = array(
                'success' => 'true'
            );
        } else if($type == "sensor") {
            Sensor::destroy($request->id);

            $response = array(
                'success' => 'true'
            );
        }
        return $response;
    }
}
