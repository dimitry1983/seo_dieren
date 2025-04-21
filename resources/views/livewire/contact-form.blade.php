<div class="main-container relative w-full overflow-hidden">

    <div wire:loading wire:target="submit" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-35 z-50">
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

    

    <section class="section section--hero-interior bg-primaryLight relative py-[60px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png')}}" alt="">
        <div class="container header__content mx-auto relative z-1">
            <h1 class="text-center font-regular text-gray-800 relative z-3 leading-tight md:leading-tight lg:leading-normal">
                {{ devTranslate('page.Contact', 'Contact') }} <strong>{{ devTranslate('page.Us', 'Ons') }}</strong>
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0 hidden lg:block" src="{{ asset('dieren/src/public/img/contact.png')}}" alt="">
    </section>

    <section class="section section--contact contact-form pb-[40px]">
        <div class="container mx-auto">
            <div class="flex items-center space-x-2 flex-wrap mb-2">
                <span class="text-base text-[#009999]">{{ devTranslate('page.U bevindt zich hier:', 'U bevindt zich hier:')}}</span>
                <ul class="flex items-center space-x-2 flex-wrap">
                    <li><a href="/" class="text-base text-[#009999]">Home</a></li>

                    <span class="text-base text-[#009999]">/</span>
                    <li class="text-base text-[#000]"> Contact </li>
                </ul>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-8">
                    <form wire:submit.prevent="submit" class="px-[50px] py-[60px] bg-[#202428] lg:h-full">
                        @if (session()->has('message'))
                            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                                {{ session('message') }}
                            </div>
                        @endif

                        <x-honeypot livewire-model="extraFields" />
                        <p class="text-white">
                            {{ devTranslate('page.Leave us a message and we will help you with any questions about veterinary clinics, services or how to use our directory.', 'Laat ons een bericht achter en we helpen je met vragen over dierenklinieken, diensten of hoe je onze gids kunt gebruiken.') }}
                        </p>
                        <p class="text-primary">
                            {{ devTranslate('page.We are here for you and your pet!', 'Wij zijn hier voor jou en je huisdier!') }}
                        </p>
                        <label class="text-white block mb-2">
                            {{ devTranslate('page.Name', 'Naam') }}
                        </label>
                        <input wire:model="name" class="rounded-[5px] px-2 w-full py-2" type="text">
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <label class="text-white block my-2">
                            {{ devTranslate('page.Telephone', 'Telefoon') }}
                        </label>
                        <input wire:model="telephone" class="rounded-[5px] px-2 w-full py-2" type="text">
                        @error('telephone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <label class="text-white block my-2">
                            {{ devTranslate('page.Email', 'E-mail') }}
                        </label>
                        <input wire:model="email" class="rounded-[5px] px-2 w-full py-2" type="text">
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <label class="text-white block my-2">
                            {{ devTranslate('page.Message', 'Bericht') }}
                        </label>
                        <textarea wire:model="message" class="rounded-[5px] px-2 w-full py-2"></textarea>
                        @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <button wire:loading.remove wire:loading.attr="disabled" class="btn btn-primaryLight w-full rounded-[5px] text-white mt-10">{{ devTranslate('page.Send', 'Verstuur') }}</button>
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

</div>    