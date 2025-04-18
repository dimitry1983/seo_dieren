<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;


class ContactForm extends Component
{

    use UsesSpamProtection;
    public $name;
    public $telephone;
    public $email;
    public $subject;
    public $message;
    public HoneypotData $extraFields;

    protected $rules = [
        'name' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:1000',
    ];

    public function mount(){
        $this->extraFields = new HoneypotData();
    }

    public function submit()
    {
        $this->protectAgainstSpam();
        $this->validate();

        $adminEmail = env('EMAIL_ADMIN', 'info@vergelijkdierenartst.nl');
        $this->subject = "Contact via website";

        $this->message = $this->message."\n\n Verzender: ".$this->email."\n".$this->email; 

        // Example of sending an email (commented out):
        Mail::to($adminEmail)
              ->send(new \App\Mail\ContactMail($this->name, $adminEmail, $this->subject, $this->message));

        // Reset the form fields
        $this->reset();

        // Process the form data (e.g., send an email, save to DB, etc.)
        session()->flash('message', 'Thank you for your message! We will get back to you soon.');

        // Or redirect if needed
        // return redirect()->route('thank-you');
    }

    public function render()
    {

        return view('livewire.contact-form')->layout('layouts.site');
    }
}