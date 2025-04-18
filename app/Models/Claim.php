<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define the relationship with User
    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }
}