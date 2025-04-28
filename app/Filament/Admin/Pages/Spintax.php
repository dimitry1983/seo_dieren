<?php

namespace App\Filament\Admin\Pages;

use App\Models\Category;
use App\Models\City;
use App\Models\Page as ModelsPage;
use App\Models\Seopage;
use App\Models\Seosubdomains;
use App\Models\TemplatesSeo;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Pages\Page;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class Spintax extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-variable';

    protected static ?string $navigationGroup = 'SEO';

    protected static string $view = 'filament.pages.spintax';

    protected static ?int $navigationSort = 17;

    public $template_id;
    public $settings; 
    public $parent_id; 
    public $parent_page;
    public $custom_link; 
    public $text_title; 
    public $description_top; 
    public $description_bottom;
    public $seo_title; 
    public $seo_description; 
    public $example_text_title; 
    public $example_description_top; 
    public $example_description_bottom;
    public $example_seo_title; 
    public $example_seo_description; 
    public $cat_id;
    public $all;
    public $loading=false;

    
    public function mount(){
        
    }

    public function updatedTemplateId($value)
    {
        $templateSeo = TemplatesSeo::find($this -> template_id);

        if (!empty($templateSeo)):
            $this -> cat_id = $templateSeo -> parent_id;
            $this -> custom_link = $templateSeo -> custom_link;
            $this -> text_title = $templateSeo -> title;
            $this -> description_top = $templateSeo -> description_top;
            $this -> description_bottom = $templateSeo -> description_bottom;
            $this -> seo_title = $templateSeo -> seo_title;
            $this -> seo_description = $templateSeo -> seo_description;
        else:
            //reset values
            $this -> cat_id = '';
            $this -> custom_link = '';
            $this -> text_title = '';
            $this -> description_top = '';
            $this -> description_bottom = '';
            $this -> seo_title = '';
            $this -> seo_description = '';
        endif;
     
    }

    protected $rules = [
       // 'parent_id' => 'required',
        'custom_link' => 'required',
        'text_title' => 'required',
        'description_top' => 'required',
        'description_bottom' => 'required',
        'seo_title' => 'required',
        'seo_description' => 'required',
    ];
    
    protected function getFormSchema(): array
    {
        return [
            Section::make('Selecteer een pagina waar je de seo steden voor wilt publiceren')
            ->schema([
                Select::make('template_id')->live()->options(TemplatesSeo::get()->pluck('title', 'id')),
                Select::make('parent_page')->label('Parent page')->options(ModelsPage::where('site_id', session('website')->id)->get()->pluck('title', 'id')),
                //Select::make('site_id')->label('Category')->options(Category::get()->pluck('title', 'id')),
                //Checkbox::make('all')->label('Generate Text for all Subdomains'),
                TextInput::make('custom_link')
                ->helperText('Bijvoorbeeld : "dierenarts"
"spoeddierenarts"
"dierenarts-spoed"
"dierenarts-kliniek"
"dierenarts-reviews"')
                ->required(),
            ]),
            Section::make('Content Generatie')
            ->schema([
                TextInput::make('text_title')->required(),
                RichEditor::make('description_top')->required(),
                RichEditor::make('description_bottom')->required(),
            ]),
            Section::make('SEO')
            ->schema([
                TextInput::make('seo_title')->required(),
                RichEditor::make('seo_description')->required(),
            ]),
        ];
    }

    public function saveTemplate(){
        $this->validate();
      
            if ($this -> template_id > 0){
                $templateSeo = TemplatesSeo::find($this -> template_id);
            } else{
                $templateSeo = new TemplatesSeo();
            }

            $templateSeo -> parent_id = $this -> parent_page;
            $templateSeo -> custom_link = sanitize_title($this -> custom_link);
            $templateSeo -> title = $this -> text_title;
            $templateSeo -> description_top = $this -> description_top;
            $templateSeo -> description_bottom = $this -> description_bottom;
            $templateSeo -> seo_title = $this -> seo_title;
            $templateSeo -> seo_description = $this -> seo_description;
            $templateSeo -> created_at = date('Y-m-d H:i:s');
            $templateSeo -> updated_at = date('Y-m-d H:i:s');
            $templateSeo -> save();

            Notification::make() 
                        ->title('Template saved successfully')
                        ->success()
                        ->send();

    }


    public function example(){
        //this are the dutch places
        $cities = City::where('country_id', 1)->get();
        $teller = 0;
        
                foreach($cities as $city){
                    if ($teller == 0){
                        $content = str_replace('[city]', $city->name, $this->seo_title);
                        $this -> example_seo_title  = $this->process_text($content);

                        $content = str_replace('[city]', $city->name, $this->seo_description);
                        $this -> example_seo_description  = $this->process_text($content);

                        $content = str_replace('[city]', $city->name, $this->text_title);
                        $this -> example_text_title  = $this->process_text($content);

                        $content = str_replace('[city]', $city->name, $this->description_top);
                        $this -> example_description_top  = $this->process_text($content);

                        $content = str_replace('[city]', $city->name, $this->description_bottom);
                        $this -> example_description_bottom  = $this->process_text($content);
                    }
                    else{
                        return;
                    }
                    $teller++;
                } 
                Notification::make() 
                    ->title('Example has been generated')
                    ->success()
                    ->send();          
          
    }

    public function generate(){
        $this->loading = false;
        //here we got 2 options 1 for pages with cities one for subdomains

        $cities = City::where('country_id', 1)->select('name')->groupBy('name')->get();
        $teller = 0;
        foreach($cities as $city){
                $content = str_replace('[city]', $city->name, $this->seo_title);
                $this -> example_seo_title  = $this->process_text($content);

                $content = str_replace('[city]', $city->name, $this->seo_description);
                $this -> example_seo_description  = $this->process_text($content);

                $content = str_replace('[city]', $city->name, $this->text_title);
                $this -> example_text_title  = $this->process_text($content);

                $content = str_replace('[city]', $city->name, $this->description_top);
                $this -> example_description_top  = $this->process_text($content);

                $content = str_replace('[city]', $city->name, $this->description_bottom);
                $this -> example_description_bottom  = $this->process_text($content);

                $provinceSlug = City::getProvinceSlugByCity($city->name);

                //here comes the save function
                $attributes = [
                    'city' => $city->name, // Replace $cityValue with the value for the city
                    'parent_page' => $this->parent_page, // Replace $parentPageIndexValue with the value for parent_page Index
                    'site_id' => session('website')->id
                ];
                
                $values = [
                    // Define other values for the columns you want to set or update
                    'custom_link' => $this->custom_link,
                    'meta_title' => $this -> example_seo_title,
                    'meta_description' => $this -> example_seo_description,
                    'title' => $this -> example_text_title,
                    'top_description' => $this -> example_description_top,
                    'bottom_description' => $this -> example_description_bottom,
                    'slug' => '/'.sanitize_title($city->name),
                    'active' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                    // Other columns as needed
                ];

                Seopage::updateOrCreate($attributes, $values);
                $this->loading = true;
        }

        Notification::make() 
            ->title('SEO pages created')
            ->success()
            ->send();
  
    }

    public function process_text($text)
    {
        return preg_replace_callback(
            '/\{(((?>[^\{\}]+)|(?R))*?)\}/x',
            array($this, 'replace_text'),
            $text
        );
    }

    public function replace_text($text)
    {
        $text = $this->process_text($text[1]);
        $parts = explode('|', $text);
        return $parts[array_rand($parts)];
    }
}