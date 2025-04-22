<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Blog extends Model
{
    use HasFactory, HasSEO;

    protected $guarded = [];

    public function scopeForSite($query)
    {
        return $query->where('site_id', session('website')->id);
    }

    // Define the relationship with the Veterinarian model
    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }


    public static function get3LatestBlogs($limit = 3)
    {
        return Blog::orderBy('created_at', 'desc')
            ->where('status', 'active')
            ->take($limit)
            ->get();
    }

    public static function getLatestBlogs()
    {
        return Blog::with('veterinarian')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
    }

   

}