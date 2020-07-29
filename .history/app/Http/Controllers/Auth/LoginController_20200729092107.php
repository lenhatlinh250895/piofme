<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {
        if(Auth::check()){
            return redirect()->route('Dashbroad.getIndex');
        }
        return view('Auth.Login');
    }

    public function postLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required',
                'password' => 'required|min:3|max:32'
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('Dashbroad.getIndex')->with(['flash_level' => 'success', 'flash_message' => 'Login successfully']);
        } else {
            return redirect()->back()->with(['flash_level' => 'error', 'flash_message' => 'Email or Password incorrect']);
        }
    }

    public function getLogout()
    {
        Auth::Logout();
        return redirect()->route('getLogin');
    }
}
