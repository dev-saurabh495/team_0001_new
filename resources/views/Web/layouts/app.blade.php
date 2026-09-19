<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <meta
        name="description"
        content="@yield(
            'meta_description',
            'Team 0001 — Together. We Create. We Grow.'
        )"
    >

    <title>
        @hasSection('title')
            @yield('title') | Team 0001
        @else
            Team 0001
        @endif
    </title>


    {{-- Favicon --}}
    <link
        rel="icon"
        type="image/jpeg"
        href="{{ asset('images/0001.jpeg') }}"
    >


    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >


    {{-- Main Vite CSS + JS --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body>

    {{-- Header --}}
    @include('Web.components.header')


    {{-- Main Content --}}
    <main id="main-content">
        @yield('content')
    </main>


    {{-- Footer --}}
    @include('Web.components.footer')

</body>

</html>