<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller
{
    public function getListUser()
    {
        $user = User::paginate(20);
        return view('System.User.ListUser', compact('user'));
    }
}
