<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function getListProduct () {
        $product = Product::where('status', 1)->orderBy('id', 'desc')->paginate(20);
        $service = Service::where('status', 1)->get();
        return view('System.Product.ListProduct', compact('product', 'service'));
    }

    public function postAddProduct(Request $req) {
        $this->validate(
            $req,
            [
                'name' => 'required|min:3',
                'content' => 'required',
                'alt_image' => 'required',
                'summary_content' => 'required',
            ]
        );
        $product = new Product;
        $product->name = $req->name;
        $product->slug = changeTitle($req->name);
        $product->image = $req->image;
        $product->alt = $req->alt_image;
        $product->content = $req->content;
        $product->summary_content = $req->summary_content;
        $product->service_id = $req->service;
        $product->save();
        return redirect()->route('system.product.getListProduct')->with(['flash_level' => 'success', 'flash_message' => 'Add product sucessfully!']);
    }

    public function getEditProduct($id) {
        $product = Product::find($id);
        $service = Service::where('status', 1)->get();
        return view('System.Product.EditProduct', compact('product', 'service'));
    }

    public function postEditProduct(Request $req){
        $this->validate(
            $req,
            [
                'name' => 'required|min:3',
                'content' => 'required',
                'alt_image' => 'required',
                'summary_content' => 'required',
            ]
        );
        $id = $req->id;
        $name = $req->name;
        $slug = changeTitle($req->name);
        $image = $req->image;
        $alt = $req->alt_image;
        $content = $req->content;
        $summary_content = $req->summary_content;
        $service_id = $req->service;
        $update_product = Product::where('id', $id)->update(['name' => $name, 'slug' => $slug, 'image' => $image, 'alt' => $alt, 'content' => $content, 'summary_content' => $summary_content, 'service_id' => $service_id]);
        if($update_product){
           return redirect()->route('system.product.getListProduct')->with(['flash_level' => 'success', 'flash_message' => 'Edit product successfully!']);
        }else{
            return ridirect()->back()->with(['flash_level' => 'error', 'flash_message' => 'Edit product error!']);
        }
    }

    public function getDeleteProduct(Request $req){
        $id = $req->id;
        $delete_product = Product::where('id', $id)->update(['status' => 0]);
        if($delete_product){
            echo true;
        }else{
            echo false;
        }
    }

}
