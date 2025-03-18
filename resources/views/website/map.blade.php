@extends('layouts.site')

@section('content')
<div class="main-container relative w-full overflow-hidden">

    <section class="section section--map py-0">
        <div class="grid md:grid-cols-4">
            <div class="search-form lg:col-span-1 col-span-2 bg-[#F3F6F9] border border-gray-300">
                <form class="py-[50px] px-[30px]">
                    <p class="mb-[10px]"><strong>What Are You Looking For?</strong></p>
                    <input type="text" placeholder="Search For" class="form-control mb-4 p-3 rounded-full border border-gray-300 outline-none hover:border-gray-400 focus:ring-2 focus:ring-primary transition duration-300 ease-out w-full">

                    <p class="mb-[10px]"><strong>Category</strong></p>
                    <div class="relative mb-4">
                        <select class="appearance-none p-3 rounded-full border border-gray-300 outline-none hover:border-gray-400 focus:ring-2 focus:ring-primary transition duration-300 ease-out w-full pr-10">
                            <option>Dogs</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                    </div>

                    <p class="mb-[10px]"><strong>Location</strong></p>
                    <div class="relative mb-4">
                        <select class="appearance-none p-3 rounded-full border border-gray-300 outline-none hover:border-gray-400 focus:ring-2 focus:ring-primary transition duration-300 ease-out w-full pr-10">
                            <option>Amsterdam</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                    </div>

                    <p class="mb-0"><strong>Search</strong></p>
                    <button class="btn btn-primaryLight w-full mt-3 flex items-center justify-center gap-2 px-3 py-5 rounded-full relative">
                        Search Now <i class="fa-solid fa-magnifying-glass text-primaryLight w-[50px] h-[50px] rounded-full flex justify-center items-center bg-black absolute right-4 top-2"></i>
                    </button>

                    <a class="underline text-center block mt-4 text-gray-800 font-bold hover:text-primary transition" href="#">Clear All Filters</a>
                </form>
            </div>
            <div class="map lg:col-span-3 col-span-2">
                <div style="width: 100%"><iframe width="100%" height="545" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=525&amp;hl=es&amp;q=Netherlands+(Mi%20nombre%20de%20egocios)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/car-satnav-gps/">GPS car tracker</a></iframe></div>
            </div>
        </div>
    </section>

    <section class="section section--categories bg-[url('{{ asset('dieren/src/public/img/categories.jpg') }}')] bg-cover bg-center pt-[80px] pb-[100px]">
        <div class="container mx-auto">
            <div class="categories grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/dog.png') }}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">Dogs</h3>
                        <p class="paragraph text-sm">(150 Listings)</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/cat.png') }}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">Cats</h3>
                        <p class="paragraph text-sm">(150 Listings)</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/turtle.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">Others</h3>
                        <p class="paragraph text-sm">(100 Listings)</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/shelters.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">Shelters</h3>
                        <p class="paragraph text-sm">(100 Listings)</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/specialists.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">Specialists</h3>
                        <p class="paragraph text-sm">(50 Listings)</p>
                    </div>
                </div>

                <div class="category border-2 border-white shadow-lg bg-white transition-transform duration-300 ease-out hover:scale-y-105">
                    <figure class="bg-gray-300 w-full h-[170px] flex overflow-hidden">
                        <img class="m-auto w-[120px] h-[120px]" src="{{ asset('dieren/src/public/img/emergencies.png')}}" alt="">
                    </figure>
                    <div class="content text-center p-4">
                        <h3 class="title text-md font-semibold mb-2">Emergencies</h3>
                        <p class="paragraph text-sm">(50 Listings)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--clinics py-[40px]">
        <div class="container mx-auto relative">
            <div class="section__header flex items-center justify-between mb-8">
                <div>
                    <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                        Lorem Ipsum Dolor
                    </h4>
                    <h3 class="title title--section font-bold text-3xl text-gray-800 md:leading-tight leading-normal">
                        <span class="text-primary">Top Clinics</span> Of The Month
                    </h3>
                </div>
                <a href="#" class="btn btn-outline-black border border-gray-800 py-2 px-4 rounded-full font-bold whitespace-nowrap mt-4 lg:mt-0 transition duration-300 ease-out hover:bg-black hover:text-white">Explore All</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="block-hotspots col-span-4 sm:col-span-2 md:col-span-1 border bg-white border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
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
                <div class="block-hotspots col-span-4 sm:col-span-2 md:col-span-1 border bg-white border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
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
                <div class="block-hotspots col-span-4 sm:col-span-2 md:col-span-1 border bg-white border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
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
                <div class="block-hotspots col-span-4 sm:col-span-2 md:col-span-1 border bg-white border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
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
            </div>
            <img src="public/img/bg-blocks.png" alt="" class="absolute bottom-[-80px] right-[-60px] z-[-1]">
        </div>
    </section>

    <section class="section section--testimonial pt-[80px] pb-[40px]">
        <div class="container px-2 mx-auto">
            <div class="section__header flex flex-col lg:flex-row items-center justify-between mb-6">
                <div class="text-center lg:text-left">
                    <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                        Lorem Ipsum Dolor
                    </h4>
                    <h3 class="title title--section font-bold text-3xl text-gray-800 md:leading-tight leading-normal">
                        What Our Customers <span class="text-primary">Are Saying...</span>
                    </h3>
                </div>
                <a href="#" class="btn btn-outline-black border border-gray-800 py-2 px-4 rounded-full font-bold whitespace-nowrap mt-4 lg:mt-0 transition duration-300 ease-out hover:bg-black hover:text-white">Explore All</a>
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

    <section class="section section--about-us bg-white lg:bg-cover lg:bg-right bg-center" style="background-image: url('{{ asset('dieren/src/public/img/about.png') }}');">
        <div class="container mx-auto">
            <div class="grid grid-cols-2 gap-6">
                <div class="lg:col-span-1 col-span-2">
                    <h3 class="title title--section text-4xl font-bold mb-4 pb-4 border-b border-b-gray-300 w-fit md:leading-tight leading-normal">
                        <span class="text-primary">Lorem Ipsum</span> Dolor Sit
                    </h3>
                    <ul class="mb-[25px] lg:mb-[100px]">
                        <li class="font-semibold mb-3">
                            <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur adipcing elit.
                        </li>
                        <li class="font-semibold mb-3">
                            <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur adipcing elit.
                        </li>
                        <li class="font-semibold mb-3">
                            <i class="fa-regular fa-circle-check text-primary"></i> Lorem ipsum dolor sit amet consectetur adipcing elit.
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary min-w-[300px] md:min-w-[400px] py-5 bg-[#202428] text-center text-primaryLight block w-fit lg:mx-auto lg:mb-8 mb-4 relative">Find A Clinic <i class="fa-solid fa-magnifying-glass float-right text-xl  text-[#202428] w-[50px] h-[50px] rounded-full flex justify-center items-center bg-primaryLight absolute right-2 top-2"></i></a>
                    <a href="#" class="btn btn-primary min-w-[300px] md:min-w-[400px] py-5 bg-[#202428] text-center text-primaryLight block w-fit lg:mx-auto relative">Add Your Clinic <i class="fa-solid fa-plus float-right text-xl  text-[#202428] w-[50px] h-[50px] rounded-full flex justify-center items-center bg-primaryLight absolute right-2 top-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--stats bg-[#202428] pt-[90px] pb-[75px]">
        <div class="container px-2 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-6 items-center">
                <div class="col-span-1 lg:col-span-2 md:col-span-3 sm:col-span-3 text-center lg:text-left">
                    <h3 class="title title--section text-4xl text-white font-bold mb-2 md:leading-tight leading-normal">
                        <span class="text-primary">Vergelijk</span>dierenarts.nl
                    </h3>
                    <p class="paragraph text-white">
                        Lorem ipsum dolor sit amet consectetur<br>adipcing elit. In vel laoreet eros. Nullam<br>vulputate, magna vel efficitur scelerisque.
                    </p>
                </div>
                <div class="text-center">
                    <p class="text-white">CLINICS</p>
                    <span class="text-primaryLight font-medium text-5xl md:text-6xl block">+2k</span>
                </div>
                <div class="sm:border-x sm:border-x-white sm:border-x-2 text-center">
                    <p class="text-white">LISTINGS</p>
                    <span class="text-primaryLight font-medium text-5xl md:text-6xl block">+20k</span>
                </div>
                <div class="text-center">
                    <p class="text-white">PETS</p>
                    <span class="text-primaryLight font-medium text-5xl md:text-6xl block">+200k</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--blog py-[40px]">
        <div class="container px-2 mx-auto relative">
            <h3 class="title title--section text-center text-3xl text-gray-800 font-bold mb-8 md:leading-tight leading-normal">
                From <span class="text-primary">Our Blog</span>
            </h3>
            <div class="posts grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-1.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-md date">20 February, 2025</p>
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
                        <p class="text-primary text-md date">20 February, 2025</p>
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
                        <p class="text-primary text-md date">20 February, 2025</p>
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
        <div class="container mx-auto">
            <h3 class="title title--section text-center text-4xl text-gray-800 font-bold mb-8 md:leading-tight leading-normal">
                Discover The Best <span class="text-primary">Veterinary Clinics</span>
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