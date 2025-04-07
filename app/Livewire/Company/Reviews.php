<?php

namespace App\Livewire\Company;

use App\Models\Review;
use App\Models\Veterinarian;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reviews extends Component
{

    public $reviews;

    public $parent_id;
    public $description;

    public $name;

    public $recencie;
    public $veterinarian_id;

    public function mount(){
        $results = Veterinarian::where('user_id', Auth::user()->id)->first();
        $this -> veterinarian_id = $results -> id;
    
        $result = Review::where('veterinarian_id', $results->id)->get();
        
        $this->reviews = $result;
    }

    public function loadReview($id){
       
        $recencie  = Review::where('veterinarian_id',     $this -> veterinarian_id )->find($id);
        $this -> parent_id = $recencie -> id;
        $this -> recencie = $recencie -> description;
    }

    public function save(){
        $result = Veterinarian::where('user_id', Auth::user()->id)->first();
        if (!empty($this -> parent_id) && !empty($this -> description)){
            $recencie = new Review();
            $recencie -> name = $this -> name;
            $recencie -> description = $this -> description;
            $recencie -> parent_id = $this -> parent_id;
            $recencie -> rating = 3;
            $recencie -> city = 1;
            $recencie -> parent_id = $this -> parent_id;
            $recencie -> veterinarian_id = $result->id;
            $recencie -> save();
            $this->reset();
            session()->flash('success', devTranslate('cms.Recensie is succesvol beantwoord','Recensie is succesvol beantwoord'));
        }
        else{
            $this->reset();
            session()->flash('error', devTranslate('cms.Vul in de verplichte velden','Vul in de verplichte velden'));
        }
        $this -> dispatch('saved');
    }

    public function render()
    {
        $active = "reviews";
        $results = Veterinarian::where('user_id', Auth::user()->id)->first();
        $result = Review::where('veterinarian_id', $results->id)->get();
        $veterinarians = Veterinarian::with(['reviews' => function ($query) {
            $query->whereNull('parent_id')->with('responses');
        }])
        ->where('id', $results -> id)
        ->paginate(5);
        return view('livewire.company.reviews', ['active' => $active, 'veterinarians' => $veterinarians])->layout('layouts.company');
    }
}
