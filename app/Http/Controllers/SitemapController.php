<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Review;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class SitemapController extends Controller
{

    public function sitemap(){
        //get all veterinaires
        $veterinaires = Veterinarian::get();
        //get all blogs
        $blogs = Blog::where('status', 'active')->get();
        //get all pages
        $pages = Page::Active()->get();

        return response()->view('sitemap.all', [
             'veterinaires' => $veterinaires,
             'blogs' => $blogs,
             'pages' => $pages
        ])->header('Content-Type', 'text/xml');
    }
}
