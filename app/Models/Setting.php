<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function scopeForSite($query)
    {
        return $query->where('site_id', session('website')->id);
    } 
     
    public static function getSettings()
    {
        return Setting::ForSite()->get();
    }

    public static function getSetting($key)
    {
        return Setting::ForSite()->where('option_name', $key)->first();
    }
    
}