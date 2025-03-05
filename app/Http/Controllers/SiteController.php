<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Veterinarian;
use App\Services\GeoapifyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    protected $geoapifyService;

    public function __construct(GeoapifyService $geoapifyService)
    {
        $this->geoapifyService = $geoapifyService;
    }

    public function index(){
        return view('website.index');
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
