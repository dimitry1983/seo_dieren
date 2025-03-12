<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Reviews extends Component
{
    public function render()
    {
        $active = "reviews";
        return view('livewire.company.reviews', ['active' => $active])->layout('layouts.company');
    }
}
