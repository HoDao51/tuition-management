<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }
    public function postLogin(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            //login thanh cong
            $request->session()->regenerate();

            return redirect::route('admins.index');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác!',
            'password' => 'Email hoặc mật khẩu không chính xác!',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
