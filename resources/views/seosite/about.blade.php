 @extends('layouts.seosite')

@section('content')
       <?php
            use Illuminate\Support\Facades\Storage;
            $image =  Storage::url($headerBlock['background_image']) ?? asset('hondverzekeren/src/public/img/hero-bg.jpg');
        ?>

        <section class="section section--primary section--hero section--page-header bg-cover bg-center bg-no-repeat text-white relative overflow-hidden" style="background-image: url('{{ $image }}');">
            <div class="container text-center">
                <h1 class="section-title--lg lg:text-[60px] mb-2 font-medium">Over ons</h1>
            </div>
        </section>
        <!-- /hero -->

 
       <?php
            $image =  Storage::url($intro['image_left']) ?? asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png');
        ?>
        <section class="section section--white  w-full bg-white">
             <div class="container">
               @include('parts.breadcrumb' , ['breadcrumbs' => $breadcrumbData ?? ''] )
            </div>   
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

        <?php
            $image =  Storage::url($intro2['image_left']) ?? asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png');
        ?>

        <section class="section section--gray  w-full bg-[#F6F6F6]">
            <div class="container flex-col lg:grid lg:grid-cols-12 gap-12 justify-center items-center mx-auto my-0">
                <div class="shrink-0 col-span-5 lg:order-2">
                    <img src="{{ $image }}" alt="Woman hugging a husky dog" class="object-cover rounded-3xl size-full">
                </div>

                <article class="flex flex-col shrink-0 justify-start items-start  max-md:pt-10 col-span-7 lg:order-1">
                    <h1 class="mt-5 mb-10 text-5xl maison tracking-normal leading-none text-indigo-900 font-[bold] max-md:mb-10 max-md:text-4xl max-md:text-center max-sm:mb-8 max-sm:text-3xl">
                        {!!$intro2['title'] ?? "Huisdierenverzekering"!!}
                    </h1>

                    <p class="mb-5 max-w-full text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                         {!! $intro2['description'] ?? "Huisdierenverzekering"!!}
                    </p>


                    <ul class="flex flex-col gap-3 mb-16 max-md:gap-2">
                        @if (!empty($intro2['insurance']))
                            @foreach($intro2['insurance'] as $item)
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
@endsection