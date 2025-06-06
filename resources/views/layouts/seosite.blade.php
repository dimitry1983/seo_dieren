<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! $seo['title'] ?? 'Default Title' !!}</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <!-- Meta description -->
    <meta name="description" content="{!! $seo['description'] ?? 'Default description' !!}">

    <!-- Meta author -->
    @if(!empty($seo['author']))
        <meta name="author" content="{{ $seo['author'] }}">
    @endif

    <!-- Meta robots -->
    <meta name="robots" content="{{ $seo['robots'] ?? 'noindex, nofollow' }}">

    <!-- Canonical URL -->
    @if(!empty($seo['canonical_url']))
        <link rel="canonical" href="{{ $seo['canonical_url'] }}">
    @endif

    <!-- Open Graph for social media sharing -->
    @if(!empty($seo['image']))
        <meta property="og:image" content="{{ $seo['image'] }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('hondverzekeren/src/public/css/splide.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('hondverzekeren/src/public/css/all.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('hondverzekeren/dist/public/css/app.css') }}"></head>
    <?php 
        function convertToVeryDarkColor($hexColor) {
            // Extract RGB components from the input hex color
            $r = hexdec(substr($hexColor, 0, 2));
            $g = hexdec(substr($hexColor, 2, 2));
            $b = hexdec(substr($hexColor, 4, 2));

            // Adjust the RGB values (example adjustment for conversion)
            $r = max(0, $r - 98); // Adjust Red component
            $g = max(0, $g - 89); // Adjust Green component
            $b = max(0, $b - 130); // Adjust Blue component

            // Convert the adjusted values back to a hex string
            $newHexColor = sprintf("%02X%02X%02X", $r, $g, $b);

            return $newHexColor;
        }

        function convertToDarkerColor($hexColor) {
            // Extract RGB components from the input hex color
            $r = hexdec(substr($hexColor, 0, 2));
            $g = hexdec(substr($hexColor, 2, 2));
            $b = hexdec(substr($hexColor, 4, 2));

            // Adjust the RGB values (example adjustment for conversion)
            $r = max(0, $r - 66); // Adjust Red component
            $g = max(0, $g - 65); // Adjust Green component
            $b = max(0, $b - 60); // Adjust Blue component

            // Convert the adjusted values back to a hex string
            $newHexColor = sprintf("%02X%02X%02X", $r, $g, $b);

            return $newHexColor;
        }
        function convertToLighterColor($hexColor) {
            // Extract RGB components from the input hex color
            $r = hexdec(substr($hexColor, 0, 2));
            $g = hexdec(substr($hexColor, 2, 2));
            $b = hexdec(substr($hexColor, 4, 2));

            // Adjust the RGB values (example adjustment for conversion)
            $r = min(255, $r + 32); // Adjust Red component
            $g = min(255, $g + 40); // Adjust Green component
            $b = min(255, $b + 40); // Adjust Blue component

            // Convert the adjusted values back to a hex string
            $newHexColor = sprintf("%02X%02X%02X", $r, $g, $b);

            return $newHexColor;
        }
        ?>
        <style>
            :root{
                --primary: #1f2937;
                --primaryLight: #<?= convertToLighterColor('1f2937') ?>;
                --primaryDark: #<?= convertToDarkerColor('1f2937') ?>;
                --primaryDarker: #<?= convertToVeryDarkColor('1f2937') ?>;
                --secondary: #009999;
                --secondaryLight: #<?= convertToLighterColor('009999') ?>;
                --secondaryDark: #<?= convertToDarkerColor('009999') ?>;
                --secondaryDarker: #<?= convertToVeryDarkColor('009999') ?>; 
            }
        </style>
        @livewireStyles
</head>
<body class="text-base">
    <header class="header relative header--main">
        @include('seoparts.menu')
    </header>
    @yield('content')

    @if (isset($slot ))
      
            {{ $slot}}
        
    @endif

    @include('seoparts.footer')
</body>
<script src="{{ asset('dieren/src/public/js/jquery.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('hondverzekeren/src/public/js/splide.min.js')}}"></script>
@stack('scripts')
@livewireScripts
</html>