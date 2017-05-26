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
        }

        return $response;
    }
}
