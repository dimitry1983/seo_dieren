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
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Blogs extends Component implements HasForms
{
    use \Filament\Forms\Concerns\InteractsWithForms;
     
    public $thumb;
    public $name;
    public $excerpt;
    public $description;
    public $status;

    public $files = [];


    public $result;

    public $blog;

    public function mount(){
        $this -> blog = new Blog(); 
        $this -> result = Veterinarian::where('id', Auth::user()->id)->first();
        $this->form->fill();
    }


    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make() // Title of the section
                ->schema([
                FileUpload::make('thumb')
                    ->label(__('Afbeelding'))
                    ->image()
                    ->required()
                    ->directory('blogs') // Adjust the directory where images should be stored
                    ->maxSize(2048),
                TextInput::make('name')
                    ->label(__('Titel'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('excerpt')
                    ->label(__('Korte Samenvatting'))
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
        
        if (isset($this->blog['id']) && !empty($this->blog['id'])){
            $state = "update";
            $results = Veterinarian::where('id', Auth::user()->id)->first();
            $this->blog = Blog::where('veterinarian_id', $results -> id)->find($this->blog['id']);
        }
        else{
            $state = "create";
        }
      
        if ($this->thumb) {
            // Assuming $this->thumb is an associative array
            // Example: ["003bba9c-e371-4b60-8c48-6ada533c479b" => "blogs/67e40d534e066.webp"]
            
            // Get the first file path from the array (or you can loop if needed)
            $filePath = reset($this->thumb); // This will give you the first value in the array, i.e., file path
            
            // Get the full path of the file from storage
            $tempPath = storage_path('app/public/' . $filePath); // Assuming public disk
            
            // Check if the file exists and is readable
            if (!file_exists($tempPath)) {
                // If the file does not exist, log an error or handle the issue
              //  dd("File not found: " . $tempPath);
            }
            
            // Check if the file is a valid image before opening
            try {
                $image = Image::make($tempPath);
            } catch (\Intervention\Image\Exception\NotReadableException $e) {
                // If the image cannot be read, log the error or handle accordingly
               // dd("Unable to read the image file: " . $tempPath);
            }
            
            // Encode the image to webp with 80% quality
            $image->encode('webp', 80);
            
            // Generate a unique file name
            $fileName = uniqid() . '.webp'; 
            
            // Get the storage disk (public in this case)
            $disk = Storage::disk('public');
            
            // Define the new path for the converted image
            $newFilePath = 'blogs/' . $fileName;
            
            // Save the image to the disk
            $disk->put($newFilePath, $image->__toString());
            
            // Optionally, get the file's public URL
            $publicUrl = $disk->url($newFilePath);
            
            // You can use $publicUrl for further operations (e.g., storing it in the database or returning it)
        }
    
        $data = $this->form->getState();
        $data['thumb'] = $filePath;
        $data['veterinarian_id'] = $this -> result -> id;

        $this -> blog ->fill($data);
        $this -> blog ->save();

        $this -> reset();
    
        $this -> dispatch('saved');
       
        if ($state == "create"){
         
            session()->flash('success', devTranslate('page.Nieuws item is succesvol aangemaakt','Nieuws item is succesvol aangemaakt'));
        }
        else{
            session()->flash('success', devTranslate('page.Nieuws item is succesvol bijgewerkt','Nieuws item is succesvol bijgewerkt'));
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
        $blogs = Blog::where('veterinarian_id', $results->id)->orderBy('id', 'DESC')->paginate(5);
        
        return view('livewire.company.blogs', ['active' => $active, 'blogs' => $blogs])->layout('layouts.company');
    }
}
