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
            <h3 class="my-8 text-left">{{ucfirst($checkHasSeoPage -> custom_link)}}</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
            <div>
                <h4 class="font-bold mb-4">{{ucfirst($checkHasSeoPage -> custom_link)}} {{ devTranslate('page.in Grote Steden','in Grote Steden') }}</h4>
                <ul class="space-y-4">
                @foreach($biggestCities as $city)
                    <li>
                        <a href="{{ $slug }}/{{ slugify($city->name) }}">
                            {{$checkHasSeoPage -> custom_link}} {{ $city->name }}
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4">{{ucfirst($checkHasSeoPage -> custom_link)}} {{ devTranslate('page.in Andere Plaatsen','in Andere Plaatsen') }}</h4>
                <ul class="space-y-4">
                @foreach($tenRandomPlaces as $city)
                    <li>
                        <a href="{{ $slug }}/{{ slugify($city->name) }}">
                            {{$checkHasSeoPage -> custom_link}} {{ $city->name }}
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
            </div>
        </div> 
    </div>
</div>


@endsection