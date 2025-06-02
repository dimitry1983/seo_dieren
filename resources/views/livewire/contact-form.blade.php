<div class="main-container relative w-full overflow-hidden">

    <div wire:loading wire:target="submit" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-35 z-50">
        <div class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-25">
            <div role="status">
                <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-[#5d4fc4]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    

   @php 

    use Illuminate\Support\Facades\Storage;

    $image =  Storage::url($headerBlock['background_image']) ?? asset('hondverzekeren/src/public/img/hero-bg.jpg');

    @endphp
    <!-- hero -->
    <section class="section section--primary section--hero section--page-header bg-cover bg-center bg-no-repeat text-white relative overflow-hidden" style="background-image: url('{{$image}}');">
        <div class="container text-center">
            <h1 class="section-title--lg lg:text-[60px] mb-2 font-medium">Contact</h1>
        </div>
    </section>

<section class="section section--contact contact-form pb-10 bg-[#f9f9ff]">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="flex items-center space-x-2 flex-wrap mb-6 text-sm text-[#5d4fc4]">
            <span>{{ devTranslate('page.U bevindt zich hier:', 'U bevindt zich hier:')}}</span>
            <ul class="flex items-center space-x-2 flex-wrap">
                <li><a href="/" class="hover:underline">Home</a></li>
                <span>/</span>
                <li class="text-black font-semibold">Contact</li>
            </ul>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12">
            <div class="lg:col-span-12">
                <form wire:submit.prevent="submit" class="bg-white shadow-lg rounded-xl px-8 py-10 lg:p-12 text-[#000] w-full max-w-3xl mx-auto">
                    
                    <!-- Success Message -->
                    @if (session()->has('message'))
                        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded border border-green-300 text-sm">
                            {{ session('message') }}
                        </div>
                    @endif

                    <x-honeypot livewire-model="extraFields" />

                    <!-- Intro -->
                    <div class="mb-6 text-center">
                        <p class="text-gray-700 mb-2">
                            {{ devTranslate('page.Leave us a message and we will help you with any questions about veterinary clinics, services or how to use our directory.', 'Laat ons een bericht achter en we zullen je zo goed mogelijk proberen te helpen.') }}
                        </p>
                    </div>

                    <!-- Name -->
                    <label class="block mb-1 font-medium text-sm">
                        {{ devTranslate('page.Name', 'Naam') }}
                    </label>
                    <input wire:model="name" type="text" class="w-full mb-3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5d4fc4]">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                    <!-- Telephone -->
                    <label class="block mt-4 mb-1 font-medium text-sm">
                        {{ devTranslate('page.Telephone', 'Telefoon') }}
                    </label>
                    <input wire:model="telephone" type="text" class="w-full mb-3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5d4fc4]">
                    @error('telephone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                    <!-- Email -->
                    <label class="block mt-4 mb-1 font-medium text-sm">
                        {{ devTranslate('page.Email', 'E-mail') }}
                    </label>
                    <input wire:model="email" type="email" class="w-full mb-3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5d4fc4]">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                    <!-- Message -->
                    <label class="block mt-4 mb-1 font-medium text-sm">
                        {{ devTranslate('page.Message', 'Bericht') }}
                    </label>
                    <textarea wire:model="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5d4fc4]"></textarea>
                    @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                    <!-- Submit -->
                    <button 
                        wire:loading.remove 
                        wire:loading.attr="disabled"
                        class="w-full bg-[#5d4fc4] hover:bg-[#473cb3] text-white font-semibold py-3 mt-8 rounded-lg transition duration-200"
                    >
                        {{ devTranslate('page.Send', 'Verstuur') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

</div>    