<?php

namespace App\Livewire\Company;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use App\Models\Veterinarian;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components as Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Facades\Auth;

class CompanyInformation extends Component implements HasForms
{
    use \Filament\Forms\Concerns\InteractsWithForms;

    public $name;
    public $short_description;
    public $categories;
    public $services;
    public $description;
    public $lon;
    public $lat;
    public $user_id;
    public $region_id;
    public $city_id;
    public $zipcode;
    public $street;
    public $street_nr;
    public $phone;
    public $website;


    public function mount($id = null): void
    {
       
      $this -> form;
    }


    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make(5) // 3 columns for general info, 2 columns for contact info
                ->schema([
                    // Left side - General info (3 columns)
                    Section::make('General Information')
                        ->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('short_description')
                                ->columnSpanFull(),
                            Select::make('categories')
                                ->label('Categories')
                                ->multiple()
                                ->relationship('categories', 'name') // Ensure this matches the model function
                                ->searchable()
                                ->preload(), 
                            Select::make('services')
                                ->label('Services')
                                ->multiple()
                                ->relationship('services', 'name') // Ensure this matches the model function
                                ->searchable()
                                ->preload(), 

                            RichEditor::make('description')
                                ->columnSpanFull(),
                            TextInput::make('lat')
                                ->readOnly()
                                ->numeric(),
                            TextInput::make('lon')
                                ->readOnly()
                                ->numeric(),
                            Select::make('user_id')
                                ->searchable()
                                ->getSearchResultsUsing(
                                    fn (string $search): array => User::where('name', 'like', "%{$search}%")
                                        ->limit(50)
                                        ->get()
                                        // This produces an array like [1 => 'Alice', 2 => 'Bob', ...]
                                        ->pluck('name', 'id')
                                        ->toArray()
                                )
                                ->getOptionLabelUsing(fn ($value) => User::find($value)?->name)
                                ->placeholder('Select a user')
                        ])
                        ->columnSpan(3),

                    // Right side - Contact info (2 columns)
                    Section::make('Contact Information')
                        ->schema([
                            Select::make('region_id')
                                ->label('Province')
                                ->searchable(true)
                                ->options(function (Get $get){
                                    $countryId = 1;
            
                                    if (!empty($countryId)){
                                        return Province::getStateByCountry($countryId);
                                    }
                                })
                                ->live()
                                ->afterStateUpdated(function (HasForms $livewire,  Select $component) {
                                    $livewire->validateOnly($component->getStatePath());
                                }),
                            Select::make('city_id')
                                    ->label('City')
                                    ->searchable(true)
                                    ->live()
                                    ->options(function (Get $get){
                                        $countryId = 1;
                                        $stateId = $get('region_id');
                
                                        if (!empty($countryId) && !empty($stateId)){
                                            return City::getCityByCountryAndState($countryId, $stateId);
                                        }
                                    })
                                    ->required()
                                    ->afterStateUpdated(function (HasForms $livewire,  Select $component) {
                                        $livewire->validateOnly($component->getStatePath());
                                    }),
        
                            TextInput::make('zipcode')
                                ->maxLength(255),
                            TextInput::make('street')
                                ->maxLength(255),
                            TextInput::make('street_nr')
                                ->maxLength(255),
                            TextInput::make('phone')
                                ->tel()
                                ->maxLength(255),
                            TextInput::make('website')
                                ->maxLength(255)
                                ->type('url') // Optional: sets the HTML input type to "url"
                                ->rules(['url']) // Ensures Laravel validates it as a URL
                                ->placeholder('https://example.com')
                        ])
                        ->columnSpan(2),
                ]),
        ])->model(Veterinarian::class);
    }


    public function save()
    {
        if (!empty($this->page->id)){
            $state = "update";
        }
        else{
            $state = "create";
        }


        $data = $this->form->getState();
        $data['user_id'] = Auth::user()->id;
        $this->page->fill($data);
        $this->page->save();
       
        if ($state == "create"){
            $this->reset();
          
            session()->flash('success', devTranslate('page.Bedrijfsinformatie succesvol aangemaakt','Bedrijfsinformatie succesvol aangemaakt'));
        }
        else{
            session()->flash('success', devTranslate('page.Bedrijfsinformatie succesvol bijgewerkt','Bedrijfsinformatie succesvol bijgewerkt'));
        }

    }


    public function render()
    {
       
        $active = "company-information";
        return view('livewire.company.company-information', ['active' => $active])->layout('layouts.company');
    }
}
