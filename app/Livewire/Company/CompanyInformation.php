<?php

namespace App\Livewire\Company;

use Livewire\Component;

class CompanyInformation extends Component
{
    public function render()
    {
        $active = "company-information";
        return view('livewire.company.company-information', ['active' => $active])->layout('layouts.company');;
    }
}
