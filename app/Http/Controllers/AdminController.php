<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = \App\User::all();
        $sensors = \App\Sensor::all();
        $sites = \App\Site::all();
        return view('admin.index', ['users' => $users]);
    }
}
