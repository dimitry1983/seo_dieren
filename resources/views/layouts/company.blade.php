<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dieren-dashboard/src/public/css/quill.snow.css')}}">
    
    <link rel="stylesheet" href="{{ asset('dieren/src/public/css/splide.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dieren-dashboard/src/public/css/all.min.css')}}">
    <style>
        :root {
            --primary: #029999;
            --primaryLight: #0fd1d1;
            --primaryDark: #B71200;
            --primaryDarker: #970000;
            --secondary: #202428;
            --secondaryLight:rgb(40, 43, 45);
            --secondaryDark: #A6BE1B;
            --secondaryDarker: #86A600;
        }
    </style>
    <link href="/css/filament/filament/app.css?v=3.2.132.0" rel="stylesheet" data-navigate-track />
    
    <link rel="stylesheet" href="{{ asset('dieren-dashboard/dist/public/css/app.css')}}">
    @livewireStyles


    @stack('styles') <!-- For page-specific styles -->
</head>

<body class="text-base">
    @include('parts.company.header')
    {{$slot}}
</body>
@livewireScripts


<script src="{{ asset('dieren-dashboard/src/public/js/quill.js') }}"></script>

@include('parts.company.footer')
@stack('js')

</html>