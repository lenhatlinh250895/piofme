<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Service;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;

class ServiceController extends Controller
{
    public function getListService() {
        $service = Service::paginate(20);
        return view('System.Service.ListService', compact('service'));
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
        $id = $req->id;
        $name = $req->name;
        $level = $req->level;
        if ($req->password != "") {
            $password = bcrypt($request->password);
            User::where('id', $id)->update(['name' => $name, 'level' => $level, 'password' =>$password]);
        }
        $update_user = User::where('id', $id)->update(['name' => $name, 'level' => $level]);
        if($update_user){
            echo true;
        }else{
            echo false;
        }
    }

    public function getDeleteUser(Request $req){
        $id = $req->id;
        $delete_user = User::where('id', $id)->delete();
        if($delete_user){
            echo true;
        }else{
            echo false;
        }
    }

}
