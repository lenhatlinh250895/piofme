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
        MenuItemModel::truncate();
        $data_json_menu = $request->input('data_json_menu');
        $menu = json_decode($data_json_menu);
        foreach($menu as $item)
        {
            if($item->id != '')
            {
                $menu_insert = new MenuItemModel;
                // $menu_insert->id = $item->id;
                $menu_insert->name = $item->name;
                $menu_insert->name_en = $item->name_en;
                if($item->category_id != 0)
                {
                    $menu_insert->category_id = $item->category_id;
                }
                if($item->news_id != 0)
                {
                    $menu_insert->news_id = $item->news_id;
                }
                $menu_insert->save();
                if(isset($item->children))
                {
                    foreach($item->children as $child)
                    {
                        $menu_child_insert = new MenuItemModel;
                        // $menu_child_insert->id = $child->id;
                        $menu_child_insert->name = $child->name;
                        if($child->category_id != 0)
                        {
                            $menu_child_insert->category_id = $child->category_id;
                        }
                        if($child->news_id != 0)
                        {
                            $menu_child_insert->news_id = $child->news_id;
                        }
                        $menu_child_insert->menu_id = $menu_insert->id;
                        $menu_child_insert->save();
                    }
                }
            }
        }
        echo 'Cập nhật thành công!';
    }
}
