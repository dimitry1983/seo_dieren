 @extends('layouts.seosite')

 @section('content')

 <!-- hero -->
 <section class="section section--primary section--hero section--page-header bg-cover bg-center bg-no-repeat text-white relative overflow-hidden" style="background-image: url('{{ asset('hondverzekeren/src/public/img/hero-bg.jpg') }}');">
     <div class="container text-center">
         <h1 class="section-title--lg lg:text-[60px] mb-2 font-medium">Blog</h1>
     </div>
 </section>
 <!-- /hero -->

 <!-- content -->
 <section class="section section--white section--content">
     <div class="container">
         <div class="lg:grid lg:grid-cols-12 lg:gap-24">
             <div class="col-span-8 flex flex-col gap-11">

                 <div >
                     <figure class="relative pb-[55%]">
                         <img src="{{ asset('hondverzekeren/src/public/img/image.jpg')}}" class="abs-cover" alt="">
                     </figure>
                     <div class="py-6 px-10">
                         <h2 class="text-2xl lg:text-[35px] font-semibold mb-6">Fotografie voor beginners: compositie en bewerking</h2>
                         <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
                     </div>
                 </div>

             </div>

             <div class="col-span-4">
                 <div class="py-9 px-10">
                     <h3 class="text-2xl font-semibold mb-6">Lorem ipsum dolor sit amet</h3>
                     <div class="flex flex-col gap-5">
                         <div class="grid grid-cols-3 gap-5 items-center">
                             <div class="col-span-1">
                                 <figure class="pb-[65%] relative rounded-[10px] border-[3px] border-solid border-primary overflow-hidden">
                                     <img src="{{ asset('hondverzekeren/src/public/img/image.jpg')}}" class="abs-cover filter blur opacity-80 scale-125" alt="">
                                     <i class="fa-solid fa-lock-keyhole absolute left-0 right-0 w-fit h-fit top-0 bottom-0 m-auto z-10 text-white text-3xl drop-shadow-md"></i>
                                 </figure>
                             </div>
                             <div class="col-span-2">
                                 <strong class="text-lg font-semibold text-black block mb-1">Dit is de title</strong>
                                 <span class="font-medium text-primaryDark">Dit is de korte omschrijving</span>
                             </div>
                         </div>
                         <div class="grid grid-cols-3 gap-5 items-center">
                             <div class="col-span-1">
                                 <figure class="pb-[65%] relative rounded-[10px] border-[3px] border-solid border-primary overflow-hidden">
                                     <img src="{{ asset('hondverzekeren/src/public/img/image.jpg')}}" class="abs-cover filter blur opacity-80 scale-125" alt="">
                                     <i class="fa-solid fa-lock-keyhole absolute left-0 right-0 w-fit h-fit top-0 bottom-0 m-auto z-10 text-white text-3xl drop-shadow-md"></i>
                                 </figure>
                             </div>
                             <div class="col-span-2">
                                <strong class="text-lg font-semibold text-black block mb-1">Dit is de title</strong>
                                 <span class="font-medium text-primaryDark">Dit is de korte omschrijving</span>
                             </div>
                         </div>
                         <div class="grid grid-cols-3 gap-5 items-center">
                             <div class="col-span-1">
                                 <figure class="pb-[65%] relative rounded-[10px] border-[3px] border-solid border-primary overflow-hidden">
                                     <img src="{{ asset('hondverzekeren/src/public/img/image.jpg')}}" class="abs-cover filter blur opacity-80 scale-125" alt="">
                                     <i class="fa-solid fa-lock-keyhole absolute left-0 right-0 w-fit h-fit top-0 bottom-0 m-auto z-10 text-white text-3xl drop-shadow-md"></i>
                                 </figure>
                             </div>
                             <div class="col-span-2">
                                <strong class="text-lg font-semibold text-black block mb-1">Dit is de title</strong>
                                <span class="font-medium text-primaryDark">Dit is de korte omschrijving</span>
                             </div>
                         </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- /content -->
 @endsection