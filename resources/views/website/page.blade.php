@extends('layouts.site')

@section('content')
<div class="main-container bg-black text-white py-6  lg:py-20">
    <div class="container  mx-auto px-4">
        <div class="lg:grid lg:grid-cols-12 md-maxgap:gap-16 lg:gap-16 xl:gap-32">
            <div class="col-span-8 md:col-span-8 lg:col-span-8 xl:col-span-9 lg:order-2 detail-content">

                @include('parts.breadcrumb', ['breadcrumbs' => $breadcrumbData])

                {!!$page -> content!!}
            </div>
        </div>
    </div>
</div>

@endsection