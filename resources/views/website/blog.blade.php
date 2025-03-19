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
            <h3 class="title title--section text-center text-3xl text-gray-800 font-bold mb-8 leading-tight md:leading-tight lg:leading-normal">
                {{devTranslate('page.From', 'Van')}} <span class="text-primary">{{devTranslate('page.Our Blog', 'Ons Blog')}}</span>
            </h3>
            <div class="posts grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-1.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-2.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-3.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-1.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-2.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-3.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-1.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-2.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-3.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-1.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-2.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
                <div class="block-blog border border-gray-300 transition duration-300 ease-out hover:shadow-lg mb-2">
                    <figure class="m-0 overflow-hidden">
                        <a href="#"><img class="w-full transition-transform duration-300 ease-out hover:scale-105" src="{{ asset('dieren/src/public/img/blog-3.png')}}" alt=""></a>
                    </figure>
                    <div class="content p-[20px] pb-[30px]">
                        <p class="text-primary text-normal date">20 February, 2025</p>
                        <h3 class="title font-bold text-lg">
                            <a href="#">Lorem Ipsum Dolor</a>
                        </h3>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec varius.
                        </p>
                        <a href="#" class="btn btn-outline-black text-normal font-bold block w-fit mx-auto border border-gray-800 py-2 px-4 rounded-full transition duration-300 ease-out hover:bg-black hover:text-white">{{devTranslate('page.Read Article', 'Lees artikel')}}</a>
                    </div>
                </div>
            </div>
            <img src="public/img/bg-blocks.png" alt="" class="absolute top-[-80px] left-[150px] z-[-1]">
        </div>
    </section>

    <section class="section section--intro py-[80px]">
        <div class="container mx-auto relative">
            <h1 class="text-4xl text-center font-bold text-gray-800 relative z-1 mb-8 leading-tight md:leading-tight lg:leading-normal">
                {{devTranslate('page.Offers', 'Aanbiedingen')}}
            </h1>
            <div class="flex flex-col lg:flex-row gap-y-4 lg:gap-x-6">
                <div class="w-full lg:w-1/2">
                    <div class="block relative before:content-[''] before:w-full before:h-full before:absolute before:top-0 before:left-0 before:bg-gradient-to-t before:from-black/100 before:via-black/25 before:to-transparent bg-[url('../../../src/public/img/block-1.jpg')] bg-cover bg-center">
                        <div class="block__content pt-[250px] pb-[30px] px-[30px] relative z-1">
                            <h4 class="subtitle text-lg text-white">Lorem ipsum dolor</h4>
                            <h3 class="title title--block text-white text-2xl mb-2"><strong>+30% Off</strong></h3>
                            <a href="#" class="btn btn-primary mb-2">{{devTranslate('page.View More', 'Bekijk meer')}}</a>
                            <p class="paragraph paragraph--small text-sm text-white">
                                *Lorem ipsum dolor sit amet
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="relative block before:absolute before:inset-0 before:bg-gradient-to-t before:from-black before:via-black/25 before:to-transparent bg-cover bg-center mb-[40px]" style="background-image: url('{{ asset('dieren/src/public/img/block-2.jpg') }}');">
                        <div class="block__content px-[30px] py-[20px] relative z-1">
                            <h4 class="subtitle text-lg text-white">Lorem ipsum dolor</h4>
                            <h3 class="title title--block text-white text-2xl mb-2"><strong>+25% Off</strong></h3>
                            <a href="#" class="btn btn-primary mb-2">{{devTranslate('page.View More', 'Bekijk meer')}}</a>
                            <p class="paragraph paragraph--small text-sm text-white">
                                *Lorem ipsum dolor sit amet
                            </p>
                        </div>
                    </div>
                    <div class="relative block before:absolute before:inset-0 before:bg-gradient-to-t before:from-black before:via-black/25 before:to-transparent bg-cover bg-center" style="background-image: url('{{ asset('dieren/src/public/img/block-3.jpg') }}');">
                        <div class="block__content px-[30px] py-[20px] relative z-1">
                            <h4 class="subtitle text-lg text-white">Lorem ipsum dolor</h4>
                            <h3 class="title title--block text-white text-2xl mb-2"><strong>+20% Off</strong></h3>
                            <a href="#" class="btn btn-primary mb-2">{{devTranslate('page.View More', 'Bekijk meer')}}</a>
                            <p class="paragraph paragraph--small text-sm text-white">
                                *Lorem ipsum dolor sit amet
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection