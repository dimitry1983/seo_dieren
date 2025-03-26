<?php

namespace App\Livewire\Company;

use App\Models\Veterinarian;
use App\Models\VeterinariansImage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Media extends Component 
{
    use WithFileUploads, WithFilePond;

    public $name;
    public $featured;
    public $veterinarian_id;
    public $file = [];

    public $count;
    public $allowedImages = 10;

    public $images;

    public function rules(): array
    {
        return [
            'file' => 'required|array', // Validate that 'file' is an array
            'file.*' => 'mimetypes:image/jpg,image/jpeg,image/png,image/webp|max:3000', // Validate each file within the array
        ];
    }

    public function mount(){
        $result = Veterinarian::where('id', Auth::user()->id)->first();

        $images = VeterinariansImage::where('veterinarian_id', $result -> id)->get();
        $this->images = $images;
        $this->count = count($images);
    }

    public function deleteImage($image, $id)
    {
         $imagePath = ltrim($image, '/');
        if (Storage::disk('public')->exists($imagePath)) {
           
            $arrayDirectories = ['big', 'thumb', 'medium'];
            if (!empty($arrayDirectories)){
                foreach ($arrayDirectories as $directory){
                     $imagePath1 = str_replace('thumb', $directory, $imagePath);
                    
                     if (Storage::disk('public')->exists($imagePath1)) {
            
                        Storage::disk('public')->delete($imagePath1);
                    }
                }
            }
            VeterinariansImage::where('id', $id)->delete();
            Storage::disk('public')->delete($imagePath);
            $result = Veterinarian::where('id', Auth::user()->id)->first();
            $images = VeterinariansImage::where('veterinarian_id', $result -> id)->get();
            $this->images = $images;
            $this->count = count($images);
            $this->dispatch('imageDeleted');
        }
    }

    public function setAsLogo($imageId)
    {
        // Update the logo in your database or logic here
        $image = VeterinariansImage::find($imageId);
        if ($image) {
            // Assuming your model has a "is_logo" field or similar
            VeterinariansImage::where('featured', true)->update(['featured' => false]);
            $image->update(['featured' => true]);
            session()->flash('success', __('Logo succesvol ingesteld!'));
        }
        $this -> dispatch('saved');
    }

    public function save()
    {
        $this->validate();
        $result = Veterinarian::where('id', Auth::user()->id)->first();
        $teller = 0 +  $this->count;
    
        if (!empty($this->file)):
         
            foreach ($this->file as $image) {
                if ($teller < 11){
                    $extension = $image->getClientOriginalExtension(); 
                    $filename = Str::random(10). '.webp'; // Unique filename

                    // Process Big Image (1200px width)
                    
                    $bigImage = Image::make($image->getRealPath())->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $bigPath = "dierenarsten/big/{$filename}";
                    Storage::disk('public')->put($bigPath, $bigImage);

                    // Process Medium Image (310px width)
                    $mediumImage = Image::make($image->getRealPath())->resize(310, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $mediumImage = $mediumImage->encode('webp', 80);
                    // Load your watermark image
                    $watermark = Image::make(public_path('img/waterbrand.png'));

                    // Resize the watermark to the full width of the main image while maintaining its aspect ratio
                    $watermarkWidth = $mediumImage->width();
                    $watermark->resize($watermarkWidth, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    // Insert the watermark at the bottom of the main image
                    $mediumImage->insert($watermark, 'bottom');

                    // Encode the image in WebP format with 80% quality
                    $mediumImage = $mediumImage->encode('webp', 80);

                    $mediumPath = "dierenarsten/medium/{$filename}";
                    Storage::disk('public')->put($mediumPath, $mediumImage);

                    // Process Thumbnail (100x100)
                    $thumbImage = Image::make($image->getRealPath())->fit(100, 100)->encode('webp', 80);
                    $thumbPath = "dierenarsten/thumb/{$filename}";
                    Storage::disk('public')->put($thumbPath, $thumbImage);

                    // Store paths in array
                   VeterinariansImage::create([
                        'name' => $filename,
                        'featured' => $this->featured,
                        'veterinarian_id' => $result -> id,
                    ]);  
                    $teller++;
                }
            }
        endif;


        $result = Veterinarian::where('id', Auth::user()->id)->first();

        $images = VeterinariansImage::where('veterinarian_id', $result -> id)->get();
        $this->images = $images;
        $this->count = count($images);

        //$data['veterinarian_id'] = Auth::user()->id;

       // VeterinariansImage::create($data);

       // $this->resetForm();
        $this -> dispatch('saved');
        session()->flash('success', 'Image uploaded and data saved successfully.');
    }

    public function render()
    {
        $active = "media";
        return view('livewire.company.media', ['active' => $active])->layout('layouts.company');
    }
}
