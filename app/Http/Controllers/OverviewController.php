<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Review;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class OverviewController extends Controller
{

    public function map(){

        $page = Page::getCustomPage('home');
        $darkBanner = Page::getBlockInfo($page->blocks, 'dark_about_banner');
        $blogs = Blog::get3LatestBlogs();

        $page = Page::getCustomPage('overzicht');
        $seo = $page?->seo;

        $greenBanner = Page::getBlockInfo($page->blocks, 'green_usp');
        $bestVets = Veterinarian::get3BestRatedVets(4);
        $categoriesForCount = Category::withCount('veterinarians')->get();
        $getRandomReviews = Review::getRandomReviews();
        $categories = Category::getCategories();
        return view('website.map', ['blogs' => $blogs, 'seo' => $seo ,'categories' => $categories ,'darkBanner' => $darkBanner, 'bestVets' => $bestVets, 'greenBanner' => $greenBanner, 'categoriesForCount' => $categoriesForCount, 'getRandomReviews' => $getRandomReviews]);
    }
}
