<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ theme: localStorage.getItem('team0001-theme') || 'system', systemDark: window.matchMedia('(prefers-color-scheme: dark)').matches, get darkMode() { return this.theme === 'dark' || (this.theme === 'system' && this.systemDark); } }"
    x-init="const media = window.matchMedia('(prefers-color-scheme: dark)'); const sync = () => { systemDark = media.matches; }; media.addEventListener ? media.addEventListener('change', sync) : media.addListener(sync); $watch('theme', value => localStorage.setItem('team0001-theme', value)); sync();"
    :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') | Team 0001</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cinzel:wght@400;600;700&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-background text-text-primary transition-colors duration-300 dark:bg-background-dark dark:text-text-primary-dark">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <main class="lg:pl-72">
            <div class="mx-auto max-w-[1600px] px-4 py-5 sm:px-6 lg:px-10 lg:py-8">
                @isset($header)
                    <div class="mb-7">{{ $header }}</div>
                @endisset
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
