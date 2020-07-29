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
        $id = $req->id;
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
            ],
        );
        $name = $request->name;
        $level = $request->level;
        if ($request->password != "") {
            $this->validate(
                $request,
                [
                    'password' => 'required|min:3|max:32',
                    'passwordAgain' => 'required|same:password'
                ],
                [
                    'password.required' => 'Bạn chưa nhập mật khẩu',
                    'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
                    'password.max' => 'Mật khẩu tối đa 32 ký tự',
                    'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
                ]
            );
            $password = bcrypt($request->password);
            UserModel::where('id', $request->id)->update(['name' => $name, 'level' => $level, 'password' =>$password]);
        }
        UserModel::where('id', $request->id)->update(['name' => $name, 'level' => $level]);
        return redirect('system/admin/user/edit/' . $request->locale . '/' . $request->id)->with('thongbao', 'Bạn đã sửa thành công');
    }
}
