<?php

namespace App\Livewire\Company;

use App\Models\Veterinarian;
use App\Models\VeterinariansImage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Media extends Component implements HasForms
{
    use \Filament\Forms\Concerns\InteractsWithForms;

    public $name;
    public $featured;
    public $veterinarian_id;

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Images') // Title of the section
            ->schema([
                FileUpload::make('name')
                    ->image()
                    ->required()
                    ->directory('uploads') // Adjust the directory where images should be stored
                    ->maxSize(2048), // Max file size in KB (2MB)
                
                Toggle::make('featured')
                    ->required(),

                Select::make('veterinarian_id')
                    ->searchable()
                    ->label('Veterinarian')
                    ->options(Veterinarian::pluck('name', 'id')->toArray())    
                    ->required(),
            ]),
        ])->model(VeterinariansImage::class);
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
        $active = "media";
        return view('livewire.company.media', ['active' => $active])->layout('layouts.company');
    }
}
