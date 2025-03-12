<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Invoices extends Component
{
    public function render()
    {
        $active = "invoices";
        return view('livewire.company.invoices', ['active' => $active])->layout('layouts.company');
    }
}
