<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use App\Services\ContentService;
use App\Services\GeoapifyService;


class SiteController extends Controller
{
   
    /*
    *   HERE we are going to put the seo site controller
    *
    */
    public function homePage(){
        $page = Page::getCustomPage('home');
        $seo = $page?->seo;

        if (empty($page)){
            abort(404);
        }

        
        $headerBlock = Page::getBlockInfo($page->blocks, 'Header_big');
        $intro = Page::getBlockInfo($page->blocks, 'intro');
        $insurances = Page::getBlockInfo($page->blocks, 'insurances');
        $information_steps = Page::getBlockInfo($page->blocks, 'information_steps');
        $partners = Page::getBlockInfo($page->blocks, 'partners');
        $seoBlock = Page::getBlockInfo($page->blocks, 'seo_block');
        return view('seosite.index', ['page' => $page, 'seo' => $seo, 'seoBlock' => $seoBlock , 'headerBlock' => $headerBlock, 'intro' => $intro, 'insurances' => $insurances, 'information_steps' => $information_steps, 'partners' => $partners]);
    }

    public function seoPages($slug){
        $page = Page::getCustomPage($slug);
        $seo = $page?->seo;

        if (empty($page)){
            abort(404);
        }

        $blocks = $page->blocks ?? [];

        return view('seosite.page', ['page' => $page, 'seo' => $seo, 'blocks' => $blocks]);
    }

    public function seoBlog(){
        $page = Page::getCustomPage('blogs');
        $seo = $page?->seo;
        if (empty($page)){
            abort(404);
        }

        $headerBlock = Page::getBlockInfo($page->blocks, 'header_blog');
        $blogs = Blog::getLatestBlogs();
        return view('seosite.blog', ['page' => $page, 'seo' => $seo, 'blogs' => $blogs, 'headerBlock' => $headerBlock]);
    }

    public function seoBlogDetail($slug, $id){
      
       
        $blog = Blog::where('id', $id)
            ->where('status', 'active')
            ->firstOrFail();
        
           
        $page = Page::getCustomPage('blog-detail');

        $seo = $blog?->seo;

        if (empty($page) OR $slug !== slugify($blog->name)){
            abort(404);
        }

        $headerBlock = Page::getBlockInfo($page->blocks, 'header_blog_detail');
        $blogs = Blog::get3LatestBlogs(6);
        return view('seosite.blog-detail', ['page' => $page, 'seo' => $seo, 'blogs' => $blogs , 'blog' => $blog  ,'headerBlock' => $headerBlock]);
    }

    public function seoAboutUs(){
        $page = Page::getCustomPage('about');
        $seo = $page?->seo;

        if (empty($page)){
            abort(404);
        }

        $headerBlock = Page::getBlockInfo($page->blocks, 'header_over_ons');
        $intro = Page::getBlockInfo($page->blocks, 'intro_over_ons');
        $intro2 = Page::getBlockInfo($page->blocks, 'intro_over_ons_block_2');
        $information_steps = Page::getBlockInfo($page->blocks, 'information_steps_over_ons');
        $partners = Page::getBlockInfo($page->blocks, 'partners');

        return view('seosite.about', ['page' => $page, 'seo' => $seo, 'headerBlock' => $headerBlock, 'intro' => $intro, 'intro2' => $intro2, 'information_steps' => $information_steps, 'partners' => $partners]);
    }

    public function seoContact(){

    }


 
}
