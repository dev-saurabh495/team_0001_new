@extends('layouts.auth')

@section('title', 'Sign In')

@section('content')
    <div class="mb-8">
        <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-gold-dark dark:text-gold">Welcome back</p>
        <h2 class="mt-3 text-3xl font-semibold text-text-primary dark:text-text-primary-dark">Sign in to Team 0001</h2>
        <p class="mt-2 text-sm leading-6 text-text-secondary dark:text-text-secondary-dark">
            Access your member dashboard, community updates, and events.
        </p>
    </div>

    @if (session('status'))
        <div
            class="mb-5 flex items-center gap-2 rounded-xl border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-700 dark:border-emerald-500/30 dark:bg-emerald-500/10 dark:text-emerald-300">
            <svg class="h-4 w-4 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" x-data="{ loading: false }" @submit="loading = true" class="space-y-5"
        novalidate>
        @csrf

        <div>
            <label for="email"
                class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Email address</label>
            <div class="relative">
                <span
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-text-secondary/70 dark:text-text-secondary-dark/80">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0-.966.784-1.75 1.75-1.75h16c.966 0 1.75.784 1.75 1.75v10.5A1.75 1.75 0 0 1 20 19H4a1.75 1.75 0 0 1-1.75-1.75V6.75Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="m3 7 9 6 9-6" />
                    </svg>
                </span>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    autocomplete="username" placeholder="you@team0001.com"
                    class="w-full rounded-xl border border-border-subtle bg-surface py-3 pl-10 pr-3 text-sm text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('email') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror">
            </div>
            @error('email')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div x-data="{ show: false }">
            <div class="mb-1.5 flex items-center justify-between gap-3">
                <label for="password"
                    class="block text-sm font-medium text-text-primary dark:text-text-primary-dark">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-xs font-medium text-gold-dark hover:text-gold dark:text-gold dark:hover:text-gold/80">Forgot
                        password?</a>
                @endif
            </div>

            <div class="relative">
                <span
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-text-secondary/70 dark:text-text-secondary-dark/80">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                </span>
                <input :type="show ? 'text' : 'password'" id="password" name="password" required
                    autocomplete="current-password" placeholder="••••••••"
                    class="w-full rounded-xl border border-border-subtle bg-surface py-3 pl-10 pr-11 text-sm text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('password') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror">
                <button type="button" @click="show = !show"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-text-secondary transition hover:text-gold dark:text-text-secondary-dark dark:hover:text-gold"
                    aria-label="Toggle password visibility" tabindex="-1">
                    <svg x-show="!show" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <svg x-show="show" x-cloak class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>
            </div>
            @error('password')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <label class="flex items-center gap-2 text-sm text-text-secondary dark:text-text-secondary-dark">
            <input type="checkbox" name="remember"
                class="h-4 w-4 rounded border-border-subtle text-gold focus:ring-gold dark:border-border-subtle-dark">
            Remember me
        </label>

        <button type="submit" :disabled="loading"
            class="group flex w-full items-center justify-center gap-2 rounded-xl bg-gold px-4 py-3 text-sm font-semibold text-navy transition hover:-translate-y-0.5 hover:shadow-[0_18px_35px_rgba(212,175,55,0.25)] focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 focus:ring-offset-background disabled:cursor-not-allowed disabled:opacity-70 dark:focus:ring-offset-background-dark">
            <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"
                aria-hidden="true">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
            </svg>
            <span x-text="loading ? 'Signing in...' : 'Sign in'">Sign in</span>
            <svg x-show="!loading" class="h-4 w-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </button>
    </form>

    <div
        class="mt-8 flex items-center gap-3 text-xs uppercase tracking-[0.24em] text-text-secondary/70 dark:text-text-secondary-dark/70">
        <span class="h-px flex-1 bg-border-subtle dark:bg-border-subtle-dark"></span>
        <span>Team 0001</span>
        <span class="h-px flex-1 bg-border-subtle dark:bg-border-subtle-dark"></span>
    </div>

    <div class="mt-6 text-center text-sm text-text-secondary dark:text-text-secondary-dark">
        New here?
        <a href="{{ route('register') }}"
            class="ml-1 font-semibold text-gold-dark hover:text-gold dark:text-gold dark:hover:text-gold/80">Create an
            account</a>
    </div>
@endsection
