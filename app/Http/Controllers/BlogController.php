<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function overview(){
        return view('website.blog');
    }

    public function blogDetail(){
        return view('website.interior-blog');
    }

}
