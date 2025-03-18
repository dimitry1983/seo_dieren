<?php

namespace App\Livewire\Company;

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


    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Opening Hours')
                ->schema([
                    Select::make('day_of_week')
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
                        ->label('Opening Time')
                        ->required()
                        ->displayFormat('HH:mm') // 24-hour format
                        ->seconds(false), // Hides seconds (optional)     
                    TimePicker::make('close_time')
                        ->label('Closing Time')
                        ->required()
                        ->displayFormat('HH:mm') // 24-hour format
                        ->seconds(false),
                    Toggle::make('is_closed')
                        ->label('Closed for the day')
                        ->required(),
                    Textarea::make('notes')
                        ->label('Additional Notes')
                        ->columnSpanFull(),
                    Select::make('veterinarian_id')
                        ->searchable()
                        ->label('Veterinarian')
                        ->options(Veterinarian::pluck('name', 'id')->toArray())    
                        ->required(),
                ])
                ->columnSpanFull(), // Ensures the section spans full width
        ])->model(VeterinariansOpeningTime::class);
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
        $active = "times";
        return view('livewire.company.opening-times', ['active' => $active])->layout('layouts.company');
    }
}
