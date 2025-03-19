@extends('layouts.site')

@section('content')
<div class="main-container relative w-full overflow-hidden">

    <section class="section section--hero-interior bg-primaryLight relative py-[140px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png')}}" alt="">
        <div class="container mx-auto relative z-1">
            <h1 class="text-6xl text-center font-regular text-gray-800 relative z-3 leading-tight md:leading-tight lg:leading-normal">
                Contact <strong>Us</strong>
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0 hidden lg:block" src="{{ asset('dieren/src/public/img/contact.png')}}" alt="">
    </section>

    <section class="section section--contact contact-form pb-[40px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-8">
                    <form class="px-[50px] py-[60px] bg-[#202428] lg:h-full" action="">
                        <p class="text-white">
                            Leave us a message and we will help you with any questions about veterinary clinics, services or how to use our directory.
                        </p>
                        <p class="text-primary">
                            We are here for you and your pet!
                        </p>
                        <label class="text-white block mb-2">
                            Name
                        </label>
                        <input class="rounded-[5px] px-2 w-full py-2" type="text">
                        <label class="text-white block my-2">
                            Telephone
                        </label>
                        <input class="rounded-[5px] px-2 w-full py-2" type="text">
                        <label class="text-white block my-2">
                            Email
                        </label>
                        <input class="rounded-[5px] px-2 w-full py-2" type="text">
                        <label class="text-white block my-2">
                            Message
                        </label>
                        <textarea class="rounded-[5px] px-2 w-full mb-10 py-2" ></textarea>
                        <button class="btn btn-primaryLight w-full rounded-[5px] text-white">Send</button>
                    </form>
                </div>
                <div class="lg:col-span-4 bg-gray-200">
                    <figure class="h-full">
                        <img class="h-full w-full object-cover" src="{{ asset('dieren/src/public/img/contact2.png')}}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--map pt-[40px] pb-0">
        <div class="container mx-auto">
            <h3 class="title title--section text-center text-4xl text-gray-800 font-bold mb-8 leading-tight md:leading-tight lg:leading-normal">
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