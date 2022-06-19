<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render('Auth/Login');
    }
    public function authAction(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $credentials = [
            'username'=>$request->username,
            'password'=>$request->password
        ];

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return Redirect::intended('/');
        }
            return back()->withErrors(['errorLogin'=>'Invalid Username Atau Password']);
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }
}
