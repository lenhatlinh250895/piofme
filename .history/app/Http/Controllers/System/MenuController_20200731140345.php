<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Menu;
use App\Model\News;
use App\Model\Service;
use App\Model\Product;

class MenuController extends Controller
{
    public function getListMenu(Request $req)
    {
        $menu = Menu::where('status', 1)->get();
        $service = Service::where('status', 1)->get();
        $product = Product::where('status', 1)->get();
        return view('System.Menu.ListMenu', compact('menu', 'service', 'product'));
    }
}
