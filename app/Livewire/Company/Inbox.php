<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Inbox extends Component
{
    public function render()
    {
        $active = "inbox";
        return view('livewire.company.inbox', ['active' => $active])->layout('layouts.company');
    }
}
