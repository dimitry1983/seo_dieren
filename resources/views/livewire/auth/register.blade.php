<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.site')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('company.dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="main-container relative w-full overflow-hidden">
    <section class="section section--hero-interior bg-primaryLight relative py-[140px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png') }}" alt="">
        <div class="container mx-auto relative z-1">
            <h1 class="text-6xl text-center font-regular text-gray-800 relative z-3">
                {{devTranslate('page.Registreren', 'Registreren')}}
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0 hidden lg:block" src="{{ asset('dieren/src/public/img/contact.png') }}" alt="">
    </section>

    <section class="section section--login pb-[40px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-8">


    <form wire:submit="register" class="px-[50px] py-[60px] bg-[#202428] lg:h-full">
        <x-auth-header title="{{devTranslate('page.Create an account', 'Maak een account aan')}}" description="{{devTranslate('page.Enter your details below to create your account', 'Vul je gegevens hieronder in om een account aan te maken')}}" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />
        <!-- Name -->
        <div class="grid gap-2">
            <flux:field class="my-2">
                <flux:label class="!text-base !font-normal !text-white block mb-2">{{ devTranslate('page.Name', 'Naam') }}</flux:label>

                <flux:input class="!rounded-lg" wire:model="name" id="name" type="text" name="name" required autofocus autocomplete="name" placeholder="{{ devTranslate('page.Name', 'Naam') }}" />

                <flux:error name="name" />
            </flux:field>
        </div>

        <!-- Email Address -->
        <div class="grid gap-2">
            <flux:field class="my-2">
                <flux:label class="!text-base !font-normal !text-white block mb-2">{{ devTranslate('page.Email address', 'E-mailadres') }}</flux:label>
                <flux:input class="!rounded-lg" wire:model="email" id="email" type="email" name="email" required autocomplete="email" placeholder="email@example.com" />
                <flux:error name="email" />
            </flux:field>
        </div>

        <!-- Password -->
        <div class="grid ">
            <flux:field class="my-2">
                <flux:label class="!text-base !font-normal !text-white block mb-2">{{ devTranslate('page.Password', 'Wachtwoord') }}</flux:label>
                <flux:input
                    class="!rounded-lg"
                    wire:model="password"
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="{{ devTranslate('page.Password', 'Wachtwoord') }}"
                />
                <flux:error name="password" />
            </flux:field>    
        </div>

        <!-- Confirm Password -->
        <div class="grid ">
            <flux:field class="my-2">
                <flux:label class="!text-base !font-normal !text-white block mb-2">{{ devTranslate('page.Confirm password', 'Bevestig wachtwoord') }}</flux:label>
                <flux:input
                    wire:model="password_confirmation"
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="{{ devTranslate('page.Confirm password', 'Bevestig wachtwoord') }}"
                />
                <flux:error name="password_confirmation" />
            </flux:field>   

        </div>

        <div class="flex items-center mt-5 justify-end">
            <button type="submit" variant="primary" class="btn btn-primaryLight w-full rounded-[5px] text-white">
                {{ devTranslate('page.Create account', 'Account aanmaken') }}
            </button>
        </div>
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
        <p class="text-gray-800 text-lg">{{devTranslate('page.Already have an account?', 'Heb je al een account?')}}
            <a href="{{ route('login') }}" class="text-primary font-bold">{{devTranslate('page.Log in', 'Log in')}}</a></p>
        </div>
    </section>
</div>
