<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function getIndex(){
		$getData = DB::table('user')->get();
		return view('System.Dashboard.Index', compact('getData'));
	}
}