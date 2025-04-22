<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define fillable properties if you want mass assignment.
    protected $guarded = [];

    public function scopeForSite($query)
    {
        return $query->where('site_id', session('website')->id);
    }

    public static function getCategory($id)
    {
        return Category::where('id', $id)->first();
    }

    public static function getCategories(){
        return Category::all();
    }
    

    public function veterinarians()
    {
        return $this->belongsToMany(Veterinarian::class, 'veterinarians_categories');
    }
}