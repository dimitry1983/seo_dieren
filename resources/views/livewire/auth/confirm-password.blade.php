<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.site')] class extends Component {
    public string $password = '';

    /**
     * Confirm the current user's password.
     */
    public function confirmPassword(): void
    {
        $this->validate([
            'password' => ['required', 'string'],
        ]);

        if (! Auth::guard('web')->validate([
            'email' => Auth::user()->email,
            'password' => $this->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        $this->redirectIntended(default: route('company.dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="main-container relative w-full overflow-hidden">
    <!-- Hero Section -->
    <section class="section section--hero-interior bg-primaryLight relative py-[140px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png') }}" alt="">
        <div class="container mx-auto relative z-1">
            <h1 class="text-6xl text-center font-regular text-gray-800 relative z-3">
                {{devTranslate('page.Confirm Password', 'Bevestig Wachtwoord')}}
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0 hidden lg:block" src="{{ asset('dieren/src/public/img/contact.png') }}" alt="">
    </section>

    <!-- Confirm Password Form Section -->
    <section class="section section--confirm pb-[40px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-8">
                    <!-- Session Status -->
                    <x-auth-session-status class="text-center" :status="session('status')" />

                    <form wire:submit="confirmPassword" class="px-[50px] py-[60px] bg-[#202428] lg:h-full">
                        <x-auth-header
                            title="{{devTranslate('page.Confirm Password', 'Bevestig Wachtwoord')}}"
                            description="{{devTranslate('page.This is a secure area of the application. Please confirm your password before continuing.', 
             'Dit is een beveiligd gedeelte van de applicatie. Bevestig je wachtwoord voordat je verder gaat.')}}"
                        />

                        <!-- Password Field -->
                        <flux:field class="grid gap-2">
                            <flux:input
                                wire:model="password"
                                id="password"
                                label="{{ devTranslate('page.Password', 'Wachtwoord') }}"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="{{devTranslate('page.Password', 'Wachtwoord')}}"
                            />
                        </flux:field>

                        <flux:button variant="primary" type="submit" class="btn btn-primaryLight w-full rounded-[5px] text-white">
                            {{ devTranslate('page.Confirm', 'Bevestigen') }}
                        </flux:button>
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

    <!-- Info Section -->
    <section class="section section--info pt-[40px] pb-0 text-center">
        <div class="container mx-auto">
            <p class="text-gray-800 text-lg">
                {{devTranslate('page.Or, return to', 'Of, ga terug naar')}} <x-text-link href="{{ route('login') }}">{{ devTranslate('page.log in', 'Inloggen') }}</x-text-link>
            </p>
        </div>
    </section>
</div>
