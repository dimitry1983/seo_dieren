@extends('layouts.seosite')

@section('content')
<div class="main-container center bg-white text-white py-6 lg:py-20 h-[60vh]">
    <div class="container text-center mx-auto px-4">
        <div class="error-title"><h1 class="text-[#099] text-5xl font-bold">404</h1></div>
        <div class="error-subtitle text-gray-800">Oops! Page Not Found</div>
        <div class="error-message text-gray-800">Sorry, but the page you are looking for does not exist.</div>
        <a href="{{ url('/') }}" class="btn btn-primary mt-4 block mx-auto w-fit">Go to Home</a>
    </div>
</div>
@endsection