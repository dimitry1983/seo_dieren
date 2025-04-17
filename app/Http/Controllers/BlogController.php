<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function overview(){

        $page = Page::getCustomPage('home');
        $insurances = Page::getBlockInfo($page->blocks, 'insurances');
        $blogs = Blog::getLatestBlogs();
        return view('website.blog', ['insurances' => $insurances, 'blogs' => $blogs]);
    }

    public function blogDetail($slug, $id){

        $blog = Blog::where('id', $id)
            ->where('status', 'active')
            ->firstOrFail();

        $seo = $blog?->seo;   
        // Compare the current slug with the slugified blog name
        if ($slug !== slugify($blog->name)) {
            abort(404);
        }

        $blogs = Blog::get3LatestBlogs(6);

        return view('website.interior-blog', ['blog' => $blog, 'seo' => $seo , 'blogs' => $blogs]);
    }

}
