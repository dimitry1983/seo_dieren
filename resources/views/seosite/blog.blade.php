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
         <div class="flex flex-col lg:grid lg:grid-cols-3 gap-12">

             @if (!empty($blogs[0]))
                @foreach($blogs as $blog)
                    <div class="col-span-1">
                        <div class="relative pb-[100%] rounded-[20px] mb-4 overflow-hidden">
                            <img src="{{ asset('storage/'.$blog->thumb ?? 'dieren/src/public/img/blog-2.png') }}" alt="{{ $blog->name }}" class="w-full h-full object-cover absolute top-0 left-0">
                        </div>
                        <span class="uppercase text-secondary font-semibold">{{ strftime('%d %B %Y', strtotime($blog->created_at)) }}</span>
                        <h2 class="text-3xl text-primary font-semibold mb-2">{{ $blog->name }}</h2>
                        <p class="text-lg mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 120) }}</p>
                        <a href="{{ route('blog.detail', [ 'slug' => slugify($blog->name) , 'id' => $blog->id ]) }}" class="text-secondary font-bold">Lees meer</a>
                    </div>
                @endforeach
             @else
             <div class="text-center py-10 text-gray-500">
                 <p class="text-lg font-semibold">{{ devTranslate('page.No Blog articles found','Geen Blog artikelen gevonden.') }}</p>
             </div>
             @endif

         </div>

        @if (!empty($blogs[0]))
         <div class="pagination flex items-center justify-center mt-20 gap-2">
              {{ $blogs->appends(request()->query())->links('vendor.pagination.custom') }}
         </div>
         @endif
     </div>
 </section>

 <!-- /content -->
 @endsection