@extends('layouts.seosite')

@section('content')

<div class="main-container">

    <!-- hero -->
    <section class="section section--primary section--hero section--page-header bg-cover bg-center bg-no-repeat text-white relative overflow-hidden" style="background-image: url('{{ asset('hondverzekeren/src/public/img/hero-bg.jpg') }}');">
        <div class="container text-center">
            <h1 class="section-title--lg lg:text-[60px] mb-2 font-medium">Hondenverzekering</h1>
        </div>
    </section>
    <!-- /hero -->

    <!-- content -->
    <section class="section section--white section--content">
        <div class="container">
            <h2 class="section-title leading-[1.3] text-center text-primary mb-20"><strong class="font-bold">Vergelijk, kies en verzeker uw huisdier vandaag nog</strong></h2>

            <div class="flex flex-col lg:flex-row gap-6 mb-20 text-lg">
                <span>150 verzekeringen gevonden</span>
                <div class="lg:ms-auto flex items-center gap-3">
                    <label for="sortBy" class="me-2">Gesorteerd op</label>
                    <select id="sortBy" class="border border-solid border-[#CCCCCC] rounded-lg px-4 py-2">
                        <option value="popularity">Populariteit</option>
                        <option value="price_low_to_high">Prijs: laag naar hoog</option>
                        <option value="price_high_to_low">Prijs: hoog naar laag</option>
                        <option value="rating">Beoordeling</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col gap-[54px]">
                <div class="relative border-solid border-[1px] border-[#DBDBDB] rounded-[20px] px-12 py-10 flex-col lg:grid lg:grid-cols-12 gap-8 lg:gap-14">
                    <div class="col-span-4 text-center pt-6">
                        <div class="px-10">
                            <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}" class="object-contain aspect-[2.13]" />
                        </div>
                        <h2 class="text-primary text-2xl mt-4 maison font-bold">PataFiel Verzekeringen</h2>
                        <div class="d-flex gap-1 mt-4 text-lg text-[#FCBE48] justify-center">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="col-span-5 text-lg">
                        <p>Volledige bescherming voor honden en katten met dekking bij partnerklinieken en 24/7 assistentie. Ideaal voor verantwoordelijke eigenaren.</p>
                        <ul class="flex flex-col gap-3 mt-4">
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                        </ul>
                    </div>
                    <div class="col-span-3 flex flex-col mt-4 lg:mt-0">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Hond</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 15,60</span> - p/m</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Kat</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 12,40</span> - p/m</p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <button class="btn btn-primary mt-6 w-full">Bekijken</button>
                            <button class="btn btn-secondary w-full">Meer informatie</button>
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
                <div class="relative border-solid border-[1px] border-[#DBDBDB] rounded-[20px] px-12 py-10 flex-col lg:grid lg:grid-cols-12 gap-8 lg:gap-14">
                    <div class="col-span-4 text-center pt-6">
                        <div class="px-10">
                            <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}" class="object-contain aspect-[2.13]" />
                        </div>
                        <h2 class="text-primary text-2xl mt-4 maison font-bold">PataFiel Verzekeringen</h2>
                        <div class="d-flex gap-1 mt-4 text-lg text-[#FCBE48] justify-center">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="col-span-5 text-lg">
                        <p>Volledige bescherming voor honden en katten met dekking bij partnerklinieken en 24/7 assistentie. Ideaal voor verantwoordelijke eigenaren.</p>
                        <ul class="flex flex-col gap-3 mt-4">
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                        </ul>
                    </div>
                    <div class="col-span-3 flex flex-col mt-4 lg:mt-0">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Hond</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 15,60</span> - p/m</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Kat</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 12,40</span> - p/m</p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <button class="btn btn-primary mt-6 w-full">Bekijken</button>
                            <button class="btn btn-secondary w-full">Meer informatie</button>
                        </div>
                    </div>
                    <div class="absolute -top-[16px] left-5 lg:left-10">
                        <svg width="91" height="104" viewBox="0 0 91 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="23.4366" y="14.6478" width="67.3803" height="58.5915" class="-translate-y-[1px]" fill="#4F40BF" />
                            <path d="M57.1268 104L23.4366 73.2394L90.8169 73.2394L57.1268 104Z" class="-translate-y-[2px]" fill="#4F40BF" />
                            <path d="M11.7183 14.6478L11.7183 -6.00815e-05L82.8169 -6.00815e-05C87.2351 -6.00815e-05 90.8169 3.58166 90.8169 7.99994V14.6478L11.7183 14.6478Z" fill="#4F40BF" />
                            <path d="M2.67029e-05 15.3802C2.67029e-05 13.3604 0.303129 11.3605 0.892031 9.49444C1.48093 7.62842 2.3441 5.93291 3.43224 4.50471C4.52039 3.07652 5.8122 1.94362 7.23393 1.17069C8.65566 0.397758 10.1795 -6.48499e-05 11.7183 -6.48499e-05C13.2572 -6.48499e-05 14.781 0.397758 16.2027 1.17069C17.6245 1.94362 18.9163 3.07652 20.0044 4.50472C21.0926 5.93291 21.9557 7.62842 22.5446 9.49444C23.1335 11.3605 23.4366 13.3605 23.4366 15.3802L11.7183 15.3802H2.67029e-05Z" fill="#2E256F" />
                        </svg>
                        <span class="text-lg text-white absolute left-3 w-full font-semibold text-center z-10 top-6">Top 2</span>
                        <span class="text-xl text-white absolute left-3 w-full text-center z-10 top-14"><i class="fa-solid fa-star"></i></span>
                    </div>
                </div>
                <div class="relative border-solid border-[1px] border-[#DBDBDB] rounded-[20px] px-12 py-10 flex-col lg:grid lg:grid-cols-12 gap-8 lg:gap-14">
                    <div class="col-span-4 text-center pt-6">
                        <div class="px-10">
                            <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}" class="object-contain aspect-[2.13]" />
                        </div>
                        <h2 class="text-primary text-2xl mt-4 maison font-bold">PataFiel Verzekeringen</h2>
                        <div class="d-flex gap-1 mt-4 text-lg text-[#FCBE48] justify-center">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="col-span-5 text-lg">
                        <p>Volledige bescherming voor honden en katten met dekking bij partnerklinieken en 24/7 assistentie. Ideaal voor verantwoordelijke eigenaren.</p>
                        <ul class="flex flex-col gap-3 mt-4">
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                        </ul>
                    </div>
                    <div class="col-span-3 flex flex-col mt-4 lg:mt-0">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Hond</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 15,60</span> - p/m</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Kat</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 12,40</span> - p/m</p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <button class="btn btn-primary mt-6 w-full">Bekijken</button>
                            <button class="btn btn-secondary w-full">Meer informatie</button>
                        </div>
                    </div>
                    <div class="absolute -top-[16px] left-5 lg:left-10">
                        <svg width="91" height="104" viewBox="0 0 91 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="23.4366" y="14.6478" width="67.3803" height="58.5915" class="-translate-y-[1px]" fill="#4F40BF" />
                            <path d="M57.1268 104L23.4366 73.2394L90.8169 73.2394L57.1268 104Z" class="-translate-y-[2px]" fill="#4F40BF" />
                            <path d="M11.7183 14.6478L11.7183 -6.00815e-05L82.8169 -6.00815e-05C87.2351 -6.00815e-05 90.8169 3.58166 90.8169 7.99994V14.6478L11.7183 14.6478Z" fill="#4F40BF" />
                            <path d="M2.67029e-05 15.3802C2.67029e-05 13.3604 0.303129 11.3605 0.892031 9.49444C1.48093 7.62842 2.3441 5.93291 3.43224 4.50471C4.52039 3.07652 5.8122 1.94362 7.23393 1.17069C8.65566 0.397758 10.1795 -6.48499e-05 11.7183 -6.48499e-05C13.2572 -6.48499e-05 14.781 0.397758 16.2027 1.17069C17.6245 1.94362 18.9163 3.07652 20.0044 4.50472C21.0926 5.93291 21.9557 7.62842 22.5446 9.49444C23.1335 11.3605 23.4366 13.3605 23.4366 15.3802L11.7183 15.3802H2.67029e-05Z" fill="#2E256F" />
                        </svg>
                        <span class="text-lg text-white absolute left-3 w-full font-semibold text-center z-10 top-6">Top 3</span>
                        <span class="text-xl text-white absolute left-3 w-full text-center z-10 top-14"><i class="fa-solid fa-star"></i></span>
                    </div>
                </div>
                <div class="relative border-solid border-[1px] border-[#DBDBDB] rounded-[20px] px-12 py-10 flex-col lg:grid lg:grid-cols-12 gap-8 lg:gap-14">
                    <div class="col-span-4 text-center pt-6">
                        <div class="px-10">
                            <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}" class="object-contain aspect-[2.13]" />
                        </div>
                        <h2 class="text-primary text-2xl mt-4 maison font-bold">PataFiel Verzekeringen</h2>
                        <div class="d-flex gap-1 mt-4 text-lg text-[#FCBE48] justify-center">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="col-span-5 text-lg">
                        <p>Volledige bescherming voor honden en katten met dekking bij partnerklinieken en 24/7 assistentie. Ideaal voor verantwoordelijke eigenaren.</p>
                        <ul class="flex flex-col gap-3 mt-4">
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                        </ul>
                    </div>
                    <div class="col-span-3 flex flex-col mt-4 lg:mt-0">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Hond</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 15,60</span> - p/m</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Kat</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 12,40</span> - p/m</p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <button class="btn btn-primary mt-6 w-full">Bekijken</button>
                            <button class="btn btn-secondary w-full">Meer informatie</button>
                        </div>
                    </div>
                    <div class="absolute -top-[16px] left-5 lg:left-10">
                        <svg width="91" height="104" viewBox="0 0 91 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="23.4366" y="14.6478" width="67.3803" height="58.5915" class="-translate-y-[1px]" fill="#4F40BF" />
                            <path d="M57.1268 104L23.4366 73.2394L90.8169 73.2394L57.1268 104Z" class="-translate-y-[2px]" fill="#4F40BF" />
                            <path d="M11.7183 14.6478L11.7183 -6.00815e-05L82.8169 -6.00815e-05C87.2351 -6.00815e-05 90.8169 3.58166 90.8169 7.99994V14.6478L11.7183 14.6478Z" fill="#4F40BF" />
                            <path d="M2.67029e-05 15.3802C2.67029e-05 13.3604 0.303129 11.3605 0.892031 9.49444C1.48093 7.62842 2.3441 5.93291 3.43224 4.50471C4.52039 3.07652 5.8122 1.94362 7.23393 1.17069C8.65566 0.397758 10.1795 -6.48499e-05 11.7183 -6.48499e-05C13.2572 -6.48499e-05 14.781 0.397758 16.2027 1.17069C17.6245 1.94362 18.9163 3.07652 20.0044 4.50472C21.0926 5.93291 21.9557 7.62842 22.5446 9.49444C23.1335 11.3605 23.4366 13.3605 23.4366 15.3802L11.7183 15.3802H2.67029e-05Z" fill="#2E256F" />
                        </svg>
                        <span class="text-lg text-white absolute left-3 w-full font-semibold text-center z-10 top-6">Top 4</span>
                        <span class="text-xl text-white absolute left-3 w-full text-center z-10 top-14"><i class="fa-solid fa-star"></i></span>
                    </div>
                </div>
                <div class="relative border-solid border-[1px] border-[#DBDBDB] rounded-[20px] px-12 py-10 flex-col lg:grid lg:grid-cols-12 gap-8 lg:gap-14">
                    <div class="col-span-4 text-center pt-6">
                        <div class="px-10">
                            <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}" class="object-contain aspect-[2.13]" />
                        </div>
                        <h2 class="text-primary text-2xl mt-4 maison font-bold">PataFiel Verzekeringen</h2>
                        <div class="d-flex gap-1 mt-4 text-lg text-[#FCBE48] justify-center">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="col-span-5 text-lg">
                        <p>Volledige bescherming voor honden en katten met dekking bij partnerklinieken en 24/7 assistentie. Ideaal voor verantwoordelijke eigenaren.</p>
                        <ul class="flex flex-col gap-3 mt-4">
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                        </ul>
                    </div>
                    <div class="col-span-3 flex flex-col mt-4 lg:mt-0">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Hond</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 15,60</span> - p/m</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Kat</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 12,40</span> - p/m</p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <button class="btn btn-primary mt-6 w-full">Bekijken</button>
                            <button class="btn btn-secondary w-full">Meer informatie</button>
                        </div>
                    </div>
                    <div class="absolute -top-[16px] left-5 lg:left-10">
                        <svg width="91" height="104" viewBox="0 0 91 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="23.4366" y="14.6478" width="67.3803" height="58.5915" class="-translate-y-[1px]" fill="#4F40BF" />
                            <path d="M57.1268 104L23.4366 73.2394L90.8169 73.2394L57.1268 104Z" class="-translate-y-[2px]" fill="#4F40BF" />
                            <path d="M11.7183 14.6478L11.7183 -6.00815e-05L82.8169 -6.00815e-05C87.2351 -6.00815e-05 90.8169 3.58166 90.8169 7.99994V14.6478L11.7183 14.6478Z" fill="#4F40BF" />
                            <path d="M2.67029e-05 15.3802C2.67029e-05 13.3604 0.303129 11.3605 0.892031 9.49444C1.48093 7.62842 2.3441 5.93291 3.43224 4.50471C4.52039 3.07652 5.8122 1.94362 7.23393 1.17069C8.65566 0.397758 10.1795 -6.48499e-05 11.7183 -6.48499e-05C13.2572 -6.48499e-05 14.781 0.397758 16.2027 1.17069C17.6245 1.94362 18.9163 3.07652 20.0044 4.50472C21.0926 5.93291 21.9557 7.62842 22.5446 9.49444C23.1335 11.3605 23.4366 13.3605 23.4366 15.3802L11.7183 15.3802H2.67029e-05Z" fill="#2E256F" />
                        </svg>
                        <span class="text-lg text-white absolute left-3 w-full font-semibold text-center z-10 top-6">Top 5</span>
                        <span class="text-xl text-white absolute left-3 w-full text-center z-10 top-14"><i class="fa-solid fa-star"></i></span>
                    </div>
                </div>
                <div class="relative border-solid border-[1px] border-[#DBDBDB] rounded-[20px] px-12 py-10 flex-col lg:grid lg:grid-cols-12 gap-8 lg:gap-14">
                    <div class="col-span-4 text-center pt-6">
                        <div class="px-10">
                            <img src="{{ asset('hondverzekeren/src/public/img/9a95e270ed8d7624866c68a3d45d16c15b6a4c64.png')}}" class="object-contain aspect-[2.13]" />
                        </div>
                        <h2 class="text-primary text-2xl mt-4 maison font-bold">PataFiel Verzekeringen</h2>
                        <div class="d-flex gap-1 mt-4 text-lg text-[#FCBE48] justify-center">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="col-span-5 text-lg">
                        <p>Volledige bescherming voor honden en katten met dekking bij partnerklinieken en 24/7 assistentie. Ideaal voor verantwoordelijke eigenaren.</p>
                        <ul class="flex flex-col gap-3 mt-4">
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                            <li><i class="fa-solid fa-circle-check text-secondary me-2"></i> Cum sociis natoque penatibus</li>
                        </ul>
                    </div>
                    <div class="col-span-3 flex flex-col mt-4 lg:mt-0">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Hond</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 15,60</span> - p/m</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-primary">Kat</h3>
                                <p class="mt-2 text-lg">Vanaf<br /><span class="font-semibold">€ 12,40</span> - p/m</p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <button class="btn btn-primary mt-6 w-full">Bekijken</button>
                            <button class="btn btn-secondary w-full">Meer informatie</button>
                        </div>
                    </div>
                    <div class="absolute -top-[16px] left-5 lg:left-10">
                        <svg width="91" height="104" viewBox="0 0 91 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="23.4366" y="14.6478" width="67.3803" height="58.5915" class="-translate-y-[1px]" fill="#4F40BF" />
                            <path d="M57.1268 104L23.4366 73.2394L90.8169 73.2394L57.1268 104Z" class="-translate-y-[2px]" fill="#4F40BF" />
                            <path d="M11.7183 14.6478L11.7183 -6.00815e-05L82.8169 -6.00815e-05C87.2351 -6.00815e-05 90.8169 3.58166 90.8169 7.99994V14.6478L11.7183 14.6478Z" fill="#4F40BF" />
                            <path d="M2.67029e-05 15.3802C2.67029e-05 13.3604 0.303129 11.3605 0.892031 9.49444C1.48093 7.62842 2.3441 5.93291 3.43224 4.50471C4.52039 3.07652 5.8122 1.94362 7.23393 1.17069C8.65566 0.397758 10.1795 -6.48499e-05 11.7183 -6.48499e-05C13.2572 -6.48499e-05 14.781 0.397758 16.2027 1.17069C17.6245 1.94362 18.9163 3.07652 20.0044 4.50472C21.0926 5.93291 21.9557 7.62842 22.5446 9.49444C23.1335 11.3605 23.4366 13.3605 23.4366 15.3802L11.7183 15.3802H2.67029e-05Z" fill="#2E256F" />
                        </svg>
                        <span class="text-lg text-white absolute left-3 w-full font-semibold text-center z-10 top-6">Top 6</span>
                        <span class="text-xl text-white absolute left-3 w-full text-center z-10 top-14"><i class="fa-solid fa-star"></i></span>
                    </div>
                </div>
            </div>

            <div class="pagination flex items-center justify-center mt-20 gap-2">
                <a href="#" class="arrow"><i class="fa-light fa-arrow-left"></i></a>
                <span>1</span>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#" class="arrow"><i class="fa-light fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <!-- /content -->

    <section class="section section--white section--steps">
        <div class="container">
            <h2 class="section-title leading-[1.3] text-center text-[#2E256F] mb-14 lg:mb-24">Hoe vraagt ​​u in 3 stappen een offerte en <strong>verzekering <br>voor uw huisdier aan?</strong></h2>
            <div class="flex flex-col lg:grid lg:grid-cols-3 gap-10 lg:gap-14 relative">
                <div class="relative border border-solid rounded-[20px] px-6 pb-8 pt-[60px] lg:pt-[100px] border-[#B4B4B4] z-10 bg-white">

                    <span class="absolute top-0 -translate-y-[50%] left-0 right-0 mx-auto w-[60px] h-[60px] lg:w-[100px] lg:h-[100px] text-3xl lg:text-5xl font-semibold text-center text-white bg-[#9990DA] rounded-full flex items-center justify-center" role="text" aria-label="Step 1">
                        1 </span>

                    <h2 class="maison text-2xl font-bold leading-10 text-center text-indigo-900 max-md:text-2xl max-md:leading-9 max-sm:text-xl max-sm:leading-8">
                        Kies het plan dat het beste bij uw huisdier past
                    </h2>

                    <p class="text-lg leading-8 text-center text-zinc-800 max-md:text-base max-md:leading-7 max-sm:text-sm max-sm:leading-6">
                        Vul een kort formulier in met informatie zoals soort, ras, leeftijd en gezondheidstoestand. Zo weet u welke dekking voor u beschikbaar is.
                    </p>
                </div>
                <div class="relative border border-solid rounded-[20px] px-6 pb-8 pt-[60px] lg:pt-[100px] border-[#B4B4B4] z-10 bg-white">

                    <span class="absolute top-0 -translate-y-[50%] left-0 right-0 mx-auto w-[60px] h-[60px] lg:w-[100px] lg:h-[100px] text-3xl lg:text-5xl font-semibold text-center text-white bg-[#9990DA] rounded-full flex items-center justify-center" role="text" aria-label="Step 1">
                        2 </span>

                    <h2 class="maison text-2xl font-bold leading-10 text-center text-indigo-900 max-md:text-2xl max-md:leading-9 max-sm:text-xl max-sm:leading-8">
                        Kies het plan dat het beste bij uw huisdier past
                    </h2>

                    <p class="text-lg leading-8 text-center text-zinc-800 max-md:text-base max-md:leading-7 max-sm:text-sm max-sm:leading-6">
                        Vul een kort formulier in met informatie zoals soort, ras, leeftijd en gezondheidstoestand. Zo weet u welke dekking voor u beschikbaar is.
                    </p>
                </div>
                <div class="relative border border-solid rounded-[20px] px-6 pb-8 pt-[60px] lg:pt-[100px] border-[#B4B4B4] z-10 bg-white">

                    <span class="absolute top-0 -translate-y-[50%] left-0 right-0 mx-auto w-[60px] h-[60px] lg:w-[100px] lg:h-[100px] text-3xl lg:text-5xl font-semibold text-center text-white bg-[#9990DA] rounded-full flex items-center justify-center" role="text" aria-label="Step 1">
                        3 </span>

                    <h2 class="maison text-2xl font-bold leading-10 text-center text-indigo-900 max-md:text-2xl max-md:leading-9 max-sm:text-xl max-sm:leading-8">
                        Kies het plan dat het beste bij uw huisdier past
                    </h2>

                    <p class="text-lg leading-8 text-center text-zinc-800 max-md:text-base max-md:leading-7 max-sm:text-sm max-sm:leading-6">
                        Vul een kort formulier in met informatie zoals soort, ras, leeftijd en gezondheidstoestand. Zo weet u welke dekking voor u beschikbaar is.
                    </p>
                </div>
                <svg class="left-deco top-0 bottom-0 h-fit my-auto absolute left-0 w-fit right-0 mx-auto -translate-x-[100%] hidden lg:block" width="200" height="108" viewBox="0 0 200 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.868164 4.35924C71.7864 -2.74003 60.3633 97.6617 198.868 104" stroke="#675BC8" stroke-width="7" stroke-dasharray="10 5" />
                </svg>
                <svg class="right-deco top-0 bottom-0 h-fit my-auto absolute left-0 w-fit right-0 mx-auto translate-x-[100%] hidden lg:block" width="201" height="108" viewBox="0 0 201 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M199.868 4.35924C128.592 -2.74003 140.073 97.6617 0.868166 104" stroke="#675BC8" stroke-width="7" stroke-dasharray="10 5" />
                </svg>

            </div>
        </div>
    </section>

    <section class="section section--gray  w-full bg-[#F6F6F6]">
        <div class="container flex-col lg:grid lg:grid-cols-12 justify-center gap-12 items-center mx-auto my-0">
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

    <section class="section section--faq">
        <div class="container">
            <h2 class="section-title leading-[1.3] text-center text-secondary mb-20"><strong class="font-semibold">Voordat u iemand inhuurt: dit moet u weten</strong></h2>

            <div class="accordeon-group flex flex-col gap-[25px] lg:grid lg:grid-cols-2 gap-y-4 lg:gap-x-[44px]">
                <div class="accordeon col-span-1 border border-solid border-[#CCCCCC] rounded-[10px] h-fit" data-aos="fade-up">
                    <button class="text-lg font-semibold p-5 text-secondary w-full flex items-center text-start">Wat is een huisdierenverzekering? <span class="ms-auto"></span></button>
                    <div class="p-5 pt-0 hidden">
                        <p>Het is een plan dat medische kosten en andere diensten dekt die verband houden met de gezondheid en het welzijn van uw huisdier, zoals dierenartsbezoeken, spoedgevallen, vaccinaties, operaties en meer.</p>
                    </div>
                </div>
                <div class="accordeon col-span-1 border border-solid border-[#CCCCCC] rounded-[10px] h-fit" data-aos="fade-up">
                    <button class="text-lg font-semibold p-5 text-secondary w-full flex items-center text-start">Wat is een huisdierenverzekering? <span class="ms-auto"></span></button>
                    <div class="p-5 pt-0 hidden">
                        <p>Het is een plan dat medische kosten en andere diensten dekt die verband houden met de gezondheid en het welzijn van uw huisdier, zoals dierenartsbezoeken, spoedgevallen, vaccinaties, operaties en meer.</p>
                    </div>
                </div>
                <div class="accordeon col-span-1 border border-solid border-[#CCCCCC] rounded-[10px] h-fit" data-aos="fade-up">
                    <button class="text-lg font-semibold p-5 text-secondary w-full flex items-center text-start">Wat is een huisdierenverzekering? <span class="ms-auto"></span></button>
                    <div class="p-5 pt-0 hidden">
                        <p>Het is een plan dat medische kosten en andere diensten dekt die verband houden met de gezondheid en het welzijn van uw huisdier, zoals dierenartsbezoeken, spoedgevallen, vaccinaties, operaties en meer.</p>
                    </div>
                </div>
                <div class="accordeon col-span-1 border border-solid border-[#CCCCCC] rounded-[10px] h-fit" data-aos="fade-up">
                    <button class="text-lg font-semibold p-5 text-secondary w-full flex items-center text-start">Wat is een huisdierenverzekering? <span class="ms-auto"></span></button>
                    <div class="p-5 pt-0 hidden">
                        <p>Het is een plan dat medische kosten en andere diensten dekt die verband houden met de gezondheid en het welzijn van uw huisdier, zoals dierenartsbezoeken, spoedgevallen, vaccinaties, operaties en meer.</p>
                    </div>
                </div>
                <div class="accordeon col-span-1 border border-solid border-[#CCCCCC] rounded-[10px] h-fit" data-aos="fade-up">
                    <button class="text-lg font-semibold p-5 text-secondary w-full flex items-center text-start">Wat is een huisdierenverzekering? <span class="ms-auto"></span></button>
                    <div class="p-5 pt-0 hidden">
                        <p>Het is een plan dat medische kosten en andere diensten dekt die verband houden met de gezondheid en het welzijn van uw huisdier, zoals dierenartsbezoeken, spoedgevallen, vaccinaties, operaties en meer.</p>
                    </div>
                </div>
                <div class="accordeon col-span-1 border border-solid border-[#CCCCCC] rounded-[10px] h-fit" data-aos="fade-up">
                    <button class="text-lg font-semibold p-5 text-secondary w-full flex items-center text-start">Wat is een huisdierenverzekering? <span class="ms-auto"></span></button>
                    <div class="p-5 pt-0 hidden">
                        <p>Het is een plan dat medische kosten en andere diensten dekt die verband houden met de gezondheid en het welzijn van uw huisdier, zoals dierenartsbezoeken, spoedgevallen, vaccinaties, operaties en meer.</p>
                    </div>
                </div>
                <div class="accordeon col-span-1 border border-solid border-[#CCCCCC] rounded-[10px] h-fit" data-aos="fade-up">
                    <button class="text-lg font-semibold p-5 text-secondary w-full flex items-center text-start">Wat is een huisdierenverzekering? <span class="ms-auto"></span></button>
                    <div class="p-5 pt-0 hidden">
                        <p>Het is een plan dat medische kosten en andere diensten dekt die verband houden met de gezondheid en het welzijn van uw huisdier, zoals dierenartsbezoeken, spoedgevallen, vaccinaties, operaties en meer.</p>
                    </div>
                </div>
                <div class="accordeon col-span-1 border border-solid border-[#CCCCCC] rounded-[10px] h-fit" data-aos="fade-up">
                    <button class="text-lg font-semibold p-5 text-secondary w-full flex items-center text-start">Wat is een huisdierenverzekering? <span class="ms-auto"></span></button>
                    <div class="p-5 pt-0 hidden">
                        <p>Het is een plan dat medische kosten en andere diensten dekt die verband houden met de gezondheid en het welzijn van uw huisdier, zoals dierenartsbezoeken, spoedgevallen, vaccinaties, operaties en meer.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection