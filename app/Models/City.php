<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];
    protected $table = 'cities'; 
    

    public static function getCityByCountryAndState($countryId, $stateId){
        return City::where('country_id', $countryId)->where('province_id', $stateId)->get()->pluck('name', 'id');
    }
    
    
    public static function getProvinceSlugByCity($cityName){
        $city = City::where('country_id', 1)->where(function ($query) use ($cityName) {
            $query->where('name', $cityName)
                ->orWhere('path', $cityName);
        })->first();
        
        if (!empty($city)){
                    
                $prov = Province::find($city->province_id); // Using findOrFail to throw an exception if the record doesn't exist
                return @$prov->slug;
         
        }
        else{
            return false;
        }
    }

}
