<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('layouts.site')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    public function login(): void
    {
        $this->validate();
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
};
?>
<div class="main-container relative w-full overflow-hidden">
    <section class="section section--hero-interior bg-primaryLight relative py-[140px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png') }}" alt="">
        <div class="container mx-auto relative z-1">
            <h1 class="text-6xl text-center font-regular text-gray-800 relative z-1">
                Log In
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0 hidden lg:block" src="{{ asset('dieren/src/public/img/contact.png') }}" alt="">
    </section>

    <section class="section section--login pb-[40px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-8">
 
                    <!-- Session Status -->
                    <x-auth-session-status class="text-center" :status="session('status')" />

                    <form wire:submit="login" class="px-[50px] py-[60px] bg-[#202428] lg:h-full">

                        <x-auth-header title="Log in to your account" description="Enter your email and password below to log in" />

                        <!-- Email Address -->
                        <flux:field>
                            <flux:label class="text-white mb-2">{{ __('Email address') }}</flux:label>
                            <flux:input wire:model="email" type="email" name="email" required autofocus autocomplete="email" placeholder="email@example.com" />
                            <flux:error name="email" />
                        </flux:field>
                        <!-- Password -->
                        
                        <div class="relative">
                            <flux:field class="my-5">
                                <flux:label class="text-white mb-2">Password</flux:label>

                                <flux:input
                                    wire:model="password"
                                    type="password"
                                    name="password"
                                    default=""
                                    required
                                    autocomplete="current-password"
                                    placeholder="Password"
                                    class:input="rounded-[5px] w-full py-1" 
                                />

                                <flux:error name="password" />
                            </flux:field>

                          
                            @if (Route::has('password.request'))
                                <x-text-link class="absolute right-0 top-0 text-white" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </x-text-link>
                            @endif
                    
                        </div>
                     
                            <label class="flex items-center space-x-4">
                                <input type="checkbox" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                                <span class="text-white ml-2">{{ __('Remember me') }}</span>
                            </label>
                        

                        <flux:button variant="primary" type="submit" class="btn btn-primaryLight w-full rounded-[5px] text-white">{{ __('Log in') }}</flux:button>
                    
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
            <p class="text-gray-800 text-lg">Don't have an account? <a href="{{ route('register') }}" class="text-primary font-bold">Sign up</a></p>
        </div>
    </section>
</div>

