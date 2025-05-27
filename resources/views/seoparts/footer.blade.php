
    <footer class="footer footer--main bg-primary text-white">
    <div class="footer__widget-area pt-[127px] pb-[60px]">
        <div class="container px-4 mx-auto lg:grid lg:grid-cols-12 lg:gap-10">
            <div class="col-span-5">
                <h3 class="text-2xl font-semibold mb-8">hondverzekeren.com</h3>
               @if (!empty($navigations['footer1']))
                    <p class="text-white text-sm sm:text-base">
                        @foreach($navigations['footer1']['content'] as $item)
                            {{$item['title']}}
                        @endforeach
                    </p>
                @endif
            </div>
            <div class="col-span-7 lg:grid lg:grid-cols-3 lg:gap-10">
                <div class="col-span-1">
                    <h4 class="text-xl font-semibold mb-8">Verzekering voor</h4>
                    <ul class="flex flex-col gap-2">
                        @if (!empty($navigations['footer2']))
                            @foreach ($navigations['footer2']['content'] as $item)
                                <li><a  href="{{$item['link']}}">{{$item['title']}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="col-span-1">
                    <h4 class="text-xl font-semibold mb-8">Over ons</h4>
                    <ul class="flex flex-col gap-2">
                         @if (!empty($navigations['footer3']))
                            @foreach ($navigations['footer3']['content'] as $item)
                                <li ><a href="{{$item['link']}}">{{$item['title']}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="col-span-1">
                    <h4 class="text-xl font-semibold mb-8">Contact</h4>
                    <ul class="flex flex-col gap-2">
                        @if (!empty($navigations['footer4']))
                            @foreach ($navigations['footer4']['content'] as $item)
                                <li ><a href="{{$item['link']}}">{!!$item['title']!!}</a>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copy text-white border-t border-[#696969] text-base py-4">
        <div class="container px-4 mx-auto">
            Copyright © 2025 hondverzekeren.com
        </div>
    </div>
</footer>

