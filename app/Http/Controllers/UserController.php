<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function setting()
    {
        return view('account.account');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
