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
    public function getListService(Request $req) {
        $service = Service::where('status', 1)->orderBy('id', 'desc');
        dd($req->id);
        if($req->id){
            $service->where('id', $req->id);
        }
        $service->paginate(20);
        return view('System.Service.ListService', compact('service'));
    }

    public function postAddService(Request $req) {
        $this->validate(
            $req,
            [
                'title' => 'required|unique:service|min:3',
                'introduce' => 'required',
                'alt_image' => 'required'
            ]
        );
        $service = new Service;
        $service->title = $req->title;
        $service->slug = changeTitle($req->title);
        $service->image = $req->image;
        $service->alt = $req->alt_image;
        $service->introduce = $req->introduce;
        $service->save();
        return redirect()->route('system.service.getListService')->with(['flash_level' => 'success', 'flash_message' => 'Add service sucessfully!']);
    }

    public function getEditService($id) {
        $service = Service::find($id);
        return view('System.Service.EditService', compact('service'));
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
