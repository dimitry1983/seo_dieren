@extends('layouts.site')

@section('content')
<div class="main-container relative w-full overflow-hidden">
        <section class="section section--breadcrumb p-0 bg-primaryLight">
            <div class="container p-2 mx-auto">
                <nav class="breadcrumb py-4">
                    <ul class="breadcrumb flex">
                        <li class="breadcrumb-item mr-2">
                            <a href="#"><strong>Home /</strong></a>
                        </li>
                        <li class="breadcrumb-item mr-2">
                            <a href="#"><strong>Blog /</strong></a>
                        </li>
                        <li class="breadcrumb-item">
                            <span>Lorem ipsum dolor</span>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>

        <section class="section section--interior-blog pb-[40px]">
            <div class="container p-2 mx-auto">
                <div class="grid xl:grid-cols-4 lg:grid-cols-3 grid-cols-1 gap-6">
                    <div class="col-span-1 xl:col-span-3 lg:col-span-2">
                        <h3 class="title title--section text-3xl text-gray-800 font-bold">
                            Lorem ipsum <span class="text-primary">dolor</span>
                        </h3>
                        <span class="date text-primary block mb-4 font-semibold">
                            20 February, 2025
                        </span>
                        <figure class="mb-4">
                            <img class="w-full" src="{{ asset('dieren/src/public/img/blog-interior.jpg')}}" alt="">
                        </figure>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. 
                            <br><br>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <figure>
                                <img class="w-full" src="{{ asset('dieren/src/public/img/blog-interior1.jpg')}}" alt="">
                            </figure>
                            <figure>
                                <img class="w-full" src="{{ asset('dieren/src/public/img/blog-interior2.jpg')}}" alt="">
                            </figure>
                        </div>
                        <h3 class="title title--section text-3xl text-gray-800 font-bold mb-3">
                            Lorem ipsum <span class="text-primary">dolor</span>
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. 
                        </p>
                        <ul>
                            <li class="mb-3">
                                <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur Adipcing Elit.
                            </li>
                            <li class="mb-3">
                                <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur Adipcing Elit.
                            </li>
                            <li class="mb-3">
                                <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur Adipcing Elit.
                            </li>
                        </ul>
                        <p>
                            Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit
                        </p>
                    </div>
                    <div class="col-span-1">
                        <div class="sidebar">
                            <h4 class="title title--sedebar text-xl text-gray-800 font-bold lg:mt-4 lg:mb-8 mb-6">
                                Gerelateerde Artikelen
                            </h4>
                            <div class="article relative border border-gray-300 transition duration-300 ease-out shadow-lg mb-3">
                                <div class="grid grid-cols-4 lg:grid-cols-3 gap-4">
                                    <figure class="col-span-1 lg:col-span-1 mb-0">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/article1.jpg')}}" alt="">
                                    </figure>
                                    <div class="col-span-3 lg:col-span-2 pr-4 py-2">
                                        <h3 class="title title--article text-normal font-bold">
                                            Lorem Ipsum Dolor
                                        </h3>
                                        <p class="text-sm mb-0">
                                            Lorem ipsum dolor sit amet
                                        </p>
                                        <a href="#" class="text-primary absolute lg:right-[8px] right-[15px] lg:bottom-[5px] bottom-[15px] text-lg"><i class="fa-sharp fa-solid fa-circle-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="article relative border border-gray-300 transition duration-300 ease-out shadow-lg mb-3">
                                <div class="grid grid-cols-4 lg:grid-cols-3 gap-4">
                                    <figure class="col-span-1 lg:col-span-1 mb-0">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/article2.jpg')}}" alt="">
                                    </figure>
                                    <div class="col-span-3 lg:col-span-2 pr-4 py-2">
                                        <h3 class="title title--article text-normal font-bold">
                                            Lorem Ipsum Dolor
                                        </h3>
                                        <p class="text-sm mb-0">
                                            Lorem ipsum dolor sit amet
                                        </p>
                                        <a href="#" class="text-primary absolute lg:right-[8px] right-[15px] lg:bottom-[5px] bottom-[15px] text-lg"><i class="fa-sharp fa-solid fa-circle-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="article relative border border-gray-300 transition duration-300 ease-out shadow-lg mb-3">
                                <div class="grid grid-cols-4 lg:grid-cols-3 gap-4">
                                    <figure class="col-span-1 lg:col-span-1 mb-0">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/article3.jpg')}}" alt="">
                                    </figure>
                                    <div class="col-span-3 lg:col-span-2 pr-4 py-2">
                                        <h3 class="title title--article text-normal font-bold">
                                            Lorem Ipsum Dolor
                                        </h3>
                                        <p class="text-sm mb-0">
                                            Lorem ipsum dolor sit amet
                                        </p>
                                        <a href="#" class="text-primary absolute lg:right-[8px] right-[15px] lg:bottom-[5px] bottom-[15px] text-lg"><i class="fa-sharp fa-solid fa-circle-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="article relative border border-gray-300 transition duration-300 ease-out shadow-lg mb-3">
                                <div class="grid grid-cols-4 lg:grid-cols-3 gap-4">
                                    <figure class="col-span-1 lg:col-span-1 mb-0">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/article4.jpg')}}" alt="">
                                    </figure>
                                    <div class="col-span-3 lg:col-span-2 pr-4 py-2">
                                        <h3 class="title title--article text-normal font-bold">
                                            Lorem Ipsum Dolor
                                        </h3>
                                        <p class="text-sm mb-0">
                                            Lorem ipsum dolor sit amet
                                        </p>
                                        <a href="#" class="text-primary absolute lg:right-[8px] right-[15px] lg:bottom-[5px] bottom-[15px] text-lg"><i class="fa-sharp fa-solid fa-circle-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="article relative border border-gray-300 transition duration-300 ease-out shadow-lg mb-3">
                                <div class="grid grid-cols-4 lg:grid-cols-3 gap-4">
                                    <figure class="col-span-1 lg:col-span-1 mb-0">
                                        <img class="w-full" src="{{ asset('dieren/src/public/img/article5.jpg')}}" alt="">
                                    </figure>
                                    <div class="col-span-3 lg:col-span-2 pr-4 py-2">
                                        <h3 class="title title--article text-normal font-bold">
                                            Lorem Ipsum Dolor
                                        </h3>
                                        <p class="text-sm mb-0">
                                            Lorem ipsum dolor sit amet
                                        </p>
                                        <a href="#" class="text-primary absolute lg:right-[8px] right-[15px] lg:bottom-[5px] bottom-[15px] text-lg"><i class="fa-sharp fa-solid fa-circle-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--map pt-[40px] pb-0">
            <div class="container p-2 mx-auto">
                <h3 class="title title--section text-center text-4xl text-gray-800 font-bold mb-8">
                    Discover The Best <span class="text-primary">Veterinary Clinics</span>
                </h3>
            </div>
            <div class="map">
                <div style="width: 100%">
                    <iframe width="100%" height="400" class="sm:h-[500px]" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=500&amp;hl=es&amp;q=Netherlands+(Mi%20nombre%20de%20egocios)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                    </iframe>
                </div>
            </div>
        </section>

    </div>
@endsection