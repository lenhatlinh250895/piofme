<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Quote;

class QuoteController extends Controller
{
    public function getListQuote(Request $req) {
        $quote = Quote::where('status', 1)->orderBy('id', 'desc');
        if($req->id_search){
            $quote->where('id', $req->id_search);
        }
        if($req->name_search){
            $quote->where('name', 'like', '%'.$req->name_search.'%');
        }
        if($req->price_min_search && !$req->price_max_search){
            $quote->where('price', '>=', $req->price_min_search);
        }
        if(!$req->price_min_search && $req->price_max_search){
            $quote->where('price', '<=', $req->price_min_search);
        }
        if($req->price_min_search && $req->price_max_search){
            $quote->whereBetween('price', [$req->price_min_search, $req->price_max_search]);
        }
        $quote = $quote->paginate(20);
        return view('System.Quote.ListQuote', compact('quote'));
    }

    public function postAddQuote(Request $req) {
        $this->validate(
            $req,
            [
                'name' => 'required',
                'price' => 'required',
            ]
        );
        $quote = new Quote;
        $quote->name = $req->name;
        $quote->price = $req->price;
        $quote->save();
        return redirect()->route('system.quote.getListQuote')->with(['flash_level' => 'success', 'flash_message' => 'Add quote sucessfully!']);
    }

    public function getEditQuote($id) {
        $quote = Quote::find($id);
        return view('System.Quote.EditQuote', compact('quote'));
    }

    public function postEditQuote(Request $req){
        $this->validate(
            $req,
            [
                'name' => 'required',
                'price' => 'required',
            ]
        );
        $id = $req->id;
        $name = $req->name;
        $price = $req->price;
        $update_quote = Quote::where('id', $id)->update(['name' => $name, 'price' => $price]);
        if($update_quote){
           return redirect()->route('system.quote.getListQuote')->with(['flash_level' => 'success', 'flash_message' => 'Edit quote successfully!']);
        }else{
            return ridirect()->back()->with(['flash_level' => 'error', 'flash_message' => 'Edit quote error!']);
        }
    }

    public function getDeleteQuote(Request $req){
        $id = $req->id;
        $delete_quote = Quote::where('id', $id)->update(['status' => 0]);
        if($delete_quote){
            echo true;
        }else{
            echo false;
        }
    }

}