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
        @include('parts.breadcrumb' , ['breadcrumbs' => $breadcrumbData ?? ''] )
         <div class="lg:grid lg:grid-cols-12 lg:gap-24">
             <div class="col-span-8 flex flex-col gap-11">

                 <div >
                     <figure class="relative pb-[55%]">
                         <img src="{{ $blog->thumb ? Storage::url($blog->thumb) : asset('dieren/src/public/img/blog-interior.jpg') }}" class="abs-cover" alt="{{ $blog->name }}">
                     </figure>
                     <div class="py-6 px-10">
                        <h2 class="text-2xl lg:text-[35px] font-semibold mb-6"> {!! Str::headline($blog->name) !!}</h2>
                        <span class="date text-primary block mb-4 font-semibold">
                            {{ $blog->created_at->translatedFormat('d F Y') }}
                        </span>
                         <p>{!! $blog->description !!}</p>
                     </div>
                 </div>

             </div>

             <div class="col-span-4">
                 <div class="py-9 px-10">
                     <h3 class="text-2xl font-semibold mb-6">  Gerelateerde Artikelen</h3>
                     <div class="flex flex-col gap-5">
                         
                        @if (!empty($blogs))
                            @foreach($blogs as $related)
                               <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 items-center">
                                    <div class="col-span-1 sm:col-span-1">
                                        <a href="{{ route('blog.detail', ['slug' => Str::slug($related->name), 'id' => $related->id]) }}">
                                            <figure class="pb-[65%] relative rounded-[10px] border-[3px] border-solid border-primary overflow-hidden">
                                                <img src="{{ $related->thumb ? Storage::url($related->thumb) : asset('dieren/src/public/img/article1.jpg') }}" class="abs-cover opacity-80 scale-125" alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="col-span-1 sm:col-span-2">
                                        <strong class="text-lg font-semibold text-black block mb-1">
                                            <a href="{{ route('blog.detail', ['slug' => Str::slug($related->name), 'id' => $related->id]) }}">
                                                {{ Str::limit($related->name, 50) }}
                                            </a>
                                        </strong>
                                        <span class="font-medium text-primaryDark">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($related->description), 60) }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- /content -->
 @endsection