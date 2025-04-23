<div>
<style>
 .blocknew h1,.blocknew h2,.blocknew h3{
    font-size: 32px;
    margin:40px;
 }
</style>


<x-filament-panels::page>
    <x-filament-panels::form wire:submit="saveTemplate">
        @if($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        @if (session()->has('successTemplate'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative success" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.354 5.646a.5.5 0 0 0-.708 0L10 9.293 6.354 5.646a.5.5 0 1 0-.708.708L9.293 10l-3.647 3.646a.5.5 0 0 0 .708.708L10 10.707l3.646 3.647a.5.5 0 0 0 .708-.708L10.707 10l3.647-3.646a.5.5 0 0 0 0-.708z"/></svg>
            </span>
        </div>
        @endif

        {{ $this->form }}

        <div>
        <x-filament::button type="submit" size="sm">
            Save Template
        </x-filament::button>
        </div>
    </x-filament-panels::form>

    <x-filament-panels::form wire:submit="example">
        <div class="text-right -mt-4">
        <x-filament::button type="submit" size="sm">
            Generate Example
        </x-filament::button>
        </div>
    </x-filament-panels::form>

    <x-filament-panels::form wire:submit="generate">
        <div class="text-right -mt-4">
            @unless($loading)
                <x-filament::button  type="submit" size="sm">
                    Generate Seo pages
                </x-filament::button>
            @endunless
        </div>
    </x-filament-panels::form>



</x-filament-panels::page>

<section x-data="{
    isCollapsed:  false ,
}" class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 p-6 blocknew" style="margin-bottom: 100px;" id="seo">
    @if (!empty($this -> example_description_top))
        <b>Example seo title:</b> {!!$this -> example_seo_title !!}<br/>
        <b>Example seo description:</b> {!!$this -> example_seo_description !!}<br/><br/>

        <b>Example title:</b> {!!$this -> example_text_title !!}<br/>
        <b>Example content top:</b> {!!$this -> example_description_top !!}<br/>
        <b>Example content bottom:</b> {!!$this -> example_description_bottom !!}<br/> 
    @endif
</section>

</div>