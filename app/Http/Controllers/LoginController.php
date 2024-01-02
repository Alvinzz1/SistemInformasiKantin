<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt($credentials))
            return redirect('/dashboard/admin');
        elseif(Auth::guard('user')->attempt($credentials)){
            // return redirect('/sidebar');
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/product');
        }

        return back()->with('loginError', 'Login Failed! email atau password salah!');



        // if (Auth::guard('admin')->attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/dashboard');
        // }
       
        return back()->with('loginError', 'Login Failed! email atau password salah!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
