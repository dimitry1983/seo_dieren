<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Province extends Model
{
    use HasFactory;

    public $timestamps = false; 

    protected $fillable = [
        'country',
        'name',
        'path',
        'title',
        'description',
    ];

    public static function getStateByCountry($country){
        if ($country == 1){
            $country = 'nl';
        }
        return Province::where('country', $country)->pluck( 'name', 'id');
    }
}
