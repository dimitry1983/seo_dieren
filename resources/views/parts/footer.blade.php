<footer class="footer footer--main bg-[#202428] text-white">
    <div class="footer--content py-[60px]">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 lg:gap-8 w-full lg:w-12/12 mx-auto">
                <div class="col-span-1 lg:col-span-4 text-center lg:text-left">
                    <figure class="mb-4">
                        <a href="{{route('home')}}">
                            <img src="{{ asset('dieren/src/public/img/footer.png')}}" class="mx-auto lg:mx-0">
                        </a>
                    </figure>
                    @if (!empty($navigations['footer1']))
                    <p class="text-white text-sm sm:text-base">
                        @foreach($navigations['footer1']['content'] as $item)
                            {{$item['title']}}
                        @endforeach
                    </p>
                    @endif
                </div>
                <div class="widget col-span-1 lg:col-span-3">
                    <h4 class="title title--widget text-secondary font-bold text-lg mb-[20px]">Home</h4>
                    <ul>
                        @if (!empty($navigations['footer2']))
                            @foreach ($navigations['footer2']['content'] as $item)
                                <li class="mb-[15px]"><a class="text-white text-normal hover:font-bold transition" href="{{$item['link']}}">{{$item['title']}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="widget col-span-1 lg:col-span-2">
                    <h4 class="title title--widget text-secondary font-bold text-lg mb-[20px]">Links</h4>
                    <ul>
                        @if (!empty($navigations['footer3']))
                            @foreach ($navigations['footer3']['content'] as $item)
                                <li class="mb-[15px]"><a class="text-white text-normal hover:font-bold transition" href="{{$item['link']}}">{{$item['title']}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="widget col-span-1 lg:col-span-3 text-left">
                    <h4 class="title title--widget text-secondary font-bold text-lg mb-[20px]">Volg ons</h4>
                    <div class="flex justify-start  gap-3 mb-3">
                        @if (!empty($navigations['footer4']))
                            @foreach ($navigations['footer4']['content'] as $item)
                            <a class="text-white text-xl hover:text-primary transition" href="{{$item['link']}}">{!!$item['title']!!}</a>
                            @endforeach
                        @endif
                    </div>
                    <a href="#" class="text-white text-normal block mb-6"><i class="fa-solid fa-envelope"></i> info[@]vergelijkdierenarts.nl</a>
                    <a href="#" class="btn btn-primaryLight text-left w-fit mx-auto sm:mx-0 flex justify-start items-center py-2 px-5">Kliniek toevoegen <i class="fa-solid fa-circle-plus text-4xl ml-3"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copy bg-[#101214] text-center text-white border-opacity-5 text-sm py-4">
        <div class="container mx-auto">
            <span>© 2025. All rights reserved.</span>
        </div>
    </div>
</footer>
