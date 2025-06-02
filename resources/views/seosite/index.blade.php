@extends('layouts.seosite')

@section('content')
    <div class="main-container">
        <!-- hero -->
        <?php
            use Illuminate\Support\Facades\Storage;
            $image =  Storage::url($headerBlock['background_image']) ?? asset('hondverzekeren/src/public/img/hero-bg.jpg');
            $title = $headerBlock['title'] ?? 'Bescherm degenen die <strong class="block">altijd aan je zijde staan</strong>';
            $description = $headerBlock['description'] ?? 'Bescherm degenen die <strong class="block">altijd aan je zijde staan</strong>';
        ?>


        <section class="section--hero py-12 lg:py-[180px] bg-[url('{{$image}}')] bg-cover bg-center bg-no-repeat" style="background-image: url('{{$image}}');">
            <div class="container">
                <h1 class="section-title--lg text-white text-center maison mb-6">{!!$title!!}
                </h1>
                <p class="text-white text-xl text-center">{!! $description !!}</p>
                <div class="bg-white mt-10 px-5 py-5 lg:px-[50px] lg:py-[50px] w-fit mx-auto rounded-[20px]">
                    <h3 class="text-center font-semibold text-primary maison text-2xl lg:text-3xl">{{ $headerBlock['cta_title'] ?? "" }}</h3>

                    <div class="flex flex-col items-center lg:flex-row gap-3 lg:gap-6 mt-4 lg:mt-8">
                        <div class="flex gap-3 items-center">
                        @if (!empty($headerBlock['cta_title1']))
                            <a href="{{$headerBlock['cta_url1']}}" class="btn btn-secondary-light lg:text-2xl"><i class="fa-light fa-dog me-2 text-3xl"></i>{{$headerBlock['cta_title1']}}</a>
                        @endif   
                        @if (!empty($headerBlock['cta_title2'])) 
                            <a href="{{$headerBlock['cta_url2']}}" class="btn btn-white-secondary lg:text-2xl"><i class="fa-light fa-cat me-2 text-3xl"></i> {{$headerBlock['cta_title2']}}</a>
                         @endif 
                        </div>
                        @if (!empty($headerBlock['cta_title3'])) 
                            <a href="{{$headerBlock['cta_url3']}}" class="btn w-full lg:w-fit text-center btn-secondary">{{$headerBlock['cta_title3']}}
                            </a>
                        @endif     
                    </div>

                </div>
            </div>
        </section>
        <!-- /hero -->

        <?php
            $image =  Storage::url($intro['image_left']) ?? asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png');
        ?>


        <!-- content-image -->
        <section class="section section--white  w-full bg-white">
            <div class="container flex-col lg:grid lg:grid-cols-12 gap-12 justify-center items-center mx-auto my-0">
                <div class="shrink-0 col-span-5">
                    <img src="{{$image}}" alt="Woman hugging a husky dog" class="object-cover rounded-3xl size-full">
                </div>

                <article class="flex flex-col shrink-0 justify-start items-start  max-md:pt-10 col-span-7">
                    <h1 class="mt-5 mb-10 text-5xl maison tracking-normal leading-none text-indigo-900 font-[bold] max-md:mb-10 max-md:text-4xl max-md:text-center max-sm:mb-8 max-sm:text-3xl">
                      {!!$intro['title'] ?? "Huisdierenverzekering"!!}
                    </h1>

                    <p class="mb-5 max-w-full text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                        {!! $intro['description'] ?? "Huisdierenverzekering"!!}
                    </p>

                    <ul class="flex flex-col gap-3 mb-16 max-md:gap-2">

                        @if (!empty($intro['insurance']))
                            @foreach($intro['insurance'] as $item)
                            <li class="flex gap-4 items-center max-sm:gap-4">
                                <i class="fa-solid fa-circle-check text-secondary me-1 text-2xl"></i>
                                <span class="text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                                    {{$item['advantages'] ?? ''}}
                                </span>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                    @if (!empty($intro['cta_title']))
                        <a href="{{$intro['cta_url']}}" class="btn btn-primary">
                            {{$intro['cta_title']}}
                        </a>
                    @endif
                </article>
            </div>
        </section>

        <!-- /content-image -->

        <section class="section section-gray bg-[#F6F6F6]">
            <div class="container">
                <h2 class="section-title text-center text-primary mb-6 "><strong>{{$insurances['title']}}</strong></h2>
                <h3 class="maison text-3xl mb-24 text-primary text-center">{!!strip_tags($insurances['description'])!!}</h3>
                <div class="flex-col lg:grid lg:grid-cols-4 gap-6">
                     @if (!empty($insurances['insurance']))
                            @foreach($insurances['insurance'] as $item)
                                <article class="pt-2.5 mx-auto w-full rounded-none max-w-[480px]">
                                    <div class="flex flex-col items-center w-full bg-white rounded-3xl">
                                        @php 
                                        $image =  Storage::url($item['image']) ?? asset('hondverzekeren/src/public/img/97c58a1e2366234efb4b33e568e67c0e2cdaa1f7.png');
                                        @endphp

                                        <header class="flex relative flex-col items-start self-stretch px-6 pb-56 w-full rounded-3xl aspect-[1.353]">
                                            <img
                                                src="{{$image}}"
                                                alt="{{$item['title']}}"
                                                class="object-cover absolute inset-0 size-full rounded-tl-[20px] rounded-tr-[20px]" />
                                        </header>

                                        <h1 class="mt-6 text-xl px-5 maison font-bold text-center text-indigo-900">
                                            {{$item['title']}}
                                        </h1>

                                        <div class="d-flex gap-1 mt-5 text-[#FCBE48]">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>

                                        <p class="mt-5 text-base font-medium px-5 text-center text-zinc-800">
                                           {!! strip_tags($item['description']) !!}
                                        </p>

                                        <section class="flex gap-5 mt-4 w-full px-5 font-bold text-center max-w-[276px]">
                                           @if ($item['insurance'])
                                                @foreach($item['insurance'] as $items2)
                                                    <div class="flex flex-col flex-1">
                                                        <h2 class="self-center maison text-2xl leading-none text-indigo-900">
                                                           {{$items2['title']}}
                                                        </h2>
                                                        <p class="mt-3 text-base leading-8 text-zinc-800">
                                                            <span class="font-medium text-[#323232]">
                                                               {{$items2['text']}}
                                                            </span>
                                                            <br />
                                                            <span class="font-semibold text-[#323232]">
                                                                {{$items2['price']}}
                                                            </span>
                                                        </p>                                                           
                                                    </div>
                                                @endforeach   
                                            @endif
                                        </section>

                                        <footer class="flex flex-col items-center w-full mt-6 px-5 pb-7 gap-3">
                                        @if (!empty( $item['cta_url1']))
                                            <a href="{{$item['cta_url1']}}" class="btn btn-primary w-full justify-center text-center">{{$item['cta_title1']}}</a>
                                        @endif   
                                        @if (!empty( $item['cta_url2']))
                                            <a href="{{$item['cta_url2']}}" class="btn btn-secondary w-full justify-center text-center">{{$item['cta_title2']}}</a>
                                        @endif
                                        </footer>
                                    </div>
                                </article>
                            @endforeach
                        @endif    
                </div>
            </div>
        </section>

        <section class="section section--white section--steps">
            <div class="container">
                <h2 class="section-title leading-[1.3] text-center text-[#2E256F] mb-14 lg:mb-24">{!!$information_steps['title'] ?? "" !!}</h2>
                <div class="flex flex-col lg:grid lg:grid-cols-3 gap-10 lg:gap-14 relative">
                        @if (!empty($information_steps['info_steps']))
                            @php $teller = 1; @endphp
                            @foreach($information_steps['info_steps'] as $step)
                            <div class="relative border border-solid rounded-[20px] px-6 pb-8 pt-[60px] lg:pt-[100px] border-[#B4B4B4] z-10 bg-white">

                                <span class="absolute top-0 -translate-y-[50%] left-0 right-0 mx-auto w-[60px] h-[60px] lg:w-[100px] lg:h-[100px] text-3xl lg:text-5xl font-semibold text-center text-white bg-[#9990DA] rounded-full flex items-center justify-center" role="text" aria-label="Step 1">
                                    {{$teller}}</span>

                                <h2 class="maison text-2xl font-bold leading-10 text-center text-indigo-900 max-md:text-2xl max-md:leading-9 max-sm:text-xl max-sm:leading-8">
                                    {!! strip_tags($step['title']) ?? "" !!}
                                </h2>

                                <p class="text-lg leading-8 text-center text-zinc-800 max-md:text-base max-md:leading-7 max-sm:text-sm max-sm:leading-6">
                                    {!! $step['description']  ?? "" !!} 
                                </p>
                            </div>
                            @php $teller++; @endphp
                            @endforeach
                        @endif
                        
                    <svg class="left-deco top-0 bottom-0 h-fit my-auto absolute left-0 w-fit right-0 mx-auto -translate-x-[100%] hidden lg:block" width="200" height="108" viewBox="0 0 200 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.868164 4.35924C71.7864 -2.74003 60.3633 97.6617 198.868 104" stroke="#675BC8" stroke-width="7" stroke-dasharray="10 5"/>
                    </svg>
                    <svg class="right-deco top-0 bottom-0 h-fit my-auto absolute left-0 w-fit right-0 mx-auto translate-x-[100%] hidden lg:block" width="201" height="108" viewBox="0 0 201 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M199.868 4.35924C128.592 -2.74003 140.073 97.6617 0.868166 104" stroke="#675BC8" stroke-width="7" stroke-dasharray="10 5"/>
                    </svg>

                </div>
            </div>
        </section>

        <section class="section section--gray bg-[#F6F6F6]">
            <div class="container">
                <h2 class="section-title text-center text-[#2E256F] mb-24">{!! $partners['title'] !!}</h2>
                
                <div class="splide" data-splide='{"type":"loop","perPage":1,"perMove":1,"pagination":true,"arrows":false,"gap":"24px","breakpoints":{"991":{"perPage":1},"767":{"perPage":1},"575":{"perPage":1}}}' >
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="flex flex-col lg:grid lg:grid-cols-3 gap-6">
                                    @if (!empty($partners['info_steps']))        
                                        @foreach($partners['info_steps'] as $partner)
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <a href="{{$partner['url'] ?? '#'}}">
                                                    <img src="{{ Storage::url($partner['image']) ?? asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png') }}"
                                                        alt="logo partner"
                                                        class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                                </a>     
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


    <section class="section section--white  w-full bg-white">
            <div class="container flex-col gap-12 justify-center items-center mx-auto my-0">
 

                <article class="flex flex-col shrink-0 justify-start items-start  max-md:pt-10 col-span-12">
                    <h1 class="mt-5 mb-10 text-5xl maison tracking-normal leading-none text-indigo-900 font-[bold] max-md:mb-10 max-md:text-4xl max-md:text-center max-sm:mb-8 max-sm:text-3xl">
                      {!!$seoBlock['title'] ?? "Huisdierenverzekering"!!}
                    </h1>
                

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-16 max-md:gap-2">
                        @if (!empty($seoBlock['flex_pages']))
                            @foreach($seoBlock['flex_pages'] as $item)
                                <?php 
                                    $page = \App\Models\Page::where('id', $item)->first();
                                ?>
                                <li class="flex gap-4 items-center">
                                    <a href="{{ $page->slug }}" class="mt-6 text-xl px-5 maison font-bold text-indigo-900 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                        </svg>
                                        {{ $page->title }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </article>
            </div>
        </section>

    </div>



@push('scripts')    
<script>
    document.getElementById('toggleBtn').addEventListener('click', function () {
      document.getElementById('mainMenu').classList.toggle('hidden');
      document.getElementById('toggleBtn').classList.toggle('open');
    });

    (function(code){
	code(window.jQuery,window,document);
    }(function($,window,document){
        $('.splide').each(function(){
            new Splide(this).mount();
        });

        $(document).on('click', '.accordeon', function() {
            let parent = $(this).parent(); // Find the parent container
        
            if ($(this).hasClass('open')) {
                // If the clicked element is already open, remove 'open' class and hide content
                $(this).removeClass('open').find('div').slideUp();
            } else {
                // Close all other accordions within the same parent
                parent.find('.accordeon').removeClass('open').find('div').slideUp();
        
                // Open the clicked accordion
                $(this).addClass('open').find('div').slideDown();
            }
        });
    }));
</script>
@endpush

@endsection