<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverviewController extends Controller
{

    public function map(){
        return view('website.map');
    }
}
