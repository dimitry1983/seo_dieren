<?php

namespace App\Livewire\Company;

use App\Models\Blog;
use App\Models\Veterinarian;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Blogs extends Component implements HasForms
{
    use \Filament\Forms\Concerns\InteractsWithForms;
    use WithFileUploads;
     
    public $thumb;
    public $name;
    public $excerpt;
    public $description;
    public $status;

    public $files = [];

    public $_finishUpload;

    public $result;

    public $blog;

    public function mount(){
        $this -> blog = new Blog(); 
        $results = Veterinarian::where('id', Auth::user()->id)->first();
    }


    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Blog') // Title of the section
                ->schema([
                FileUpload::make('thumb')
                    ->image()
                    ->required()
                    ->directory('blogs') // Adjust the directory where images should be stored
                    ->maxSize(2048),
                TextInput::make('name')
                    ->label(__('Titel'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('excerpt')
                    ->label(__('Excerpt'))
                    ->required()
                    ->maxLength(255),
                RichEditor::make('description')
                    ->label(__('Omschrijving'))
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->required()
                    ->options([
                        'pending' => __('Draft'),
                        'active' => __('Actief'),
                    ]),    
            ])
        ])->model(Blog::class);
    }

    public function save(){
        
        dd($this-> files);

        if (!empty($this->blog->id)){
            $state = "update";
        }
        else{
            $state = "create";
        }

        if ($this->thumb) {
            // Store the file in the 'blogs' directory under the 'public' disk
            $tempPath = $this->thumb->getPathname(); // This gets the full path of the file in livewire-tmp

            // You can create a new name for the file or use the original file name
            $fileName = $this->thumb->getClientOriginalName(); // Or use something unique like uniqid() or a hash
    
            // Now, move the file to the 'public/blogs' directory
            $filePath = $this->thumb->storeAs('blogs', $fileName, 'public'); // 'public' is the disk
    
            // If file is stored, delete the temporary file
            if ($this->thumb instanceof TemporaryUploadedFile) {
                // Delete the temporary file
                $this->thumb->delete();
            }
        }
    
        $data = $this->form->getState();

        $data['thumb'] = $filePath;
        $data['veterinarian_id'] = $this -> results -> id;

        $this -> blog ->fill($data);
        $this -> blog ->save();


        $this -> dispatch('saved');
       
        if ($state == "create"){
         
            session()->flash('success', devTranslate('page.Bedrijfsinformatie succesvol aangemaakt','Bedrijfsgegevens succesvol aangemaakt'));
        }
        else{
            session()->flash('success', devTranslate('page.Bedrijfsinformatie succesvol bijgewerkt','Bedrijfsgegevens succesvol bijgewerkt'));
        }
    }

    public function loadBlog($id){
        $results = Veterinarian::where('id', Auth::user()->id)->first();
        $this->blog  = Blog::where('veterinarian_id', $results -> id)->find($id);
        $this->blog = $this->blog->toArray();
        $this->form->fill($this->blog);
    }

    public function render()
    {
        $active = "blogs";

        $results = Veterinarian::where('id', Auth::user()->id)->first();
        $blogs = Blog::where('veterinarian_id', $results->id)->get();
        
        return view('livewire.company.blogs', ['active' => $active, 'blogs' => $blogs])->layout('layouts.company');
    }
}
