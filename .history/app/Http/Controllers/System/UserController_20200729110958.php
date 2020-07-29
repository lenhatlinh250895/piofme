<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller
{
    public function getListUser() {
        $user = User::paginate(20);
        return view('System.User.ListUser', compact('user'));
    }

    public function postAddUser(Request $request) {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password'
            ]
        );
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect()->route('system.user.getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Add user sucessfully!']);
    }

    public function postAjax(Request $req) {
        $id = $req->id;
        $user = User::find($id);
        echo $user;
    }

    public function postAjaxEdit(Request $req){
        echo "succ";
    }
}
