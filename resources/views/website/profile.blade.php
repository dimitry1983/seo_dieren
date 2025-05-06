@extends('layouts.site')

@section('content')

@section('structured-data')
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "VeterinaryCare",
        "name": "{{ $veterinarian->name }}",
        "image": "{{ asset('storage/' . $veterinarian->image ?? 'dieren/src/public/img/clinic.png') }}",
        "description": @json(strip_tags($veterinarian->description)),
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ $veterinarian->street }} {{ $veterinarian->street_nr }}",
            "addressLocality": "{{ $veterinarian->city->name }}",
            "postalCode": "{{ $veterinarian->zipcode }}",
            "addressCountry": "NL"
        },
        "telephone": "{{ $veterinarian->phone }}",
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "{{ number_format($veterinarian->rating, 1) }}",
            "reviewCount": "{{ $totalRatings }}"
        },
        "review": [
            @foreach ($reviews->take(3) as $review)
            {
                "@type": "Review",
                "author": {
                "@type": "Person",
                "name": "{{ $review->name }}"
                },
                "datePublished": "{{ \Carbon\Carbon::parse($review->created_at)->toDateString() }}",
                "reviewBody": @json($review->description),
                "reviewRating": {
                "@type": "Rating",
                "ratingValue": "{{ $review->rating }}",
                "bestRating": "5"
                }
            }@if (!$loop->last),@endif
            @endforeach
        ]
        }
    </script>
@endsection


<div class="main-container relative w-full overflow-hidden">
    @php
        $totalRatings = array_sum($ratingCounts);
        $days = [ 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag', 'Zondag'];

    @endphp

    <section class="section section--hero-interior bg-cover bg-right bg-center" style="background-image: url('{{ asset('dieren/src/public/img/profile.png') }}'); min-height: 120px;"></section>

    <section class="section section--profile p-0 mt-[-90px] bg-transparent">
        <div class="container mx-auto">
            <div class="flex items-center">
                <figure>
                    <img src="{{ asset('dieren/src/public/img/clinic.png')}}" alt="">
                </figure>
                <h3 class="title title--profile text-md font-bold ml-4 leading-tight md:leading-tight lg:leading-normal">
                    {{ $veterinarian->name }} |
                    {!! render_stars($veterinarian->rating) !!}
                    <span>{{ number_format($veterinarian->rating, 1) }} - ({{ $totalRatings }} {{ devTranslate('page.beoordelingen','beoordelingen') }})</span>
                </h3>
            </div>
        </div>
        <div class="container mx-auto mt-5">
            @include('parts.breadcrumb' , ['breadcrumbs' => $breadcrumbData ?? ''] )
        </div>
    </section>

    <section class="section section--profile-interior">
        <div class="container mx-auto relative">
           
            <div class="grid grid-cols-4 gap-4">
                <div class="lg:col-span-3 col-span-4">
                    <div class="pills border border-gray-300 shadow-lg mb-8">
                        <ul class="flex flex-col md:flex-row flex-wrap w-full py-3">
                        <li class="w-full md:w-auto px-1 xl:px-3 mb-1">
                            <button class="btn btn-primaryLight w-full md:w-auto">{{ devTranslate('page.Informatie','Informatie') }}</button>
                        </li>
                        <li class="w-full md:w-auto xl:px-3 md:border-l mb-1 md:border-l-gray-300">
                            <button 
                                onclick="document.getElementById('diensten').scrollIntoView({ behavior: 'smooth' });"
                                class="btn btn-primary bg-white w-full md:w-auto"
                            >{{ devTranslate('page.Diensten','Diensten') }}</button>
                        </li>
                        <li class="w-full md:w-auto xl:px-3 md:border-l mb-1 md:border-l-gray-300">
                            <button 
                                onclick="document.getElementById('galerij').scrollIntoView({ behavior: 'smooth' });"
                                class="btn btn-primary bg-white w-full md:w-auto"
                            >{{ devTranslate('page.Galerij','Galerij') }}</button>
                        </li>
                        <li class="w-full md:w-auto xl:px-3 md:border-l mb-1 md:border-l-gray-300">
                            <button 
                                onclick="document.getElementById('prijzen').scrollIntoView({ behavior: 'smooth' });"
                                class="btn btn-primary bg-white w-full md:w-auto"
                            >{{ devTranslate('page.Prijzen','Prijzen') }}</button>
                        </li>
                        <li class="w-full md:w-auto xl:px-3 md:border-l mb-1 md:border-l-gray-300">
                            <button 
                                onclick="document.getElementById('reviews').scrollIntoView({ behavior: 'smooth' });"
                                class="btn btn-primary bg-white w-full md:w-auto"
                            >{{ devTranslate('page.Beoordelingen','Beoordelingen') }}</button>
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

                        @if (!empty($veterinarian->openingstimes))
                            <h3 class="title title--section font-bold text-3xl mb-4 text-gray-800">
                                <span class="text-primary">{{__('Openingstijden')}}</span>
                            </h3>
                            <ul class="space-y-2">
                                @foreach($veterinarian->openingstimes as $times)
                                    <li class="grid grid-cols-3 gap-4">
                                        <span>{{$days[$times->day_of_week]}}</span>
                                        <span>{{$times->open_time}}</span>
                                        <span>{{$times->close_time}}</span>
                                    </li>     
                                @endforeach
                            </ul>
                        @endif


                        <img src="{{ asset('dieren/src/public/img/paw.png')}}" alt="" class="absolute top-[20px] right-[20px] z-[0]">
                    </div>
                    <div class="content border border-gray-300 shadow-lg px-[30px] py-[50px] mb-6 relative" id="diensten">
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                            {{ devTranslate('page.Diensten','Diensten') }}
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800 mb-6 leading-tight md:leading-tight lg:leading-normal">
                            <span class="text-primary">{{ devTranslate('page.Producten','Producten') }}</span> {{ devTranslate('page.En Diensten','En Diensten') }}
                        </h3>
                        <div class="services grid md:grid-cols-2 lg:grid-cols-4 gap-2">
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
                    <div class="gallery border border-gray-300 shadow-lg px-[30px] py-[50px] mb-6 relative" id="galerij">
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
                    <div class="prices border border-gray-300 shadow-lg px-[30px] py-[50px] mb-6 relative" id="prijzen">
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
                                    @if (!empty($groupOne))
                                        @foreach($groupOne as $item)

                                                @php 
                                                    $advicePrice = false;
                                                    
                                                    $price = App\Models\VeterinariansPricing::getPriceByVeterinarianAndName($item, $veterinarian->id);
                                                    if (empty($price)){
                                                        $advicePrice = true;
                                                        $price = App\Models\VeterinariansPricing::getMaxPrice($item);
                                                    }
                                                    else{
                                                        $price = $price -> consult_price;
                                                    }
                                                @endphp
                                                <li class="mb-3 flex">
                                                    <i class="fa-regular fa-circle-check text-primary mr-1"></i> {{$item}} <span class="price block ml-auto">€{{$price}}</span>
                                                </li>
                                        @endforeach
                                    @endif    
                                </ul>
                            </div>
                            <div class="lg:col-span-1 border-gray-300 shadow-lg px-[30px] py-[50px] mb-6">
                                <figure class="w-[77px] h-[77px] bg-primaryLight rounded-full flex justify-center items-center mt-[-60px] mb-2">
                                    <img src="{{ asset('dieren/src/public/img/icon2.png')}}" alt="">
                                </figure>
                                <h2 class="text-xl font-bold mb-4">{{__('Sterilisatie Tarieven per Dier')}}</h2>


                                


                                <h3 class="text-lg font-semibold mt-6 mb-2">🐶 {{__('Honden (Teefjes)')}}</h3>
                                <ul class="list-none">

                                    @if(!empty($honden))    
                                        @foreach($honden as $it)
                                        <li class="mb-3 flex items-center">
                                            <i class="fa-regular fa-circle-check text-primary mr-2"></i>
                                            <span>{{$it -> name}}</span>
                                            <span class="price block ml-auto">€{{$it -> consult_price}}</span>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>

                                <h3 class="text-lg font-semibold mt-6 mb-2">🐱 {{__('Katten (Poezen)')}}</h3>
                                <ul class="list-none">
                                    @if(!empty($katten))    
                                        @foreach($katten as $it)
                                        <li class="mb-3 flex items-center">
                                            <i class="fa-regular fa-circle-check text-primary mr-2"></i>
                                            <span>{{$it -> name}}</span>
                                            <span class="price block ml-auto">€{{$it -> consult_price}}</span>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>

                                <h3 class="text-lg font-semibold mt-6 mb-2">🐰 {{__('Konijnen (Voedsters)')}}</h3>
                                <ul class="list-none">
                                    @if(!empty($konijnen))    
                                        @foreach($konijnen as $it)
                                        <li class="mb-3 flex items-center">
                                            <i class="fa-regular fa-circle-check text-primary mr-2"></i>
                                            <span>{{$it -> name}}</span>
                                            <span class="price block ml-auto">€{{$it -> consult_price}}</span>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <img src="{{ asset('dieren/src/public/img/paw.png')}}" alt="" class="absolute top-[20px] right-[20px] z-[0]">
                    </div>
                    <div class="reviews border border-gray-300 shadow-lg px-[30px] py-[50px] mb-6 relative" id="reviews">
                        <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                            {{ devTranslate('page.Beoordelingen','Beoordelingen') }}
                        </h4>
                        <h3 class="title title--section font-bold text-3xl text-gray-800 mb-6 leading-tight md:leading-tight lg:leading-normal">
                            <span class="text-primary">{{ devTranslate('page.Wat andere mensen','Wat andere mensen') }}</span> {{ devTranslate('page.Vonden','Vonden') }}
                        </h3>


                        
                        <div class="rate grid lg:grid-cols-3 grid-cols-1 mb-4 pb-6 border-b border-b-gray-300">
                            <div class="lg:col-span-1 col-span-3">
                                <h4 class="qualify font-bold text-2xl">
                                    {{ number_format($rating, 1) }}
                                </h4>
                                <h4 class="starts text-yellow-500 text-lg">
                                    {!! render_stars($rating) !!}
                                </h4>
                                <p class="font-bold">
                                    {{ number_format($rating, 1) }} - ({{ $totalRatings }} {{ devTranslate('page.beoordelingen','beoordelingen') }})
                                </p>
                            </div>

                            <div class="col-span-3 lg:col-span-2">
                                @foreach([5, 4, 3, 2, 1] as $star)
                                    @php
                                        $count = $ratingCounts[$star] ?? 0;
                                        $percentage = $totalRatings > 0 ? ($count / $totalRatings) * 100 : 0;
                                    @endphp
                                    <div class="flex items-center gap-2 {{ $star !== 5 ? 'mt-2' : '' }}">
                                        <span class="text-gray-800 font-semibold w-[90px]">{{ $star }} {{ devTranslate('page.Stars','Sterren') }}</span>
                                        <div class="relative w-full h-6 bg-gray-200 rounded-lg overflow-hidden flex items-center">
                                            <div class="absolute left-0 top-0 h-full bg-yellow-500" style="width: {{ $percentage }}%"></div>
                                        </div>
                                        <span class="text-gray-800 font-semibold">{{ $count }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="reviews">
                            
                        @if (!empty($reviews[0]))
                            @foreach ($reviews as $review)
                                <div class="review pb-6 mb-4 border-b border-b-gray-300">
                                    <p class="text-gray-700 date">
                                        {{ \Carbon\Carbon::parse($review->created_at)->translatedFormat('F d, Y') }}
                                    </p>

                                    <h4 class="starts text-yellow-500 text-lg mb-2">
                                        {!! render_stars($review->rating) !!}
                                        <span class="text-black font-bold">{{ number_format($review->rating, 1) }}</span>
                                    </h4>

                                    <h3 class="name text-lg font-bold mb-2">
                                        {{ $review->name }}, {{ $review->city }}
                                    </h3>

                                    <p>{!! $review->description !!}</p>
                                    @if ($review->type == 'Google')
                                        <div class="mt-2 inline-flex items-center text-sm text-blue-600 bg-blue-100 px-2 py-1 rounded-full">
                                            <i class="fa-brands fa-google mr-1"></i> Google review
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-10 text-gray-500">
                                <p class="text-lg font-semibold">{{ devTranslate('page.No reviews found','Geen recencies gevonden.') }}</p>
                            </div>
                        @endif

                        @if (!empty($reviews[0]))
                            <div class="pagination flex justify-center gap-2">
                                {{ $reviews->appends(request()->query())->links('vendor.pagination.custom') }}
                            </div>
                        @endif
                        </div>
                        <img src="{{ asset('dieren/src/public/img/paw.png')}}" alt="" class="absolute top-[20px] right-[20px] z-[0]">
                    </div>
                </div>
                <div class="lg:col-span-1 col-span-4">
                    <div class="sidebar border border-gray-300 transition duration-300 ease-out shadow-lg">
                        <div class="map">
                            @if ($veterinarian->lat && $veterinarian->lon)
                                <div class="w-full h-[300px] rounded overflow-hidden shadow-lg">
                                    <iframe 
                                        width="100%" 
                                        height="100%" 
                                        frameborder="0" 
                                        style="border:0" 
                                        src="https://maps.google.com/maps?q={{ $veterinarian->lat }},{{ $veterinarian->lon }}&hl=nl&z=15&output=embed" 
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            @else
                                <p class="text-sm text-gray-500">Locatie niet beschikbaar</p>
                            @endif
                        </div>
                        <div class="content py-3 px-2">
                            <h3 class="title title--block font-bold text-sm mb-3">
                                {{$veterinarian->name}}
                            </h3>
                            <p class="location text-sm mb-0">
                                <i class="fa-solid fa-location-dot text-primary"></i>         {{ $veterinarian->zipcode }} {{ $veterinarian->street }} {{ $veterinarian->street_nr }} <br/> {{ $veterinarian->city->name }}, Nederland
                            </p>
                            <a class="text-xs" href="#">
                                <i class="fa-solid fa-phone text-primary"></i> {{$veterinarian->phone}}
                            </a>
                            <p>
                                @if ($veterinarian->user_id == 1)
                                    <a href="{{route('register')}}" class="text-primary underline mt-4">{{__('Account claimen')}}</a>
                                @else

                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('dieren/src/public/img/bg-blocks.png')}}" alt="" class="absolute top-0 bottom-0 right-0 z-[-1] m-auto">
</div>
</section>

@endsection