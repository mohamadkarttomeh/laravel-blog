<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUS;

class PagesController extends Controller
{
    //
    public function index()
    {
    	return view("home",compact('momo'));
    }
    public function about()
    {
    	$data = "";
    	return view("about",compact('data'));
    }
    public function contact()
    {
    	return view("contact");
    }
    public function dosend(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'body' => 'required|min:15'
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $body = $request->input('body');

        Mail::to("myMail@gmail.com")
        ->send( new ContactUs($name , $email , $subject , $body));
        return redirect('/contact')->with('success','I got your message and will answer you soon ');
    }

    
}