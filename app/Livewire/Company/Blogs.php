<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Blogs extends Component
{
    public function render()
    {
        $active = "blogs";
        return view('livewire.company.blogs', ['active' => $active])->layout('layouts.company');
    }
}
