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
    <div wire:loading wire:target="sendVerification" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-35 z-50">
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
    <section class="section section--hero-interior bg-primaryLight relative py-[140px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png') }}" alt="">
        <div class="container mx-auto relative z-1">
            <h1 class="text-6xl text-center font-regular text-gray-800 relative z-3">
                {{devTranslate('page.Verify Email', 'E-mail Verifiëren')}}
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0 hidden lg:block" src="{{ asset('dieren/src/public/img/contact.png') }}" alt="">
    </section>

    <!-- Verification Section -->
    <section class="section section--login pb-[40px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-8">
                <!-- Left Column: Verification Content -->
                <div class="lg:col-span-8">
                    <div class="px-[50px] py-[60px] bg-[#202428]">
                        <div class="mt-4 flex flex-col gap-6">
                            <div class="text-center !text-base !font-normal !text-white">
                                {{ devTranslate('page.Please verify your email address by clicking on the link we just emailed to you.', 'Verifieer je e-mailadres door op de link te klikken die we zojuist hebben gestuurd.') }}
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="font-medium text-center !text-base !font-normal !text-white">
                                    {{ devTranslate('page.A new verification link has been sent to the email address you provided during registration.', 'Een nieuwe verificatielink is verzonden naar het e-mailadres dat je tijdens de registratie hebt opgegeven.') }}
                                </div>
                            @endif

                            <div class="flex flex-col items-center justify-between space-y-3">
                                <flux:button wire:click="sendVerification" variant="primary" class="w-full !text-base !font-normal !text-primary">
                                    {{ devTranslate('page.Resend verification email', 'Verificatie-e-mail opnieuw verzenden') }}
                                </flux:button>

                                <button
                                    wire:click="logout"
                                    type="submit"
                                    class="!text-base !font-normal !text-white underline"
                                >
                                    {{ devTranslate('page.Log out', 'Uitloggen') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="section section--info pt-[40px] pb-0 text-center">
        <div class="container mx-auto">
            <p class="text-gray-800 text-lg">
                {{devTranslate('page.Already have an account?', 'Heb je al een account?')}}
                <a href="{{ route('login') }}" class="text-primary font-bold">{{devTranslate('page.Log in', 'Inloggen')}}</a>
            </p>
        </div>
    </section>
</div>
