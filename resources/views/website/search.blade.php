@extends('layouts.site')

@section('content')
<div class="main-container relative w-full overflow-hidden">

    <section class="section section--hero-interior bg-cover bg-center" style="background-image: url('{{ asset('dieren/src/public/img/results-hero.png') }}');">
        <div class="container mx-auto lg:pt-[120px] lg:pb-[180px] md:pt-[80px] md:pb-[120px] sm:pt-[50px] sm:pb-[80px] pt-[30px] pb-[50px]">
            <h1 class="text-6xl text-center font-regular text-gray-800 leading-tight md:leading-tight lg:leading-normal">
                {{ devTranslate('page.Discover The Best','Ontdek de beste') }} <strong>{{ devTranslate('page.Veterinary Clinics','Dieren klinieken') }} </strong>
            </h1>
        </div>
    </section>

    <section class="section section--search py-0 bg-transparent">
        <div class="container px-2 mx-auto bg-transparent">
            <form action="" class="s-form md:p-[40px] z-30 p-[20px] flex flex-col md:flex-row px-[20px] items-center gap-y-4 md:gap-x-6 mt-[-50px] bg-white md:rounded-full border border-[#D2D3D4] relative before:hidden md:before:block before:absolute before:right-0 before:top-0 before:w-full md:before:w-1/4 before:h-full before:z-0 before:bg-primaryLight before:rounded-tr-full before:rounded-br-full">
                <div class="w-full md:w-1/4 text-center md:text-left relative z-1">
                    <p class="mb-0 block xl-custom:block md:hidden">
                        <strong>{{ devTranslate('page.What Are You Looking For?','Waar ben je naar opzoek?') }}</strong>
                    </p>
                    <input type="text" placeholder="Search For" class="form-control p-3 border border-none outline-none transition duration-300 ease-out w-full">
                </div>

                <div class="w-full md:w-1/4 text-center md:text-left relative lg:border-l lg:border-l-[#20242866] lg:px-[20px]">
                    <p class="mb-0 hidden xl-custom:block"><strong>{{ devTranslate('page.Category','Categorie') }}</strong></p>
                    <div class="relative">
                        <select class="form-control p-3 border border-none outline-none transition duration-300 ease-out w-full appearance-none pr-10">
                            <option>Dogs</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-600"></i>
                    </div>
                </div>

                <div class="w-full md:w-1/4 text-center md:text-left relative lg:border-l lg:border-l-[#20242866] lg:px-[20px]">
                    <p class="mb-0 hidden xl-custom:block"><strong>{{ devTranslate('page.Location','Lokatie') }}</strong></p>
                    <div class="relative">
                        <select class="form-control p-3 border border-none outline-none transition duration-300 ease-out w-full appearance-none pr-10">
                            <option>Amsterdam</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-600"></i>
                    </div>
                </div>

                <div class="w-full md:w-1/4 text-center flex items-center justify-center relative z-1">
                    <span class="font-bold mr-8 text-lg">{{ devTranslate('page.Search','Zoeken') }}</span>
                    <button type="submit" class="btn btn-secondary text-3xl md:text-5xl p-4 md:p-[20px] md:rounded-full w-full md:w-fit">
                        <i class="fa-regular fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <section class="section section--clinics">
        <div class="container mx-auto relative">
            <div class="section__header flex items-center justify-between mb-8">
                <div>
                    <h4 class="subtitle w-fit text-md relative before:content-['']">
                        Search Results: <strong>199 Clinics</strong> near your <strong>Location</strong>
                    </h4>
                </div>
                <div class="relative ml-auto">
                    <select class="appearance-none border border-gray-300 rounded-full p-[10px] w-full px-2 text-black font-semibold bg-white pr-10">
                        <option>All Filters</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-black"></i>
                </div>

                <div class="relative ml-2">
                    <select class="appearance-none border border-gray-300 rounded-full p-[10px] w-full px-2 text-black font-semibold bg-white pr-10">
                        <option>Sort By</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-black"></i>
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
            <div class="map mb-8">
                <div style="width: 100%"><iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=500&amp;hl=es&amp;q=Netherlands+(Mi%20nombre%20de%20egocios)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/car-satnav-gps/">GPS car tracker</a></iframe></div>
            </div>
            <div class="grid grid-cols-4 gap-4 mb-8">
                <div class="categories-sidebar col-span-4 lg:col-span-1 bg-white border border-gray-300 p-[20px] h-fit">
                    <h3 class="title title--sidebar title title--section font-bold text-2xl text-gray-800 mb-2">
                        Search Category
                    </h3>
                    <input type="text" placeholder="Lorem Ipsum Dolor Amet" class="form-control p-0 border-none outline-none hover:border-none hover:outline-[#D2D3D4] outline-offset-[4px] transition duration-300 ease-out mb-3">
                    <ul class="mb-4">
                        <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">01</span> <a href="#">Category Name</a></li>
                        <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">02</span> <a href="#">Category Name</a></li>
                        <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">03</span> <a href="#">Category Name</a></li>
                        <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">04</span> <a href="#">Category Name</a></li>
                        <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">05</span> <a href="#">Category Name</a></li>
                        <li class="text-xl font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">06</span> <a href="#">Category Name</a></li>
                        <li class="text-xl font-semibold border-t border-t-gray-300 border-b border-b-gray-300 py-3"><span class="text-primary">07</span> <a href="#">Category Name</a></li>
                    </ul>
                    <a href="#" class="btn btn-primaryLight mx-auto block w-fit">
                        View All Categories
                    </a>
                </div>
                <div class="posts col-span-4 lg:col-span-3 grid grid-cols-3 gap-4">
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-1.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-2.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-3.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-4.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-5.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-6.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-1.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-2.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-3.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-4.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-5.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                    <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                        <figure class="m-0 overflow-hidden">
                            <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/post-6.png')}}" alt=""></a>
                        </figure>
                        <div class="content p-[20px]">
                            <h3 class="title font-bold text-lg">
                                <a href="#">Amsterdam Clinic</a>
                            </h3>
                            <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                            <p class="location text-xs mb-0 font-semibold">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs font-semibold" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-lg mt-2">
                                From €60.00 
                                <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination flex justify-center gap-2">
                <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black transition duration-300 ease-out bg-white hover:bg-primary hover:text-white">
                    1
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black transition duration-300 ease-out bg-white hover:bg-primary hover:text-white">
                    2
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black transition duration-300 ease-out bg-white hover:bg-primary hover:text-white">
                    3
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black transition duration-300 ease-out bg-white hover:bg-primary hover:text-white">
                    4
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black transition duration-300 ease-out bg-white hover:bg-primary hover:text-white">
                    <i class="fa-solid fa-arrow-right-long"></i>
                </button>
            </div>
            <img src="public/img/bg-blocks.png" alt="" class="absolute bottom-[-80px] left-[-60px] z-[-1]"> 
        </div>
    </section>

    <section class="section section--categories bg-[url('{{ asset('dieren/src/public/img/categories.jpg')}}')] bg-cover bg-center pt-[80px] pb-[100px]">
        <div class="container mx-auto">
            <div class="section__header flex flex-col lg:flex-row items-center justify-between mb-6">
                <div>
                    <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">Choose Your Category</h4>
                    <h3 class="title title--section font-bold text-3xl text-gray-800">
                        <span class="text-primary">Browse</span> Categories
                    </h3>
                </div>
                <a href="#" class="btn btn-outline-black whitespace-nowrap">Explore All</a>
            </div>
            <div class="categories grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/dog.png') }}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Dogs', 'Honden')}}</h3>
                        <p class="paragraph text-sm">({{$categoriesForCount[0]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/cat.png') }}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Cats', 'Katten')}}</h3>
                        <p class="paragraph text-sm">({{$categoriesForCount[1]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/turtle.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Others', 'Overige')}}</h3>
                        <p class="paragraph text-sm">({{$categoriesForCount[2]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/shelters.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Shelters', 'Asielen')}}</h3>
                        <p class="paragraph text-sm">({{$categoriesForCount[3]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/specialists.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Specialists', 'Specialisten')}}</h3>
                        <p class="paragraph text-sm">({{$categoriesForCount[4]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/emergencies.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Emergencies', 'Noodgevallen')}}</h3>
                        <p class="paragraph text-sm">({{$categoriesForCount[5]['veterinarians_count']}} {{ devTranslate('page.Vermeldingen','Vermeldingen') }})</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--hotspots">
        <div class="container mx-auto relative">
            <h3 class="title title--section text-center text-4xl text-gray-800 font-bold mb-4 leading-tight md:leading-tight lg:leading-normal">
                <span class="text-primary">Hotspots</span> You Can't Miss
            </h3>
            <div class="header-pills flex flex-col lg:flex-row items-center justify-center mb-6">
                <button class="pill active border-b-2 border-b-primary px-6 hover:border-b-primary" data-filter="all">All</button>
                <button class="pill border-b-2 border-b-[#D2D3D4] px-6 hover:border-b-primary" data-filter="best-rated">Best Rated</button>
                <button class="pill border-b-2 border-b-[#D2D3D4] px-6 hover:border-b-primary" data-filter="most-viewed">Most Viewed</button>
                <button class="pill border-b-2 border-b-[#D2D3D4] px-6 hover:border-b-primary" data-filter="veterinarians">Veterinarians</button>
                <button class="pill border-b-2 border-b-[#D2D3D4] px-6 hover:border-b-primary" data-filter="clinics">Clinics</button>
            </div>

            <div class="content-blocks grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/block-4.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px]">
                        <h3 class="title font-bold text-lg">
                            <a href="#">Amsterdam Clinic</a>
                            <span class="rating float-right text-yellow-500 text-xs">
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                            </span>
                        </h3>
                        <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                        <p class="location text-xs mb-0">
                            <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                        </p>
                        <a class="text-xs" href="#">
                            <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                        </a>
                        <h4 class="price font-bold text-lg mt-2">
                            From €60.00 
                            <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                        </h4>
                    </div>
                </div>

                <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-most-viewed">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/block-5.jpg')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px]">
                        <h3 class="title font-bold text-lg">
                            <a href="#">VetCare</a>
                            <span class="rating float-right text-yellow-500 text-xs">
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                            </span>
                        </h3>
                        <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                        <p class="location text-xs mb-0">
                            <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                        </p>
                        <a class="text-xs" href="#">
                            <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                        </a>
                        <h4 class="price font-bold text-lg mt-2">
                            From €50.00 
                            <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                        </h4>
                    </div>
                </div>

                <div class="block-hotspots border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-clinics">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/block-6.jpg')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px]">
                        <h3 class="title font-bold text-lg">
                            <a href="#">Happy Pets Clinic</a>
                            <span class="rating float-right text-yellow-500 text-xs">
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                            </span>
                        </h3>
                        <h4 class="subtitle text-sm text-gray-800 mb-2">Lorem Ipsum Dolor Sit Amet</h4>
                        <p class="location text-xs mb-0">
                            <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                        </p>
                        <a class="text-xs" href="#">
                            <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                        </a>
                        <h4 class="price font-bold text-lg mt-2">
                            From €70.00 
                            <a class="float-right text-sm font-normal underline hover:text-primary" href="#">View More</a>
                        </h4>
                    </div>
                </div>
            </div>

        
            <img src="{{ asset('dieren/src/public/img/bg-blocks.png')}}" alt="" class="absolute top-[-80px] right-[-60px] z-[-1]"> 
        </div>
    </section>

    <section class="section section--about-us">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <h3 class="title title--section text-4xl font-bold mb-8 leading-tight md:leading-tight lg:leading-normal">
                        Why To Choose<br><span class="text-primary">Our Directory</span>
                    </h3>
                    <div class="grid grid-cols-2 mb-3 pb-3 border-b border-b-gray-300">
                        <div class="number">
                            <h4 class="value text-primary font-semibold text-4xl md:text-5xl">+5k</h4>
                            <p class="description text-gray-300">Completed Listing</p>
                        </div>
                        <div class="number">
                            <h4 class="value text-primary font-semibold text-4xl md:text-5xl">+5M</h4>
                            <p class="description text-gray-300">Listed Places</p>
                        </div>
                    </div>
                    <p class="paragraph text-gray-300 mb-4">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit. In vel laoreet eros. Nullam vulputate, magna vel efficitur scelerisque.
                    </p>
                    <ul>
                        <li class="font-semibold mb-3">
                            <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur.
                        </li>
                        <li class="font-semibold mb-3">
                            <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur.
                        </li>
                        <li class="font-semibold mb-3">
                            <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur.
                        </li>
                    </ul>
                </div>
                <div>
                    <figure class="w-full flex justify-center">
                        <img class="max-w-full h-auto" src="{{ asset('dieren/src/public/img/Pics.png')}}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection