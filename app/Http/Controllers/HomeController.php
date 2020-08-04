<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Validator;
class HomeController extends Controller
{
	public function getIndex(){
		return view('Home.Index');
	}
	
	public function getSolution(){
		return view('Home.Solution');
	}
	
	public function getProduct(){
		return view('Home.Product');
	}
	public function postIndex(Request $req){
		$this->validate($req,[
			'Email' => 'required',
			'Phone' => 'required|numeric',
		],[
			'Email.required' => 'Vui lòng nhập lại tên của bạn!!!',
			'Phone.required' => 'Vui lòng nhập số điện thoại của bạn!!!',
			'Phone.numeric' => 'Số điện thoại không hợp lệ!!!'
		]);
		$add = [
			'Name' => $req->Email,
			'SDT' => $req->Phone,
		];
		DB::table('user')->insert($add);
		return redirect()->back()->with(['flash_level'=>'success', 'flash_message'=>'Gửi thành công!!!']);
		
	}
}