@extends('layouts.site')

@section('content')
<div class="main-container relative w-full overflow-hidden">

      

        <section class="section section--breadcrumb p-0 ">
            <div class="container pt-5 mx-auto">
                @include('parts.breadcrumb' , ['breadcrumbs' => $breadcrumbData ?? ''] )
            </div>
        </section>

        <section class="section section--interior-blog pb-[10px] pt-[20px] mt-[0px]">
            <div class="container p-2 mx-auto">
                <div class="grid xl:grid-cols-4 lg:grid-cols-3 grid-cols-1 gap-6">
                    <div class="col-span-1 xl:col-span-3 lg:col-span-2">
                    <h3 class="title title--section text-3xl text-gray-800 font-bold">
                            {!! Str::headline($blog->name) !!}
                        </h3>
                        <span class="date text-primary block mb-4 font-semibold">
                            {{ $blog->created_at->translatedFormat('d F Y') }}
                        </span>

                        <figure class="mb-4">
                            <img class="w-full" src="{{ $blog->thumb ? Storage::url($blog->thumb) : asset('dieren/src/public/img/blog-interior.jpg') }}" alt="{{ $blog->name }}">
                        </figure>

                        <p>{!! $blog->description !!}</p>
                    </div>
                    <div class="col-span-1">
                        <div class="sidebar">
                            <h4 class="title title--sedebar text-xl text-gray-800 font-bold lg:mt-4 lg:mb-8 mb-6">
                                Gerelateerde Artikelen
                            </h4>
                            @if (!empty($blogs))
                            @foreach($blogs as $related)
                                <div class="article relative border border-gray-300 transition duration-300 ease-out shadow-lg mb-3">
                                    <div class="grid grid-cols-4 lg:grid-cols-3 gap-4">
                                        <figure class="col-span-1 lg:col-span-1 mb-0 h-full">
                                            <div class="w-full h-full bg-cover bg-center"
                                                style="background-image: url('{{ $related->thumb ? Storage::url($related->thumb) : asset('dieren/src/public/img/article1.jpg') }}');">
                                            </div>
                                        </figure>
                                        <div class="col-span-3 lg:col-span-2 pr-4 py-2 relative">
                                            <h3 class="title title--article text-normal font-bold">
                                                <a href="{{ route('blog.detail', ['slug' => Str::slug($related->name), 'id' => $related->id]) }}">
                                                    {{ Str::limit($related->name, 50) }}
                                                </a>
                                            </h3>
                                            <p class="text-sm mb-0">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($related->description), 60) }}
                                            </p>
                                            <a href="{{ route('blog.detail', ['slug' => Str::slug($related->name), 'id' => $related->id]) }}"
                                            class="text-primary absolute lg:right-[8px] right-[15px] lg:bottom-[5px] bottom-[15px] text-lg">
                                                <i class="fa-sharp fa-solid fa-circle-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
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
                <img src="{{ asset('dieren/src/public/img/map.jpg')}}" alt="Map Image" class="w-full h-[500px] object-cover">
            </div>
        </div>
    </section>

    </div>
@endsection