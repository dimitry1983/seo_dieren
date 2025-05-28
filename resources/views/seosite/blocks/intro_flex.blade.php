        @php 
            use App\Models\Page;
            $intro = Page::getBlockByType($page, "intro_flex");
        @endphp       
        
        <!-- content-image -->
        <section class="section section--white  w-full bg-white">
            <div class="container mx-auto my-0">


                <article class="justify-center items-center">
                    <h1 class="mt-5 mb-10 text-center text-5xl maison tracking-normal leading-none text-indigo-900 font-[bold] max-md:mb-10 max-md:text-4xl max-md:text-center max-sm:mb-8 max-sm:text-3xl">
                      {!! $intro['title'] ?? "Huisdierenverzekering"!!}
                    </h1>

                    <p class="mb-5 max-w-full text-center text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                        {!! $intro['description'] ?? "Huisdierenverzekering"!!}
                    </p>

                </article>
            </div>
        </section>