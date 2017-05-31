<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;

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
            'Email' => 'email',
            'Phone' => 'string|min:10|max:10'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect(route('account'))->withErrors($validator);
        } else {
            $user->update($request->all());
            return redirect(route('account', compact('user')));
        }
    }

}
