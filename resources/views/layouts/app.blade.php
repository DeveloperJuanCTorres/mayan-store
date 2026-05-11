<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <?php
    $version = '1993.4.8';
    ?>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logos/16x16.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logos/32x32.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('logos/48x48.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('logos/64x64.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('logos/96x96.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('logos/128x128.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('logos/192x192.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="256x256" href="{{ asset('logos/256x256.png') }}?v=<?php echo $version ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logos/180x180.png') }}?v=<?php echo $version ?>">

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&amp;family=Manrope:wght@300;400;600;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary": "#ffffff",
                        "surface-variant": "#e4e2e1",
                        "primary-fixed": "#ffe088",
                        "error": "#ba1a1a",
                        "primary": "#735c00",
                        "primary-fixed-dim": "#e9c349",
                        "error-container": "#ffdad6",
                        "on-error": "#ffffff",
                        "on-surface-variant": "#4d4635",
                        "secondary-container": "#e4e2e1",
                        "on-error-container": "#93000a",
                        "on-secondary-fixed": "#1b1c1c",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-fixed": "#00174b",
                        "outline-variant": "#d0c5af",
                        "surface-dim": "#dcd9d9",
                        "on-primary": "#ffffff",
                        "outline": "#7f7663",
                        "on-tertiary-container": "#254188",
                        "surface-container-low": "#f6f3f2",
                        "on-primary-fixed": "#241a00",
                        "on-tertiary": "#ffffff",
                        "surface-container-highest": "#e4e2e1",
                        "secondary": "#5f5e5e",
                        "tertiary-fixed": "#dbe1ff",
                        "surface-tint": "#735c00",
                        "secondary-fixed-dim": "#c8c6c6",
                        "inverse-primary": "#e9c349",
                        "on-secondary-container": "#656464",
                        "primary-container": "#d4af37",
                        "surface-bright": "#fbf9f8",
                        "surface-container-high": "#eae7e7",
                        "surface-container": "#f0eded",
                        "background": "#fbf9f8",
                        "tertiary-container": "#97b0ff",
                        "secondary-fixed": "#e4e2e1",
                        "on-tertiary-fixed-variant": "#27438a",
                        "inverse-on-surface": "#f3f0f0",
                        "tertiary": "#415ba4",
                        "inverse-surface": "#303030",
                        "on-secondary-fixed-variant": "#474747",
                        "on-background": "#1b1c1c",
                        "on-primary-fixed-variant": "#574500",
                        "on-primary-container": "#554300",
                        "tertiary-fixed-dim": "#b4c5ff",
                        "surface": "#fbf9f8",
                        "on-surface": "#1b1c1c"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "fontFamily": {
                        "headline": ["Noto Serif"],
                        "body": ["Manrope"],
                        "label": ["Manrope"]
                    }
                },
            },
        }
    </script>
    <link href="{{asset('css/styles.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <!-- vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>

<body class="bg-surface text-on-surface selection:bg-primary-container selection:text-on-primary-container">
    @if (!isset($hideHeader))
        @include('partials.header')
    @endif
    <main class="space-y-32">
        @yield('content')
    </main>
    @if (!isset($hideHeader))
        @include('partials.footer')
    @endif

    <script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>