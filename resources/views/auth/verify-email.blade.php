@extends('layouts.auth')

@section('title', 'Verify email')

@section('content')
    <div class="mb-8">
        <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-gold-dark dark:text-gold">Email verification</p>
        <h2 class="mt-3 text-3xl font-semibold text-text-primary dark:text-text-primary-dark">Check your inbox</h2>
        <p class="mt-2 text-sm leading-6 text-text-secondary dark:text-text-secondary-dark">
            We’ve sent a verification link to <span class="font-semibold text-text-primary dark:text-text-primary-dark">{{ auth()->user()->email }}</span>. Click it to continue.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-700 dark:border-emerald-500/30 dark:bg-emerald-500/10 dark:text-emerald-300">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif

    <div class="space-y-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-gold px-4 py-3 text-sm font-semibold text-navy transition hover:-translate-y-0.5 hover:shadow-[0_18px_35px_rgba(212,175,55,0.25)] focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 focus:ring-offset-background dark:focus:ring-offset-background-dark">
                Resend verification
            </button>
        </form>

        <div class="grid gap-3 sm:grid-cols-2">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center justify-center rounded-xl border border-border-subtle bg-surface px-4 py-3 text-sm font-medium text-text-primary transition hover:border-gold/50 hover:text-gold dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark">
                Back to login
            </a>
            <a href="{{ url('/') }}" class="flex items-center justify-center rounded-xl border border-border-subtle bg-surface px-4 py-3 text-sm font-medium text-text-primary transition hover:border-gold/50 hover:text-gold dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark">
                Change email
            </a>
        </div>
    </div>

    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
        @csrf
    </form>
@endsection

