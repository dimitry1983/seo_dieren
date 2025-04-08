@extends('layouts.site')

@section('content')
<div class="main-container relative w-full overflow-hidden">

    <section class="section section--hero-interior bg-cover bg-right bg-center h-[300px]" style="background-image: url('{{ asset('dieren/src/public/img/profile.png') }}')"></section>

    <section class="section section--profile p-0 mt-[-90px] bg-transparent">
        <div class="container mx-auto">
            <div class="flex items-center">
                <figure>
                    <img src="{{ asset('dieren/src/public/img/clinic.png')}}" alt="">
                </figure>
                <h3 class="title title--profile text-md font-bold ml-4 leading-tight md:leading-tight lg:leading-normal">
                    {{ $veterinarian->name }} |
                    {!! render_stars($veterinarian->rating) !!}
                    <span>{{ number_format($veterinarian->rating, 1) }} - (.. beoordelingen)</span>
                </h3>
            </div>
        </div>
    </section>

    <section class="section section--profile-interior">
        <div class="container mx-auto relative">
            <div class="grid grid-cols-4 gap-4">
                <div class="lg:col-span-3 col-span-4">
                    <div class="pills border border-gray-300 shadow-lg mb-8">
                        <ul class="md:flex py-3">
                            <li class="px-1 xl:px-3">
                                <button class="btn btn-primaryLight">{{ devTranslate('page.Informatie','Informatie') }}</button>
                            </li>
                            <li class="xl:px-3 md:border-l md:border-l-gray-300">
                                <button class="btn btn-primary bg-white">{{ devTranslate('page.Diensten','Diensten') }}</button>
                            </li>
                            <li class="xl:px-3 md:border-l md:border-l-gray-300">
                                <button class="btn btn-primary bg-white">{{ devTranslate('page.Galerij','Galerij') }}</button>
                            </li>
                            <li class="xl:px-3 md:border-l md:border-l-gray-300">
                                <button class="btn btn-primary bg-white">{{ devTranslate('page.Prijzen','Prijzen') }}</button>
                            </li>
                            <li class="xl:px-3 md:border-l md:border-l-gray-300">
                                <button class="btn btn-primary bg-white">{{ devTranslate('page.Beoordelingen','Beoordelingen') }}</button>
                            </li>
                        </ul>
                    </div>
                    <div class="content border border-gray-300 shadow-lg px-[30px] py-[50px] mb-6 relative">
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                            {{ devTranslate('page.Informatie','Informatie') }}
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800">
                            <span class="text-primary">{{$veterinarian->name}}</span>
                        </h3>
                        <p>
                            {!!$veterinarian->description!!}
                        </p>
                        <img src="{{ asset('dieren/src/public/img/paw.png')}}" alt="" class="absolute top-[20px] right-[20px] z-[0]">
                    </div>
                    <div class="content border border-gray-300 shadow-lg px-[30px] py-[50px] mb-6 relative">
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                            {{ devTranslate('page.Diensten','Diensten') }}
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800 mb-6 leading-tight md:leading-tight lg:leading-normal">
                            <span class="text-primary">{{ devTranslate('page.Producten','Producten') }}</span> {{ devTranslate('page.En Diensten','En Diensten') }}
                        </h3>
                        <div class="services grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                           
                        
                            @if (!empty($veterinarian->services)) 
                                @foreach($veterinarian->services as $item)
                                    <div class="services mb-4 border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                                        <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                                            <img class="m-auto w-full h-full object-cover" src="{{ asset('storage/'.$item->image)}}" alt="">
                                        </figure>
                                        <div class="content text-center p-4">
                                            <h3 class="title text-md font-semibold mb-2">{{$item->name}}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <img src="{{ asset('dieren/src/public/img/paw.png')}}" alt="" class="absolute top-[20px] right-[20px] z-[0]">
                    </div>
                    <div class="gallery border border-gray-300 shadow-lg px-[30px] py-[50px] mb-6 relative">
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                            {{ devTranslate('page.Galerij','Galerij') }}
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800 mb-6 leading-tight md:leading-tight lg:leading-normal">
                            <span class="text-primary">{{ devTranslate('page.Sfeer','Sfeer') }}</span> {{ devTranslate('page.Impressie','Impressie') }}
                        </h3>
                        <div class="splide" id="gallery-slider">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/gallery-1.png')}}" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/gallery-2.png')}}" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/gallery-3.png')}}" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/gallery-1.png')}}" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/gallery-2.png')}}" alt="">
                                    </li>
                                    <li class="splide__slide">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/gallery-3.png')}}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <img src="{{ asset('dieren/src/public/img/paw.png')}}" alt="" class="absolute top-[20px] right-[20px] z-[0]">
                    </div>
                    <div class="prices border border-gray-300 shadow-lg px-[30px] py-[50px] mb-6 relative">
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                            {{ devTranslate('page.Prijzen','Prijzen') }}
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800 mb-6 leading-tight md:leading-tight lg:leading-normal">
                            <span class="text-primary">{{ devTranslate('page.Wat kunt u','Wat kunt u') }}</span> {{ devTranslate('page.Verwachten','Verwachten') }}
                        </h3>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <div class="lg:col-span-1 border-gray-300 shadow-lg px-[30px] py-[50px] mb-6">
                                <figure class="w-[77px] h-[77px] bg-primaryLight rounded-full flex justify-center items-center mt-[-60px] mb-2">
                                    <img src="{{ asset('dieren/src/public/img/icon1.png')}}" alt="">
                                </figure>
                                <h3 class="title title--services text-2xl font-bold text-gray-800 mb-4">
                                    {{ devTranslate('page.Diensten','Diensten') }}
                                </h3>
                                <ul>
                                 
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> Overleg <span class="price block ml-auto">€35,00</span>
                                    </li>

                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> Vaccins <span class="price block ml-auto">€35,00</span>
                                    </li>
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> Ontwormen <span class="price block ml-auto">€35,00</span>
                                    </li>
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> Elektrocardiogram <span class="price block ml-auto">€35,00</span>
                                    </li>
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> Voedingsadvies <span class="price block ml-auto">€35,00</span>
                                    </li>
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> Accessoires <span class="price block ml-auto">€35,00</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="lg:col-span-1 border-gray-300 shadow-lg px-[30px] py-[50px] mb-6">
                                <figure class="w-[77px] h-[77px] bg-primaryLight rounded-full flex justify-center items-center mt-[-60px] mb-2">
                                    <img src="{{ asset('dieren/src/public/img/icon2.png')}}" alt="">
                                </figure>
                                <h3 class="title title--services text-2xl font-bold text-gray-800 mb-4">
                                    Operaties / Sterilisaties
                                </h3>
                                <ul>
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> 0 A 5kg <span class="price block ml-auto">€35,00</span>
                                    </li>
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> 5.1 A 15kg <span class="price block ml-auto">€35,00</span>
                                    </li>
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> 15.1 A 25kg <span class="price block ml-auto">€35,00</span>
                                    </li>
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> 25.1 A 25kg <span class="price block ml-auto">€35,00</span>
                                    </li>
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> 35.1 A 45kg <span class="price block ml-auto">€35,00</span>
                                    </li>
                                    <li class="mb-3 flex">
                                        <i class="fa-regular fa-circle-check text-primary mr-1"></i> > A 45kg <span class="price block ml-auto">€35,00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <img src="{{ asset('dieren/src/public/img/paw.png')}}" alt="" class="absolute top-[20px] right-[20px] z-[0]">
                    </div>
                    <div class="reviews border border-gray-300 shadow-lg px-[30px] py-[50px] mb-6 relative">
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                            {{ devTranslate('page.Beoordelingen','Beoordelingen') }}
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800 mb-6 leading-tight md:leading-tight lg:leading-normal">
                            <span class="text-primary">{{ devTranslate('page.Wat andere mensen','Wat andere mensen') }}</span> {{ devTranslate('page.Vonden','Vonden') }}
                        </h3>
                        <div class="rate grid lg:grid-cols-3 grid-cols-1 mb-4 pb-6 border-b border-b-gray-300">
                            <div class="lg:col-span-1 col-span-3">
                                <h4 class="qualify font-bold text-2xl">
                                    9.0
                                </h4>
                                <h4 class="starts text-yellow-500 text-lg">
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                </h4>
                                <p class="font-bold">
                                    9.0 - (10 beoordelingen)
                                </p>
                            </div>
                            <div class="col-span-3 lg:col-span-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-gray-800 font-semibold w-[90px]">5 Stars</span>
                                    <div class="relative w-full h-6 bg-gray-200 rounded-lg overflow-hidden flex items-center">
                                        <div class="absolute left-0 top-0 h-full bg-yellow-500 w-[40%]"></div>
                                    </div>
                                    <span class="text-gray-800 font-semibold">5</span>
                                </div>

                                <div class="flex items-center gap-2 mt-2">
                                    <span class="text-gray-800 font-semibold w-[90px]">4 Stars</span>
                                    <div class="relative w-full h-6 bg-gray-200 rounded-lg overflow-hidden flex items-center">
                                        <div class="absolute left-0 top-0 h-full bg-yellow-500 w-[20%]"></div>
                                    </div>
                                    <span class="text-gray-800 font-semibold">1</span>
                                </div>

                                <div class="flex items-center gap-2 mt-2">
                                    <span class="text-gray-800 font-semibold w-[90px]">3 Stars</span>
                                    <div class="relative w-full h-6 bg-gray-200 rounded-lg overflow-hidden flex items-center">
                                        <div class="absolute left-0 top-0 h-full bg-yellow-500 w-[o%]"></div>
                                    </div>
                                    <span class="text-gray-800 font-semibold">0</span>
                                </div>

                                <div class="flex items-center gap-2 mt-2">
                                    <span class="text-gray-800 font-semibold w-[90px]">2 Stars</span>
                                    <div class="relative w-full h-6 bg-gray-200 rounded-lg overflow-hidden flex items-center">
                                        <div class="absolute left-0 top-0 h-full bg-yellow-500 w-[o%]"></div>
                                    </div>
                                    <span class="text-gray-800 font-semibold">0</span>
                                </div>

                                <div class="flex items-center gap-2 mt-2">
                                    <span class="text-gray-800 font-semibold w-[90px]">1 Stars</span>
                                    <div class="relative w-full h-6 bg-gray-200 rounded-lg overflow-hidden flex items-center">
                                        <div class="absolute left-0 top-0 h-full bg-yellow-500 w-[o%]"></div>
                                    </div>
                                    <span class="text-gray-800 font-semibold">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="reviews">
                            <div class="review pb-6 mb-4 border-b border-b-gray-300">
                                <p class="text-gray-700 date">Januari 15, 2025</p>
                                <h4 class="starts text-yellow-500 text-lg mb-2">
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <span class="text-black font-bold">9.0</span>
                                </h4>
                                <h3 class="name text-lg font-bold mb-2">
                                    Alberto Speankelink
                                </h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. 
                                </p>
                            </div>
                            <div class="review pb-6 mb-4 border-b border-b-gray-300">
                                <p class="text-gray-700 date">Januari 15, 2025</p>
                                <h4 class="starts text-yellow-500 text-lg mb-2">
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <span class="text-black font-bold">9.0</span>
                                </h4>
                                <h3 class="name text-lg font-bold mb-2">
                                    Alberto Speankelink
                                </h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. 
                                </p>
                            </div>
                            <div class="review pb-6 mb-4">
                                <p class="text-gray-700 date">Januari 15, 2025</p>
                                <h4 class="starts text-yellow-500 text-lg mb-2">
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <span class="text-black font-bold">9.0</span>
                                </h4>
                                <h3 class="name text-lg font-bold mb-2">
                                    Alberto Speankelink
                                </h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. 
                                </p>
                            </div>
                        </div>
                        <img src="{{ asset('dieren/src/public/img/paw.png')}}" alt="" class="absolute top-[20px] right-[20px] z-[0]">
                    </div>
                </div>
                <div class="lg:col-span-1 col-span-4">
                    <div class="sidebar border border-gray-300 transition duration-300 ease-out shadow-lg">
                        <div class="map">
                            <div style="width: 100%"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=es&amp;q=Netherlands+(Mi%20nombre%20de%20egocios)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/car-satnav-gps/">GPS car tracker</a></iframe></div>
                        </div>
                        <div class="content py-3 px-2">
                            <h3 class="title title--block font-bold text-sm mb-3">
                                Amsterdam Clinic
                            </h3>
                            <p class="location text-xs mb-0">
                                <i class="fa-solid fa-location-dot text-primary"></i> 9999 BP Amsterdam, Netherlands
                            </p>
                            <a class="text-xs" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> +1800 956 687
                            </a>
                            <h4 class="price font-bold text-sm mt-2">
                                From €30.00
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('dieren/src/public/img/bg-blocks.png')}}" alt="" class="absolute top-0 bottom-0 right-0 z-[-1] m-auto">
</div>
</section>

@endsection