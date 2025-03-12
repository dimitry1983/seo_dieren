<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $active = "dashboard";
        return view('livewire.company.dashboard', ['active' => $active])->layout('layouts.company');
    }
}
