<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('POST')){
            $request->validate([
                'email'     => 'required',
                'password'  => 'required',
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect('users')->withSuccess('Signed in');
            }
        }
        return view('login');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
