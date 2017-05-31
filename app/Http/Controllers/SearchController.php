<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function search(Request $request)
    {
        $text = $request->text;
        $filter = $request->filter;
        $user = Auth::user();

        if($filter == "Sito") {
            $items = $user->sites->where('Name', '=', $text);
            $sites = array();

            foreach($items as $site) {
                $sites[] = $site;
            }

            $response = array(
                'success' => true,
                'data' => $sites
            );

        } else if($filter == "Sensore") {
            $sites = $user->sites;
            $sensors = array();

            foreach($sites as $site ) {
                array_push($sensors, $site->sensors->where('Model', '=', $text));
            }

            $response = array(
                'success' => true,
                'data' => array_collapse($sensors)
            );
        } else {
            $client = $user->client;
            $items = $client->users->where('Name', '=', $text);
            $users = array();

            if(count($items) == 0) {
                $items = $client->users->where('Surname', '=', $text);
            }

            foreach($items as $user) {
                $users[] = $user;
            }

            $response = array(
                'success' => true,
                'data' => $users
            );
        }

        return $response;
    }
}
