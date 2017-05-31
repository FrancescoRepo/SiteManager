<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users(){
        $data['users'] = \App\User::all();
        $data['customers'] = \App\Client::all();
        return view ('admin.usersadmin', $data);
    }

    public function client(){
        $data['customers'] = \App\Client::all();
        return view ('admin.clientsadmin', $data);
    }

    public function sites(){
        $data['sites'] = \App\Site::all();
        $data['customers'] = \App\Client::all();
        return view ('admin.sitesadmin', $data);
    }

    public function sensors(){
        $data['sites'] = \App\Site::all();
        $data['sensors'] = \App\Sensor::all();
        return view ('admin.sensoradmin', $data);
    }
}
