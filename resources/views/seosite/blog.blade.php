 @extends('layouts.seosite')

 @section('content')
  <?php
    use Illuminate\Support\Facades\Storage;
    $image =  Storage::url($headerBlock['background_image']) ?? asset('hondverzekeren/src/public/img/hero-bg.jpg');
?>
 <!-- hero -->
 <section class="section section--primary section--hero section--page-header bg-cover bg-center bg-no-repeat text-white relative overflow-hidden" style="background-image: url('{{$image}}');">
     <div class="container text-center">
         <h1 class="section-title--lg lg:text-[60px] mb-2 font-medium">Blog</h1>
     </div>
 </section>
 <!-- /hero -->

 <!-- content -->
 <section class="section section--white section--content">
     <div class="container">

         <div class="flex flex-col lg:grid lg:grid-cols-3 gap-12">
             <div class="col-span-1">
                 <div class="relative pb-[100%] rounded-[20px] mb-4 overflow-hidden">
                     <img src="{{ asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png')}}" alt="Blog Image 1" class="w-full h-full object-cover absolute top-0 left-0">
                 </div>
                 <span class="uppercase text-secondary font-semibold">28 MAY 2025</span>
                 <h2 class="text-3xl text-primary font-semibold mb-2">Blog Title 1</h2>
                 <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at erat vel quam facilisis commodo.</p>
                 <a href="#" class="text-secondary font-bold">Lees meer</a>
             </div>
             <div class="col-span-1">
                 <div class="relative pb-[100%] rounded-[20px] mb-4 overflow-hidden">
                     <img src="{{ asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png')}}" alt="Blog Image 2" class="w-full h-full object-cover absolute top-0 left-0">
                 </div>
                 <span class="uppercase text-secondary font-semibold">28 MAY 2025</span>
                 <h2 class="text-3xl text-primary font-semibold mb-2">Blog Title 2</h2>
                 <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at erat vel quam facilisis commodo.</p>
                 <a href="#" class="text-secondary font-bold">Lees meer</a>
             </div>
             <div class="col-span-1">
                 <div class="relative pb-[100%] rounded-[20px] mb-4 overflow-hidden">
                     <img src="{{ asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png')}}" alt="Blog Image 3" class="w-full h-full object-cover absolute top-0 left-0">
                 </div>
                 <span class="uppercase text-secondary font-semibold">28 MAY 2025</span>
                 <h2 class="text-3xl text-primary font-semibold mb-2">Blog Title 3</h2>
                 <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at erat vel quam facilisis commodo.</p>
                 <a href="#" class="text-secondary font-bold">Lees meer</a>
             </div>
             <div class="col-span-1">
                 <div class="relative pb-[100%] rounded-[20px] mb-4 overflow-hidden">
                     <img src="{{ asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png')}}" alt="Blog Image 4" class="w-full h-full object-cover absolute top-0 left-0">
                 </div>
                 <span class="uppercase text-secondary font-semibold">28 MAY 2025</span>
                 <h2 class="text-3xl text-primary font-semibold mb-2">Blog Title 4</h2>
                 <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at erat vel quam facilisis commodo.</p>
                 <a href="#" class="text-secondary font-bold">Lees meer</a>
             </div>
             <div class="col-span-1">
                 <div class="relative pb-[100%] rounded-[20px] mb-4 overflow-hidden">
                     <img src="{{ asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png')}}" alt="Blog Image 5" class="w-full h-full object-cover absolute top-0 left-0">
                 </div>
                 <span class="uppercase text-secondary font-semibold">28 MAY 2025</span>
                 <h2 class="text-3xl text-primary font-semibold mb-2">Blog Title 5</h2>
                 <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at erat vel quam facilisis commodo.</p>
                 <a href="#" class="text-secondary font-bold">Lees meer</a>
             </div>
             <div class="col-span-1">
                 <div class="relative pb-[100%] rounded-[20px] mb-4 overflow-hidden">
                     <img src="{{ asset('hondverzekeren/src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png')}}" alt="Blog Image 6" class="w-full h-full object-cover absolute top-0 left-0">
                 </div>
                 <span class="uppercase text-secondary font-semibold">28 MAY 2025</span>
                 <h2 class="text-3xl text-primary font-semibold mb-2">Blog Title 6</h2>
                 <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at erat vel quam facilisis commodo.</p>
                 <a href="#" class="text-secondary font-bold">Lees meer</a>
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
 @endsection