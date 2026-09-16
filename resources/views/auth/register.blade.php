@extends('layouts.auth')

@section('title', 'Create account')

@section('content')
    <div class="mb-8">
        <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-gold-dark dark:text-gold">Join the community</p>
        <h2 class="mt-3 text-3xl font-semibold text-text-primary dark:text-text-primary-dark">Create your account</h2>
        <p class="mt-2 text-sm leading-6 text-text-secondary dark:text-text-secondary-dark">
            Be part of the Team 0001 network and stay connected with events, activities, and opportunities.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" x-data="{
        loading: false,
        name: '',
        email: '',
        phone: '',
        password: '',
        confirmPassword: '',
        showPassword: false,
        showConfirmPassword: false,
        get passwordValid() { return this.password.length >= 8; },
        get passwordsMatch() { return this.password.length > 0 && this.password === this.confirmPassword; },
        get phoneValid() { return !this.phone || /^[+()0-9\s-]{7,}$/.test(this.phone); }
    }" @submit="loading = true" class="space-y-5"
        novalidate>
        @csrf

        <div>
            <label for="name" class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Full
                Name</label>
            <input id="name" type="text" name="name" x-model="name" value="{{ old('name') }}" required
                autofocus autocomplete="name" placeholder="Your name"
                class="w-full rounded-xl border border-border-subtle bg-surface px-3 py-3 text-sm text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('name') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror">
            @error('name')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email"
                class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Email Address</label>
            <input id="email" type="email" name="email" x-model="email" value="{{ old('email') }}" required
                autocomplete="username" placeholder="you@team0001.com"
                class="w-full rounded-xl border border-border-subtle bg-surface px-3 py-3 text-sm text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('email') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror">
            @error('email')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phone"
                class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Phone Number</label>
            <input id="phone" type="tel" name="phone" x-model="phone" value="{{ old('phone') }}"
                autocomplete="tel" placeholder="+1 555 123 4567"
                class="w-full rounded-xl border border-border-subtle bg-surface px-3 py-3 text-sm text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('phone') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror"
                :class="phone && !phoneValid ?
                    'border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20' : ''">
            <p x-show="phone && !phoneValid" x-cloak class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">Please
                enter a valid phone number.</p>
            @error('phone')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password"
                class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Password</label>
            <div class="relative">
                <input :type="showPassword ? 'text' : 'password'" id="password" name="password" x-model="password" required
                    autocomplete="new-password" placeholder="Create a password"
                    class="w-full rounded-xl border border-border-subtle bg-surface py-3 pr-11 pl-3 text-sm text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('password') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror"
                    :class="password && !passwordValid ?
                        'border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20' : ''">
                <button type="button" @click="showPassword = !showPassword"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-text-secondary transition hover:text-gold dark:text-text-secondary-dark dark:hover:text-gold"
                    aria-label="Toggle password visibility" tabindex="-1">
                    <svg x-show="!showPassword" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <svg x-show="showPassword" x-cloak class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>
            </div>
            <div class="mt-2 h-2 overflow-hidden rounded-full bg-border-subtle dark:bg-border-subtle-dark">
                <div class="h-full rounded-full transition-all duration-300"
                    :style="'width:' + (password.length >= 8 ? 100 : (password.length / 8) * 100) + '%'"
                    :class="password.length >= 8 ? 'bg-emerald-500' : password.length >= 6 ? 'bg-amber-500' : 'bg-red-500'">
                </div>
            </div>
            <div class="mt-3 space-y-1 text-[11px] text-text-secondary dark:text-text-secondary-dark">
                <p :class="password.length >= 8 ? 'text-emerald-600 dark:text-emerald-400' : ''">✓ At least 8 characters</p>
                <p
                    :class="password && confirmPassword && password === confirmPassword ?
                        'text-emerald-600 dark:text-emerald-400' : ''">
                    ✓ Passwords match</p>
            </div>
            @error('password')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation"
                class="mb-1.5 block text-sm font-medium text-text-primary dark:text-text-primary-dark">Confirm
                Password</label>
            <div class="relative">
                <input :type="showConfirmPassword ? 'text' : 'password'" id="password_confirmation"
                    name="password_confirmation" x-model="confirmPassword" required autocomplete="new-password"
                    placeholder="Repeat your password"
                    class="w-full rounded-xl border border-border-subtle bg-surface py-3 pr-11 pl-3 text-sm text-text-primary placeholder:text-text-secondary/60 transition focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/20 dark:border-border-subtle-dark dark:bg-surface-dark dark:text-text-primary-dark dark:placeholder:text-text-secondary-dark/60 @error('password_confirmation') border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20 @enderror"
                    :class="confirmPassword && !passwordsMatch ?
                        'border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20' : ''">
                <button type="button" @click="showConfirmPassword = !showConfirmPassword"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-text-secondary transition hover:text-gold dark:text-text-secondary-dark dark:hover:text-gold"
                    aria-label="Toggle confirm password visibility" tabindex="-1">
                    <svg x-show="!showConfirmPassword" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <svg x-show="showConfirmPassword" x-cloak class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>
            </div>
            <p x-show="confirmPassword && !passwordsMatch" x-cloak
                class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">Passwords do not match.</p>
            @error('password_confirmation')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <label class="flex items-start gap-3 text-sm leading-6 text-text-secondary dark:text-text-secondary-dark">
            <input type="checkbox" name="terms" required
                class="mt-1 h-4 w-4 rounded border-border-subtle text-gold focus:ring-gold dark:border-border-subtle-dark">
            <span>I agree to the <a href="{{ url('/terms') }}"
                    class="font-semibold text-gold-dark hover:text-gold dark:text-gold dark:hover:text-gold/80">Terms of
                    Service</a> and <a href="{{ url('/community-guidelines') }}"
                    class="font-semibold text-gold-dark hover:text-gold dark:text-gold dark:hover:text-gold/80">Team 0001
                    Community Guidelines</a>.</span>
        </label>

        <button type="submit" :disabled="loading"
            class="group flex w-full items-center justify-center gap-2 rounded-xl bg-gold px-4 py-3 text-sm font-semibold text-navy transition hover:-translate-y-0.5 hover:shadow-[0_18px_35px_rgba(212,175,55,0.25)] focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 focus:ring-offset-background disabled:cursor-not-allowed disabled:opacity-70 dark:focus:ring-offset-background-dark">
            <svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"
                aria-hidden="true">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                    stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
            </svg>
            <span x-text="loading ? 'Creating account...' : 'Create Account'">Create Account</span>
        </button>
    </form>

    <div class="mt-6 text-center text-sm text-text-secondary dark:text-text-secondary-dark">
        Already have an account? <a href="{{ route('login') }}"
            class="ml-1 font-semibold text-gold-dark hover:text-gold dark:text-gold dark:hover:text-gold/80">Sign in</a>
    </div>
@endsection
