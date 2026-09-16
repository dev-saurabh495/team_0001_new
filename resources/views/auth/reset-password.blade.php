@extends('layouts.auth')

@section('title', 'Reset password')

@section('content')
    <div class="mb-8">
        <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-gold-dark dark:text-gold">Security</p>
        <h2 class="mt-3 text-3xl font-semibold text-text-primary dark:text-text-primary-dark">Set a new password</h2>
        <p class="mt-2 text-sm leading-6 text-text-secondary dark:text-text-secondary-dark">
            Choose a fresh password to secure your Team 0001 account.
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" x-data="{ loading: false, password: '', confirmPassword: '', showPassword: false, showConfirm: false }" @submit="loading = true" class="space-y-5" novalidate>
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autocomplete="username" class="w-full rounded-xl border border-border-subtle bg-surface py-3 px-3 text-sm text-text-primary transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark @error('email') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror">
            @error('email')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div x-data="{ show: false }">
            <label for="password" class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">New password</label>
            <div class="relative">
                <input :type="show ? 'text' : 'password'" id="password" name="password" x-model="password" required autocomplete="new-password" placeholder="Enter a new password" class="w-full rounded-xl border border-border-subtle bg-surface py-3 pr-11 pl-3 text-sm text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('password') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror">
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center px-3 text-text-secondary transition hover:text-gold dark:text-text-secondary-dark dark:hover:text-gold" aria-label="Toggle password visibility" tabindex="-1">
                    <svg x-show="!show" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                    <svg x-show="show" x-cloak class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/></svg>
                </button>
            </div>
            <div class="mt-2 h-2 overflow-hidden rounded-full bg-border-subtle dark:bg-border-subtle-dark">
                <div class="h-full rounded-full bg-gold transition-all duration-300" :style="'width:' + ((password.length >= 8 ? 100 : (password.length / 8) * 100)) + '%'" :class="password.length >= 8 ? 'bg-emerald-500' : password.length >= 6 ? 'bg-amber-500' : 'bg-red-500'"></div>
            </div>
            @error('password')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div x-data="{ show: false }">
            <label for="password_confirmation" class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Confirm new password</label>
            <div class="relative">
                <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" x-model="confirmPassword" required autocomplete="new-password" placeholder="Repeat new password" class="w-full rounded-xl border border-border-subtle bg-surface py-3 pr-11 pl-3 text-sm text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('password_confirmation') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror">
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center px-3 text-text-secondary transition hover:text-gold dark:text-text-secondary-dark dark:hover:text-gold" aria-label="Toggle confirm password visibility" tabindex="-1">
                    <svg x-show="!show" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                    <svg x-show="show" x-cloak class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/></svg>
                </button>
            </div>
            @error('password_confirmation')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" :disabled="loading" class="group flex w-full items-center justify-center gap-2 rounded-xl bg-gold px-4 py-3 text-sm font-semibold text-navy transition hover:-translate-y-0.5 hover:shadow-[0_18px_35px_rgba(212,175,55,0.25)] focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 focus:ring-offset-background disabled:cursor-not-allowed disabled:opacity-70 dark:focus:ring-offset-background-dark">
            <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/></svg>
            <span x-text="loading ? 'Updating password...' : 'Reset password'">Reset password</span>
        </button>
    </form>
@endsection

