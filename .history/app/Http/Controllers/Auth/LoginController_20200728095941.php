<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function getLogin()
    {
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
            return redirect()->route('Dashbroad.getIndex');
        } else {
            return redirect()->back()->with(['flash_level' => 'error', 'flash_message' => 'Email or Password incorrect']);
        }
    }
}
