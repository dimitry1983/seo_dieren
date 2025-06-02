@extends('layouts.seosite')

@section('content')
<div class="main-container relative w-full overflow-hidden">

 <?php

    use Illuminate\Support\Facades\Storage;

    $image =  Storage::url($headerBlock['background_image']) ?? asset('hondverzekeren/src/public/img/hero-bg.jpg');
    ?>
 <!-- hero -->
 <section class="section section--primary section--hero section--page-header bg-cover bg-center bg-no-repeat text-white relative overflow-hidden" style="background-image: url('{{$image}}');">
     <div class="container text-center">
         <h1 class="section-title--lg lg:text-[60px] mb-2 font-medium">Blog</h1>
     </div>
 </section>

    <section class="section section--contact contact-form pb-[40px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-8">
                    <form class="px-[50px] py-[60px] bg-[#202428] lg:h-full" action="">
                        <p class="text-white">
                            {{devTranslate('page.Leave us a message and we will help you with any questions about veterinary clinics, services or how to use our directory.', 
                                'Laat ons een bericht achter en we helpen je met vragen over dierenklinieken, diensten of hoe je onze gids kunt gebruiken.')}}
                        </p>
                        <p class="text-primary">
                           {{devTranslate('page.We are here for you and your pet!', 'Wij zijn hier voor jou en je huisdier!')}}
                        </p>
                        <label class="text-white block mb-2">
                           {{devTranslate('page.Name', 'Naam')}}
                        </label>
                        <input class="rounded-[5px] px-2 w-full py-2" type="text">
                        <label class="text-white block my-2">
                            {{devTranslate('page.Telephone', 'Telefoon')}}
                        </label>
                        <input class="rounded-[5px] px-2 w-full py-2" type="text">
                        <label class="text-white block my-2">
                            {{devTranslate('page.Email', 'E-mail')}}
                        </label>
                        <input class="rounded-[5px] px-2 w-full py-2" type="text">
                        <label class="text-white block my-2">
                            {{devTranslate('page.Message', 'Bericht')}}
                        </label>
                        <textarea class="rounded-[5px] px-2 w-full mb-10 py-2" ></textarea>
                        <button class="btn btn-primaryLight w-full rounded-[5px] text-white">{{devTranslate('page.Send', 'Verstuur')}}</button>
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
                {{devTranslate('page.Discover The Best', 'Ontdek de beste')}} <span class="text-primary">{{devTranslate('page.Veterinary Clinics', 'Dierenklinieken')}}</span>
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