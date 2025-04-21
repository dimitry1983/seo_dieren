@extends('layouts.site')

@section('content')

<div class="main-container relative w-full overflow-hidden">
    <section class="section section--hero-interior bg-primaryLight relative py-[60px]">
        <img class="absolute bottom-0 left-0 z-0" src="{{ asset('dieren/src/public/img/about1.png')}}" alt="">
        <div class="container mx-auto relative z-10">
            <h1 class="text-5xl lg:text-6xl text-center font-regular text-gray-800 relative z-3 leading-tight md:leading-tight lg:leading-normal">
             {{devTranslate('page.About', 'Over')}} <strong>{{devTranslate('page.Us', 'Ons')}}</strong>
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0" src="{{ asset('dieren/src/public/img/about2.png')}}" alt="">
    </section>

    <section class="section section--about-us">
        <div class="container mx-auto relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <h3 class="title title--section text-4xl font-bold mb-8 leading-tight md:leading-tight lg:leading-normal">
                  {{$intro['title_first'] ?? devTranslate('page.Find The Best', 'Vind de beste')}}<br><span class="text-primary">
                  {{$intro['title_second'] ?? devTranslate('page.Veterinary Care Near You', 'Dierenkliniek bij jou in de buurt')}}</span>
                    </h3>
                    <p class="paragraph text-gray-600 mb-4">
                        {!! $intro['description'] ?? "" !!}
                    </p>
                    <a href="{{$intro['cta_url_btn1']}}" class="btn-secondary flex justify-center items-center" style="padding-top:8px!important; padding-bottom:8px!important;">
                        {{$intro['cta_title_btn1'] ?? ""}}<i class="fa-solid fa-circle-plus ml-4 text-4xl"></i>
                    </a>
                </div>
                <div>
                    <figure>
                        <img src="{{ asset('storage/'.$intro['image'])}}" alt="">
                    </figure>
                </div>
            </div>
            <img src="{{ asset('dieren/src/public/img/bg-blocks.png')}}" alt="" class="absolute bottom-[-80px] left-[-60px] z-[-1]">
        </div>
    </section>

    <section class="section section--stats bg-[#202428] pt-[45px] pb-[40px] lg:pt-[90px] lg:pb-[75px]">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-7">
                    <h3 class="adv title title--section c-white text-3xl text-white font-bold mb-2 leading-tight md:leading-tight lg:leading-normal">
                        {!!$cta['title']!!}
                    </h3>
                    <p class="paragraph text-white">
                        {!!$cta['description']!!}
                    </p>
                    <ul class="mb-4">
                        @if (!empty($cta['usp']))
                            @foreach($cta['usp'] as $item)
                                <li class="font-semibold mb-3 text-white">
                                    <i class="fa-regular fa-circle-check text-white"></i> {{$item['usp']}}
                                </li>
                            @endforeach
                        @endif
                        
                    </ul>
                    <a href="{!!$cta['cta_url_btn1']!!}" class="btn btn-primary pl-6 pr-[70px] py-5 bg-primaryLight text-center text-white block w-fit lg:mb-8 mb-4 relative">
                        {{$cta['cta_title_btn1']}} <i class="fa-solid fa-magnifying-glass float-right text-xl  text-primaryLight w-[50px] h-[50px] rounded-full flex justify-center items-center bg-white absolute right-2 top-2"></i>
                    </a>
                </div>
                <div class="lg:col-span-5">
                    <figure>
                        <img src="{{ asset('storage/'.$cta['image'])}}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--testimonial pt-[40px] pb-[20px] lg:pt-[80px] lg:pb-[40px]">
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
            </div>
            <div class="testimonials grid grid-cols-1 sm:grid-cols-2 gap-6">
                @if (!empty($getRandomReviews))
                    @foreach($getRandomReviews as $review)
                    <div class="review border border-gray-300 py-[50px] px-[30px] md:p-[50px] bg-white">
                        <div class="d-rating flex justify-center items-center">
                            <figure class="w-[100px] h-[100px] rounded-full overflow-hidden mb-4">
                                <img class="w-full h-full" src="{{ asset('dieren/src/public/img/review.png')}}" alt="">
                            </figure>
                            <p class="rating text-yellow-500 text-xs mb-0 mt-4 ml-2">
                                {!! render_stars($review->rating) !!}
                            </p>
                        </div>
                        <p class="review__content text-xl mb-4 text-center font-medium">
                            <i>{{ \Illuminate\Support\Str::limit($review->description, 350) }}</i>
                        </p>
                        <p class="quote font-bold text-6xl text-center text-primary mb-0">"</p>
                        <h3 class="name text-normal font-bold text-center">
                            {{ $review->name }}
                            <span class="location text-gray-400 font-normal text-sm">{{ $review->city }}</span>
                        </h3>
                    </div> 
                    @endforeach
                @endif
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
                <img src="{{ asset('dieren/src/public/img/map.jpg')}}" alt="Map Image" class="w-full h-[500px] object-cover">
            </div>
        </div>
    </section>
</div>
@endsection