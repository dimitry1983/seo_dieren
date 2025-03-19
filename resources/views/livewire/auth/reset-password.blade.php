<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.site')] class extends Component {
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PasswordReset) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }
}; ?>

<div class="main-container relative w-full overflow-hidden">
    <!-- Hero Section -->
    <section class="section section--hero-interior bg-primaryLight relative py-[140px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png') }}" alt="">
        <div class="container mx-auto relative z-1">
            <h1 class="text-6xl text-center font-regular text-gray-800 relative z-3">
                Reset Password
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0 hidden lg:block" src="{{ asset('dieren/src/public/img/contact.png') }}" alt="">
    </section>

    <!-- Form Section -->
    <section class="section section--login pb-[40px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-8">
                    <form wire:submit="resetPassword" class="px-[50px] py-[60px] bg-[#202428] lg:h-full">
                        <x-auth-header title="Reset Password" description="Please enter your new password below" />
                        
                        <!-- Session Status -->
                        <x-auth-session-status class="text-center" :status="session('status')" />

                        <!-- Email Address -->
                        <div class="grid gap-2">
                            <flux:field class="my-5">
                                <flux:label class="text-white mb-2">{{ __('Email') }}</flux:label>
                                <flux:input wire:model="email" id="email" type="email" name="email" required autocomplete="email" placeholder="email@example.com" />
                                <flux:error name="email" />
                            </flux:field>
                        </div>

                        <!-- Password -->
                        <div class="grid gap-2">
                            <flux:field class="my-5">
                                <flux:label class="!text-base !font-normal !text-white block mb-2">{{ __('Password') }}</flux:label>
                                <flux:input
                                    wire:model="password"
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Password"
                                />
                                <flux:error name="password" />
                            </flux:field>
                        </div>

                        <!-- Confirm Password -->
                        <div class="grid gap-2">
                            <flux:field class="my-5">
                                <flux:label class="!text-base !font-normal !text-white block mb-2">{{ __('Confirm password') }}</flux:label>
                                <flux:input
                                    wire:model="password_confirmation"
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Confirm password"
                                />
                                <flux:error name="password_confirmation" />
                            </flux:field>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" variant="primary" class="btn btn-primaryLight mt-5 w-full rounded-[5px] text-white">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
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
                Remembered your password?
                <a href="{{ route('login') }}" class="text-primary font-bold">Log in</a>
            </p>
        </div>
    </section>
</div>
