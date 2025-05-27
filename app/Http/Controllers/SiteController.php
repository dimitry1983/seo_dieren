<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\Page;
use App\Models\Province;
use App\Models\Review;
use App\Models\Seopage;
use App\Models\SeoReview;
use App\Models\SeoVeterinarian;
use App\Models\VegetarianOpeningTime;
use App\Models\Veterinarian;
use App\Models\VeterinarianCategory;
use App\Models\VeterinarianService;
use App\Services\ContentService;
use App\Services\GeoapifyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Services\ScraperService;

class SiteController extends Controller
{
    protected $geoapifyService;
    protected $contentService;

    public function __construct(GeoapifyService $geoapifyService, ContentService $contentService)
    {
        $this->contentService = $contentService;
        $this->geoapifyService = $geoapifyService;
    }

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

        return view('seosite.index', ['page' => $page, 'seo' => $seo]);
    }

    public function seoPages(){

    }

    public function seoBlog(){

    }

    public function seoBlogDetail(){

    }

    public function seoAboutUs(){

    }

    public function seoContact(){

    }



    public function index(Request $request)
    {      
        $page = Page::getCustomPage('home');
        $seo = $page?->seo;
       

        $headerBlock = Page::getBlockInfo($page->blocks, 'Header-big');
        $insurances = Page::getBlockInfo($page->blocks, 'insurances');
        $advantages = Page::getBlockInfo($page->blocks, 'adventages');
        $darkBanner = Page::getBlockInfo($page->blocks, 'dark_about_banner');
        $categories = Category::getCategories();
    
        $categoriesForCount = Category::ForSite()->withCount('veterinarians')->get();
       
        

        $category = intval($request->query('categorie')); // Optional query parameter
    
        if (is_int($category)) {
            $vets = SeoVeterinarian::getWithFeaturedImage($category);
        } else {
            $vets = SeoVeterinarian::getWithFeaturedImage();
        }

        $bestVets       = SeoVeterinarian::get3BestRatedVets();
        $mostViewedVets = SeoVeterinarian::get3MostViewedVets();

        $blogs = Blog::get3LatestBlogs();

        $getRandomReviews = SeoReview::getRandomReviews();
 

        return view('website.index', compact('page', 'seo', 'headerBlock', 'bestVets',  'blogs', 'getRandomReviews', 'mostViewedVets', 'categoriesForCount', 'categories', 'vets', 'insurances', 'advantages', 'darkBanner'));
    }


    //batches of 20
    // public function getMoreInformation(ScraperService $outscraper)
    // {

    //     set_time_limit(0);
    //     ini_set('max_execution_time', 0);
    
    //     // Veterinarian::where('id' , '>', 1563)->chunk(20, function ($vets) use ($outscraper) {
    //     //     foreach ($vets as $vet) {
    //     //         $city = City::find($vet->city_id)?->name ?? '';
    //     //         $query = "{$vet->name}, {$vet->street} {$vet->street_nr}, {$vet->zipcode}, {$city}, Netherlands";
    //     //         $coordinates = "{$vet->lat},{$vet->lon}";
        
    //     //         $searchResult = $outscraper->fetchCompanyInfo($query, $coordinates);
      
    //     //         if (!empty($searchResult['data'][0]['place_id'])) {
    //     //             $placeId = $searchResult['data'][0]['place_id'];
        
    //     //             // Get full details using place_id
    //     //             $details = $outscraper->fetchCompanyDetailsByPlaceId($placeId);
        
    //     //             if (!empty($details['data'][0])) {
    //     //                 $info = $details['data'][0];
    //     //                 $vet->location_link = $info['location_link'] ?? null;
    //     //                 $vet->phone = $info['phone'] ?? null;
    //     //                 $vet->website = $info['site'] ?? null;
    //     //                 $vet->description = $info['description'] ?? null;
    //     //                 $vet->rating = $info['rating'] ?? null;
    //     //                 $vet->place_id = $placeId; // Save for future use if needed
    //     //                 $vet->save();
        
    //     //                 // Save reviews
    //     //                 if (!empty($info['reviews_data'])) {
    //     //                     foreach ($info['reviews_data'] as $review) {
    //     //                                 $reviews = new Review();
    //     //                                 $reviews  -> type = 'Google';
    //     //                                 $reviews  -> name = $review['author_title'];
    //     //                                 $reviews -> description = $review['review_text'] ?? "Niet aanwezig";
    //     //                                 $reviews  -> rating = $review['review_rating'];
    //     //                                 $reviews -> city = $city;
    //     //                                 $reviews  -> veterinarian_id = $vet -> id;
    //     //                                 $reviews  -> created_at = $review['review_datetime_utc'] ?? now();
    //     //                                 $reviews  -> save();
    //     //                     }
    //     //                 }

    //     //                 // Save opening hours if available
    //     //                 if (!empty($info['work_hours'])) {
    //     //                     foreach ($info['work_hours'] as $day => $hours) {
    //     //                         $vet->openingTimes()->create([
    //     //                             'day_of_week' => $day,
    //     //                             'open_time' => $hours['open_time'] ?? null,
    //     //                             'close_time' => $hours['close_time'] ?? null,
    //     //                             'is_closed' => $hours['is_closed'] ?? false,
    //     //                             'notes' => $hours['notes'] ?? null,
    //     //                         ]);
    //     //                     }
    //     //                 }
        
    //     //                 // Optional: save posts/blogs if needed later
    //     //             }
    //     //         }
             
    //     //         // Rate limiting
    //     //         sleep(2);
    //     //     }
           
    //     //     // Pause between chunks
    //     //     sleep(6);
    //     // });
    
    //     // return 'Finished';









    //     // set_time_limit(0);
    //     // ini_set('max_execution_time', 0);
    //     Veterinarian::where('id' ,'>', 1645)->chunk(20, function ($veterinarians) {
    //         foreach ($veterinarians as $vet) {
    //             // Process each vet here
    //             // Example: Log::info($vet->name);
    //             $command = "Geef mij meer informatie over het volgende bedrijf:

    //                 Naam: ".$vet -> name."  "."
    //                 Provincie: ".Province::find($vet -> region_id)->name."  "."
    //                 Stad: ".City::find($vet -> city_id)->name."  "."
    //                 Adres: ".$vet -> street." ".$vet -> street_nr."  "."
    //                 Postcode: ".$vet -> zipcode."  ";

    //                 if (!empty($vet -> website)){
    //                     $command .= 'Website: '.$vet -> website;
    //                 }    


    //                 $response = $this->contentService->createText($command, $teller = 1);
    //                 $response = json_decode($response, true);
    //                 if (isset($response['Services']) && isset($response['Categorie'])){
    //                     $services = explode(',', $response['Services']);
    //                     $cats     = explode(',', $response['Categorie']);
    //                 }
    //                 else{
    //                     $response = $this->contentService->createText($command, $teller = 1);
    //                     $response = json_decode($response, true);
    //                     $services = explode(',', $response['Services']);
    //                     $cats     = explode(',', $response['Categorie']);
    //                 }

    //                     if (!empty($services)){
    //                         foreach($services as $service){
    //                             if (!empty( $service)){
    //                                 $ca = new VeterinarianService();
    //                                 $ca -> veterinarian_id = $vet -> id;
    //                                 $ca -> category_id  = $service;
    //                                 $ca -> save();
    //                             }
    //                         }
    //                     }
    //                     if (!empty($cats)){
    //                         foreach($cats as $cat){
    //                             if (!empty($cat)){
    //                                 $ca = new VeterinarianCategory();
    //                                 $ca -> veterinarian_id = $vet -> id;
    //                                 $ca -> category_id  = $cat;
    //                                 $ca -> save();
    //                             }
    //                         }
    //                     }
    //                     if (!empty($response['Openingstijden'])){
    //                         foreach($response['Openingstijden'] as $key => $value){
    //                             $opening = new VegetarianOpeningTime();
    //                             $opening -> day_of_week = $key;   
    //                             if ($value['open_time'] !== 'Gesloten' && $value['open_time'] !== 'Closed' ){
    //                                 $opening -> open_time = $value['open_time']; 
    //                             }
    //                             else{
    //                                 $opening -> open_time = null;
    //                             }
    //                             if ($value['open_time'] !== 'Gesloten' && $value['open_time'] !== 'Closed'){
    //                                 $opening -> close_time = $value['close_time']; 
    //                             }
    //                             else{
    //                                 $opening -> close_time = null;
    //                             }
    //                             $opening -> is_closed = $value['is_closed'];
    //                             $opening -> notes = $value['notes'];  
    //                             $opening -> veterinarian_id = $vet -> id;
    //                             $opening -> created_at = date('Y-m-d H:i:s');
    //                             $opening -> save();
    //                         }
    //                     }
                    
    //          }
 
    //         sleep(2);
    //     });
    // }


    public function results(Request $request){
        $page = Page::getCustomPage('search');
        $seo = $page?->seo;
        $page               = Page::getCustomPage('home');
        $advantages         = Page::getBlockInfo($page->blocks, 'adventages');
        $bestVets           = SeoVeterinarian::get3BestRatedVets();
        $mostViewedVets     = SeoVeterinarian::get3MostViewedVets();
        $categoriesForCount = Category::ForSite()->withCount('veterinarians')->get();
        $categories         = Category::getCategories();
    
        $categoryId = $request->filled('categorie') ? intval($request->query('categorie')) : null;
        $city       = $request->query('stad');
        $search     = $request->query('zoeken');
    
        $vets = SeoVeterinarian::getWithFeaturedImage($categoryId, $city, $search);

        return view('website.results', [
            'seo' => $seo,
            'vets' => $vets,
            'category' => $categoryId,
            'bestVets' => $bestVets,
            'mostViewedVets' => $mostViewedVets,
            'categoriesForCount' => $categoriesForCount,
            'advantages' => $advantages,
            'categories' => $categories
        ]);
    }

    public function about(){
        $page = Page::getCustomPage('about');
        $seo = $page?->seo;

        $getRandomReviews = SeoReview::getRandomReviews();
        $intro = Page::getBlockInfo($page->blocks, 'about_us_content');
        $cta = Page::getBlockInfo($page->blocks, 'about_us_cta');
        return view('website.about', ['seo' => $seo, 'getRandomReviews' => $getRandomReviews, 'cta' => $cta, 'intro' => $intro]);
    }


    public function page($slug){
        $page = Page::getCustomPage($slug);
        $seo = $page?->seo;
        if (empty($page)){
            abort(404);
        }
        //dd($page->blocks);
        $title = $page->blocks[0]['data']['title'];
        $content = $page->blocks[0]['data']['description'];
        //dd($title.' '.$content);
        $page = Page::where('slug', $slug)->first();
        if (empty($page)){
            abort(404);
        }
        $checkHasSeoPage = Seopage::where('parent_page',  $page -> id)->first();

        $tenRandomPlaces = '';
        $biggestCities   = '';
      
        if (!empty($checkHasSeoPage)):
           
            $tenRandomPlaces = City::where('country_id', 1)->inRandomOrder()->take(10)->get();
            $biggestCities   = City::where('biggest', '>', 0)->get();
        endif;    
        
        return view('website.page', ['page' => $page, 'checkHasSeoPage' => $checkHasSeoPage,'slug' => $slug, 'title' => $title, 'tenRandomPlaces' => $tenRandomPlaces, 'biggestCities' => $biggestCities,'content' => $content, 'seo' => $seo]);
    }

    public function seoPage($slug, $city){
        $page = Page::ForSite()->where('slug', $slug)->first();
        if (empty($page)){
            abort(404);
        }


        $slugForSearch = '/'.$city;
        $nearByCities    = '';    
        $biggestCities   = City::where('biggest', '>', 0)->get();

        $city = City::where('path', $city)->first();

        $lat  =  $city -> lat;
        $lon  =  $city -> lon;

       $tenClosestCities = City::getClosestCities($lat, $lon, $limit = 10);
        
        $seoPage = SeoPage::where('parent_page', $page->id)->where('slug', $slugForSearch)->first();
        if (empty($seoPage)){
            abort(404);
        }

        $top_description = $seoPage->top_description;
        $bottom_description = $seoPage->bottom_description;

        $seo['title'] = $seoPage->meta_title;
        $seo['description'] = strip_tags($seoPage->meta_description);
    
        return view('website.seopage', ['seo' => $seo, 'page' => $seoPage,'slug' => $slug, 'top_description' => $top_description , 'bottom_description' => $bottom_description ,'tenClosestCities' => $tenClosestCities  , 'biggestCities' => $biggestCities]);
    }


    // public function convertDB(){
    //     return;
    //     ini_set("memory_limit", "-1");
    //     set_time_limit(0);
    //      $ads = DB::table('vets')->where('id', '>' , 3365)->get();
       
    //      if (!empty($ads)){
            
    //         foreach($ads as $item){
                    
                  
    //                     if (!empty($item->name)){
    //                     $adsData = [];
                        
    //                     $address = trim($item->street . ' ' . $item->street_nr);
    //                     $city = $item->city;
    //                     $postcode = $item->zipcode;
                     
    //                     // Optionally, if you have a country field, you can add it here.
    //                     // Otherwise, the service will use the default "United Kingdom".
    //                     sleep(1);
    //                     // Call the service to get the coordinates.
    //                     $coordinates = $this->geoapifyService->getCoordinates($address, $city, $postcode);

    //                         $adsData[] = [
    //                             'name' => $item->name,
    //                             'short_description' => "",
    //                             'description' => "",
    //                             'region_id' => $item->region,
    //                             'city_id' => $item->city,
    //                             'zipcode' => $item->zipcode,
    //                             'street' => $item->street,
    //                             'street_nr' => $item->street_nr,
    //                             'phone' =>  $item->phone,
    //                             'website' => $item->website,
    //                             'lat' => $coordinates['lat'] ?? null,
    //                             'lon' => $coordinates['lon'] ?? null,
    //                             'user_id' => 1,
    //                             'created_at' => $item->date_added ?? "2019-06-26 14:10:36",
    //                             'updated_at' => $item->date_updated
    //                         ];
    //                         if (!empty($adsData[0])){
    //                             DB::table('veterinarians')->insert($adsData);
    //                         }
    //                     }
 
                  

    //             }
         
    //     } 
    // }

    // public function convertDBAgain(){
    //     return;
    //     ini_set("memory_limit", "-1");
    //     set_time_limit(0);

    //     $records = Veterinarian::where('id','>',527)->get();
    //     foreach( $records as $item){
    //        $record = Veterinarian::find($item -> id);
    //        $city   = $record -> city_id; 
    //        $result = City::where('name', $city)->first();
    //        if (!empty($result)){
    //           $record -> city_id = $result -> id;
    //           $record -> region_id =  $result -> province_id;
    //           $record -> save();
    //        }
    //     }

    // }


 
}
