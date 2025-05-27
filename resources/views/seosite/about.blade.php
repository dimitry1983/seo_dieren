 @extends('layouts.seosite')

@section('content')

        <section class="section section--primary section--hero section--page-header bg-cover bg-center bg-no-repeat text-white relative overflow-hidden" style="background-image: url('{{ asset('hondverzekeren/src/public/img/hero-bg.jpg') }}');">
            <div class="container text-center">
                <h1 class="section-title--lg lg:text-[60px] mb-2 font-medium">Over ons</h1>
            </div>
        </section>
        <!-- /hero -->

        <section class="section section--white  w-full bg-white">
            <div class="container flex-col lg:grid lg:grid-cols-12 gap-12 justify-center items-center mx-auto my-0">
                <div class="shrink-0 col-span-5">
                    <img src="{{ asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png')}}" alt="Woman hugging a husky dog" class="object-cover rounded-3xl size-full">
                </div>

                <article class="flex flex-col shrink-0 justify-start items-start  max-md:pt-10 col-span-7">
                    <h1 class="mt-5 mb-10 text-5xl maison tracking-normal leading-none text-indigo-900 font-[bold] max-md:mb-10 max-md:text-4xl max-md:text-center max-sm:mb-8 max-sm:text-3xl">
                        Waarom een <strong>huisdierenverzekering afsluiten?</strong>
                    </h1>

                    <p class="mb-5 max-w-full text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                        Uw huisdier is meer dan alleen een gezelschapsdier: het is onderdeel van uw gezin. Net als iedere geliefde verdienen zij zorg, aandacht en bescherming. Met een huisdierenverzekering kunt u het welzijn van uw huisdier garanderen zonder dat uw financiën in gevaar komen.
                    </p>

                    <p class="mb-10 text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                        Met een verzekering bent u verzekerd tegen:
                    </p>

                    <ul class="flex flex-col gap-3 mb-16 max-md:gap-2">
                        <li class="flex gap-4 items-center max-sm:gap-4">
                            <i class="fa-solid fa-circle-check text-secondary me-1 text-2xl"></i>
                            <span class="text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                                Veterinaire consulten, vaccinaties en behandelingen
                            </span>
                        </li>

                        <li class="flex gap-4 items-center max-sm:gap-4">
                            <i class="fa-solid fa-circle-check text-secondary me-1 text-2xl"></i>
                            <span class="text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                                Medische noodgevallen of onverwachte ongevallen
                            </span>
                        </li>

                        <li class="flex gap-4 items-center max-sm:gap-4">
                            <i class="fa-solid fa-circle-check text-secondary me-1 text-2xl"></i>
                            <span class="text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                                Operaties, ziekenhuisopnames of chronische ziekten
                            </span>
                        </li>

                        <li class="flex gap-4 items-center max-sm:gap-4">
                            <i class="fa-solid fa-circle-check text-secondary me-1 text-2xl"></i>
                            <span class="text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                                Verlies of diefstal, bij sommige plannen
                            </span>
                        </li>
                    </ul>

                    <button class="btn btn-primary">
                        Verzekeringsofferte
                    </button>
                </article>
            </div>
        </section>

        <section class="section section--gray  w-full bg-[#F6F6F6]">
            <div class="container flex-col lg:grid lg:grid-cols-12 gap-12 justify-center items-center mx-auto my-0">
                <div class="shrink-0 col-span-5 lg:order-2">
                    <img src="{{ asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png')}}" alt="Woman hugging a husky dog" class="object-cover rounded-3xl size-full">
                </div>

                <article class="flex flex-col shrink-0 justify-start items-start  max-md:pt-10 col-span-7 lg:order-1">
                    <h1 class="mt-5 mb-10 text-5xl maison tracking-normal leading-none text-indigo-900 font-[bold] max-md:mb-10 max-md:text-4xl max-md:text-center max-sm:mb-8 max-sm:text-3xl">
                        Waarom een <strong>huisdierenverzekering afsluiten?</strong>
                    </h1>

                    <p class="mb-5 max-w-full text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                        Uw huisdier is meer dan alleen een gezelschapsdier: het is onderdeel van uw gezin. Net als iedere geliefde verdienen zij zorg, aandacht en bescherming. Met een huisdierenverzekering kunt u het welzijn van uw huisdier garanderen zonder dat uw financiën in gevaar komen.
                    </p>

                    <p class="mb-10 text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                        Met een verzekering bent u verzekerd tegen:
                    </p>

                    <ul class="flex flex-col gap-3 mb-16 max-md:gap-2">
                        <li class="flex gap-4 items-center max-sm:gap-4">
                            <i class="fa-solid fa-circle-check text-secondary me-1 text-2xl"></i>
                            <span class="text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                                Veterinaire consulten, vaccinaties en behandelingen
                            </span>
                        </li>

                        <li class="flex gap-4 items-center max-sm:gap-4">
                            <i class="fa-solid fa-circle-check text-secondary me-1 text-2xl"></i>
                            <span class="text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                                Medische noodgevallen of onverwachte ongevallen
                            </span>
                        </li>

                        <li class="flex gap-4 items-center max-sm:gap-4">
                            <i class="fa-solid fa-circle-check text-secondary me-1 text-2xl"></i>
                            <span class="text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                                Operaties, ziekenhuisopnames of chronische ziekten
                            </span>
                        </li>

                        <li class="flex gap-4 items-center max-sm:gap-4">
                            <i class="fa-solid fa-circle-check text-secondary me-1 text-2xl"></i>
                            <span class="text-lg font-medium leading-loose text-neutral-700 max-md:text-base max-sm:text-sm">
                                Verlies of diefstal, bij sommige plannen
                            </span>
                        </li>
                    </ul>

                    <button class="btn btn-primary">
                        Verzekeringsofferte
                    </button>
                </article>
            </div>
        </section>

        <section class="section section--white section--steps">
            <div class="container">
                <h2 class="section-title leading-[1.3] text-center text-[#2E256F] mb-14 lg:mb-24">Hoe vraagt ​​u in 3 stappen een offerte en <strong>verzekering <br>voor uw huisdier aan?</strong></h2>
                <div class="flex flex-col lg:grid lg:grid-cols-3 gap-10 lg:gap-14 relative">
                        <div class="relative border border-solid rounded-[20px] px-6 pb-8 pt-[60px] lg:pt-[100px] border-[#B4B4B4] z-10 bg-white">

                            <span class="absolute top-0 -translate-y-[50%] left-0 right-0 mx-auto w-[60px] h-[60px] lg:w-[100px] lg:h-[100px] text-3xl lg:text-5xl font-semibold text-center text-white bg-[#9990DA] rounded-full flex items-center justify-center" role="text" aria-label="Step 1">
                                1                            </span>

                            <h2 class="maison text-2xl font-bold leading-10 text-center text-indigo-900 max-md:text-2xl max-md:leading-9 max-sm:text-xl max-sm:leading-8">
                                Kies het plan dat het beste bij uw huisdier past
                            </h2>

                            <p class="text-lg leading-8 text-center text-zinc-800 max-md:text-base max-md:leading-7 max-sm:text-sm max-sm:leading-6">
                                Vul een kort formulier in met informatie zoals soort, ras, leeftijd en gezondheidstoestand. Zo weet u welke dekking voor u beschikbaar is.
                            </p>
                        </div>
                                            <div class="relative border border-solid rounded-[20px] px-6 pb-8 pt-[60px] lg:pt-[100px] border-[#B4B4B4] z-10 bg-white">

                            <span class="absolute top-0 -translate-y-[50%] left-0 right-0 mx-auto w-[60px] h-[60px] lg:w-[100px] lg:h-[100px] text-3xl lg:text-5xl font-semibold text-center text-white bg-[#9990DA] rounded-full flex items-center justify-center" role="text" aria-label="Step 1">
                                2                            </span>

                            <h2 class="maison text-2xl font-bold leading-10 text-center text-indigo-900 max-md:text-2xl max-md:leading-9 max-sm:text-xl max-sm:leading-8">
                                Kies het plan dat het beste bij uw huisdier past
                            </h2>

                            <p class="text-lg leading-8 text-center text-zinc-800 max-md:text-base max-md:leading-7 max-sm:text-sm max-sm:leading-6">
                                Vul een kort formulier in met informatie zoals soort, ras, leeftijd en gezondheidstoestand. Zo weet u welke dekking voor u beschikbaar is.
                            </p>
                        </div>
                                            <div class="relative border border-solid rounded-[20px] px-6 pb-8 pt-[60px] lg:pt-[100px] border-[#B4B4B4] z-10 bg-white">

                            <span class="absolute top-0 -translate-y-[50%] left-0 right-0 mx-auto w-[60px] h-[60px] lg:w-[100px] lg:h-[100px] text-3xl lg:text-5xl font-semibold text-center text-white bg-[#9990DA] rounded-full flex items-center justify-center" role="text" aria-label="Step 1">
                                3                            </span>

                            <h2 class="maison text-2xl font-bold leading-10 text-center text-indigo-900 max-md:text-2xl max-md:leading-9 max-sm:text-xl max-sm:leading-8">
                                Kies het plan dat het beste bij uw huisdier past
                            </h2>

                            <p class="text-lg leading-8 text-center text-zinc-800 max-md:text-base max-md:leading-7 max-sm:text-sm max-sm:leading-6">
                                Vul een kort formulier in met informatie zoals soort, ras, leeftijd en gezondheidstoestand. Zo weet u welke dekking voor u beschikbaar is.
                            </p>
                        </div>
                                        <svg class="left-deco top-0 bottom-0 h-fit my-auto absolute left-0 w-fit right-0 mx-auto -translate-x-[100%] hidden lg:block" width="200" height="108" viewBox="0 0 200 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.868164 4.35924C71.7864 -2.74003 60.3633 97.6617 198.868 104" stroke="#675BC8" stroke-width="7" stroke-dasharray="10 5"/>
                    </svg>
                    <svg class="right-deco top-0 bottom-0 h-fit my-auto absolute left-0 w-fit right-0 mx-auto translate-x-[100%] hidden lg:block" width="201" height="108" viewBox="0 0 201 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M199.868 4.35924C128.592 -2.74003 140.073 97.6617 0.868166 104" stroke="#675BC8" stroke-width="7" stroke-dasharray="10 5"/>
                    </svg>

                </div>
            </div>
        </section>
@endsection