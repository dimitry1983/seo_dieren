<div>
    <style>
        .trix-dialog__link-fields{
            display:none;
        }
    </style>
    <div class="main-container flex  relative">
        @include('parts.company.sidebar', ['active' => $active ?? ""])
        <div class="main-content flex-1  px-5 py-10 lg:p-16 max-w-[100%]">
            <div wire:loading wire:target="save, file" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-35 z-50">
                <div class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-25">
                    <div role="status">
                        <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-[#3ec0bf]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                @if (session()->has('success'))
                    <x-success class="mb-4" id="success-message">
                        {{ session('success') }}
                    </x-success>
                @endif

                <div class=" rounded-[8px] mb-6">

                    <section x-data="{
                            isCollapsed:  false ,
                        }" class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10" id="mediaupload">
                       
                        <br/>

                        <h3 class="fi-section-header-heading block text-base px-4 mt-0 font-semibold leading-6 text-gray-950 dark:text-white mb-4">
                            {{__('Media')}}
                        </h3>
                        <div class="fi-section-content-ctn border-t p-4 border-gray-200 dark:border-white/10">
                            <div x-data="{ confirmDelete: false, imageToDelete: null }">
                                @if ($images && count($images) > 0)
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($images as $image)
                                            <div class="mt-2 relative w-32 group">
                                                @php $imageLocation = '/dierenarsten/thumb/'.$image->name; @endphp
                                                <img src="{{ Storage::url('dierenarsten/thumb/'.$image->name) }}" class="w-32 mr-2 mb-2">
                                                
                                                <!-- Set as Logo Button on Hover -->
                                                <button wire:click="setAsLogo({{ $image->id }})"
                                                        class="absolute bottom-0 left-0 bg-primary text-white px-2 py-1 text-xs opacity-0 group-hover:opacity-100 transition duration-300">
                                                         {{__('Instellen als logo')}}
                                                </button>

                                                <!-- Delete Button -->
                                                <button @click="imageToDelete = '{{ $imageLocation }}'; imageId = '{{ $image->id }}'; confirmDelete = true"
                                                        class="absolute top-0 right-0 bg-red-500 text-white px-2 py-1 text-xs">
                                                    X
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <x-alert-box>
                                        {{__('Er zijn nog geen foto\'s toegevoegd.')}}
                                    </x-alert-box>
                                @endif

                                <!-- Confirmation Modal -->
                                <div x-show="confirmDelete" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
                                    <div class="bg-white p-4 rounded-lg shadow-lg">
                                        <p class="text-lg font-bold mb-4">{{ devTranslate('media.Weet je het zeker?', 'Weet je het zeker?') }}</p>
                                        <div class="flex justify-end space-x-2">
                                            <button @click="confirmDelete = false" class="px-4 py-2 bg-gray-300 rounded-md">{{ devTranslate('media.Annuleren', 'Annuleren') }}</button>
                                            <button @click="$wire.deleteImage(imageToDelete, imageId); confirmDelete = false" class="px-4 py-2 bg-red-500 text-white rounded-md">{{ devTranslate('media.Ja, verwijderen', 'Ja, verwijderen') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="fi-section-content p-6">
                            <form wire:submit.prevent="save">
                                <x-filepond::upload wire:model="file" multiple max-files="10" />
                                @error('file') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                                <div class="mt-4">  
                                <input type="submit" class="btn btn-primary" value="{{ __('Opslaan foto\'s') }}" />
                                </div>
                            </form>   
                        </div>

                      
                    </section>      
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

