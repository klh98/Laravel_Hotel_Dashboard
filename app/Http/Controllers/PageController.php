<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// use Mail;

class PageController extends Controller
{
    public function contact_us()
    {
        return view('user.contact_us');
    }

    public function save_contactus(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'msg' => 'required',
        ]);

        $data= array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->mgs,
        );

        Mail::send('mail', $data, function($message){
            $message->to('aung@gmail.com', 'Novotel Hotel')->subject('Contact Us Mail');
            $message->from('minkogye@gmail.com', 'Admin');
        });

        return redirect('/contact_us')->with('message', 'Mail has been sent');

    }
}
