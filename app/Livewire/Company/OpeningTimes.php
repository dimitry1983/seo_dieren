<?php

namespace App\Livewire\Company;

use Livewire\Component;

class OpeningTimes extends Component
{
    public function render()
    {
        $active = "times";
        return view('livewire.company.opening-times', ['active' => $active])->layout('layouts.company');
    }
}
