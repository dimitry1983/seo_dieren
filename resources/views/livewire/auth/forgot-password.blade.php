<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.site')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}; ?>

<div class="main-container relative w-full overflow-hidden">
    <!-- Hero Section -->
    <section class="section section--hero-interior bg-primaryLight relative py-[140px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png') }}" alt="">
        <div class="container mx-auto relative z-1">
            <h1 class="text-6xl text-center font-regular text-gray-800 relative z-3">
                {{devTranslate('page.Forgot Password', 'Wachtwoord Vergeten')}}
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0 hidden lg:block" src="{{ asset('dieren/src/public/img/contact.png') }}" alt="">
    </section>

    <!-- Forgot Password Form Section -->
    <section class="section section--forgot pb-[40px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-8">
                    <!-- Session Status -->
                    <x-auth-session-status class="text-center" :status="session('status')" />

                    <form wire:submit="sendPasswordResetLink" class="px-[50px] py-[60px] bg-[#202428] lg:h-full">
                        <x-auth-header title="{{devTranslate('page.Forgot Password', 'Wachtwoord Vergeten')}}" description="{{devTranslate('page.Enter your email to receive a password reset link', 'Voer je e-mailadres in om een wachtwoordherstel link te ontvangen')}}" />

                        <!-- Email Address -->
                        <flux:field>
                            <flux:label class="!text-base !font-normal !text-white block mb-2">{{ devTranslate('page.Email Address', 'E-mailadres') }}</flux:label>
                            <flux:input wire:model="email" type="email" name="email" required autofocus placeholder="email@example.com" />
                            <flux:error name="email" />
                        </flux:field>

                        <button variant="primary" type="submit" class="btn btn-primaryLight mt-5 w-full rounded-[5px] text-white">
                            {{ devTranslate('page.Email password reset link', 'E-mail wachtwoordherstel link') }}
                        </button>
                    </form>
                </div>
                <div class="lg:col-span-4 bg-gray-200">
                    <figure class="h-full">
                        <img class="h-full w-full object-cover" src="{{ asset('dieren/src/public/img/contact2.png') }}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--info pt-[40px] pb-0 text-center">
        <div class="container mx-auto">
            <p class="text-gray-800 text-lg">{{devTranslate('page.Or, return to', 'Of, ga terug naar')}} <a href="{{ route('login') }}" class="text-primary font-bold">{{ devTranslate('page.log in', 'Inloggen') }}</a></p>
        </div>
    </section>
</div>