        @php 
            use App\Models\Page;
            $intro = Page::getBlockByType($page, "seo_text_flex");
        @endphp       
        
       <?php
            use Illuminate\Support\Facades\Storage;
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
                      {!! $intro['title'] ?? "Huisdierenverzekering"!!}
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