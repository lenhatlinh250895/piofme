<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Service;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;

class ProductController extends Controller
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

    public function postEditService(Request $req){
        $this->validate(
            $req,
            [
                'title' => 'required|min:3',
                'introduce' => 'required',
                'alt_image' => 'required'
            ]
        );
        $id = $req->id;
        $title = $req->title;
        $slug = changeTitle($req->title);
        $image = $req->image;
        $alt = $req->alt_image;
        $introduce = $req->introduce;
        $update_service = Service::where('id', $id)->update(['title' => $title, 'slug' => $slug, 'image' => $image, 'alt' => $alt, 'introduce' => $introduce,]);
        if($update_service){
           return redirect()->route('system.service.getListService')->with(['flash_level' => 'success', 'flash_message' => 'Edit service successfully!']);
        }else{
            return ridirect()->back()->with(['flash_level' => 'error', 'flash_message' => 'Edit service error!']);
        }
    }

    public function getDeleteService(Request $req){
        $id = $req->id;
        $delete_service = Service::where('id', $id)->update(['status' => 0]);
        if($delete_service){
            echo true;
        }else{
            echo false;
        }
    }

}
