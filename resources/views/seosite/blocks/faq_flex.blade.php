    
    @php 
        use App\Models\Page;
        $faq = Page::getBlockByType($page, "faq_flex");
    @endphp   
    
    
    <section class="section section--faq">
        <div class="container">
            <h2 class="section-title leading-[1.3] text-center text-secondary mb-20"><strong class="font-semibold">{{$faq['big_title']}}</strong></h2>

            <div class="accordeon-group flex flex-col gap-[25px] lg:grid lg:grid-cols-2 gap-y-4 lg:gap-x-[44px]">
                @if (!empty($faq['faq']))
                    @foreach($faq['faq'] as $item)
                    <div class="accordeon col-span-1 border border-solid border-[#CCCCCC] rounded-[10px] h-fit" data-aos="fade-up">
                        <button class="text-lg font-semibold p-5 text-secondary w-full flex items-center text-start">{{$item['question']}} <span class="ms-auto"></span></button>
                        <div class="p-5 pt-0 hidden">
                            <p>{!!$item['answer']!!}</p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>