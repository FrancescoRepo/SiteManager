<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;

class SettingController extends Controller
{
    public function index()
    {
        $sites = Site::all();
        return view('settings.index', compact('sites'));
    }
}
