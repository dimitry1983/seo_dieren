<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.site')] class extends Component {
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="main-container relative w-full overflow-hidden">
    <!-- Hero Section -->
    <section class="section section--hero-interior bg-primaryLight relative py-[140px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png') }}" alt="">
        <div class="container mx-auto relative z-1">
            <h1 class="text-6xl text-center font-regular text-gray-800 relative z-1">
                Verify Email
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0 hidden lg:block" src="{{ asset('dieren/src/public/img/contact.png') }}" alt="">
    </section>

    <!-- Verification Section -->
    <section class="section section--login pb-[40px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <!-- Left Column: Verification Content -->
                <div class="lg:col-span-8">
                    <div class="px-[50px] py-[60px] bg-[#202428]">
                        <div class="mt-4 flex flex-col gap-6">
                            <div class="text-center text-sm text-gray-600">
                                {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="font-medium text-center text-sm text-green-600">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif

                            <div class="flex flex-col items-center justify-between space-y-3">
                                <flux:button wire:click="sendVerification" variant="primary" class="w-full">
                                    {{ __('Resend verification email') }}
                                </flux:button>

                                <button
                                    wire:click="logout"
                                    type="submit"
                                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                >
                                    {{ __('Log out') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Column: Side Image -->
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
                Already have an account?
                <a href="{{ route('login') }}" class="text-primary font-bold">Log in</a>
            </p>
        </div>
    </section>
</div>
