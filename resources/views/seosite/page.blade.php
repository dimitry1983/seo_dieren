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

    @foreach ($blocks as $item)
        @include('seosite.blocks.' . $item['type'], ['blocks' => $blocks])
    @endforeach




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