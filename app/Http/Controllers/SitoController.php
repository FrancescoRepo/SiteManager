<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sito;
use Illuminate\Support\Facades\DB;

class SitoController extends Controller
{
    public function index()
    {
        $sites = Sito::all();
        return view('siti.index', ['siti' => $sites]);
    }
}
