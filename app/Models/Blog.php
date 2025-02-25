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
}