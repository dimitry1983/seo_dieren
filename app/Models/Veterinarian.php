<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinarian extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user (admin) that owns the veterinarian.
    */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
