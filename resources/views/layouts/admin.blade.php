<!DOCTYPE html>
<html lang="en" x-data="{
    dark: localStorage.getItem('team0001-theme') === 'dark' ||
        (!localStorage.getItem('team0001-theme') &&
            window.matchMedia('(prefers-color-scheme: dark)').matches),
    sidebarOpen: false
}" x-init="$watch('dark', val => localStorage.setItem('team0001-theme', val ? 'dark' : 'light'))" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard') | Team 0001</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Cinzel:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-background text-text-primary transition-colors duration-300 dark:bg-background-dark dark:text-text-primary-dark">

    <div class="flex min-h-screen overflow-hidden">

        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-black/50 lg:hidden">
        </div>

        <aside
            class="fixed inset-y-0 left-0 z-50 flex w-72 flex-shrink-0 -translate-x-full flex-col border-r border-border-subtle bg-navy text-white transition-transform duration-300 dark:border-border-subtle-dark lg:static lg:translate-x-0"
            :class="{ 'translate-x-0': sidebarOpen }">

            <div class="flex items-center justify-between border-b border-white/10 px-5 py-5">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Team 0001 logo" class="h-10 w-10 object-contain">

                    <div>
                        <div class="font-heading text-lg tracking-[0.2em]">
                            TEAM <span class="text-gold">0001</span>
                        </div>

                        <div class="text-[10px] uppercase tracking-[0.2em] text-slate-300">
                            {{ auth()->user()->getRoleNames()->first() ?? 'Member' }}
                        </div>
                    </div>
                </a>

                <button type="button" @click="sidebarOpen = false"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-300 hover:bg-white/5 hover:text-white lg:hidden"
                    aria-label="Close sidebar">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>
            </div>

            <nav class="flex-1 space-y-6 overflow-y-auto p-4 text-sm">

                <div>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 rounded-xl px-3 py-2.5 font-medium text-white/90 transition hover:bg-white/5 hover:text-white {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : '' }}">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <rect x="3" y="3" width="7" height="7" rx="1" />
                            <rect x="14" y="3" width="7" height="7" rx="1" />
                            <rect x="3" y="14" width="7" height="7" rx="1" />
                            <rect x="14" y="14" width="7" height="7" rx="1" />
                        </svg>

                        Dashboard
                    </a>
                </div>

                @if (auth()->user()->can('manage-news') || auth()->user()->can('manage-events') || auth()->user()->can('manage-gallery'))
                    <div>
                        <p class="px-3 pb-2 text-[10px] font-semibold uppercase tracking-[0.26em] text-slate-400">
                            Content
                        </p>

                        <div class="space-y-1">

                            @can('manage-news')
                                <a href="#"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/5 hover:text-white">
                                    News
                                </a>
                            @endcan

                            @can('manage-events')
                                <a href="#"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/5 hover:text-white">
                                    Events
                                </a>
                            @endcan

                            @can('manage-gallery')
                                <a href="#"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/5 hover:text-white">
                                    Gallery
                                </a>
                            @endcan

                        </div>
                    </div>
                @endif

                @if (auth()->user()->can('manage-members'))
                    <div>
                        <p class="px-3 pb-2 text-[10px] font-semibold uppercase tracking-[0.26em] text-slate-400">
                            Community
                        </p>

                        <div class="space-y-1">

                            @can('manage-members')
                                <a href="#"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/5 hover:text-white">
                                    Members
                                </a>
                            @endcan

                        </div>
                    </div>
                @endif

                @if (auth()->user()->can('manage-messages'))
                    <div>
                        <p class="px-3 pb-2 text-[10px] font-semibold uppercase tracking-[0.26em] text-slate-400">
                            Communication
                        </p>

                        <div class="space-y-1">

                            @can('manage-messages')
                                <a href="#"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/5 hover:text-white">
                                    Messages
                                </a>
                            @endcan

                        </div>
                    </div>
                @endif

                @if (auth()->user()->can('manage-users') || auth()->user()->can('manage-roles'))
                    <div>
                        <p class="px-3 pb-2 text-[10px] font-semibold uppercase tracking-[0.26em] text-slate-400">
                            Access Control
                        </p>

                        <div class="space-y-1">

                            @can('manage-users')
                                <a href="#"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/5 hover:text-white">
                                    Users
                                </a>
                            @endcan

                            @can('manage-roles')
                                <a href="#"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/5 hover:text-white">
                                    Roles
                                </a>
                            @endcan

                            @role('super-admin')
                                <a href="#"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/5 hover:text-white">
                                    Permissions
                                </a>
                            @endrole

                        </div>
                    </div>
                @endif

                @role('super-admin')
                    <div>
                        <p class="px-3 pb-2 text-[10px] font-semibold uppercase tracking-[0.26em] text-slate-400">
                            System
                        </p>

                        <div class="space-y-1">

                            @can('manage-settings')
                                <a href="#"
                                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/5 hover:text-white">
                                    Settings
                                </a>
                            @endcan

                            <a href="#"
                                class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/5 hover:text-white">
                                Activity Logs
                            </a>

                        </div>
                    </div>
                @endrole

            </nav>

            <div class="border-t border-white/10 p-4">
                <div class="rounded-xl bg-white/5 p-3">
                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-gold/10 font-semibold text-gold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <div class="min-w-0">
                            <p class="truncate text-sm font-medium text-white">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="truncate text-xs text-slate-400">
                                {{ auth()->user()->email }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </aside>

        <div class="flex min-h-screen flex-1 flex-col">

            <header
                class="flex items-center justify-between border-b border-border-subtle bg-surface/80 px-4 py-4 backdrop-blur dark:border-border-subtle-dark dark:bg-surface-dark/80 sm:px-6">

                <div class="flex items-center gap-3">

                    <button type="button" @click="sidebarOpen = true"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-border-subtle bg-surface text-text-primary dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark lg:hidden"
                        aria-label="Open sidebar">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                    <div class="hidden lg:block">
                        <h1 class="text-xl font-semibold text-text-primary dark:text-text-primary-dark">
                            @yield('page-title', 'Dashboard')
                        </h1>
                    </div>

                    <div class="lg:hidden">
                        <div class="font-heading text-base tracking-[0.18em]">
                            TEAM <span class="text-gold">0001</span>
                        </div>
                    </div>

                </div>

                <div class="flex items-center gap-3">

                    <button type="button" @click="dark = !dark" aria-label="Toggle theme"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-border-subtle bg-surface text-gold transition hover:border-gold/60 dark:border-border-subtle-dark dark:bg-surface-dark">
                        <svg x-show="!dark" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1-7.5 0Z" />
                        </svg>

                        <svg x-show="dark" x-cloak class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                        </svg>
                    </button>

                    <div
                        class="hidden rounded-full border border-border-subtle bg-surface px-3 py-2 text-sm capitalize text-text-secondary dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-secondary-dark sm:block">
                        {{ auth()->user()->getRoleNames()->first() ?? 'Member' }}
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm font-medium text-red-600 transition hover:bg-red-100 dark:border-red-500/30 dark:bg-red-500/10 dark:text-red-300">
                            Logout
                        </button>
                    </form>

                </div>

            </header>

            <main class="flex-1 overflow-y-auto p-4 sm:p-6">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>
