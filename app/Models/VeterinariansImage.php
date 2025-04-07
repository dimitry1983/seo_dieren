<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinariansImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define the relationship with Veterinarian
    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    public function vegetarian()
    {
        return $this->belongsTo(Vegetarian::class);
    }
}
