


    @php 
        use App\Models\Page;
        $information_steps = Page::getBlockByType($page, "information_steps_flex");
    @endphp

        
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