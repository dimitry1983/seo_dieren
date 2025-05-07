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

    public static function getPriceByVeterinarianAndName($name, $vetId)
    {
        return static::where('name', $name)
            ->where('veterinarian_id', $vetId)
            ->first();
    }

    public static function getMaxPrice($name){
        return static::where('name', $name)
            ->max('consult_price');
    }

    public static function insertNewCompanyPrices($vet_id){
        $data = [
            'Sterilisatie' => [
                ['animal_name' => 'Hond (Teef)', 'weight' => '0 – 10 kg', 'price' => 338],
                ['animal_name' => 'Hond (Teef)', 'weight' => '10.1 – 20 kg', 'price' => 395],
                ['animal_name' => 'Hond (Teef)', 'weight' => '20.1 – 30 kg', 'price' => 425],
                ['animal_name' => 'Hond (Teef)', 'weight' => '30.1 – 40 kg', 'price' => 475],
                ['animal_name' => 'Hond (Teef)', 'weight' => '40.1 – 60 kg', 'price' => 515],
                ['animal_name' => 'Kat (Poes)', 'weight' => 'Traditioneel', 'price' => 200],
                ['animal_name' => 'Kat (Poes)', 'weight' => 'Laparoscopisch', 'price' => 250],
                ['animal_name' => 'Konijn (Voedster)', 'weight' => 'Alle gewichten', 'price' => 225],
            ],
        ];


        foreach ($data['Sterilisatie'] as $entry) {
                $pricing = new VeterinariansPricing();
                $pricing -> name             = $entry['weight'];
                $pricing -> consult_price    = $entry['price'];
                $pricing -> veterinarian_id  = $vet_id;
                $pricing -> created_at       = date('Y-m-d H:i:s');
                $pricing -> updated_at       = date('Y-m-d H:i:s');
                $pricing -> pricing_group_id = 2;
                $pricing -> animal_name = $entry['animal_name'];
                $pricing -> save();
                
        }

        $data = [
            'Castratie' => 2,
            'Preventieve zorg' => 4,
            'Consulten' => 8,
            'Bloed-, urine-, weefsel-, of ontlastingsonderzoek' => 29,
            'Opname' => 44,
            'Nagels knippen' => 46,
            'Chip plaatsen' => 58,
            'Oren spoelen' => 61,
            'Crematie' => 100
        ];

        foreach ( $data as $key => $val):

            $price = VeterinariansPricing::getMaxPrice($key);

            $pricing = new VeterinariansPricing();
            $pricing -> name             = $key;
            $pricing -> consult_price    = $price;
            $pricing -> veterinarian_id  = $vet_id;
            $pricing -> created_at       = date('Y-m-d H:i:s');
            $pricing -> updated_at       = date('Y-m-d H:i:s');
            $pricing -> pricing_group_id = 1;
            $pricing -> save();

        endforeach;

    }
}