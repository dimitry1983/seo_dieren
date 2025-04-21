<div>
    <style>
        .trix-dialog__link-fields{
            display:none;
        }
    </style>
    <div class="main-container flex  relative">
        @include('parts.company.sidebar', ['active' => $active ?? ""])
        <div class="main-content flex-1  px-5 py-10 lg:p-16 max-w-[100%]">
            <div wire:loading wire:target="save" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-35 z-50">
                <div class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-25">
                    <div role="status">
                        <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-[#f65317]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="border border-solid border-[#CFD7E4] rounded-[15px] px-5 py-6 lg:px-16 lg:py-9">
                <div class="text-lg mb-9">
                    @include('parts.company.breadcrumb' , ['breadcrumbs' => $breadcrumbData ?? ''] )
                </div>

                <div class="w-full border border-gray-300 bg-white py-4 rounded-lg mb-8">
                    <h3 class="fi-section-header-heading text-base px-4 font-semibold leading-6 text-gray-950 dark:text-white mb-4">
                        {{__('Openingstijden')}}
                    </h3>
                    <div class="fi-section-content-ctn border-t p-4 border-gray-200 dark:border-white/10">
                        <ul class="space-y-2 overflow-x-auto sm:overflow-x-hidden">
                            @if (!empty($openingsTimes[0]))
                                @foreach($openingsTimes as $openingTime)
                                    <li class="flex items-center justify-between">
                                        <!-- Fixed width for day of the week to maintain alignment -->
                                        <span class="font-medium w-24 pr-6">{{ returnDays($openingTime->day_of_week) }}</span>
                                        
                                        <!-- Times and edit button in a single flex row -->
                                        <div class="flex items-center space-x-4">
                                            <span>{{$openingTime->open_time}}</span>
                                            <span>-</span>
                                            <span>{{$openingTime->close_time}}</span>
                                            
                                            <!-- Edit button -->
                                            <button class="text-primary hover:text-primary ml-4" wire:click="loadDay({{$openingTime->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </button>
                                        </div>
                                    </li>
                                @endforeach    
                            @endif
                        </ul>
                    </div>
                </div>

                @if (session()->has('success'))
                    <x-success class="my-4" id="success-message">
                        {{ session('success') }}
                    </x-success>
                @endif
            
                <div class=" rounded-[8px] mb-6">
                    <form wire:submit.prevent="save">
                        {{ $this->form }}

                        <div class="mt-4">
                            <x-filament::button type="submit">
                                {{ __('Opslaan') }}
                            </x-filament::button>
                        </div>
                    </form>     
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("saved", function() {

                // Add a small delay before scrolling to the top (0.5 seconds)
                setTimeout(() => {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }, 1000);
                setTimeout(() => {
                    const successMessage = document.getElementById('success-message');
                    setTimeout(() => {
                        successMessage.style.transition = 'opacity 0.5s ease';
                        successMessage.style.opacity = '0';
                        setTimeout(() => successMessage.remove(), 500); // Remove after fade out
                    }, 3000);
                }, 2000);
                // Add a small delay before starting to fade out (1 second after scroll)
            // Total time before fade-out (5 seconds including scroll delay)
        });
    </script>
</div>            
