@extends('layouts.seosite')

@section('content')
    <div class="main-container">
        <!-- hero -->
        <section class="section--hero py-12 lg:py-[180px] bg-[url('{{ asset('hondverzekeren/src/public/img/hero-bg.jpg')}}')] bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('hondverzekeren/src/public/img/hero-bg.jpg') }}');">
            <div class="container">
                <h1 class="section-title--lg text-white text-center maison mb-6">Bescherm degenen die
                    <strong class="block">altijd aan je zijde staan</strong>
                </h1>
                <p class="text-white text-xl text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula <br>eget dolor. Aenean massa. </p>
                <div class="bg-white mt-10 px-5 py-5 lg:px-[50px] lg:py-[50px] w-fit mx-auto rounded-[20px]">
                    <h3 class="text-center font-semibold text-primary maison text-2xl lg:text-3xl">Verzeker uw harige vriend vandaag nog</h3>

                    <div class="flex flex-col items-center lg:flex-row gap-3 lg:gap-6 mt-4 lg:mt-8">
                        <div class="flex gap-3 items-center">
                            <a href="#" class="btn btn-secondary-light lg:text-2xl"><i class="fa-light fa-dog me-2 text-3xl"></i> Hond</a>
                            <a href="#" class="btn btn-white-secondary lg:text-2xl"><i class="fa-light fa-cat me-2 text-3xl"></i> Kat</a>
                        </div>
                        <a href="#" class="btn w-full lg:w-fit text-center btn-secondary">Vraag nu een offerte aan</a>
                    </div>

                </div>
            </div>
        </section>
        <!-- /hero -->

        <!-- content-image -->
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

        <!-- /content-image -->

        <section class="section section-gray bg-[#F6F6F6]">
            <div class="container">
                <h2 class="section-title text-center text-primary mb-6 "><strong>Top verzekeringen</strong></h2>
                <h3 class="maison text-3xl mb-24 text-primary text-center">Dekking en betrouwbaarheid binnen uw bereik</h3>
                <div class="flex-col lg:grid lg:grid-cols-4 gap-6">
                                            <article class="pt-2.5 mx-auto w-full rounded-none max-w-[480px]">
                            <div class="flex flex-col items-center w-full bg-white rounded-3xl">
                                <header class="flex relative flex-col items-start self-stretch px-6 pb-56 w-full rounded-3xl aspect-[1.353]">
                                    <img
                                        src="{{ asset('hondverzekeren/src/public/img/97c58a1e2366234efb4b33e568e67c0e2cdaa1f7.png')}}"
                                        alt="Insurance background"
                                        class="object-cover absolute inset-0 size-full rounded-tl-[20px] rounded-tr-[20px]" />
                                    <img
                                        src="{{ asset('hondverzekeren/src/public/img/fe0a5d113590914309e16f352a047f39616332a8.svg')}}"
                                        alt="PataFiel logo"
                                        class="object-contain z-10 -mt-2.5 mb-0 rounded-none aspect-[0.87] w-[62px]" />
                                </header>

                                <h1 class="mt-6 text-xl px-5 maison font-bold text-center text-indigo-900">
                                    PataFiel Verzekeringen
                                </h1>

                                <div class="d-flex gap-1 mt-5 text-[#FCBE48]">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class="mt-5 text-base font-medium px-5 text-center text-zinc-800">
                                    Volledige bescherming voor honden en katten met dekking bij partnerklinieken en 24/7 assistentie. Ideaal voor verantwoordelijke eigenaren.
                                </p>

                                <section class="flex gap-5 mt-4 w-full px-5 font-bold text-center max-w-[276px]">
                                    <div class="flex flex-col flex-1">
                                        <h2 class="self-center maison text-2xl leading-none text-indigo-900">
                                            Hond
                                        </h2>
                                        <p class="mt-3 text-base leading-8 text-zinc-800">
                                            <span class="font-medium text-[#323232]">
                                                Vanaf
                                            </span>
                                            <br />
                                            <span class="font-semibold text-[#323232]">
                                                € 15,60
                                            </span>
                                            <span class="font-medium text-[#323232]">
                                                - p/m
                                            </span>
                                        </p>
                                    </div>

                                    <div class="flex flex-col flex-1">
                                        <h2 class="self-center maison text-2xl leading-none text-indigo-900">
                                            Kat
                                        </h2>
                                        <p class="mt-3 text-base leading-8 text-zinc-800">
                                            <span class="font-medium text-[#323232]">
                                                Vanaf
                                            </span>
                                            <br />
                                            <span class="font-semibold text-[#323232]">
                                                € 12,40
                                            </span>
                                            <span class="font-medium text-[#323232]">
                                                - p/m
                                            </span>
                                        </p>
                                    </div>
                                </section>

                                <footer class="flex flex-col items-center w-full mt-6 px-5 pb-7 gap-3">
                                    <a href="#" class="btn btn-primary w-full justify-center text-center">Bekijken</a>
                                    <a href="#" class="btn btn-secondary w-full justify-center text-center">Meer informatie</a>
                                </footer>
                            </div>
                        </article>

                        <article class="pt-2.5 mx-auto w-full rounded-none max-w-[480px]">
                            <div class="flex flex-col items-center w-full bg-white rounded-3xl">
                                <header class="flex relative flex-col items-start self-stretch px-6 pb-56 w-full rounded-3xl aspect-[1.353]">
                                    <img
                                        src="{{ asset('hondverzekeren/src/public/img/97c58a1e2366234efb4b33e568e67c0e2cdaa1f7.png')}}"
                                        alt="Insurance background"
                                        class="object-cover absolute inset-0 size-full rounded-tl-[20px] rounded-tr-[20px]" />
                                    <img
                                        src="{{ asset('hondverzekeren/src/public/img/fe0a5d113590914309e16f352a047f39616332a8.svg')}}"
                                        alt="PataFiel logo"
                                        class="object-contain z-10 -mt-2.5 mb-0 rounded-none aspect-[0.87] w-[62px]" />
                                </header>

                                <h1 class="mt-6 text-xl px-5 maison font-bold text-center text-indigo-900">
                                    PataFiel Verzekeringen
                                </h1>

                                <div class="d-flex gap-1 mt-5 text-[#FCBE48]">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class="mt-5 text-base font-medium px-5 text-center text-zinc-800">
                                    Volledige bescherming voor honden en katten met dekking bij partnerklinieken en 24/7 assistentie. Ideaal voor verantwoordelijke eigenaren.
                                </p>

                                <section class="flex gap-5 mt-4 w-full px-5 font-bold text-center max-w-[276px]">
                                    <div class="flex flex-col flex-1">
                                        <h2 class="self-center maison text-2xl leading-none text-indigo-900">
                                            Hond
                                        </h2>
                                        <p class="mt-3 text-base leading-8 text-zinc-800">
                                            <span class="font-medium text-[#323232]">
                                                Vanaf
                                            </span>
                                            <br />
                                            <span class="font-semibold text-[#323232]">
                                                € 15,60
                                            </span>
                                            <span class="font-medium text-[#323232]">
                                                - p/m
                                            </span>
                                        </p>
                                    </div>

                                    <div class="flex flex-col flex-1">
                                        <h2 class="self-center maison text-2xl leading-none text-indigo-900">
                                            Kat
                                        </h2>
                                        <p class="mt-3 text-base leading-8 text-zinc-800">
                                            <span class="font-medium text-[#323232]">
                                                Vanaf
                                            </span>
                                            <br />
                                            <span class="font-semibold text-[#323232]">
                                                € 12,40
                                            </span>
                                            <span class="font-medium text-[#323232]">
                                                - p/m
                                            </span>
                                        </p>
                                    </div>
                                </section>

                                <footer class="flex flex-col items-center w-full mt-6 px-5 pb-7 gap-3">
                                    <a href="#" class="btn btn-primary w-full justify-center text-center">Bekijken</a>
                                    <a href="#" class="btn btn-secondary w-full justify-center text-center">Meer informatie</a>
                                </footer>
                            </div>
                        </article>

                        <article class="pt-2.5 mx-auto w-full rounded-none max-w-[480px]">
                            <div class="flex flex-col items-center w-full bg-white rounded-3xl">
                                <header class="flex relative flex-col items-start self-stretch px-6 pb-56 w-full rounded-3xl aspect-[1.353]">
                                    <img
                                        src="{{ asset('hondverzekeren/src/public/img/97c58a1e2366234efb4b33e568e67c0e2cdaa1f7.png')}}"
                                        alt="Insurance background"
                                        class="object-cover absolute inset-0 size-full rounded-tl-[20px] rounded-tr-[20px]" />
                                    <img
                                        src="{{ asset('hondverzekeren/src/public/img/fe0a5d113590914309e16f352a047f39616332a8.svg')}}"
                                        alt="PataFiel logo"
                                        class="object-contain z-10 -mt-2.5 mb-0 rounded-none aspect-[0.87] w-[62px]" />
                                </header>

                                <h1 class="mt-6 text-xl px-5 maison font-bold text-center text-indigo-900">
                                    PataFiel Verzekeringen
                                </h1>

                                <div class="d-flex gap-1 mt-5 text-[#FCBE48]">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class="mt-5 text-base font-medium px-5 text-center text-zinc-800">
                                    Volledige bescherming voor honden en katten met dekking bij partnerklinieken en 24/7 assistentie. Ideaal voor verantwoordelijke eigenaren.
                                </p>

                                <section class="flex gap-5 mt-4 w-full px-5 font-bold text-center max-w-[276px]">
                                    <div class="flex flex-col flex-1">
                                        <h2 class="self-center maison text-2xl leading-none text-indigo-900">
                                            Hond
                                        </h2>
                                        <p class="mt-3 text-base leading-8 text-zinc-800">
                                            <span class="font-medium text-[#323232]">
                                                Vanaf
                                            </span>
                                            <br />
                                            <span class="font-semibold text-[#323232]">
                                                € 15,60
                                            </span>
                                            <span class="font-medium text-[#323232]">
                                                - p/m
                                            </span>
                                        </p>
                                    </div>

                                    <div class="flex flex-col flex-1">
                                        <h2 class="self-center maison text-2xl leading-none text-indigo-900">
                                            Kat
                                        </h2>
                                        <p class="mt-3 text-base leading-8 text-zinc-800">
                                            <span class="font-medium text-[#323232]">
                                                Vanaf
                                            </span>
                                            <br />
                                            <span class="font-semibold text-[#323232]">
                                                € 12,40
                                            </span>
                                            <span class="font-medium text-[#323232]">
                                                - p/m
                                            </span>
                                        </p>
                                    </div>
                                </section>

                                <footer class="flex flex-col items-center w-full mt-6 px-5 pb-7 gap-3">
                                    <a href="#" class="btn btn-primary w-full justify-center text-center">Bekijken</a>
                                    <a href="#" class="btn btn-secondary w-full justify-center text-center">Meer informatie</a>
                                </footer>
                            </div>
                        </article>

                        <article class="pt-2.5 mx-auto w-full rounded-none max-w-[480px]">
                            <div class="flex flex-col items-center w-full bg-white rounded-3xl">
                                <header class="flex relative flex-col items-start self-stretch px-6 pb-56 w-full rounded-3xl aspect-[1.353]">
                                    <img
                                        src="{{ asset('hondverzekeren/src/public/img/97c58a1e2366234efb4b33e568e67c0e2cdaa1f7.png')}}"
                                        alt="Insurance background"
                                        class="object-cover absolute inset-0 size-full rounded-tl-[20px] rounded-tr-[20px]" />
                                    <img
                                        src="{{ asset('hondverzekeren/src/public/img/fe0a5d113590914309e16f352a047f39616332a8.svg')}}"
                                        alt="PataFiel logo"
                                        class="object-contain z-10 -mt-2.5 mb-0 rounded-none aspect-[0.87] w-[62px]" />
                                </header>

                                <h1 class="mt-6 text-xl px-5 maison font-bold text-center text-indigo-900">
                                    PataFiel Verzekeringen
                                </h1>

                                <div class="d-flex gap-1 mt-5 text-[#FCBE48]">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class="mt-5 text-base font-medium px-5 text-center text-zinc-800">
                                    Volledige bescherming voor honden en katten met dekking bij partnerklinieken en 24/7 assistentie. Ideaal voor verantwoordelijke eigenaren.
                                </p>

                                <section class="flex gap-5 mt-4 w-full px-5 font-bold text-center max-w-[276px]">
                                    <div class="flex flex-col flex-1">
                                        <h2 class="self-center maison text-2xl leading-none text-indigo-900">
                                            Hond
                                        </h2>
                                        <p class="mt-3 text-base leading-8 text-zinc-800">
                                            <span class="font-medium text-[#323232]">
                                                Vanaf
                                            </span>
                                            <br />
                                            <span class="font-semibold text-[#323232]">
                                                € 15,60
                                            </span>
                                            <span class="font-medium text-[#323232]">
                                                - p/m
                                            </span>
                                        </p>
                                    </div>

                                    <div class="flex flex-col flex-1">
                                        <h2 class="self-center maison text-2xl leading-none text-indigo-900">
                                            Kat
                                        </h2>
                                        <p class="mt-3 text-base leading-8 text-zinc-800">
                                            <span class="font-medium text-[#323232]">
                                                Vanaf
                                            </span>
                                            <br />
                                            <span class="font-semibold text-[#323232]">
                                                € 12,40
                                            </span>
                                            <span class="font-medium text-[#323232]">
                                                - p/m
                                            </span>
                                        </p>
                                    </div>
                                </section>

                                <footer class="flex flex-col items-center w-full mt-6 px-5 pb-7 gap-3">
                                    <a href="#" class="btn btn-primary w-full justify-center text-center">Bekijken</a>
                                    <a href="#" class="btn btn-secondary w-full justify-center text-center">Meer informatie</a>
                                </footer>
                            </div>
                        </article>

                                    </div>
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

        <section class="section section--gray bg-[#F6F6F6]">
            <div class="container">
                <h2 class="section-title text-center text-[#2E256F] mb-24">Keuze uit meer <strong>dan 75 verzekeraars</strong></h2>
                
                <div class="splide" data-splide='{"type":"loop","perPage":1,"perMove":1,"pagination":true,"arrows":false,"gap":"24px","breakpoints":{"991":{"perPage":1},"767":{"perPage":1},"575":{"perPage":1}}}' >
                    <div class="splide__track">
                        <ul class="splide__list">
                                <li class="splide__slide">
                                    <div class="flex flex-col lg:grid lg:grid-cols-3 gap-6">
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                        </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="flex flex-col lg:grid lg:grid-cols-3 gap-6">
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                        </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="flex flex-col lg:grid lg:grid-cols-3 gap-6">
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                            <div class="bg-white text-center flex justify-center py-7">
                                                <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}"
                                                    alt="Company Logo"
                                                    class="object-contain max-w-full aspect-[2.13] w-[285px] mx-auto block" />
                                            </div>
                                        </div>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>



@push('scripts')    
<script>
    document.getElementById('toggleBtn').addEventListener('click', function () {
      document.getElementById('mainMenu').classList.toggle('hidden');
      document.getElementById('toggleBtn').classList.toggle('open');
    });

    (function(code){
	code(window.jQuery,window,document);
    }(function($,window,document){
        $('.splide').each(function(){
            new Splide(this).mount();
        });

        $(document).on('click', '.accordeon', function() {
            let parent = $(this).parent(); // Find the parent container
        
            if ($(this).hasClass('open')) {
                // If the clicked element is already open, remove 'open' class and hide content
                $(this).removeClass('open').find('div').slideUp();
            } else {
                // Close all other accordions within the same parent
                parent.find('.accordeon').removeClass('open').find('div').slideUp();
        
                // Open the clicked accordion
                $(this).addClass('open').find('div').slideDown();
            }
        });
    }));
</script>
@endpush

@endsection