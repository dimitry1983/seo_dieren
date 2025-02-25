<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VegetarianOpeningTime extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the veterinarian associated with this opening time.
     */
    public function veterinarian()
    {
        return $this->belongsTo(\App\Models\Veterinarian::class);
    }
}