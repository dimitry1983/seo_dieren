<?php

namespace App\Livewire\Company;

use App\Models\Claim;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::user();

        $claim = Claim::where('email', $user -> email)->where('status', 'Pending')->first();

        $active = "dashboard";
        return view('livewire.company.dashboard', ['active' => $active, 'claim' => $claim])->layout('layouts.company');
    }
}
