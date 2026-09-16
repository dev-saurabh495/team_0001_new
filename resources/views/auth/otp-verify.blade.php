@extends('layouts.auth')

@section('title', 'Verify OTP')

@section('content')
    <div class="mb-8">
        <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-gold-dark dark:text-gold">Email verification</p>
        <h2 class="mt-3 text-3xl font-semibold text-text-primary dark:text-text-primary-dark">Enter your OTP</h2>
        <p class="mt-2 text-sm leading-6 text-text-secondary dark:text-text-secondary-dark">
            We’ve sent a 6-digit verification code to your email to complete signup.
        </p>
    </div>

    @if (session('status'))
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-700 dark:border-emerald-500/30 dark:bg-emerald-500/10 dark:text-emerald-300">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('otp.verify.post') }}" x-data="{ loading: false }" @submit="loading = true" class="space-y-5" novalidate>
        @csrf

        <div>
            <label for="email" class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Email address</label>
            <input id="email" type="email" name="email" value="{{ session('otp_email', old('email')) }}" required autocomplete="email" class="w-full rounded-xl border border-border-subtle bg-surface py-3 px-3 text-sm text-text-primary transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark @error('email') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror">
            @error('email')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="otp" class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Verification code</label>
            <input id="otp" type="text" name="otp" inputmode="numeric" pattern="[0-9]*" maxlength="6" required placeholder="123456" class="w-full rounded-xl border border-border-subtle bg-surface py-3 px-3 text-center text-lg font-semibold tracking-[0.45em] text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('otp') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror">
            @error('otp')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" :disabled="loading" class="group flex w-full items-center justify-center gap-2 rounded-xl bg-gold px-4 py-3 text-sm font-semibold text-navy transition hover:-translate-y-0.5 hover:shadow-[0_18px_35px_rgba(212,175,55,0.25)] focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 focus:ring-offset-background disabled:cursor-not-allowed disabled:opacity-70 dark:focus:ring-offset-background-dark">
            <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/></svg>
            <span x-text="loading ? 'Verifying...' : 'Verify account'">Verify account</span>
        </button>
    </form>

    <div class="mt-6 text-center text-sm text-text-secondary dark:text-text-secondary-dark">
        Didn’t receive it?
        <a href="{{ route('register') }}" class="ml-1 font-semibold text-gold-dark hover:text-gold dark:text-gold dark:hover:text-gold/80">Try again</a>
    </div>
@endsection
