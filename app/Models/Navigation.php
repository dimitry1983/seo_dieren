<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define the fillable properties for mass assignment
    protected $fillable = ['location', 'title', 'content','slug','items', 'site_id'];

    protected $casts = [
        'content' => 'array',
    ];

    public function scopeForSite($query)
    {
        return $query->where('site_id', session('website')->id);
    }

    public static function getNavigations(){
        return Navigation::ForSite()->get();
    }

    public static function getByTitle(string $title): ?Navigation
    {
        return Navigation::ForSite()->where('title', $title)->first();
    }
}