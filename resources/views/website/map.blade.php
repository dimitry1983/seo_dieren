@extends('layouts.site')

@section('content')
<div class="main-container relative w-full overflow-hidden">

    <section class="section section--map py-0">
        <div class="grid md:grid-cols-4">
            <div class="search-form lg:col-span-1 col-span-2 bg-[#F3F6F9]">
                <form action="{{route('results')}}" id="searchform" method="get" class="py-[50px] px-[30px]">
                    <p class="mb-[10px]"><strong>{{ devTranslate('page.What Are You Looking For?','Waar ben je naar opzoek?') }}</strong></p>
                    <input type="text" name="zoeken" placeholder="{{ devTranslate('page.Search For','Zoek naar') }}" class="form-control mb-4 p-3 rounded-full border border-gray-300 outline-none hover:border-gray-400 focus:ring-2 focus:ring-primary transition duration-300 ease-out w-full">

                    <p class="mb-[10px]"><strong>{{ devTranslate('page.Category','Categorie') }}</strong></p>
                    <div class="relative mb-4">
                        <select name="categorie" class="appearance-none p-3 rounded-full border border-gray-300 outline-none hover:border-gray-400 focus:ring-2 focus:ring-primary transition duration-300 ease-out w-full pr-10">
                            <option value="">{{__('Maak een keuze')}}</option>
                            @if (!empty($categories))
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                    </div>

                    <p class="mb-[10px]"><strong>{{ devTranslate('page.Location','Lokatie') }}</strong></p>
                    <div class="relative mb-4">
                        <select name="stad" id="city-select" class="appearance-none p-3 rounded-full border border-gray-300 outline-none hover:border-gray-400 focus:ring-2 focus:ring-primary transition duration-300 ease-out w-full pr-10">
                    
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                    </div>

                    <p class="mb-0"><strong>{{ devTranslate('page.Search','Zoeken') }}</strong></p>
                    <button class="btn btn-primaryLight w-full mt-3 flex items-center justify-center gap-2 px-3 py-5 rounded-full relative">
                        {{ devTranslate('page.Search Now','Zoek nu') }} <i class="fa-solid fa-magnifying-glass text-primaryLight w-[50px] h-[50px] rounded-full flex justify-center items-center bg-black absolute right-4 top-2"></i>
                    </button>

                    <a class="underline text-center block mt-4 text-gray-800 font-bold hover:text-primary transition" id="resetfilters" href="#">{{ devTranslate('page.Clear All Filters','Reset Filters') }}</a>
                </form>
            </div>
            <div class="map lg:col-span-3 col-span-2">
                <img src="{{ asset('dieren/src/public/img/map.jpg')}}" alt="Map Image" class="w-full h-[500px] object-cover">
            </div>
        </div>
    </section>

    <section class="section section--categories bg-[url('{{ asset('dieren/src/public/img/categories.jpg') }}')] bg-cover bg-center pt-[40px] pb-[50px] lg:pt-[80px] lg:pb-[100px]">
       
        <div class="container mx-auto">
            @include('parts.breadcrumb' , ['breadcrumbs' => $breadcrumbData ?? ''] )
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

    <section class="section section--clinics py-[40px]">
        <div class="container mx-auto relative">
            <div class="section__header flex items-center justify-between mb-8">
                <div>
                    <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                        {{ devTranslate('page.Clinics','Klinieken') }}
                    </h4>
                    <h3 class="title title--section font-bold text-3xl text-gray-800 leading-tight md:leading-tight lg:leading-normal">
                        <span class="text-primary">{{devTranslate('page.Top Clinics', 'Top klinieken')}}</span> {{devTranslate('page.Of The Month', 'van de Maand')}}
                    </h3>
                </div>
                <a href="{{route('results')}}" class="btn btn-outline-black border border-gray-800 py-2 px-4 rounded-full font-bold whitespace-nowrap mt-4 lg:mt-0 transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Explore All', 'Bekijk alles')}}</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                @if (!empty($bestVets))
                    <?php $teller = 1; ?>
                    @foreach($bestVets as $vet)
                        <div class="col-span-4 sm:col-span-2 md:col-span-1 border bg-white border-gray-300 transition duration-300 ease-out hover:shadow-lg category-best-rated">
                            <figure class="m-0 overflow-hidden">
                                <a href="{{ route('profile', ['slug' => slugify($vet->name), 'id' => $vet->id]) }}">
                                    @if (!empty($vet->featuredImage->name))
                                        <img class="w-full transition-transform duration-300 ease-out hover:scale-105"
                                            src="{{ asset('storage/uploads/' . $vet->featuredImage->name) }}"
                                            alt="{{ $vet->name }}">
                                    @else
                                        <img class="w-full transition-transform duration-300 ease-out hover:scale-105"
                                            src="{{ asset('dieren/src/public/img/post-' . $teller . '.png') }}"
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
                                <h4 class="subtitle text-sm text-gray-800 mb-2">
                                    {{ \Illuminate\Support\Str::limit($vet->excerpt, 80) }}
                                </h4>
                                <p class="location text-xs mb-0 font-semibold">
                                    <i class="fa-solid fa-location-dot text-primary"></i>
                                    {{ $vet->zipcode }} {{ $vet->street }} {{ $vet->street_nr }} <br/> {{ $vet->city->name }}, Nederland
                                </p>
                                <a class="text-xs font-semibold" href="tel:{{ $vet->phone }}">
                                    <i class="fa-solid fa-phone text-primary"></i> {{ $vet->phone }}
                                </a>
                                <h4 class="price font-bold text-lg mt-2">
                                    @if (!empty($vet->price))
                                        From €{{ number_format($vet->price, 2) }}
                                    @endif
                                    <a class="float-right text-sm font-normal underline hover:text-primary"
                                    href="{{ route('profile', ['slug' => slugify($vet->name), 'id' => $vet->id]) }}">
                                        {{ devTranslate('page.View More', 'Bekijk meer') }}
                                    </a>
                                </h4>
                                <br>
                            </div>
                        </div>
                        <?php $teller++; ?>
                    @endforeach
                @endif
            </div>
            <img src="public/img/bg-blocks.png" alt="" class="absolute bottom-[-80px] right-[-60px] z-[-1]">
        </div>
    </section>

    <section class="section section--testimonial pt-[40px] pb-[20px] lg:pt-[80px] lg:pb-[40px]">
        <div class="container px-2 mx-auto">
            <div class="section__header flex flex-col lg:flex-row items-center justify-between mb-6">
                <div class="text-center lg:text-left">
                    <h4 class="subtitle w-fit text-md font-semibold relative before:content-[''] before:w-[20px] before:h-[2px] before:bg-primary before:absolute before:right-[-30px] before:top-1/2 before:-translate-y-1/2">
                        {{ devTranslate('page.Review','Recencies') }}
                    </h4>
                    <h3 class="title title--section font-bold text-3xl text-gray-800 leading-tight md:leading-tight lg:leading-normal">
                      {{devTranslate('page.What Our Customers', 'Wat onze klanten')}} <span class="text-primary">{{devTranslate('page.Are Saying...', 'zeggen...')}}</span>
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

    <section class="section section--about-us bg-white lg:bg-contain lg:bg-right bg-no-repeat bg-center" style="background-image: url('{{ asset('dieren/src/public/img/about.png') }}');">
        <div class="container mx-auto">
            <div class="grid grid-cols-2 gap-6">
                <div class="lg:col-span-1 col-span-2">
                    <h3 class="adv title title--section text-4xl font-bold mb-4 pb-4 border-b border-b-gray-300 w-fit leading-tight md:leading-tight lg:leading-normal">
                        {!!$greenBanner['title']!!}
                    </h3>
                    <ul class="mb-[25px] lg:mb-[100px]">
                        @if (!empty($greenBanner['usp']))
                            @foreach($greenBanner['usp'] as $item)
                            <li class="font-semibold mb-3">
                                <i class="fa-regular fa-circle-check text-primary"></i> {{ $item['title'] }}
                            </li>
                            @endforeach
                        @endif
                    </ul>
                    <a href="{{$greenBanner['cta_url_btn1']}}" class="btn btn-primary min-w-[300px] md:min-w-[400px] py-5 bg-[#202428] text-center text-primaryLight block w-fit lg:mx-auto lg:mb-8 mb-4 relative">{{$greenBanner['cta_title_btn1']}} <i class="fa-solid fa-magnifying-glass float-right text-xl  text-[#202428] w-[50px] h-[50px] rounded-full flex justify-center items-center bg-primaryLight absolute right-2 top-2"></i></a>
                    <a href="{{$greenBanner['cta_url_btn2']}}" class="btn btn-primary min-w-[300px] md:min-w-[400px] py-5 bg-[#202428] text-center text-primaryLight block w-fit lg:mx-auto relative">{{$greenBanner['cta_title_btn2']}} <i class="fa-solid fa-plus float-right text-xl  text-[#202428] w-[50px] h-[50px] rounded-full flex justify-center items-center bg-primaryLight absolute right-2 top-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--stats bg-[#202428] pt-[45px] pb-[40px] lg:pt-[90px] lg:pb-[75px]">
        <div class="container px-2 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-6 items-center">
                <div class="col-span-1 lg:col-span-2 md:col-span-3 sm:col-span-3 text-center lg:text-left">
                    <h3 class="title title--section text-4xl text-white font-bold mb-2 leading-tight md:leading-tight lg:leading-normal adv">
                        {!!$darkBanner['title']!!}   
                    </h3>
                    <p class="paragraph text-white">
                        {!!$darkBanner['description']!!}   
                    </p>
                </div>
                @if (!empty($darkBanner['about']))
                    @foreach($darkBanner['about'] as $item)
                    <div class="text-center">
                        <p class="text-white">{{$item['title']}}</p>
                        <span class="text-primaryLight font-medium text-5xl md:text-6xl block">{{$item['number']}}</span>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="section section--blog py-[40px]">
        <div class="container px-2 mx-auto relative">
            <h3 class="title title--section text-center text-3xl text-gray-800 font-bold mb-8 leading-tight md:leading-tight lg:leading-normal">
            {{devTranslate('page.From', 'Het')}} <span class="text-primary">{{devTranslate('page.Our Blog', 'Laatste Nieuws')}}</span>
            </h3>
            <div class="posts grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @if (!empty($blogs))
                    @foreach($blogs as $blog)
                        <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg">
                            <figure class="m-0 overflow-hidden">
                                <a href="#">
                                    <img class="w-full transition-transform duration-300 ease-out hover:scale-105"
                                        src="{{ asset('storage/'.$blog->thumb ?? 'dieren/src/public/img/blog-2.png') }}"
                                        alt="{{ $blog->name }}">
                                </a>
                            </figure>
                            <div class="content p-[20px] pb-[30px]">
                                <p class="text-primary text-normal date">{{ strftime('%d %B %Y', strtotime($blog->created_at)) }}</p>
                                <h3 class="title font-bold text-lg">
                                    <a href="{{ route('blog.detail', [ 'slug' => slugify($blog->name) , 'id' => $blog->id ]) }}">{{ $blog->name }}</a>
                                </h3>
                                <p class="mb-5">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 120) }}
                                </p>
                                <a href="{{ route('blog.detail', [ 'slug' => slugify($blog->name) , 'id' => $blog->id ]) }}" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">
                                    {{ devTranslate('page.Read Article','Lees verder') }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <img src="{{ asset('dieren/src/public/img/bg-blocks.png')}}" alt="" class="absolute top-[-80px] right-[-60px] z-[-1]">
        </div>
    </section>

    <section class="section section--map pt-[40px] pb-0">
        <div class="container mx-auto">
            <h3 class="title title--section text-center text-4xl text-gray-800 font-bold mb-8 leading-tight md:leading-tight lg:leading-normal">
                {{devTranslate('page.Discover The Best', 'Ontdek de beste')}} <span class="text-primary">{{devTranslate('page.Veterinary Clinics', 'dierenklinieken')}}</span>
            </h3>
        </div>
        <div class="map w-full">
            <div class="w-full">
                <img src="{{ asset('dieren/src/public/img/map.jpg')}}" alt="Map Image" class="w-full object-cover">
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
  $(document).ready(function () {
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