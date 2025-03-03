<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'name',
        'path',
        'title',
        'description',
    ];

    public static function getStateByCountry($country){
        return Province::where('country_id', $country)->pluck( 'name', 'id');
    }
}
