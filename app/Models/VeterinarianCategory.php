<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinarianCategory extends Model
{
    use HasFactory;

    protected $table = 'veterinarians_categories';

    protected $fillable = [
        'veterinarian_id',
        'category_id',
    ];

    /**
     * Get the veterinarian associated with this record.
     */
    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    /**
     * Get the category associated with this record.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}