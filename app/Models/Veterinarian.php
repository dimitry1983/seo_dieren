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
        // Remove categories and services from $data to avoid mass assignment errors
        $categories = $data['categories'] ?? [];
        unset($data['categories']);
    
        $services = $data['services'] ?? [];
        unset($data['services']);
    
        return $data;
    }
    
    protected function afterSave(Veterinarian $record, array $data): void
    {
        // Sync the categories relationship if provided
        if (isset($data['categories'])) {
            $record->categories()->sync($data['categories']);
        }
        
        // Sync the services relationship if provided
        if (isset($data['services'])) {
            $record->services()->sync($data['services']);
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

    /**
     * The services that belong to the veterinarian.
     */
    public function services()
    {
        return $this->belongsToMany(\App\Models\Service::class, 'veterinarians_services', 'veterinarian_id', 'category_id');
    }
}
