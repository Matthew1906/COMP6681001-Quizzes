<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('pages.contact');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);
        $contact_message = new ContactMessage(
            [
                'name'=>$req->name,
                'email'=>$req->email,
                'subject'=>$req->subject,
                'message'=>$req->message
            ]
        );
        $contact_message->status = 0;
        $contact_message->save();
        return back()->with('success', 'Message has been sent to admin!');
    }
}
