<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Media extends Component
{
    public function render()
    {
        $active = "media";
        return view('livewire.company.media', ['active' => $active])->layout('layouts.company');
    }
}
