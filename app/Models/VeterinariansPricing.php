<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinariansPricing extends Model
{
    use HasFactory;

    protected $table = 'veterinarians_pricing';

    protected $guarded = [];

    // Define the relationship with Veterinarian
    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    public function pricingGroup()
    {
        return $this->belongsTo(VeterinarianPricingGroup::class, 'pricing_group_id');
    }
}