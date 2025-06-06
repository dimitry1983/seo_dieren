@extends('layouts.site')

@section('content')
    <div class="main-container relative w-full overflow-hidden">
        <section class="section section--hero-interior bg-[url('../../../src/public/img/results-hero.png')] bg-cover bg-center bg-center">
            <div class="container p-2 mx-auto lg:pt-[10px] sm:pt-[10px] sm:pb-[80px] pt-[30px] pb-[50px]">
                <h1 class="text-6xl text-center font-regular text-gray-800 leading-tight md:leading-tight lg:leading-normal">
                    {{ devTranslate('page.Discover The Best','Ontdek de beste') }} <strong>{{ devTranslate('page.Veterinary Clinics','Dieren klinieken') }} </strong>
                </h1>
            </div>
        </section>
        
        <section class="section section--search py-0 bg-transparent">
            <div class="container px-2 mx-auto bg-transparent">
                <form action="{{route('results')}}" class="s-form md:p-[40px] z-30 p-[20px] flex flex-col md:flex-row px-[20px] items-center gap-y-4 md:gap-x-6 mt-[-50px] bg-white md:rounded-full border border-[#D2D3D4] relative before:hidden md:before:block before:absolute before:right-0 before:top-0 before:w-full md:before:w-1/4 before:h-full before:z-0 before:bg-secondaryLight before:rounded-tr-full before:rounded-br-full">
                    <div class="w-full md:w-1/4 text-center md:text-left relative z-1">
                        <p class="mb-0 block xl-custom:block md:hidden">
                            <strong>{{ devTranslate('page.What Are You Looking For?','Waar ben je naar opzoek?') }}</strong>
                        </p>
                        <input name="zoeken" type="text" value="{{$_GET['zoeken'] ?? ""}}" placeholder="{{ devTranslate('page.Search For','Zoek naar') }}" class="form-control p-3 border border-none outline-none transition duration-300 ease-out w-full">
                    </div>

                    <div class="w-full md:w-1/4 text-center md:text-left relative lg:border-l lg:border-l-[#20242866] lg:px-[20px] ">
                        <p class="mb-0 hidden xl-custom:block"><strong>{{ devTranslate('page.Category','Categorie') }}</strong></p>
                        <div class="relative no-border">
                            <select name="categorie" class="no-border bg-white form-control p-3 border border-none outline-none transition duration-300 ease-out w-full appearance-none pr-10">
                                <option value="">{{__('Maak een keuze')}}</option>
                                @if (!empty($categories))
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if(isset($_GET['categorie']) && $_GET['categorie'] == $category->id) selected="selected" @endif>{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-600"></i>
                        </div>
                    </div>

                    <div class="w-full md:w-1/4 text-center md:text-left relative lg:border-l lg:border-l-[#20242866] lg:px-[20px]">
                        <p class="mb-0 hidden xl-custom:block"><strong>{{ devTranslate('page.Location','Lokatie') }}</strong></p>
                        <div class="relative noborder">
                            <select  name="stad" id="city-select" class="noborder form-control p-3 border border-none outline-none transition duration-300 ease-out w-full appearance-none pr-10">
                                <option value="">{{ devTranslate('page.Select a city','Selecteer een stad') }}</option>
                                
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-600"></i>
                        </div>
                    </div>

                    <div class="w-full md:w-1/4 text-center flex items-center justify-end relative z-1">
                        <span class="hidden md:inline-block search-span font-bold mr-8 text-lg">{{ devTranslate('page.Search','Zoeken') }}</span>
                        <button type="submit" class="btn btn-secondary text-3xl md:text-5xl p-4 md:p-[20px] md:rounded-full w-full md:w-fit">
                            <i class="fa-regular fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <section class="section section--clinics">
            <div class="container p-2 mx-auto relative">
                @include('parts.breadcrumb' , ['breadcrumbs' => $breadcrumbData ?? ''] )
                <div class="section__header md:flex items-center justify-between mb-8">
                    <div>
                        <h4 class="subtitle w-fit text-md relative before:content-['']">
                        {{ devTranslate('page.Search Results:','Zoek Resultaten:') }}  <strong>{{$vets->total()}} {{ devTranslate('page.Clinics','Dierenarsten') }}</strong>
                        </h4>
                    </div>
                    <div class="flex mt-4 md:mt-0">
                        <div class="relative ml-auto">
                           
                        </div>
                        <div class="relative ml-2">
                           
                        </div>

                        <button id="btn-2cols" class="w-[45px] h-[45px] flex items-center justify-center rounded-full border border-gray-300 text-gray-400 transition duration-300 ease-out hover:text-black hover:border-black ml-2">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <button id="btn-4cols" class="w-[45px] h-[45px] flex items-center justify-center rounded-full border border-gray-300 text-gray-400 transition duration-300 ease-out hover:text-black hover:border-black ml-2">
                            <i class="fa-solid fa-ellipsis-vertical"></i><i class="fa-solid fa-ellipsis-vertical ml-1"></i>
                        </button>
                        <button id="btn-6cols" class="w-[45px] h-[45px] flex items-center justify-center rounded-full border border-gray-300 text-gray-400 transition duration-300 ease-out hover:text-black hover:border-black ml-2">
                            <i class="fa-solid fa-ellipsis-vertical"></i><i class="fa-solid fa-ellipsis-vertical ml-1"></i><i class="fa-solid fa-ellipsis-vertical ml-1"></i>
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4 mb-8 pt-2">
                <div class="categories-sidebar col-span-4 lg:col-span-1 bg-white border border-gray-300 p-[20px] h-fit" >
                    <h3 class="title title--sidebar title title--section font-bold text-2xl text-gray-800 mb-2">
                        {{ devTranslate('page.Search Category','Doorzoek categorie') }}
                    </h3>
                    <ul class="mb-4">
                        <?php 
                            $teller = 1;
                        ?>
                        @if (!empty($categories))
                            @foreach($categories as $item)
                                <li class="text-xl mb-3 font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">0{{$teller}}</span> <a href="?categorie={{$item->id}}" @if(isset($_GET['categorie']) && $_GET['categorie'] == $item->id) class="text-primary" @endif >{{$item -> name}}</a></li>
                                @php $teller++; @endphp
                            @endforeach
                        @endif
                    </ul>
                    <a href="#" class="btn btn-primaryLight mx-auto block w-fit">
                       {{ devTranslate('page.View All Categories','Bekijk alle categorieën') }}
                    </a>
                </div>
                <div class="posts col-span-4 lg:col-span-3 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4" id="categories_posts">
                 @if (!empty($vets[0]))
                    <?php $teller = 1; ?>   
                    @foreach ($vets as $vet)
                        <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg ">
                            <figure class="m-0 overflow-hidden">
                                <!-- Replace the static image with one based on your vet data or use a default image -->
                                <a href="{{route('profile', ['slug' => slugify($vet->name) , 'id' => $vet->id])}}">
                                    @if (!empty($vet->featuredImage->name))
                                        <img class="w-full transition-transform duration-300 ease-out hover:scale-105"  src="{{ asset('storage/uploads/' . $vet->featuredImage->name) }}" alt="{{$vet->name}}">
                                    @else
                                    <img class="w-full transition-transform duration-300 ease-out hover:scale-105"  
                                        src="{{ asset('dieren/src/public/img/post-' . $teller . '.png') }}" 
                                        alt="{{ $vet->name }}">
                                    @endif
                                    <!-- Assuming you have a route to view vet details -->  
                                    
                                </a>
                            </figure>
                            <div class="content p-[20px]">
                                <h3 class="title font-bold text-lg">
                                    <!-- Assuming you have a route to view vet details -->
                                    <a href="{{route('profile', ['slug' => slugify($vet->name) , 'id' => $vet->id])}}">{{ $vet->name }}</a>
                                </h3>
                                <h4 class="subtitle text-sm text-gray-800 mb-2">{{ $vet->excerpt }}</h4>
                                <p class="location text-sm mb-0 font-semibold">
                                    <i class="fa-solid fa-location-dot text-primary"></i>
                                    {{ $vet->zipcode }} {{ $vet->street }} {{ $vet->street_nr }} <br/>{{ $vet->city->name }}, Nederland
                                </p>
                                <a class="text-sm font-semibold" href="tel:{{ $vet->phone }}">
                                    <i class="fa-solid fa-phone text-primary"></i> {{ $vet->phone }}
                                </a>
                                <h4 class="price font-bold text-lg mt-2">
                                    {!! render_stars($vet->rating) !!}
                  
                                    <a class="float-right text-sm font-normal underline hover:text-primary" 
                                    href="{{route('profile', ['slug' => slugify($vet->name) , 'id' => $vet->id])}}"> {{ devTranslate('page.View more','Bekijk meer ') }} </a>
                                </h4>
                            </div>
                        </div>
                        <?php $teller++; ?>
                    @endforeach
                @else
                <div class="text-center py-10 text-gray-500">
                    <p class="text-lg font-semibold">{{ devTranslate('page.No veterinarians found','Geen dierenartsen gevonden.') }}</p>
                </div>
                @endif    
                </div>
                </div>
                <div class="pagination flex justify-center gap-2">
                    {{ $vets->appends(request()->query())->links('vendor.pagination.custom') }}
                </div>
                <img src="public/img/bg-blocks.png" alt="" class="absolute bottom-[-80px] left-[-60px] z-[-1]"> 
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const postsContainer = document.querySelector(".posts");
                    const btn2Cols = document.getElementById("btn-2cols");
                    const btn4Cols = document.getElementById("btn-4cols");
                    const btn6Cols = document.getElementById("btn-6cols");

                    btn2Cols.addEventListener("click", () => {
                        postsContainer.classList.remove("grid-cols-3", "grid-cols-2");
                        postsContainer.classList.add("grid-cols-1");
                    });

                    btn4Cols.addEventListener("click", () => {
                        postsContainer.classList.remove("grid-cols-1", "grid-cols-3");
                        postsContainer.classList.add("grid-cols-2");
                    });

                    btn6Cols.addEventListener("click", () => {
                        postsContainer.classList.remove("grid-cols-1", "grid-cols-2");
                        postsContainer.classList.add("grid-cols-3");
                    });
                });
            </script>
        </section>

        <section class="section section--categories bg-[url('../../../src/public/img/categories.jpg')] bg-cover bg-center pt-[40px] pb-[50px] lg:pt-[80px] lg:pb-[100px]">
            <div class="container p-2 mx-auto">
                <div class="section__header flex flex-col lg:flex-row items-center justify-between mb-6">
                    <div>
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2 leading-tight md:leading-tight lg:leading-normal">
                            {{ devTranslate('page.Choose Your Category','Kies een categorie') }}
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800">
                            <span class="text-primary">{{ devTranslate('page.Browse','Doorzoek') }}</span> {{ devTranslate('page.Categories','de Categorieën') }}
                        </h3>
                    </div>
                </div>
                <div class="categories grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    <a href="{{route('results')}}?categorie=1">
                        <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                            <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                                <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/dog.png') }}" alt="">
                            </figure>
                            <div class="content text-center p-4">
                                <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Dogs', 'Honden')}}</h3>
                                <p class="paragraph text-sm">({{$categoriesForCount[0]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{route('results')}}?categorie=2">
                        <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                            <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                                <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/cat.png') }}" alt="">
                            </figure>
                            <div class="content text-center p-4">
                                <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Cats', 'Katten')}}</h3>
                                <p class="paragraph text-sm">({{$categoriesForCount[1]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{route('results')}}?categorie=3">
                        <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                            <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                                <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/turtle.png')}}" alt="">
                            </figure>
                            <div class="content text-center p-4">
                                <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Others', 'Overige')}}</h3>
                                <p class="paragraph text-sm">({{$categoriesForCount[2]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                            </div>
                        </div>
                    </a>    

                    <a href="{{route('results')}}?categorie=4">
                        <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                            <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                                <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/shelters.png')}}" alt="">
                            </figure>
                            <div class="content text-center p-4">
                                <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Shelters', 'Asielen')}}</h3>
                                <p class="paragraph text-sm">({{$categoriesForCount[3]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                            </div>
                        </div>
                    </a>    

                    <a href="{{route('results')}}?categorie=5">
                    <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                        <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                            <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/specialists.png')}}" alt="">
                        </figure>
                        <div class="content text-center p-4">
                            <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Specialists', 'Specialisten')}}</h3>
                            <p class="paragraph text-sm">({{$categoriesForCount[4]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                        </div>
                    </div>
                    </a>

                    <a href="{{route('results')}}?categorie=6">
                        <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                            <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                                <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/emergencies.png')}}" alt="">
                            </figure>
                            <div class="content text-center p-4">
                                <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Emergencies', 'Noodgevallen')}}</h3>
                                <p class="paragraph text-sm">({{$categoriesForCount[5]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                            </div>
                        </div>
                    </a>
            </div>
            </div>
        </section>

        <section class="section section--hotspots">
            <div class="container px-2 mx-auto relative">
                <div class="header-pills flex flex-wrap justify-center mb-6">
                    <button class="pill font-medium active border-b-4 border-b-primary px-4 sm:px-6 mb-2  hover:border-b-primary" data-filter="all"> {{ devTranslate('page.All','All') }}</button>
                    <button class="pill font-medium border-b-2 border-b-[#D2D3D4] px-4 sm:px-6 mb-2  hover:border-b-primary" data-filter="best-rated">{{ devTranslate('page.Best Rated','Best beoordeeld') }}</button>
                    <button class="pill font-medium border-b-2 border-b-[#D2D3D4] px-4 sm:px-6 mb-2  hover:border-b-primary" data-filter="most-viewed">{{ devTranslate('page.Most Viewed','Meest bekeken') }}</button>
                </div>

                <div class="content-blocks grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                
                @if (!empty($bestVets))
                    <?php $teller = 4; ?>
                    @foreach($bestVets as $vet)
                        <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                            <figure class="m-0 overflow-hidden">
                                <a href="{{ route('profile', ['slug' => slugify($vet->name), 'id' => $vet->id]) }}">
                                    @if (!empty($vet->featuredImage->name))
                                        <img class="w-full transition-transform duration-300 ease-out hover:scale-105"
                                            src="{{ asset('storage/uploads/' . $vet->featuredImage->name) }}"
                                            alt="{{ $vet->name }}">
                                    @else
                                        <img class="w-full transition-transform duration-300 ease-out hover:scale-105"
                                            src="{{ asset('dieren/src/public/img/block-' . $teller . '.jpg') }}"
                                            alt="{{ $vet->name }}">
                                    @endif
                                </a>
                            </figure>
                            <div class="content p-[20px]">
                                <h3 class="title font-bold text-lg">
                                    <a href="{{ route('profile', ['slug' => slugify($vet->name), 'id' => $vet->id]) }}">
                                        {{ $vet->name }}
                                    </a>
                                    <span class="rating float-right text-yellow-500 text-xs">
                                        {!! render_stars($vet->rating) !!}
                                    </span>
                                </h3>
                                <h4 class="subtitle text-sm text-gray-800 mb-2">{{ $vet->excerpt }}</h4>
                                <p class="location text-sm mb-0">
                                    <i class="fa-solid fa-location-dot text-primary"></i> {{ $vet->zipcode }} {{ $vet->street }}, Nederland
                                </p>
                                <a class="text-xs" href="tel:{{ $vet->phone }}">
                                    <i class="fa-solid fa-phone text-primary"></i> {{ $vet->phone }}
                                </a>
                                <h4 class="price font-bold text-lg mt-2">
                                    {{-- You can add dynamic pricing here if available --}}
                                    <a class="float-right text-sm font-normal underline hover:text-primary"
                                    href="{{ route('profile', ['slug' => slugify($vet->name), 'id' => $vet->id]) }}">
                                        {{ devTranslate('page.View more','Bekijk meer ') }}
                                    </a>
                                </h4>
                                <br/>
                            </div>
                        </div>
                        <?php $teller++; ?>
                    @endforeach
                @endif
                
                @if (!empty($mostViewedVets))
                    <?php $teller = 4; ?>
                    @foreach($mostViewedVets as $vet)
                        <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-most-viewed">
                            <figure class="m-0 overflow-hidden">
                                <a href="{{ route('profile', ['slug' => slugify($vet->name), 'id' => $vet->id]) }}">
                                    @if (!empty($vet->featuredImage->name))
                                        <img class="w-full transition-transform duration-300 ease-out hover:scale-105"
                                            src="{{ asset('storage/uploads/' . $vet->featuredImage->name) }}"
                                            alt="{{ $vet->name }}">
                                    @else
                                        <img class="w-full transition-transform duration-300 ease-out hover:scale-105"
                                            src="{{ asset('dieren/src/public/img/block-' . $teller . '.jpg') }}"
                                            alt="{{ $vet->name }}">
                                    @endif
                                </a>
                            </figure>
                            <div class="content p-[20px]">
                                <h3 class="title font-bold text-lg">
                                    <a href="{{ route('profile', ['slug' => slugify($vet->name), 'id' => $vet->id]) }}">
                                        {{ $vet->name }}
                                    </a>
                                    <span class="rating float-right text-yellow-500 text-xs">
                                        {!! render_stars($vet->rating) !!}
                                    </span>
                                </h3>
                                <h4 class="subtitle text-sm text-gray-800 mb-2">{{ $vet->excerpt }}</h4>
                                <p class="location text-sm mb-0">
                                    <i class="fa-solid fa-location-dot text-primary"></i> {{ $vet->zipcode }} {{ $vet->street }} {{ $vet->street_nr }} <br/> {{ $vet->city->name }}, Nederland
                                </p>
                                <a class="text-xs" href="tel:{{ $vet->phone }}">
                                    <i class="fa-solid fa-phone text-primary"></i> {{ $vet->phone }}
                                </a>
                                <h4 class="price font-bold text-lg mt-2">
                                    {{-- Add dynamic pricing here if you have it --}}
                                    <a class="float-right text-sm font-normal underline hover:text-primary"
                                    href="{{ route('profile', ['slug' => slugify($vet->name), 'id' => $vet->id]) }}">
                                        {{ devTranslate('page.View more','Bekijk meer ') }}
                                    </a>
                                </h4>
                                <br/>
                            </div>
                        </div>
                        <?php $teller++; ?>
                    @endforeach
                @endif

                </div>
                <img src="{{ asset('dieren/src/public/img/bg-blocks.png')}}" alt="" class="absolute top-[-80px] right-[-60px] z-[-1]">
            </div>
        </section>

        <section class="section section--about-us">
        <div class="container px-2 mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <h3 class="adv title title--section text-4xl font-bold mb-8  leading-tight md:leading-tight lg:leading-normal">
                     {!!$advantages['title']!!}   
                    </h3>
                    <div class="grid grid-cols-2 mb-3 pb-3 border-b border-b-gray-300">
                        <div class="number">
                            <h4 class="value text-primary font-medium text-4xl md:text-6xl">+1k</h4>
                            <p class="description text-gray-400">{{ devTranslate('page.Dierenartsen','Dierenartsen') }}</p>
                        </div>
                        <div class="number">
                            <h4 class="value text-primary font-medium text-4xl md:text-6xl">+1k</h4>
                            <p class="description text-gray-400">{{ devTranslate('page.Plaatsen','Plaatsen') }}</p>
                        </div>
                    </div>
                    <p class="paragraph text-gray-400 mb-4">
                        {!!$advantages['description']!!}   
                    </p>
                    <ul>
                        @if (!empty($advantages['usp']))
                            @foreach($advantages['usp'] as $item)
                                <li class="font-medium mb-3">
                                    <i class="fa-regular fa-circle-check text-primary"></i> {{$item['usp']}}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div>
                    <figure class="w-full flex lg:justify-center">
                        <img class="max-w-full h-auto" src="{{ asset('dieren/src/public/img/Pics.png')}}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    </div>
    @push('scripts')


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const hasCategorie = urlParams.has('categorie');
        const hasPage = urlParams.has('page');

        if (hasCategorie || hasPage) {
            const target = document.getElementById('categories_posts');
            if (target) {
                setTimeout(() => {
                    target.scrollIntoView({ behavior: 'smooth' });
                }, 300); // wait a bit for render
            }
        }
    });
</script>    
    <script>
  $(document).ready(function () {
    const selectedCity = "{{ request('stad') }}";
    // If a city is pre-selected, manually add it as an option
    if (selectedCity) {
      $('#city-select').append(new Option(selectedCity, selectedCity, true, true)).trigger('change');
    }

    // Now initialize select2
    $('#city-select').select2({
      language: "nl",
      placeholder: 'Zoek een stad',
      minimumInputLength: 2,
      ajax: {
        url: '/api/cities',
        dataType: 'json',
        delay: 300,
        data: function (params) {
          return {
            q: params.term
          };
        },
        processResults: function (data) {
          return {
            results: data.map(function (city) {
              return {
                id: city.name,
                text: city.name
              };
            })
          };
        },
        cache: true
      }
    });
  });
</script>
    @endpush    
@endsection