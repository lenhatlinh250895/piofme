<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;

class NewsController extends Controller
{
    public function getListNews () {
        $news = News::where('status', 1)->orderBy('id', 'desc');
        if($req->id){
            $news->where('id', $req->id);
        }
        $news->paginate(20);
        return view('System.News.ListNews', compact('news'));
    }

    public function postAddNews(Request $req) {
        $this->validate(
            $req,
            [
                'name' => 'required|min:3',
                'content' => 'required',
                'alt_image' => 'required',
                'summary_content' => 'required',
            ]
        );
        $news = new News;
        $news->name = $req->name;
        $news->slug = changeTitle($req->name);
        $news->image = $req->image;
        $news->alt = $req->alt_image;
        $news->content = $req->content;
        $news->summary_content = $req->summary_content;
        $news->save();
        return redirect()->route('system.news.getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Add news sucessfully!']);
    }

    public function getEditNews($id) {
        $news = News::find($id);
        return view('System.News.EditNews', compact('news'));
    }

    public function postEditNews(Request $req){
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
        $update_news = News::where('id', $id)->update(['name' => $name, 'slug' => $slug, 'image' => $image, 'alt' => $alt, 'content' => $content, 'summary_content' => $summary_content]);
        if($update_news){
           return redirect()->route('system.news.getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Edit news successfully!']);
        }else{
            return ridirect()->back()->with(['flash_level' => 'error', 'flash_message' => 'Edit news error!']);
        }
    }

    public function getDeleteNews(Request $req){
        $id = $req->id;
        $delete_news = News::where('id', $id)->update(['status' => 0]);
        if($delete_news){
            echo true;
        }else{
            echo false;
        }
    }

}
