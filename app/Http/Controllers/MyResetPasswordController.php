<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyResetPasswordController extends Controller
{

    public function updatePassword(Request $request){
        $prova = Auth::user();
        $user = User::find($prova->id);
        $cryptpassword= Hash::make($request->password);
        $request->merge(array('password'=> $cryptpassword , 'FirstLogin' => 0));
        $user->update($request->all());
        if ($user->usertype_id == 1) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('welcome');
        }
    }
}
