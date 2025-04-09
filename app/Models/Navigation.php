<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define the fillable properties for mass assignment
    protected $fillable = ['location', 'title', 'content','slug','items'];

    protected $casts = [
        'content' => 'array',
    ];

    public static function getNavigations(){
        return Navigation::get();
    }

    public static function getByTitle(string $title): ?Navigation
    {
        return Navigation::where('title', $title)->first();
    }
}