<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $sites = $user->sites;
        return view('site.index', array('sites' => $sites));
    }

    public function edit(Request $request)
    {
        $site = Site::find($request->id);
        $site->update($request->all());

        $response = array(
            'success' => true,
            'data' => $site
        );

        return $response;
    }


    public function delete(Request $request)
    {
        Site::destroy($request->id);

        $response = array('success' => true);
        return $response;
    }
}