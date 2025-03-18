<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Prices extends Component
{
    public function render()
    {
        $active = "prices";
        return view('livewire.company.prices', ['active' => $active])->layout('layouts.company');
    }
}
