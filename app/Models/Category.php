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
        return Category::where('site_id', session('website')->id)->get();
    }
    
    public static function getCategoriesForSelect(){
        return Category::where('site_id', session('website')->id)->get()->pluck('name', 'id');
    }

    public function veterinarians()
    {
        return $this->belongsToMany(
            SeoVeterinarian::class,              // Related model
            'veterinarians_categories',          // Pivot table
            'category_id',                       // Foreign key on pivot table for this model (Category)
            'veterinarian_id',                   // Foreign key on pivot table for related model (SeoVeterinarian)
            'parent_id',                                // Local key on this model (Category)
            'old_id'                             // Local key on related model (SeoVeterinarian)
        );
    }
}