<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function setting()
    {
        $user = new User();
        $client = Client::find(1);

        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'email' => ''
        ]);
    }
}
