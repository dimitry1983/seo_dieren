<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinarianPricingGroup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get all veterinarian pricings for this pricing group.
     *
     * Assumes that there is a VeterinarianPricing model
     * with a 'pricing_group_id' column.
     */
    public function veterinarianPricings()
    {
        return $this->hasMany(VeterinarianPricing::class, 'pricing_group_id');
    }

    // Example: If your application also relates groups to veterinarians directly via a pivot table,
    // you might add a many-to-many relationship like the one below:
    //
    // public function veterinarians()
    // {
    //     return $this->belongsToMany(Veterinarian::class, 'veterinarian_pricing_group_veterinarian', 'pricing_group_id', 'veterinarian_id');
    // }
}