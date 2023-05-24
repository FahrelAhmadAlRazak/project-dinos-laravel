<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $var_nama= "Fahrel Ahmad Al Razak";
        return view('landing-page',compact('var_nama'));
    }
}
