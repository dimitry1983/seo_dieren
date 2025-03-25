<?php

namespace App\Livewire\Company;

use App\Models\VegetarianOpeningTime;
use App\Models\Veterinarian;
use App\Models\VeterinariansOpeningTime;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OpeningTimes extends Component implements HasForms
{

    use \Filament\Forms\Concerns\InteractsWithForms;

    public $day_of_week;
    public $open_time;
    public $close_time;
    public $is_closed;
    public $notes;

    public $openingsTimes;

    public $openingsTime;

    public $veterinarian_id;

    public function mount($id = null){
        $result = Veterinarian::where('id', Auth::user()->id)->first();
        $this -> veterinarian_id = $result -> id;
        $this->openingsTimes = VegetarianOpeningTime::where('veterinarian_id', $result -> id)->get();

        if ($id > 0){
            $this->openingsTime  = VegetarianOpeningTime::find($id);
            $this->openingsTime = $this->openingsTime->toArray();
            $this->form->fill($this->openingsTime);
        }
        else{
            $this->openingsTime = new VegetarianOpeningTime();
        }
    }

    public function loadDay($id){
        $this->openingsTime  = VegetarianOpeningTime::where('veterinarian_id', $this -> veterinarian_id)->find($id);
        $this->openingsTime = $this->openingsTime->toArray();
        $this->form->fill($this->openingsTime);
        $result = Veterinarian::where('id', Auth::user()->id)->first();
        $this -> veterinarian_id = $result -> id;
        $this->openingsTimes = VegetarianOpeningTime::where('veterinarian_id', $result -> id)->get();
    }

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('')
                ->schema([
                    Select::make('day_of_week')
                        ->label(__('Dag van de week'))
                        ->options([
                            'Monday' => devTranslate('admin.Maandag', 'Maandag'), 
                            'Tuesday' => devTranslate('admin.Dinsdag', 'Dinsdag'),
                            'Wednesday' => devTranslate('admin.Woensdag', 'Woensdag'),
                            'Thursday' => devTranslate('admin.Donderdag', 'Donderdag'),
                            'Friday' => devTranslate('admin.Vrijdag', 'Vrijdag'),
                            'Saturday' => devTranslate('admin.Zaterdag', 'Zaterdag'),
                            'Sunday' => devTranslate('admin.Zondag', 'Zondag'),
                        ])
                        ->required(),
                    TimePicker::make('open_time')
                        ->label(__('Openingstijd'))
                        ->required()
                        ->displayFormat('HH:mm') // 24-hour format
                        ->seconds(false), // Hides seconds (optional)     
                    TimePicker::make('close_time')
                        ->label(__('Sluitingstijd'))
                        ->required()
                        ->displayFormat('HH:mm') // 24-hour format
                        ->seconds(false),
                    Toggle::make('is_closed')
                        ->label(__('Gesloten'))
                        ->default(0)    
                        ->label('Closed for the day'),
                    Textarea::make('notes')
                        ->label(__('Aanvullende Notities'))
                        ->columnSpanFull(),
                ])
                ->columnSpanFull(), // Ensures the section spans full width
        ])->model(VeterinariansOpeningTime::class);
    }


    public function save()
    {
       
        if (!empty($this->openingsTime['id'])){
            $this->openingsTime = VegetarianOpeningTime::find($this->openingsTime['id']);
            $state = "update";
        }
        else{
            $state = "create";
        }

        $data = $this->form->getState();
        $data['veterinarian_id'] =  $this -> veterinarian_id;
        $data['is_closed'] = $this->is_closed !== null ? $this->is_closed : 0;
        if (!empty($this->openingsTime['id'])){
            $data['id'] = $this->openingsTime['id'];

            if ($this->openingsTime->day_of_week !== $data['day_of_week']){
                unset($data['id']);
                $this->openingsTime = new VegetarianOpeningTime();
            }
        }
        $this->openingsTime->fill($data);
        $this->openingsTime->save();
       
        $this -> dispatch('saved');
        $result = Veterinarian::where('id', Auth::user()->id)->first();
        $this -> veterinarian_id = $result -> id;
        $this -> openingsTimes = VegetarianOpeningTime::where('veterinarian_id', $result -> id)->get();
        if ($state == "create"){
            $this->reset();
          
            session()->flash('success', devTranslate('cms.Openingstijden succesvol aangemaakt','Openingstijden succesvol aangemaakt'));
        }
        else{
            session()->flash('success', devTranslate('cms.Openingstijden succesvol bijgewerkt','Openingstijden succesvol bijgewerkt'));
        }

    }


    public function render()
    {
        $active = "times";
        return view('livewire.company.opening-times', ['active' => $active])->layout('layouts.company');
    }
}
