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

    public function postEditMenu(Request $request)
    {
        Menu::truncate();
        $data_json_menu = $request->input('data_json_menu');
        $menu = json_decode($data_json_menu);
        foreach($menu as $item)
        {
            $menu_insert = new Menu;
            $menu_insert->name = $item->name;
            $menu_insert->service_id = $item->service_id;
            $menu_insert->product_id = $item->product_id;
            $menu_insert->save();
            if(isset($item->children))
            {
                foreach($item->children as $child)
                {
                    $menu_child_insert = new Menu;
                    $menu_child_insert->name = $child->name;
                    $menu_child_insert->service_id = $child->service_id;
                    $menu_child_insert->product_id = $child->product_id;
                    $menu_child_insert->menu_id = $menu_insert->id;
                    $menu_child_insert->save();
                }
            }
        }
        echo 'Cập nhật thành công!';
    }
}
