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

    public function postAddService(Request $req) {
        $this->validate(
            $req,
            [
                'title' => 'required|min:3',
                'introduce' => 'required',
            ]
        );
        $service = new Service;
        $service->title = $req->title;
        $service->slug = changeTitle($req->title);
        $service->image = $req->image;
        $service->alt = $req->alt_image;
        $service->introduce = $req->introduce;
        $service->save();
        return redirect()->route('System.Service.ListService')->with(['flash_level' => 'success', 'flash_message' => 'Add service sucessfully!']);
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
