<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardControlller extends Controller
{
    public function getIndex()
	{
		return view('System.Dashbroad.Index');
	}
}
