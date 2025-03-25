<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationship: A review belongs to a veterinarian
    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    public function responses()
    {
        return $this->hasMany(Review::class, 'parent_id');
    }
}
