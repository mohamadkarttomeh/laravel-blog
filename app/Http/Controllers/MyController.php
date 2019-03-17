<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
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
    
}