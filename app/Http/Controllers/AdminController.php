<?php

namespace App\Http\Controllers;

use App\Client;
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
        return view ('admin.sensoradmin', compact('sites', 'sensors'));
    }

    public function notAccesible(){
        return view('error');
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        $cryptPassword = Hash::make($request->password);
        $request->merge(array('password' => $cryptPassword));

        $user->update($request->all());

        $response = array(
            'success' => 'true'
        );

        return $response;
    }
}
