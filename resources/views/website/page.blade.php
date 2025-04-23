@extends('layouts.site')

@section('content')
<div class="main-container py-6 lg:py-20">
    <div class="container mx-auto px-4">
        <div class="lg:grid lg:grid-cols-12 relative block">
            <div class="col-span-8 md:col-span-8 lg:col-span-8 xl:col-span-9">
                @include('parts.breadcrumb', ['breadcrumbs' => $breadcrumbData])
            </div>
            <div class="col-span-8 md:col-span-8 lg:col-span-8 xl:col-span-9 detail-content block mx-auto py-4">
                {!!$content!!}
            </div>
        </div>
        <div class="bg-white rounded shadow-md p-4 w-full detail-content">
            <h3 class="my-8 text-left">Dierenarst bij jouw in de buurt</h3>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
                <li><a href="">Dierenarst Amsterdam</a></li>
                <li><a href="">Dierenarst Rotterdam</a></li>
                <li><a href="">Dierenarst Gouda</a></li>
                <li><a href="">Dierenarst Leiden</a></li>
            </ul>
        </div>
    </div>
</div>


@endsection