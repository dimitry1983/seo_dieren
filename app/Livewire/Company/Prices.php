<?php

namespace App\Livewire\Company;

use App\Models\SeoVeterinarian;
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
        $result = SeoVeterinarian::where('user_id', Auth::user()->id)->first();
        $this -> veterinarian_id = $result -> id;
        $this -> prices = VeterinariansPricing::with(['pricingGroup'])->where('veterinarian_id', $result -> id)->get();

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
            Section::make() // Title of the section
                ->schema([
                    Select::make('pricing_group_id')
                        ->label(__('Service'))
                        ->options(VeterinarianPricingGroup::pluck('name', 'id'))
                        ->required(),
                    TextInput::make('name')
                            ->label(__('Naam dienst'))
                            ->required(), // Max file size in KB (2MB)
                    TextInput::make('consult_price')
                            ->label(__('Prijs in euro\'s'))
                            ->required(),
                ]),
        ])->model(VeterinariansPricing::class);
    }

    public function loadPrice($id){
        $this->price  = VeterinariansPricing::where('veterinarian_id', $this -> veterinarian_id)->find($id);
        $this->price = $this->price->toArray();
        $this->form->fill($this->price);
        $result = SeoVeterinarian::where('user_id', Auth::user()->id)->first();
        $this -> veterinarian_id = $result -> id;
        $this -> prices = VeterinariansPricing::where('veterinarian_id', $result -> id)->get();
    }

    public function deletePrice($id){
        $price  = VeterinariansPricing::where('veterinarian_id', $this -> veterinarian_id)->findOrFail($id);
        $price->delete();
        $this -> prices = VeterinariansPricing::where('veterinarian_id', $this -> veterinarian_id)->get();
        $this -> dispatch('saved');
        session()->flash('success', devTranslate('page.Nieuws item is succesvol verwijderd','Nieuws item is succesvol verwijderd'));
    }

    public function save()
    {
       
        if (!empty($this->price['id'])){
            $this->price  = VeterinariansPricing::find($this->price['id']);
            $state = "update";
        }
        else{
            $state = "create";
        }

        $data = $this->form->getState();
        $data['veterinarian_id'] =  $this -> veterinarian_id;
        if (!empty($this->price['id'])){
            $data['id'] = $this->price['id'];

            if ($this->price->name  !== $data['name']){
                unset($data['id']);
                $this->price = new VeterinariansPricing();
            }
        }
        $this->price->fill($data);
        $this->price->save();
       
        $this -> dispatch('saved');
        $result = Veterinarian::where('user_id', Auth::user()->id)->first();
        $this -> veterinarian_id = $result -> id;
       

        if ($state == "create"){
            $this->reset();
          
            session()->flash('success', devTranslate('cms.Prijs succesvol aangemaakt','Prijs succesvol aangemaakt'));
        }
        else{
            session()->flash('success', devTranslate('cms.Prijs succesvol bijgewerkt','Prijs succesvol bijgewerkt'));
        }
        $this -> prices = VeterinariansPricing::with(['pricingGroup'])->where('veterinarian_id', $result -> id)->get();
    }


    public function render()
    {
        $active = "prices";
        return view('livewire.company.prices', ['active' => $active])->layout('layouts.company');
    }
}
