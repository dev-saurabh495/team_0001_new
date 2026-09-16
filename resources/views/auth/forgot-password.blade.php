@extends('layouts.auth')

@section('title', 'Forgot password')

@section('content')
    <div class="mb-8">
        <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-gold-dark dark:text-gold">Recover access</p>
        <h2 class="mt-3 text-3xl font-semibold text-text-primary dark:text-text-primary-dark">Forgot password?</h2>
        <p class="mt-2 text-sm leading-6 text-text-secondary dark:text-text-secondary-dark">
            Enter the email linked to your Team 0001 account and we’ll send a reset link.
        </p>
    </div>

    @if (session('status'))
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-700 dark:border-emerald-500/30 dark:bg-emerald-500/10 dark:text-emerald-300">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" x-data="{ loading: false }" @submit="loading = true" class="space-y-5" novalidate>
        @csrf

        <div>
            <label for="email" class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="you@team0001.com" class="w-full rounded-xl border border-border-subtle bg-surface py-3 px-3 text-sm text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('email') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror">
            @error('email')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" :disabled="loading" class="group flex w-full items-center justify-center gap-2 rounded-xl bg-gold px-4 py-3 text-sm font-semibold text-navy transition hover:-translate-y-0.5 hover:shadow-[0_18px_35px_rgba(212,175,55,0.25)] focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 focus:ring-offset-background disabled:cursor-not-allowed disabled:opacity-70 dark:focus:ring-offset-background-dark">
            <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/></svg>
            <span x-text="loading ? 'Sending reset link...' : 'Send reset link'">Send reset link</span>
        </button>
    </form>

    <div class="mt-6 text-center text-sm text-text-secondary dark:text-text-secondary-dark">
        Remembered it?
        <a href="{{ route('login') }}" class="ml-1 font-semibold text-gold-dark hover:text-gold dark:text-gold dark:hover:text-gold/80">Back to sign in</a>
    </div>
@endsection

