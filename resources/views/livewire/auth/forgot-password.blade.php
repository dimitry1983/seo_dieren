<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.site')] class extends Component {
    public string $email = '';
    public string $site_id = '';  // Add site_id property

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
            'site_id' => ['required', 'string'],  // Validate site_id
        ]);

        // Include site_id when sending the reset link
        Password::sendResetLink(
            $this->only('email', 'site_id')  // Pass site_id along with email
        );

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}; ?>

<div class="main-container relative w-full overflow-hidden">
    <div wire:loading wire:target="sendPasswordResetLink" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-35 z-50">
        <div class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-25">
            <div role="status">
                <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-[#0cc]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <!-- Hero Section -->
    <section class="section section--hero-interior bg-secondaryLight relative py-[60px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png') }}" alt="">
        <div class="container header__content mx-auto relative z-1">
            <h1 class="text-center font-regular text-gray-800 relative z-3">
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