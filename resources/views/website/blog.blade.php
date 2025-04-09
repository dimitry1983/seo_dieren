@extends('layouts.site')

@section('content')
<div class="main-container relative w-full overflow-hidden">

    <section class="section section--hero-interior bg-primaryLight relative py-[140px]">
        <div class="container mx-auto relative z-10">
            <h1 class="text-6xl text-center font-regular text-gray-800 relative z-1 leading-tight md:leading-tight lg:leading-normal">
                {{devTranslate('page.Blog', 'Blog')}} & <strong>{{devTranslate('page.News', 'Nieuws')}}</strong>
            </h1>
        </div>
        <img class="absolute bottom-0 right-0 z-0" src="{{ asset('dieren/src/public/img/blog.png')}}" alt="">
    </section>

    <section class="section section--blog py-[40px]">
        <div class="container mx-auto relative">
            @include('parts.breadcrumb' , ['breadcrumbs' => $breadcrumbData ?? ''] )
            <h3 class="title title--section text-center text-3xl text-gray-800 font-bold mb-8 leading-tight md:leading-tight lg:leading-normal">
                {{devTranslate('page.From', 'Van')}} <span class="text-primary">{{devTranslate('page.Our Blog', 'Ons Blog')}}</span>
            </h3>
            <div class="posts grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                
                @if (!empty($blogs[0]))
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
                @else
                    <div class="text-center py-10 text-gray-500">
                        <p class="text-lg font-semibold">{{ devTranslate('page.No veterinarians found','Geen dierenartsen gevonden.') }}</p>
                    </div>
                @endif

                @if (!empty($blogs[0]))
                <br/>
                <div class="pagination flex justify-center gap-2">
                    {{ $blogs->appends(request()->query())->links('vendor.pagination.custom') }}
                </div>
                @endif

            </div>
            <img src="public/img/bg-blocks.png" alt="" class="absolute top-[-80px] left-[150px] z-[-1]">
        </div>
    </section>

    @if (!empty($insurances))
    <section class="section section--intro py-[80px]">
        <div class="container px-2 mx-auto relative">
            <div class="flex flex-col lg:flex-row gap-y-4 lg:gap-x-6">
               
            
                <div class="w-full lg:w-1/2">
                    <div class="block relative before:content-[''] before:w-full before:h-full before:absolute before:top-0 before:left-0 before:bg-gradient-to-t before:from-black/100 before:via-black/25 before:to-transparent bg-[url('{{ asset('storage/' . $insurances['insurance'][0]['image']) }}')] bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $insurances['insurance'][0]['image']) }}');">   
                        <div class="block__content pt-[250px] pb-[30px] px-[30px] relative z-1">
                            <h4 class="subtitle text-lg text-white">{{$insurances['insurance'][0]['title']}}</h4>
                            <h3 class="title title--block text-white text-2xl mb-2"><strong>{{$insurances['insurance'][0]['discount']}}</strong></h3>
                            <a href="{{$insurances['insurance'][0]['cta_url']}}" class="btn btn-primary mb-2">{{$insurances['insurance'][0]['cta_title']}}</a>
                            <p class="paragraph paragraph--small text-sm text-white">
                                {{$insurances['insurance'][0]['small_text_under_button']}}
                            </p>
                        </div>

                    </div>
                </div>

                <div class="w-full lg:w-1/2">
                    
                <div class="block relative block before:content-[''] before:w-full before:h-full before:absolute before:top-0 before:left-0 before:bg-gradient-to-t before:from-black/100 before:via-black/25 before:to-transparent bg-cover bg-center sm:mb-[40px] mb-[15px]" style="background-image: url('{{ asset('storage/' . $insurances['insurance'][1]['image']) }}');">
                        <div class="block__content px-[30px] py-[20px] relative z-1">
                            <h4 class="subtitle text-lg text-white">{{$insurances['insurance'][1]['title']}}</h4>
                            <h3 class="title title--block text-white text-2xl mb-2"><strong>{{$insurances['insurance'][1]['discount']}}</strong></h3>
                            <a href="{{$insurances['insurance'][1]['cta_url']}}" class="btn btn-primary mb-2">{{$insurances['insurance'][1]['cta_title']}}</a>
                            <p class="paragraph paragraph--small text-sm text-white">
                                {{$insurances['insurance'][1]['small_text_under_button']}}
                            </p>
                        </div>
                    </div>
                    
                    <div class="block relative block before:content-[''] before:w-full before:h-full before:absolute before:top-0 before:left-0 before:bg-gradient-to-t before:from-black/100 before:via-black/25 before:to-transparent  bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $insurances['insurance'][2]['image']) }}');">
                        <div class="block__content px-[30px] py-[20px] relative z-1">
                            <h4 class="subtitle text-lg text-white">{{$insurances['insurance'][2]['title']}}</h4>
                            <h3 class="title title--block text-white text-2xl mb-2"><strong>{{$insurances['insurance'][2]['discount']}}</strong></h3>
                            <a href="{{$insurances['insurance'][2]['cta_url']}}" class="btn btn-primary mb-2">{{$insurances['insurance'][2]['cta_title']}}</a>
                            <p class="paragraph paragraph--small text-sm text-white">
                                {{$insurances['insurance'][2]['small_text_under_button']}}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <img src="{{ asset('dieren/src/public/img/bg-blocks.png')}}" alt="" class="absolute top-[-80px] left-[-60px] z-[-1]">
        </div>
    </section>
    @endif    
</div>
@endsection