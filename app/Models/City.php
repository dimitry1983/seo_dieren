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
}
