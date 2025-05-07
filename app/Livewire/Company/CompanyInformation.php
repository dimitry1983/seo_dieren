<?php

namespace App\Livewire\Company;

use App\Models\City;
use App\Models\Province;
use App\Models\SeoVeterinarian;
use App\Models\User;
use App\Models\Veterinarian;
use App\Models\VeterinarianCategory;
use App\Models\VeterinarianService;
use App\Models\VeterinariansPricing;
use App\Services\GeoapifyService;
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
    public $old_id;
    public $short_description;
    public $categories = [];
    public $services = [];
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

    public $company;

    protected $geoapifyService;


    public function mount(): void
    {
      //fill the form with logged in user @todo  
      $this -> company = new SeoVeterinarian(); 

      $result = SeoVeterinarian::where('user_id', Auth::user()->id)->first();
      
      if (!empty($result)){
        $this -> company = $result;
      }

      if ($this -> company->exists) { // Only fill if editing an existing page
        // Get the categories and services from the database
        $categories = VeterinarianCategory::where('veterinarian_id', $this->company->id)->pluck('category_id')->toArray();
        $services = VeterinarianService::where('veterinarian_id', $this->company->id)->pluck('category_id')->toArray();

        // Convert the model attributes to an array
        $companyArray = $this->company->toArray();

        // Add categories and services to the array
        $companyArray['categories'] = $categories;
        $companyArray['services'] = $services;

        // Fill the form with the complete data array
        $this->form->fill($companyArray);
      }
    }


    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make(5) // 3 columns for general info, 2 columns for contact info
                ->schema([
                    // Left side - General info (3 columns)
                    Section::make(devTranslate('cms_company.Algemene Informatie','Algemene Informatie'))
                        ->schema([
                            TextInput::make('name')
                                ->label(devTranslate('cms_company.Naam','Naam')) 
                                ->required()
                                ->maxLength(255),
                            Textarea::make('short_description')
                                ->label(devTranslate('cms_company.Korte Beschrijving','Korte Beschrijving'))
                                ->columnSpanFull(),
                            Select::make('categories')
                                ->label(devTranslate('cms_company.Categorieën','Categorieën'))
                                ->multiple()
                                ->options(function (Get $get){
                                    return \App\Models\Category::getCategoriesForSelect();
                                })
                                ->searchable()
                                ->preload(),
                            Select::make('services')
                                ->label(devTranslate('cms_company.Diensten','Diensten')) 
                                ->multiple()
                                ->relationship('services', 'name') // Ensure this matches the model function
                                ->searchable()
                                ->preload(), 
                            RichEditor::make('description')
                                ->label(devTranslate('cms_company.Beschrijving','Beschrijving')) 
                                ->columnSpanFull(),
                        ])
                        ->columnSpan([
                            'default' => 5, // Full width on small screens
                            'md' => 5,     // Full width on medium screens
                            'lg' => 5,     // 3 columns on large screens
                            'xl' => 3,
                        ]),

                    // Right side - Contact info (2 columns)
                    Section::make('Contact Informatie')
                        ->schema([
                            Select::make('region_id')
                                ->label(devTranslate('cms_company.Provincie','Provincie'))
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
                                    ->label(devTranslate('cms_company.Plaats','Plaats')) 
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
                                ->label(devTranslate('cms_company.Postcode','Postcode'))
                                ->maxLength(255),
                            TextInput::make('street')
                                ->label(devTranslate('cms_company.Straat','Straat'))  
                                ->maxLength(255),
                            TextInput::make('street_nr')
                                ->label(devTranslate('cms_company.Huisnummer','Huisnummer')) 
                                ->maxLength(255),
                            TextInput::make('phone')
                                ->label(devTranslate('cms_company.Telefoonnummer','Telefoonnummer')) 
                                ->tel()
                                ->maxLength(255),
                            TextInput::make('website')
                                ->label(devTranslate('cms_company.Website','Website')) 
                                ->maxLength(255)
                                ->type('url') // Optional: sets the HTML input type to "url"
                                ->rules(['url']) // Ensures Laravel validates it as a URL
                                ->placeholder('https://example.com')
                        ])
                        ->columnSpan([
                            'default' => 5, // Full width on small screens
                            'md' => 5,     // Full width on medium screens
                            'lg' => 5,     // 2 columns on large screens
                            'xl' => 2,
                        ]),
                ]),
        ])->model(SeoVeterinarian::class);
    }


    public function save()
    {
        
        if (!empty($this->company->id)){
            $state = "update";
        }
        else{
            $state = "create";
        }


        $result = $this->form->getState();

        $address = $result['street']." ".$result['street_nr'];
        $city = $result['city_id'];
        $city = City::find($city);
        $city = $city->name;
        $postcode = $result['zipcode'];
        $geoapifyService = new GeoapifyService();
        $coordinates = $geoapifyService->getCoordinates($address, $city, $postcode);

        $data = $this->form->getState();
        
        if (!empty($this->categories)){
            $categories = $this->categories;
            unset($data['categories']);
        }
        if (!empty($this->services)){
            $services = $this->services;
            unset($data['services']);
        }
        
        $data['site_id'] = session('website')->id;

        $data['user_id'] = Auth::user()->id;

        $data['lat'] = $coordinates['lat'] ?? null;
        $data['lon'] = $coordinates['lon'] ?? null;

        $this -> company ->fill($data);
        $this -> company ->save();

        if (empty($this->company->old_id)) {
            $this->company->old_id = $this->company->id;
            $this->company->save();
        }

        if (!empty($categories)){
            VeterinarianCategory::where('veterinarian_id', $this -> company -> id)->delete();
            foreach($categories as $category){
                $categoryData = [
                    'veterinarian_id' => $this -> company -> id,
                    'category_id' => $category
                ];
                VeterinarianCategory::create($categoryData);
            }
        }

        if(!empty($services)){
            VeterinarianService::where('veterinarian_id', $this -> company -> id)->delete();
            foreach($services as $service){
                $serviceData = [
                    'veterinarian_id' => $this -> company -> id,
                    'category_id' => $service
                ];
                VeterinarianService::create($serviceData);
            }
        }

        $this -> dispatch('saved');
   
       
        if ($state == "create"){
            VeterinariansPricing::insertNewCompanyPrices($this -> company -> id); 
            session()->flash('success', devTranslate('page.Bedrijfsinformatie succesvol aangemaakt','Bedrijfsgegevens succesvol aangemaakt'));
        }
        else{
            session()->flash('success', devTranslate('page.Bedrijfsinformatie succesvol bijgewerkt','Bedrijfsgegevens succesvol bijgewerkt'));
        }
    }

    public function render()
    {
        $active = "company-information";
        return view('livewire.company.company-information', ['active' => $active])->layout('layouts.company');
    }
}
