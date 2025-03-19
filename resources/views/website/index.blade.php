@extends('layouts.site')

@section('content')
<div class="main-container relative w-full overflow-hidden">
    <section class="section section--hero bg-cover bg-right bg-center pb-0 pt-0 md:pt-0 px-0 md:px-0 lg:px-0" style="background-image: url('{{ asset('dieren/src/public/img/hero.jpg') }}');">
        <div class="relative w-full h-full">
            <!-- White overlay background -->
            <div class="absolute top-0 left-0 w-full h-full bg-white bg-opacity-65 z-2"></div>

            <!-- Content container -->
            <div class="container mx-auto lg:pt-[120px] lg:pb-[180px] md:pt-[90px] md:pb-[120px] sm:pt-[50px] sm:pb-[80px] pt-[100px] pb-[100px] xl-custom:py-[200px] relative z-20">
                <div class="flex flex-col lg:flex-row items-center">
                    <div class="w-full lg:w-1/2 text-center lg:text-left">
                        <div class="mb-6">
                            <h1 class="text-4xl sm:text-5xl md:text-6xl font-regular text-gray-800 leading-tight md:leading-tight lg:leading-normal">
                            Ontdek de beste <span class="text-primary font-bold">Veterinaire</span> <strong>klinieken</strong> in jouw stad.
                            </h1>
                            <p class="mt-4 text-gray-900 text-sm sm:text-base">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras<br class="hidden md:block"> euismod leo eleifend maximus mattis quis augue dapibus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--search py-0 bg-transparent">
        <div class="container px-2 mx-auto bg-transparent">
            <form action="{{route('search')}}" class="s-form lg:px-[40px] lg:py-[20px] md:px-[30px] md:py-[15px] px-[20px] py-8px z-30 flex flex-col md:flex-row items-center gap-y-4 md:gap-x-6 mt-[-50px] bg-white md:rounded-full border border-[#D2D3D4] relative before:hidden md:before:block before:absolute before:right-0 before:top-0 before:w-full md:before:w-1/4 before:h-full before:z-0 before:bg-primaryLight before:rounded-tr-full before:rounded-br-full">
                <div class="w-full md:w-1/4 text-center md:text-left relative z-1">
                    <p class="lg:mb-0 block xl-custom:block md:hidden mb-4">
                        <strong>{{ devTranslate('page.What Are You Looking For?','Waar ben je naar opzoek?') }}</strong>
                    </p>
                    <input type="text" placeholder="{{ devTranslate('page.Search For','Zoek naar') }}" class="form-control p-3 border border-none outline-none transition duration-300 ease-out w-full">
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
                    <button type="submit" class="btn btn-secondary text-3xl md:text-5xl p-2 md:p-[20px] md:rounded-full w-full md:w-fit">
                        <i class="fa-regular fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <section class="section section--intro py-[80px]">
        <div class="container px-2 mx-auto relative">
            <div class="flex flex-col lg:flex-row gap-y-4 lg:gap-x-6">
                <div class="w-full lg:w-1/2">
                    <div class="block relative before:content-[''] before:w-full before:h-full before:absolute before:top-0 before:left-0 before:bg-gradient-to-t before:from-black/100 before:via-black/25 before:to-transparent bg-[url('../../../src/public/img/block-1.jpg')] bg-cover bg-center">
                        <div class="block__content pt-[250px] pb-[30px] px-[30px] relative z-1">
                            <h4 class="subtitle text-lg text-white">Lorem ipsum dolor</h4>
                            <h3 class="title title--block text-white text-2xl mb-2"><strong>+30% Off</strong></h3>
                            <a href="#" class="btn btn-primary mb-2">{{ devTranslate('page.View More','Meer informatie') }}</a>
                            <p class="paragraph paragraph--small text-sm text-white">
                                *Lorem ipsum dolor sit amet
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="block relative block before:content-[''] before:w-full before:h-full before:absolute before:top-0 before:left-0 before:bg-gradient-to-t before:from-black/100 before:via-black/25 before:to-transparent bg-[url('../../../src/public/img/block-2.jpg')] bg-cover bg-center sm:mb-[40px] mb-[15px]">
                        <div class="block__content px-[30px] py-[20px] relative z-1">
                            <h4 class="subtitle text-lg text-white">Lorem ipsum dolor</h4>
                            <h3 class="title title--block text-white text-2xl mb-2"><strong>+25% Off</strong></h3>
                            <a href="#" class="btn btn-primary mb-2">{{ devTranslate('page.View More','Meer informatie') }}</a>
                            <p class="paragraph paragraph--small text-sm text-white">
                                *Lorem ipsum dolor sit amet
                            </p>
                        </div>
                    </div>
                    <div class="block relative block before:content-[''] before:w-full before:h-full before:absolute before:top-0 before:left-0 before:bg-gradient-to-t before:from-black/100 before:via-black/25 before:to-transparent bg-[url('../../../src/public/img/block-3.jpg')] bg-cover bg-center">
                        <div class="block__content px-[30px] py-[20px] relative z-1">
                            <h4 class="subtitle text-lg text-white">Lorem ipsum dolor</h4>
                            <h3 class="title title--block text-white text-2xl mb-2"><strong>+20% Off</strong></h3>
                            <a href="#" class="btn btn-primary mb-2">{{ devTranslate('page.View More','Meer informatie') }}</a>
                            <p class="paragraph paragraph--small text-sm text-white">
                                *Lorem ipsum dolor sit amet
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('dieren/src/public/img/bg-blocks.png')}}" alt="" class="absolute top-[-80px] left-[-60px] z-[-1]">
        </div>
    </section>

    <section class="section section--hotspots">
        <div class="container px-2 mx-auto relative">
            <h3 class="title title--section text-center text-3xl sm:text-4xl text-gray-800 font-bold mb-5 leading-tight md:leading-tight lg:leading-normal">
                <span class="text-primary">{{ devTranslate('page.The best clinics','De beste klinieken') }}</span> {{ devTranslate('page.You cannot miss out on','die je niet mag Missen') }}
            </h3>
            <div class="header-pills flex flex-wrap justify-center mb-6">
                <button class="pill font-medium active border-b-4 border-b-primary px-4 sm:px-6 mb-2  hover:border-b-primary" data-filter="all">{{ devTranslate('page.All','Alles') }}</button>
                <button class="pill font-medium border-b-2 border-b-[#D2D3D4] px-4 sm:px-6 mb-2  hover:border-b-primary" data-filter="best-rated">{{ devTranslate('page.Best Rated','Best Beoordeeld') }}</button>
                <button class="pill font-medium border-b-2 border-b-[#D2D3D4] px-4 sm:px-6 mb-2  hover:border-b-primary" data-filter="most-viewed">{{ devTranslate('page.Most Viewed','Meest bekeken') }}</button>
                <button class="pill font-medium border-b-2 border-b-[#D2D3D4] px-4 sm:px-6 mb-2  hover:border-b-primary" data-filter="veterinarians">{{ devTranslate('page.Veterinarians','Dierenartsen') }}</button>
                <button class="pill font-medium border-b-2 border-b-[#D2D3D4] px-4 sm:px-6 mb-2  hover:border-b-primary" data-filter="clinics">{{ devTranslate('page.Clinics','Klinieken') }}</button>
            </div>

            <div class="content-blocks grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                    <figure class="m-0 overflow-hidden">
                        <a href="{{route('profile', ['slug' => 'dierenkliniek' , 'id' => 9])}}"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/block-4.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px]">
                        <h3 class="title font-bold text-lg">
                            <a href="{{route('profile', ['slug' => 'dierenkliniek' , 'id' => 9])}}">Amsterdam Clinic</a>
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
                <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-most-viewed">
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
                <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-clinics">
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

    <section class="section section--categories bg-[url('../../../src/public/img/categories.jpg')] bg-cover bg-center pt-[80px] pb-[100px]">
        <div class="container p-2 mx-auto">
            <div class="section__header flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div class="text-left">
                    <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2 leading-tight md:leading-tight lg:leading-normal">
                         {{ devTranslate('page.Choose Your Category','Kies een categorie') }}
                    </h4>
                    <h3 class="title title--section font-bold text-3xl text-gray-800">
                        <span class="text-primary">{{ devTranslate('page.Browse','Doorzoek') }}</span> {{ devTranslate('page.Categories','de Categorieën') }}
                    </h3>
                </div>
                <a href="#" class="btn btn-outline-black border border-gray-800 py-2 px-4 rounded-full font-bold whitespace-nowrap mt-4 md:mt-0 transition duration-300 ease-out hover:bg-black hover:text-white w-fit">{{devTranslate('page.Explore All', 'Bekijk alles')}}</a>
            </div>
            <div class="categories grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/dog.png') }}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Dogs', 'Honden')}}</h3>
                        <p class="paragraph text-sm">(150 Listings)</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/cat.png') }}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Cats', 'Katten')}}</h3>
                        <p class="paragraph text-sm">(150 Listings)</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/turtle.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Others', 'Overige')}}</h3>
                        <p class="paragraph text-sm">(100 Listings)</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/shelters.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Shelters', 'Asielen')}}</h3>
                        <p class="paragraph text-sm">(100 Listings)</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/specialists.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Specialists', 'Specialisten')}}</h3>
                        <p class="paragraph text-sm">(50 Listings)</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/emergencies.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">{{devTranslate('page.Emergencies', 'Noodgevallen')}}</h3>
                        <p class="paragraph text-sm">(50 Listings)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--clinics">
        <div class="container px-2 mx-auto relative">
            <div class="section__header md:flex items-center justify-between mb-8">
                <div>
                    <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2 leading-tight md:leading-tight lg:leading-normal">
                        {{ devTranslate('page.Clinics','Klinieken') }}
                    </h4>
                    <h3 class="title title--section font-bold text-3xl text-gray-800">
                       {{ devTranslate('page.What Are You','Waar ben je naar') }} <span class="text-primary"> {{ devTranslate('page.Looking for?','naar opzoek?') }}</span>
                    </h3>
                </div>
                <div class="flex mt-4 md:mt-0"> 
                    
                    <button id="btn-2-cols" class="w-[45px] h-[45px] flex items-center justify-center rounded-full border border-gray-300 text-gray-400 transition duration-300 ease-out hover:text-black hover:border-black ml-2">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <button id="btn-4-cols" class="w-[45px] h-[45px] flex items-center justify-center rounded-full border border-gray-300 text-gray-400 transition duration-300 ease-out hover:text-black hover:border-black ml-2">
                        <i class="fa-solid fa-ellipsis-vertical"></i><i class="fa-solid fa-ellipsis-vertical ml-1"></i>
                    </button>
                    <button id="btn-6-cols" class="w-[45px] h-[45px] flex items-center justify-center rounded-full border border-gray-300 text-gray-400 transition duration-300 ease-out hover:text-black hover:border-black ml-2">
                        <i class="fa-solid fa-ellipsis-vertical"></i><i class="fa-solid fa-ellipsis-vertical ml-1"></i><i class="fa-solid fa-ellipsis-vertical ml-1"></i>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 mb-8">
                <div class="categories-sidebar col-span-4 lg:col-span-1 bg-white border border-gray-300 p-[20px] h-fit">
                    <h3 class="title title--sidebar title title--section font-bold text-2xl text-gray-800 mb-2">
                        {{ devTranslate('page.Search Category','Doorzoek categorie') }}
                    </h3>
                    <input type="text" placeholder="Lorem Ipsum Dolor Amet" class="form-control p-0 border-none outline-none hover:border-none hover:outline-[#D2D3D4] outline-offset-[4px] transition duration-300 ease-out mb-3">
                    <ul class="mb-4">
                        <li class="text-xl mb-3 font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">01</span> <a href="#">Category Name</a></li>
                        <li class="text-xl mb-3 font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">02</span> <a href="#">Category Name</a></li>
                        <li class="text-xl mb-3 font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">03</span> <a href="#">Category Name</a></li>
                        <li class="text-xl mb-3 font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">04</span> <a href="#">Category Name</a></li>
                        <li class="text-xl mb-3 font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">05</span> <a href="#">Category Name</a></li>
                        <li class="text-xl mb-3 font-semibold border-t border-t-gray-300 py-3"><span class="text-primary">06</span> <a href="#">Category Name</a></li>
                        <li class="text-xl mb-3 font-semibold border-t border-t-gray-300 border-b border-b-gray-300 py-3"><span class="text-primary">07</span> <a href="#">Category Name</a></li>
                    </ul>
                    <a href="#" class="btn btn-primaryLight mx-auto block w-fit">
                        View All Categories
                    </a>
                </div>
                <div class="posts col-span-4 lg:col-span-3 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
                    <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
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
                    <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
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
                    <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
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
                    <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
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
                    <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
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
                    <div class="block-hotspots bg-white border border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
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
            <img src="{{ asset('dieren/src/public/img/bg-blocks.png')}}" alt="" class="absolute bottom-[-80px] left-[-60px] z-[-1]">
        </div>
    </section>

    <section class="section section--about-us">
        <div class="container px-2 mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <h3 class="title title--section text-4xl font-bold mb-8  leading-tight md:leading-tight lg:leading-normal">
                    {{ devTranslate('page.Why To Choose','Bekijk de voordelen') }} <br><span class="text-primary">{{ devTranslate('page.Our Directory','Van onze listing') }} </span>
                    </h3>
                    <div class="grid grid-cols-2 mb-3 pb-3 border-b border-b-gray-300">
                        <div class="number">
                            <h4 class="value text-primary font-medium text-4xl md:text-6xl">+1k</h4>
                            <p class="description text-gray-400">Completed Listing</p>
                        </div>
                        <div class="number">
                            <h4 class="value text-primary font-medium text-4xl md:text-6xl">+1M</h4>
                            <p class="description text-gray-400">Listed Places</p>
                        </div>
                    </div>
                    <p class="paragraph text-gray-400 mb-4">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit. In vel laoreet eros. Nullam vulputate, magna vel efficitur scelerisque.
                    </p>
                    <ul>
                        <li class="font-medium mb-3">
                            <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur adipcing elit.
                        </li>
                        <li class="font-medium mb-3">
                            <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur adipcing elit.
                        </li>
                        <li class="font-medium mb-3">
                            <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur adipcing elit.
                        </li>
                    </ul>
                </div>
                <div>
                    <figure class="w-full flex lg:justify-center">
                        <img class="max-w-full h-auto" src="{{ asset('dieren/src/public/img/pics.png')}}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--stats bg-[#202428] pt-[90px] pb-[75px]">
        <div class="container px-2 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-6 items-center">
                <div class="col-span-1 lg:col-span-2 md:col-span-3 sm:col-span-3 text-center lg:text-left">
                    <h3 class="title title--section text-4xl text-white font-bold mb-2 leading-tight md:leading-tight lg:leading-normal">
                        <span class="text-primary">Vergelijk</span>dierenarts.nl
                    </h3>
                    <p class="paragraph text-white">
                        Lorem ipsum dolor sit amet consectetur<br>adipcing elit. In vel laoreet eros. Nullam<br>vulputate, magna vel efficitur scelerisque.
                    </p>
                </div>
                <div class="text-center">
                    <p class="text-white">{{devTranslate('page.Clinics', 'Klinieken')}} </p>
                    <span class="text-primaryLight font-medium text-5xl md:text-6xl block">+2k</span>
                </div>
                <div class="sm:border-x sm:border-x-white sm:border-x-2 text-center">
                    <p class="text-white">{{devTranslate('page.Listings', 'Advertenties')}}</p>
                    <span class="text-primaryLight font-medium text-5xl md:text-6xl block">+20k</span>
                </div>
                <div class="text-center">
                    <p class="text-white">{{devTranslate('page.Pets', 'Huisdieren')}}</p>
                    <span class="text-primaryLight font-medium text-5xl md:text-6xl block">+200k</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--testimonial pt-[80px] pb-[40px]">
        <div class="container px-2 mx-auto">
            <div class="section__header flex flex-col lg:flex-row items-center justify-between mb-6">
                <div class="text-center lg:text-left">
                    <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                        {{ devTranslate('page.Read our references','Bekijk onze recencies') }}
                    </h4>
                    <h3 class="title title--section font-bold text-3xl text-gray-800  leading-tight md:leading-tight lg:leading-normal">
                    {{ devTranslate('page.What Our Customers','Wat onze klanten') }} <span class="text-primary">{{ devTranslate('page.Are Saying...','Zeggen...') }}</span>
                    </h3>
                </div>
                <a href="#" class="btn btn-outline-black border border-gray-800 py-2 px-4 rounded-full font-bold whitespace-nowrap mt-4 lg:mt-0 transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Explore All', 'Bekijk alles')}}</a>
            </div>
            <div class="testimonials grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="review border border-gray-300 py-[50px] px-[30px] md:p-[50px] bg-white">
                    <div class="d-rating flex justify-center items-center">
                        <figure class="w-[100px] h-[100px] rounded-full overflow-hidden mb-4">
                            <img class="w-full h-full" src="{{ asset('dieren/src/public/img/review.png')}}" alt="">
                        </figure>
                        <p class="rating text-yellow-500 text-xs mb-0 mt-4 ml-2">
                            <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                        </p>
                    </div>
                    <p class="review__content text-xl mb-4 text-center font-medium">
                        <i>Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit.<br>Pellentesque nec varius neque.</i>
                    </p>
                    <p class="quote font-bold text-6xl text-center text-primary mb-0">"</p>
                    <h3 class="name text-normal font-bold text-center">User Name
                        <span class="location text-gray-400 font-normal text-sm">Amsterdam</span>
                    </h3>
                </div>
                <div class="review border border-gray-300 py-[50px] px-[30px] md:p-[50px] bg-white">
                    <div class="d-rating flex justify-center items-center">
                        <figure class="w-[100px] h-[100px] rounded-full overflow-hidden mb-4">
                            <img class="w-full h-full" src="{{ asset('dieren/src/public/img/review.png')}}" alt="">
                        </figure>
                        <p class="rating text-yellow-500 text-xs mb-0 mt-4 ml-2">
                            <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                        </p>
                    </div>
                    <p class="review__content text-xl mb-4 text-center font-medium">
                        <i>Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit.<br>Pellentesque nec varius neque.</i>
                    </p>
                    <p class="quote font-bold text-6xl text-center text-primary mb-0">"</p>
                    <h3 class="name text-normal font-bold text-center">User Name
                        <span class="location text-gray-400 font-normal text-sm">Amsterdam</span>
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--blog py-[40px]">
        <div class="container px-2 z-10 mx-auto relative">
            <h3 class="title title--section text-center text-3xl text-gray-800 font-bold mb-8 leading-tight md:leading-tight lg:leading-normal">
            {{ devTranslate('page.From blog','Het laatste') }} <span class="text-primary">{{ devTranslate('page.Our Blog','Nieuws') }}</span>
            </h3>
            <div class="posts grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-1.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">Read Article</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-2.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">Read Article</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-3.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">Read Article</a>
                    </div>
                </div>
            </div>
            <img src="{{ asset('dieren/src/public/img/bg-blocks.png')}}" alt="" class="absolute top-[-80px] right-[-60px] z-[-1]">
        </div>
    </section>

    <section class="section section--map pt-[40px] pb-0">
        <div class="container px-2 mx-auto">
            <h3 class="title title--section text-center text-4xl text-gray-800 font-bold mb-8  leading-tight md:leading-tight lg:leading-normal">
                {{ devTranslate('page.Discover The Best','Ontdek de beste') }}  <span class="text-primary">{{ devTranslate('page.Veterinary Clinics','Dieren klinieken') }}</span>
            </h3>
        </div>
        <div class="map w-full">
            <div class="w-full">
                <img src="{{ asset('dieren/src/public/img/map.jpg')}}" alt="Map Image" class="w-full object-cover">
            </div>
        </div>
    </section>

</div>
@endsection