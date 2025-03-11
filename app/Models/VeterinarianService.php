<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinarianService extends Model
{
    use HasFactory;

    // Explicitly specify the table name if it doesn't follow Laravel's naming conventions.
    protected $table = 'veterinarians_services';

    // Define the fillable fields to allow mass assignment.
    protected $fillable = [
        'category_id',
        'veterinarian_id',
    ];

    /**
     * Get the category associated with the veterinarian service.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the veterinarian associated with the service.
     */
    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }
}