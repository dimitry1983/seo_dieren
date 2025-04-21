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
    <div wire:loading wire:target="resetPassword" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-35 z-50">
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
    <section class="section section--hero-interior bg-primaryLight relative py-[60px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png') }}" alt="">
        <div class="container header__content mx-auto relative z-1">
            <h1 class="text-center font-regular text-gray-800 relative z-3">
                {{devTranslate('page.Reset Password', 'Wachtwoord Resetten')}}
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
                        <x-auth-header title="{{devTranslate('page.Reset Password', 'Wachtwoord Resetten')}}" description="{{devTranslate('page.Please enter your new password below', 'Voer hieronder je nieuwe wachtwoord in')}}" />
                        
                        <!-- Session Status -->
                        <x-auth-session-status class="text-center" :status="session('status')" />

                        <!-- Email Address -->
                        <div class="grid gap-2">
                            <flux:field class="my-5">
                                <flux:label class="text-white mb-2">{{ devTranslate('page.Email', 'E-mail') }}</flux:label>
                                <flux:input wire:model="email" id="email" type="email" name="email" required autocomplete="email" placeholder="email@example.com" />
                                <flux:error name="email" />
                            </flux:field>
                        </div>

                        <!-- Password -->
                        <div class="grid gap-2">
                            <flux:field class="my-5">
                                <flux:label class="!text-base !font-normal !text-white block mb-2">{{ devTranslate('page.Password', 'Wachtwoord') }}</flux:label>
                                <flux:input
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
                        <div class="grid gap-2">
                            <flux:field class="my-5">
                                <flux:label class="!text-base !font-normal !text-white block mb-2">{{ devTranslate('page.Confirm password', 'Bevestig wachtwoord') }}</flux:label>
                                <flux:input
                                    wire:model="password_confirmation"
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="{{devTranslate('page.Confirm password', 'Bevestig wachtwoord')}}"
                                />
                                <flux:error name="password_confirmation" />
                            </flux:field>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" variant="primary" class="btn btn-primaryLight mt-5 w-full rounded-[5px] text-white">
                                {{ devTranslate('page.Reset Password', 'Wachtwoord Resetten') }}
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
                {{devTranslate('page.Remembered your password?', 'Wachtwoord herinnerd?')}}
                <a href="{{ route('login') }}" class="text-primary font-bold">{{devTranslate('page.Log in', 'Inloggen')}}</a>
            </p>
        </div>
    </section>
</div>
