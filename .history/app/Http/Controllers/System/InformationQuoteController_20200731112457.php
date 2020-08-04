<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\InformationQuote;
use App\Model\Quote;

class InformationQuoteController extends Controller
{
    public function getListInformationQuote () {
        $information_quote = InformationQuote::where('status', 1)->orderBy('id', 'desc')->paginate(20);
        return view('System.InformationQuote.ListInformationQuote', compact('information_quote'));
    }

    public function getEditInformationQuote($id) {
        $quote = Quote::where('status', 1)->get();
        $information_quote = InformationQuote::find($id);
        return view('System.InformationQuote.EditInformationQuote', compact('information_quote', 'quote'));
    }

    public function postEditInformationQuote(Request $req){
        $this->validate(
            $req,
            [
                'name' => 'required|min:3',
                'phone_number' => 'required',
                'email' => 'required',
            ]
        );
        $id = $req->id;
        $name = $req->name;
        $phone_number = $req->phone_number;
        $email = $req->email;
        $quote = $req->quote;
        $update_information_quote = InformationQuote::where('id', $id)->update(['name' => $name, 'phone_number' => $phone_number, 'email' => $email, 'quote_id' => $quote]);
        if($update_information_quote){
           return redirect()->route('system.information_quote.getListInformationQuote')->with(['flash_level' => 'success', 'flash_message' => 'Edit information quote successfully!']);
        }else{
            return ridirect()->back()->with(['flash_level' => 'error', 'flash_message' => 'Edit information quote error!']);
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
