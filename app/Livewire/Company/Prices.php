<?php

namespace App\Livewire\Company;

use App\Models\Veterinarian;
use App\Models\VeterinarianPricingGroup;
use App\Models\VeterinariansPricing;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Prices extends Component implements HasForms
{

    use \Filament\Forms\Concerns\InteractsWithForms;

    public $pricing_group_id;
    public $name;
    public $consult_price;
    public $veterinarian_id;

    public $prices;
    public $price;

    public function mount($id = null){
        $result = Veterinarian::where('id', Auth::user()->id)->first();
        $this -> veterinarian_id = $result -> id;
        $this->prices = VeterinariansPricing::where('veterinarian_id', $result -> id)->get();

        if ($id > 0){
            $this->price  = VeterinariansPricing::find($id);
            $this->price = $this->price->toArray();
            $this->form->fill($this->openingsTime);
        }
        else{
            $this->price = new VeterinariansPricing();
        }
    }


    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Pricing') // Title of the section
                ->schema([
                    Select::make('pricing_group_id')
                        ->options(VeterinarianPricingGroup::pluck('name', 'id'))
                        ->required(),
                    TextInput::make('name')
                            ->required(), // Max file size in KB (2MB)
                    TextInput::make('consult_price')
                            ->required(),
                    Select::make('veterinarian_id')
                        ->searchable()
                        ->label('Veterinarian')
                        ->options(Veterinarian::pluck('name', 'id')->toArray())    
                        ->required(),
                ]),
        ])->model(VeterinariansPricing::class);
    }

    public function loadPrice($id){
        $this->price  = VeterinariansPricing::find($id);
        $this->price = $this->price->toArray();
        $this->form->fill($this->openingsTime);
        $result = Veterinarian::where('id', Auth::user()->id)->first();
        $this -> veterinarian_id = $result -> id;
        $this -> prices = VeterinariansPricing::where('veterinarian_id', $result -> id)->get();
    }



    public function render()
    {
        $active = "prices";
        return view('livewire.company.prices', ['active' => $active])->layout('layouts.company');
    }
}
