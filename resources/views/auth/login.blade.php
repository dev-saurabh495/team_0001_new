@extends('layouts.auth')

@section('title', 'Sign In')

@section('content')

{{-- autocomplete off in form  --}}

    <div x-data="{
        loading: false,
        showPassword: false
    }" class="w-full">


        {{-- Header --}}
        <div class="mb-6">
            <div class="flex items-center gap-2">
                <span class="h-px w-7 bg-gold"></span>

                <p class="text-[10px] font-bold uppercase tracking-[0.24em]
                  text-gold-dark dark:text-gold">
                    Welcome back
                </p>
            </div>

            <h2
                class="mt-2 text-2xl font-semibold tracking-tight
               text-text-primary dark:text-text-primary-dark sm:text-3xl">
                Sign in to Team 0001
            </h2>

            <p class="mt-1.5 text-xs leading-5
              text-text-secondary dark:text-text-secondary-dark sm:text-sm">
                Access your member dashboard, community updates, and events.
            </p>
        </div>


        {{-- Session Status --}}
        @if (session('status'))
            <div
                class="mb-4 flex items-start gap-2.5 rounded-xl border
               border-emerald-200 bg-emerald-50 px-3.5 py-3
               text-xs text-emerald-700
               dark:border-emerald-500/30 dark:bg-emerald-500/10
               dark:text-emerald-300">
                <svg class="mt-0.5 h-4 w-4 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586
                               7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>

                <span>{{ session('status') }}</span>
            </div>
        @endif


        {{-- Account Locked --}}
        @if (session('login_locked'))
            <div
                class="mb-4 rounded-xl border border-red-200 bg-red-50 p-3.5
               dark:border-red-500/25 dark:bg-red-500/10">
                <div class="flex items-start gap-3">

                    <div
                        class="flex h-8 w-8 shrink-0 items-center justify-center
                       rounded-lg bg-red-100 text-red-600
                       dark:bg-red-500/15 dark:text-red-400">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            aria-hidden="true">
                            <rect x="4.5" y="10.5" width="15" height="10" rx="2" />
                            <path stroke-linecap="round" d="M8 10.5V7a4 4 0 118 0v3.5" />
                        </svg>
                    </div>

                    <div>
                        <p class="text-xs font-bold text-red-700 dark:text-red-400">
                            Too many failed attempts
                        </p>

                        <p class="mt-0.5 text-[11px] leading-4 text-red-600
                          dark:text-red-400">
                            Login has been temporarily locked for security.
                        </p>

                        @if (session('login_retry_after'))
                            <p
                                class="mt-1.5 text-[11px] font-semibold text-red-700
                               dark:text-red-300">
                                Try again in
                                <span>{{ session('login_retry_after') }}</span>.
                            </p>
                        @endif
                    </div>

                </div>
            </div>
        @endif


        {{-- Login Error --}}
        @if ($errors->any())
            <div
                class="mb-4 rounded-xl border border-red-200 bg-red-50 px-3.5 py-3
               dark:border-red-500/20 dark:bg-red-500/10">
                <div class="flex items-start gap-2.5">

                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-red-500" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path stroke-linecap="round" d="M12 8v4m0 4h.01"></path>
                    </svg>

                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="text-xs font-medium text-red-600
                              dark:text-red-400">
                                {{ $error }}
                            </p>
                        @endforeach
                    </div>

                </div>
            </div>
        @endif


        {{-- Login Form --}}
        <form method="POST" autocomplete="off" action="{{ route('login') }}" @submit="loading = true" class="space-y-4">

            @csrf


            {{-- Email --}}
            <div>
                <label for="email"
                    class="mb-1.5 block text-xs font-semibold
                   text-text-primary dark:text-text-primary-dark">
                    Email Address
                    <span class="text-red-500" style="color: red">*</span>
                </label>

                <div class="relative">

                    <span
                        class="pointer-events-none absolute inset-y-0 left-0
                       flex items-center pl-3.5 text-text-secondary/70
                       dark:text-text-secondary-dark/80">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0-.966.784-1.75 1.75-1.75h16
                                       c.966 0 1.75.784 1.75 1.75v10.5A1.75 1.75
                                       0 0120 19H4a1.75 1.75 0 01-1.75-1.75V6.75Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m3 7 9 6 9-6" />
                        </svg>
                    </span>

                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        autocomplete="username" placeholder="you@example.com"
                        class="w-full rounded-xl border border-border-subtle
                       bg-surface py-2.5 pl-10 pr-3 text-sm
                       text-text-primary
                       placeholder:text-text-secondary/50 transition
                       focus:border-gold focus:outline-none
                       focus:ring-2 focus:ring-gold/20
                       dark:border-border-subtle-dark
                       dark:bg-surface-dark
                       dark:text-text-primary-dark
                       dark:placeholder:text-text-secondary-dark/50
                       @error('email')
                           border-red-400 focus:ring-red-200
                           dark:border-red-500/60
                       @enderror">
                </div>

                @error('email')
                    <p class="mt-1.5 text-[11px] font-medium text-red-600
                      dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- Password --}}
            <div x-data="{ show: false }">

                <div class="mb-1.5 flex items-center justify-between gap-3">

                    <label for="password"
                        class="block text-xs font-semibold
                       text-text-primary dark:text-text-primary-dark">
                        Password
                        <span class="text-red-500" style="color: red">*</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-[11px] font-semibold text-gold-dark
                           transition hover:text-gold
                           dark:text-gold dark:hover:text-gold/80">
                            Forgot password?
                        </a>
                    @endif

                </div>


                <div class="relative">

                    <span
                        class="pointer-events-none absolute inset-y-0 left-0
                       flex items-center pl-3.5 text-text-secondary/70
                       dark:text-text-secondary-dark/80">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75
                                       m-.75 11.25h10.5a2.25 2.25 0 0 0
                                       2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25
                                       H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25
                                       2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </span>


                    <input :type="show ? 'text' : 'password'" id="password" name="password" required
                        autocomplete="current-password" placeholder="••••••••"
                        class="w-full rounded-xl border border-border-subtle
                       bg-surface py-2.5 pl-10 pr-11 text-sm
                       text-text-primary
                       placeholder:text-text-secondary/50 transition
                       focus:border-gold focus:outline-none
                       focus:ring-2 focus:ring-gold/20
                       dark:border-border-subtle-dark
                       dark:bg-surface-dark
                       dark:text-text-primary-dark
                       dark:placeholder:text-text-secondary-dark/50
                       @error('password')
                           border-red-400 focus:ring-red-200
                           dark:border-red-500/60
                       @enderror">


                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 flex items-center
                       px-3 text-text-secondary transition
                       hover:text-gold dark:text-text-secondary-dark
                       dark:hover:text-gold"
                        :aria-label="show ? 'Hide password' : 'Show password'">

                        {{-- Eye --}}
                        <svg x-show="!show" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639
                                       C3.423 7.51 7.36 4.5 12 4.5
                                       c4.638 0 8.573 3.007 9.963 7.178
                                       .07.207.07.431 0 .639
                                       C20.577 16.49 16.64 19.5 12 19.5
                                       c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>


                        {{-- Eye Off --}}
                        <svg x-show="show" x-cloak class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0
                                       1.934 12C3.226 16.338 7.244 19.5
                                       12 19.5c.993 0 1.953-.138 2.863-.395
                                       M6.228 6.228A10.45 10.45 0 0 1
                                       12 4.5c4.756 0 8.773 3.162
                                       10.065 7.498a10.523 10.523 0 0 1
                                       -4.293 5.774
                                       M6.228 6.228 3 3" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.65 14.65 3.12 3.12M9.88 9.88
                                       6.228 6.228" />
                        </svg>

                    </button>

                </div>

                @error('password')
                    <p class="mt-1.5 text-[11px] font-medium text-red-600
                      dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Remember Me --}}
            <div class="flex items-center justify-between">

                <label
                    class="flex cursor-pointer items-center gap-2 text-xs
                   text-text-secondary dark:text-text-secondary-dark">
                    <input type="checkbox" name="remember"
                        class="h-4 w-4 rounded border-border-subtle
                       text-gold focus:ring-gold
                       dark:border-border-subtle-dark">

                    Remember me
                </label>


                {{-- Attempt Counter --}}
                @if (session('login_attempts'))
                    <span
                        class="text-[10px] font-medium text-text-secondary
                       dark:text-text-secondary-dark">
                        Attempt
                        <strong class="text-text-primary dark:text-text-primary-dark">
                            {{ session('login_attempts') }}
                        </strong>
                        / 5
                    </span>
                @endif

            </div>


            {{-- Login Button --}}
            <button type="submit" :disabled="loading"
                class="group flex w-full items-center justify-center gap-2
               rounded-xl bg-gold px-4 py-3 text-sm font-bold text-navy
               transition duration-200
               hover:-translate-y-0.5
               hover:shadow-[0_16px_30px_rgba(212,175,55,0.22)]
               focus:outline-none focus:ring-2 focus:ring-gold
               focus:ring-offset-2 focus:ring-offset-background
               disabled:cursor-not-allowed disabled:opacity-70
               dark:focus:ring-offset-background-dark">

                <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"
                    aria-hidden="true">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4" />

                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 0 0-4 4H4z" />
                </svg>


                <span x-text="loading ? 'Signing in...' : 'Sign in'">
                    Sign in
                </span>


                <svg x-show="!loading" class="h-4 w-4 transition-transform
                   group-hover:translate-x-0.5"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />

                    <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
                </svg>

            </button>

        </form>


        {{-- Divider --}}
        <div
            class="mt-6 flex items-center gap-3 text-[9px] font-semibold
           uppercase tracking-[0.24em] text-text-secondary/60
           dark:text-text-secondary-dark/60">
            <span class="h-px flex-1 bg-border-subtle dark:bg-border-subtle-dark"></span>

            <span>Team 0001</span>

            <span class="h-px flex-1 bg-border-subtle dark:bg-border-subtle-dark"></span>
        </div>


        {{-- Register --}}
        <div class="mt-4 text-center text-xs text-text-secondary
           dark:text-text-secondary-dark">
            New here?

            <a href="{{ route('register') }}"
                class="ml-1 font-semibold text-gold-dark transition
               hover:text-gold dark:text-gold
               dark:hover:text-gold/80">
                Create an account
            </a>
        </div>


    </div>

@endsection
