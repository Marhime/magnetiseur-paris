@props(['page'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <title>{{ $page['title'] }}</title>

    {{-- SEO --}}
    <meta name="description" content="{{ $page['description'] }}">
    <meta name="keywords" content="{{ $page['keywords'] }}">
    <meta name="author" content="marhi.me">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $page['title'] }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $page['url'] }}">
    <meta property="og:image" content="{{ asset('/images/cabinet-dominique-joyes.jpeg') }}">
    <meta property="og:description" content="{{ $page['description'] }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ $page['domain'] }}">
    <meta property="twitter:url" content="{{ $page['url'] }}">
    <meta name="twitter:title" content="{{ $page['title'] }}">
    <meta name="twitter:description" content="{{ $page['description'] }}">
    <meta name="twitter:image" content="{{ asset('/images/cabinet-dominique-joyes.jpeg') }}">

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('/safari-pinned-tab.svg') }}" color="#000000">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">

        <!-- Page Navigation -->
        @include('layouts.navigation-front')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Page Footer -->
        @include('layouts.footer')

        <button
            class="cursor bg-black text-white px-5 py-3 font-semibold text-md flex gap-2.5 ring-black/30 ring-4 rounded-xl items-center z-20"
            data-cursor>
            <svg class="w-4 text-white block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                    d="M256 0c17.7 0 32 14.3 32 32V66.7C368.4 80.1 431.9 143.6 445.3 224H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H445.3C431.9 368.4 368.4 431.9 288 445.3V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.3C143.6 431.9 80.1 368.4 66.7 288H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H66.7C80.1 143.6 143.6 80.1 224 66.7V32c0-17.7 14.3-32 32-32zM128 256a128 128 0 1 0 256 0 128 128 0 1 0 -256 0zm128-80a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
            </svg>
            Voir sur un plan
        </button>
</body>

</html>
