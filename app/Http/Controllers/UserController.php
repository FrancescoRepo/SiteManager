<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
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
        $rules = array(
            'CF' => 'regex:^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z][0-9]{3}[A-Z]$^',
            'Name' => 'regex:^[a-zA-Z]+$^',
            'Surname' => 'regex:^[a-zA-Z]+$^',
            'Phone' => 'regex:^[0-9]{9,10}$^'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect(route('account'))->withErrors($validator);
        } else {
            $cryptPassword = Hash::make($request->newpassword);
            $request->merge(array('password' => $cryptPassword));
            $user->update($request->all());
            return redirect(route('account', compact('user')));
        }
    }

}
