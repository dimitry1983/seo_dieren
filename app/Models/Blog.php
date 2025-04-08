<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

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