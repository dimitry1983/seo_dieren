   
    @php 
        use App\Models\Page;
        $insurances = Page::getBlockByType($page, "insurances_flex");
    @endphp   
    
 
 
    <!-- content -->
    <section class="section section--white section--content">

            <div class="container">
                <h2 class="section-title leading-[1.3] text-center text-primary mb-20"><strong class="font-bold">{{ $insurances['title'] }}</strong></h2>
                <div class="mb-20 block text-center">{!! $insurances['description'] !!}</div>
                    @if (!empty($insurances['insurance']))
                        @foreach($insurances['insurance'] as $item)
                            <div class="flex flex-col gap-[54px]">

                            <div class="relative border-solid border-[1px] border-[#DBDBDB] rounded-[20px] px-12 py-10 flex-col lg:grid lg:grid-cols-12 gap-8 lg:gap-14">
                                    <div class="col-span-4 text-center pt-6">
                                        <div class="px-10">
                                            @php 
                                                $image =  Storage::url($item['image']) ?? asset('hondverzekeren/src/public/img/97c58a1e2366234efb4b33e568e67c0e2cdaa1f7.png');
                                            @endphp

                                            <img src="{{$image}}" alt="{{$item['title']}}" class="object-contain aspect-[2.13]" />
                                        </div>
                                        <h2 class="text-primary text-2xl mt-4 maison font-bold">{{$item['title']}}</h2>
                                        <div class="d-flex gap-1 mt-4 text-lg text-[#FCBE48] justify-center">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="col-span-5 text-lg">
                                        <p> {!! strip_tags($item['description']) !!}</p>
                                        <ul class="flex flex-col gap-3 mt-4">
                                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                                        </ul>
                                    </div>
                                    <div class="col-span-3 flex flex-col mt-4 lg:mt-0">
                                        <div class="grid grid-cols-2 gap-4">
                                            @if ($item['insurance'])
                                                @foreach($item['insurance'] as $items2)
                                                    <div class="text-center">
                                                        <h3 class="text-2xl font-bold text-primary">{{$items2['title']}}</h3>
                                                        <p class="mt-2 text-lg">{{$items2['text']}}<br /><span class="font-semibold">{{$items2['price']}}</span></p>
                                                    </div>
                                                @endforeach   
                                            @endif
                                        </div>

                                        <div class="flex flex-col gap-3">
                                             @if (!empty( $item['cta_url1']))
                                                <a href="{{$item['cta_url1']}}" class="btn btn-primary mt-6 w-full">{{$item['cta_title1']}}</a>
                                            @endif   
                                            @if (!empty( $item['cta_url2']))
                                                <a href="{{$item['cta_url2']}}" class="btn btn-secondary w-full">{{$item['cta_title2']}}</a>
                                             @endif
                                        </div>
                                    </div>
                                    <div class="absolute -top-[16px] left-5 lg:left-10">
                                        <svg width="91" height="104" viewBox="0 0 91 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="23.4366" y="14.6478" width="67.3803" height="58.5915" class="-translate-y-[1px]" fill="#4F40BF" />
                                            <path d="M57.1268 104L23.4366 73.2394L90.8169 73.2394L57.1268 104Z" class="-translate-y-[2px]" fill="#4F40BF" />
                                            <path d="M11.7183 14.6478L11.7183 -6.00815e-05L82.8169 -6.00815e-05C87.2351 -6.00815e-05 90.8169 3.58166 90.8169 7.99994V14.6478L11.7183 14.6478Z" fill="#4F40BF" />
                                            <path d="M2.67029e-05 15.3802C2.67029e-05 13.3604 0.303129 11.3605 0.892031 9.49444C1.48093 7.62842 2.3441 5.93291 3.43224 4.50471C4.52039 3.07652 5.8122 1.94362 7.23393 1.17069C8.65566 0.397758 10.1795 -6.48499e-05 11.7183 -6.48499e-05C13.2572 -6.48499e-05 14.781 0.397758 16.2027 1.17069C17.6245 1.94362 18.9163 3.07652 20.0044 4.50472C21.0926 5.93291 21.9557 7.62842 22.5446 9.49444C23.1335 11.3605 23.4366 13.3605 23.4366 15.3802L11.7183 15.3802H2.67029e-05Z" fill="#2E256F" />
                                        </svg>
                                        <span class="text-lg text-white absolute left-3 w-full font-semibold text-center z-10 top-6">Top 1</span>
                                        <span class="text-xl text-white absolute left-3 w-full text-center z-10 top-14"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif           
            </div>
 
    </section>
    <!-- /content -->
