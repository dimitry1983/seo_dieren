<?php

namespace App\Livewire\Company;

use App\Mail\SupportMessageMail;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SupportMessage extends Component
{
    public $message;

    protected $rules = [
        'message' => 'required|string|min:5',
    ];

    public function save()
    {
        $this->validate();

        // Send the support message email to the admin
        Mail::to(config('app.admin_email'))->send(new SupportMessageMail(Auth::user(), $this->message));

        $this->message = '';

        session()->flash('success', __('Jouw bericht is verzonden. Wij nemen zo snel mogelijk contact met je op.'));
        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.company.support-message')->layout('layouts.company');
    }
}
