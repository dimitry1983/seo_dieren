<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\Page;
use App\Models\Province;
use App\Models\Review;
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

    public function index(Request $request)
    {

        $page = Page::getCustomPage('home');
        $headerBlock = Page::getBlockInfo($page->blocks, 'Header-big');
        $insurances = Page::getBlockInfo($page->blocks, 'insurances');
        $advantages = Page::getBlockInfo($page->blocks, 'adventages');
        $darkBanner = Page::getBlockInfo($page->blocks, 'dark_about_banner');
        $categories = Category::getCategories();
    
        $category = intval($request->query('categorie')); // Optional query parameter
    
        if (is_int($category)) {
            $vets = Veterinarian::getWithFeaturedImage($category);
        } else {
            $vets = Veterinarian::getWithFeaturedImage();
        }
      
        return view('website.index', compact('page', 'headerBlock', 'categories', 'vets', 'insurances', 'advantages', 'darkBanner'));
    }

    //batches of 20
    public function getMoreInformation(ScraperService $outscraper)
    {

        set_time_limit(0);
        ini_set('max_execution_time', 0);
    
        // Veterinarian::where('id' , '>', 1563)->chunk(20, function ($vets) use ($outscraper) {
        //     foreach ($vets as $vet) {
        //         $city = City::find($vet->city_id)?->name ?? '';
        //         $query = "{$vet->name}, {$vet->street} {$vet->street_nr}, {$vet->zipcode}, {$city}, Netherlands";
        //         $coordinates = "{$vet->lat},{$vet->lon}";
        
        //         $searchResult = $outscraper->fetchCompanyInfo($query, $coordinates);
      
        //         if (!empty($searchResult['data'][0]['place_id'])) {
        //             $placeId = $searchResult['data'][0]['place_id'];
        
        //             // Get full details using place_id
        //             $details = $outscraper->fetchCompanyDetailsByPlaceId($placeId);
        
        //             if (!empty($details['data'][0])) {
        //                 $info = $details['data'][0];
        //                 $vet->location_link = $info['location_link'] ?? null;
        //                 $vet->phone = $info['phone'] ?? null;
        //                 $vet->website = $info['site'] ?? null;
        //                 $vet->description = $info['description'] ?? null;
        //                 $vet->rating = $info['rating'] ?? null;
        //                 $vet->place_id = $placeId; // Save for future use if needed
        //                 $vet->save();
        
        //                 // Save reviews
        //                 if (!empty($info['reviews_data'])) {
        //                     foreach ($info['reviews_data'] as $review) {
        //                                 $reviews = new Review();
        //                                 $reviews  -> type = 'Google';
        //                                 $reviews  -> name = $review['author_title'];
        //                                 $reviews -> description = $review['review_text'] ?? "Niet aanwezig";
        //                                 $reviews  -> rating = $review['review_rating'];
        //                                 $reviews -> city = $city;
        //                                 $reviews  -> veterinarian_id = $vet -> id;
        //                                 $reviews  -> created_at = $review['review_datetime_utc'] ?? now();
        //                                 $reviews  -> save();
        //                     }
        //                 }

        //                 // Save opening hours if available
        //                 if (!empty($info['work_hours'])) {
        //                     foreach ($info['work_hours'] as $day => $hours) {
        //                         $vet->openingTimes()->create([
        //                             'day_of_week' => $day,
        //                             'open_time' => $hours['open_time'] ?? null,
        //                             'close_time' => $hours['close_time'] ?? null,
        //                             'is_closed' => $hours['is_closed'] ?? false,
        //                             'notes' => $hours['notes'] ?? null,
        //                         ]);
        //                     }
        //                 }
        
        //                 // Optional: save posts/blogs if needed later
        //             }
        //         }
             
        //         // Rate limiting
        //         sleep(2);
        //     }
           
        //     // Pause between chunks
        //     sleep(6);
        // });
    
        // return 'Finished';









        // set_time_limit(0);
        // ini_set('max_execution_time', 0);
        Veterinarian::where('id' ,'>', 1645)->chunk(20, function ($veterinarians) {
            foreach ($veterinarians as $vet) {
                // Process each vet here
                // Example: Log::info($vet->name);
                $command = "Geef mij meer informatie over het volgende bedrijf:

                    Naam: ".$vet -> name."  "."
                    Provincie: ".Province::find($vet -> region_id)->name."  "."
                    Stad: ".City::find($vet -> city_id)->name."  "."
                    Adres: ".$vet -> street." ".$vet -> street_nr."  "."
                    Postcode: ".$vet -> zipcode."  ";

                    if (!empty($vet -> website)){
                        $command .= 'Website: '.$vet -> website;
                    }    


                    $response = $this->contentService->createText($command, $teller = 1);
                    $response = json_decode($response, true);
                    if (isset($response['Services']) && isset($response['Categorie'])){
                        $services = explode(',', $response['Services']);
                        $cats     = explode(',', $response['Categorie']);
                    }
                    else{
                        $response = $this->contentService->createText($command, $teller = 1);
                        $response = json_decode($response, true);
                        $services = explode(',', $response['Services']);
                        $cats     = explode(',', $response['Categorie']);
                    }

                        if (!empty($services)){
                            foreach($services as $service){
                                if (!empty( $service)){
                                    $ca = new VeterinarianService();
                                    $ca -> veterinarian_id = $vet -> id;
                                    $ca -> category_id  = $service;
                                    $ca -> save();
                                }
                            }
                        }
                        if (!empty($cats)){
                            foreach($cats as $cat){
                                if (!empty($cat)){
                                    $ca = new VeterinarianCategory();
                                    $ca -> veterinarian_id = $vet -> id;
                                    $ca -> category_id  = $cat;
                                    $ca -> save();
                                }
                            }
                        }
                        if (!empty($response['Openingstijden'])){
                            foreach($response['Openingstijden'] as $key => $value){
                                $opening = new VegetarianOpeningTime();
                                $opening -> day_of_week = $key;   
                                if ($value['open_time'] !== 'Gesloten' && $value['open_time'] !== 'Closed' ){
                                    $opening -> open_time = $value['open_time']; 
                                }
                                else{
                                    $opening -> open_time = null;
                                }
                                if ($value['open_time'] !== 'Gesloten' && $value['open_time'] !== 'Closed'){
                                    $opening -> close_time = $value['close_time']; 
                                }
                                else{
                                    $opening -> close_time = null;
                                }
                                $opening -> is_closed = $value['is_closed'];
                                $opening -> notes = $value['notes'];  
                                $opening -> veterinarian_id = $vet -> id;
                                $opening -> created_at = date('Y-m-d H:i:s');
                                $opening -> save();
                            }
                        }
                    
             }
 
            sleep(2);
        });
    }


    public function results(){

        return view('website.results');
    }


    public function about(){
        return view('website.about');
    }

    public function contact(){
        return view('website.contact');
    }

    public function convertDB(){
        return;
        ini_set("memory_limit", "-1");
        set_time_limit(0);
         $ads = DB::table('vets')->where('id', '>' , 3365)->get();
       
         if (!empty($ads)){
            
            foreach($ads as $item){
                    
                  
                        if (!empty($item->name)){
                        $adsData = [];
                        
                        $address = trim($item->street . ' ' . $item->street_nr);
                        $city = $item->city;
                        $postcode = $item->zipcode;
                     
                        // Optionally, if you have a country field, you can add it here.
                        // Otherwise, the service will use the default "United Kingdom".
                        sleep(1);
                        // Call the service to get the coordinates.
                        $coordinates = $this->geoapifyService->getCoordinates($address, $city, $postcode);

                            $adsData[] = [
                                'name' => $item->name,
                                'short_description' => "",
                                'description' => "",
                                'region_id' => $item->region,
                                'city_id' => $item->city,
                                'zipcode' => $item->zipcode,
                                'street' => $item->street,
                                'street_nr' => $item->street_nr,
                                'phone' =>  $item->phone,
                                'website' => $item->website,
                                'lat' => $coordinates['lat'] ?? null,
                                'lon' => $coordinates['lon'] ?? null,
                                'user_id' => 1,
                                'created_at' => $item->date_added ?? "2019-06-26 14:10:36",
                                'updated_at' => $item->date_updated
                            ];
                            if (!empty($adsData[0])){
                                DB::table('veterinarians')->insert($adsData);
                            }
                        }
 
                  

                }
         
        } 
    }

    public function convertDBAgain(){
        return;
        ini_set("memory_limit", "-1");
        set_time_limit(0);

        $records = Veterinarian::where('id','>',527)->get();
        foreach( $records as $item){
           $record = Veterinarian::find($item -> id);
           $city   = $record -> city_id; 
           $result = City::where('name', $city)->first();
           if (!empty($result)){
              $record -> city_id = $result -> id;
              $record -> region_id =  $result -> province_id;
              $record -> save();
           }
        }

    }

 
}
