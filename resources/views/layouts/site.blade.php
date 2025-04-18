<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! $seo['title'] ?? 'Default Title' !!}</title>

    <!-- Meta description -->
    <meta name="description" content="{!! $seo['description'] ?? 'Default description' !!}">

    <!-- Meta author -->
    @if(!empty($seo['author']))
        <meta name="author" content="{{ $seo['author'] }}">
    @endif

    <!-- Meta robots -->
    <meta name="robots" content="{{ $seo['robots'] ?? 'index, follow' }}">

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('dieren/src/public/css/splide.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('dieren/src/public/css/all.min.css') }}" >
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
                --primary: #7E5FBE;
                --primaryLight: #<?= convertToLighterColor('7E5FBE') ?>;
                --primaryDark: #<?= convertToDarkerColor('7E5FBE') ?>;
                --primaryDarker: #<?= convertToVeryDarkColor('7E5FBE') ?>;
                --secondary: #E8FF57;
                --secondaryLight: #<?= convertToLighterColor('E8FF57') ?>;
                --secondaryDark: #<?= convertToDarkerColor('E8FF57') ?>;
                --secondaryDarker: #<?= convertToVeryDarkColor('E8FF57') ?>;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('dieren/dist/public/css/app.css')}}">
        @livewireStyles
        @yield('structured-data')
</head>
<body class="text-base">
    <header class="header relative header--main">
        @include('parts.topbar')
        @include('parts.menu')
    </header>
    @yield('content')

    @if (isset($slot ))
      
            {{ $slot}}
        
    @endif

    @include('parts.footer')
</body>
<script src="{{ asset('dieren/src/public/js/jquery.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/i18n/nl.js"></script>
<script src="{{ asset('dieren/src/public/js/splide.min.js')}}"></script>
<script src="{{ asset('dieren/src/public/js/custom.js')}}"></script>
@stack('scripts')
@livewireScripts
</html>