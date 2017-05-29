<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['users'] = \App\User::all();
        $data['sensors'] = \App\Sensor::all();
        $data['sites'] = \App\Site::all();
        $data['customers'] = \App\Client::all();
        return view('admin.index', $data);
    }

}
