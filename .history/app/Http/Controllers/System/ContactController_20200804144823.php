<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contact;

class ContactController extends Controller
{
    public function getListContact(Request $req) {
        $contact = Contact::where('status', 1)->orderBy('id', 'desc');
        if($req->id_search){
            $contact->where('id', $req->id_search);
        }
        if($req->name_search){
            $contact->where('name', 'like', '%'.$req->name_search.'%');
        }
        if($req->email_search){
            $contact->where('email', 'like', '%'.$req->email_search.'%');
        }
        if($req->question_search){
            $contact->where('question', 'like', '%'.$req->question_search.'%');
        }
        $contact = $contact->paginate(20);
        return view('System.Contact.ListContact', compact('contact'));
    }
    public function getEditContact($id) {
        $contact = Contact::find($id);
        return view('System.Contact.EditContact', compact('contact'));
    }

    public function postEditContact(Request $req){
        $id = $req->id;
        $name = $req->name;
        $email = $req->email;
        $question = $req->question;
        $update_contact = Contact::where('id', $id)->update(['name' => $name, 'email' => $email ,'question' => $question]);
        if($update_contact){
           return redirect()->route('system.contact.getListContact')->with(['flash_level' => 'success', 'flash_message' => 'Edit contact successfully!']);
        }else{
            return ridirect()->back()->with(['flash_level' => 'error', 'flash_message' => 'Edit contact error!']);
        }
    }

    public function getDeleteContact(Request $req){
        $id = $req->id;
        $delete_contact = Contact::where('id', $id)->update(['status' => 0]);
        if($delete_contact){
            echo true;
        }else{
            echo false;
        }
    }

}