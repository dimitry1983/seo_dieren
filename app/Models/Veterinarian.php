<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinarian extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $categories = $data['categories'] ?? [];
        unset($data['categories']); // Remove from $data to avoid errors
    
        return $data;
    }
    
    protected function afterSave(Veterinarian $record, array $data): void
    {
        if (isset($data['categories'])) {
            $record->categories()->sync($data['categories']); // Attach categories
        }
    }

    /**
     * Get the user (admin) that owns the veterinarian.
    */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

        /**
     * Get the city associated with the veterinarian.
     */
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id');
    }

    /**
     * Get the province (region) associated with the veterinarian.
     */
    public function province()
    {
        return $this->belongsTo(\App\Models\Province::class, 'region_id');
    }

    /**
     * The categories that belong to the veterinarian.
     */
    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class, 'veterinarians_categories', 'veterinarian_id', 'category_id');
    }
}
