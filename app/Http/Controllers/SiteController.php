<?php

namespace App\Http\Controllers;

use App\Address;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        return view('site.index', compact('sites', 'user'));
    }

    public function showAdd()
    {
        return view('site.insert');
    }

    public function create(Request $request)
    {
        $rules = array(
            'ZipCode' => 'string|min:5|max:5'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect(route('showAddSite'))->withErrors($validator);
        } else {
            $user = Auth::user();

            $site = new Site();
            $site->Name = $request->Name;
            $site->Description = $request->Description;

            $address = new Address();
            $address->Country = $request->Country;
            $address->Province = $request->Province;
            $address->City = $request->City;
            $address->Street = $request->Street;
            $address->StreetNumber = $request->StreetNumber;
            $address->ZipCode = $request->ZipCode;

            $address->save();

            $site->address_id = $address->id;
            $site->save();

            $user->sites()->attach($site->id);
            return redirect(route('sites'));
        }
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