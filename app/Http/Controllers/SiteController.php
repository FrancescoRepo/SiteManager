<?php

namespace App\Http\Controllers;

use App\Address;
use App\Site;
use Illuminate\Http\Request;
use Tests\Feature\TestClass;
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
            'Province' => 'regex:^[A-Z]{2}$^',
            'City' => 'regex:^[a-zA-Z]$^',
            'ZipCode' => 'regex:^[0-9]{5}$^',
            'StreetNumber' => 'regex:^[0-9]$^'
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

            if(Address::where('Street', '=', $request->Street)->exists() && Address::where('StreetNumber', '=', $request->StreetNumber)->exists()) {
                $errors = array(
                    'Address' => "Attenzione: L'indirizzo è già utilizzato"
                );

                return redirect('/site/showAdd')->withErrors($errors);
            } else {
                $address->save();
                $site->address_id = $address->id;
                $site->save();

                $user->sites()->attach($site->id);

                return redirect(route('sites'));
            }
        }
    }

    public function edit(Request $request)
    {
        $site = Site::find($request->id);
        $address = Address::find($request->AddressID);

        $address->Street = $request->Street;
        $address->StreetNumber = $request->StreetNumber;
        $address->ZipCode = $request->ZipCode;

        $address->save();
        $site->Name = $request->Name;
        $site->Description = $request->Description;
        $site->save();

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