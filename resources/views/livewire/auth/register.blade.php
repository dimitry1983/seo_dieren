<?php

use App\Models\Claim;
use App\Models\User;
use App\Models\Veterinarian;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use PhpParser\Node\NullableType;

new #[Layout('layouts.site')] class extends Component {
    public string $name = '';
    public $claim_vet_id = '';
    public string $site_id = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public array $notClaimedVeterinarians = [];


    public function mount(){
        $this->notClaimedVeterinarians = Veterinarian::where('user_id', 1)->get()->pluck('name', 'id')->toArray(); 
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'claim_vet_id' => ['nullable', 'exists:veterinarians,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class . ',email,NULL,id,site_id,' . $this->site_id,  // Ensuring email is unique per site_id
            ],
            'site_id' => ['nullable', 'int'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['site_id'] = session('website')->id;
        event(new Registered(($user = User::create($validated))));

        if (!empty($validated['claim_vet_id'])){
            $claim                    = new Claim();
            $claim -> veterinarian_id = $validated['claim_vet_id'];
            $claim -> email           = $validated['email'];
            $claim -> details         = "Geclaimd account";
            $claim -> status          = "Pending";
            $claim -> created_at      = date('Y-m-d H:i:s');
            $claim -> updated_at      = date('Y-m-d H:i:s');
            $claim -> save();
        }

        Auth::login($user);

        $this->redirect(route('company.dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="main-container relative w-full overflow-hidden">
   
    <div wire:loading wire:target="register" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-35 z-50">
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

    <section class="section section--hero-interior bg-secondaryLight relative py-[60px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png') }}" alt="">
        <div class="container header__content mx-auto relative z-1">
            <h1 class="text-center font-regular text-gray-800 relative z-3">
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

        <!-- Optional Business Claim -->
        <div class="grid">
            <flux:field class="my-2">
                <flux:label class="!text-base !font-normal !text-white block mb-2">
                    {{ devTranslate('Claim your business (optional)', 'Claim uw bedrijf (optioneel)') }}
                </flux:label>
                <p class="text-sm text-white mb-2">
                    {{ devTranslate(
                        'To claim your business, please use your business email that matches your domain.',
                        'Voor het claimen van uw bedrijf dien je je zakelijk mail te gebruiken die bij uw domein past.'
                    ) }}
                </p>
                <select
                    wire:model="claim_vet_id"
                    class="!rounded-lg w-full px-3 py-2 border-gray-300 focus:ring focus:ring-primary focus:outline-none"
                >
                    <option value="">{{ devTranslate('Do not claim a business', 'Claim geen bedrijf') }}</option>
                    @foreach($notClaimedVeterinarians as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <flux:error name="claim_vet_id" />
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
