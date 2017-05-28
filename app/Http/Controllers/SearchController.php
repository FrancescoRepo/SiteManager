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
            $sites = $user->sites->where('Name', '=', $text);
            if(!empty($sites)) {
                $response = array(
                    'success' => true,
                    'data' => $sites
                );
            } else {
                return Response::json(['error' => 'Error msg'], 404);
            }

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
            $users = $client->users->where('Surname', '=', $text);
            
            if(count($users) == 0)
            {
                $users = $client->users->where('Name', '=', $text);
            }
            $response = array(
                'success' => true,
                'data' => $users
            );
        }

        return $response;
    }
}
