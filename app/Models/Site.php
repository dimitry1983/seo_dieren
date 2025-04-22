<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'ip',
    ];

    public static function get_info($url) {
        $website  = Site::where('url', 'like', '%'.$url.'%')->first();
        return $website;
    }

}