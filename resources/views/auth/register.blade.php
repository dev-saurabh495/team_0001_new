@extends('layouts.auth')

@section('title', 'Create account')

@section('content')

    <div x-data="{
        loading: false,
    
        name: @js(old('name', '')),
        email: @js(old('email', '')),
        phone: @js(old('phone', '')),
    
        password: '',
        confirmPassword: '',
    
        showPassword: false,
        showConfirmPassword: false,
    
        get passwordValid() {
            return this.password.length >= 8;
        },
    
        get passwordsMatch() {
            return this.password.length > 0 &&
                this.password === this.confirmPassword;
        },
    
        get phoneValid() {
            return !this.phone || /^[+()0-9\s-]{7,}$/.test(this.phone);
        }
    }" class="w-full">

        {{-- Header --}}
        <div class="mb-6">
            <div class="flex items-center gap-2">
                <span class="h-px w-7 bg-gold"></span>

                <p
                    class="text-[10px] font-bold uppercase tracking-[0.24em]
                      text-gold-dark dark:text-gold">
                    Join the community
                </p>
            </div>

            <h2
                class="mt-2 text-2xl font-semibold tracking-tight
                   text-text-primary dark:text-text-primary-dark sm:text-3xl">
                Create your account
            </h2>

            <p
                class="mt-1.5 max-w-xl text-xs leading-5
                  text-text-secondary dark:text-text-secondary-dark sm:text-sm">
                Be part of the Team 0001 network and stay connected with
                events, activities, and opportunities.
            </p>
        </div>


        {{-- Registration Form --}}
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" @submit="loading = true"
            class="space-y-5">

            @csrf

            {{-- Validation Summary --}}
            @if ($errors->any())
                <div
                    class="rounded-xl border border-red-200 bg-red-50 px-4 py-3
                       dark:border-red-500/20 dark:bg-red-500/10">
                    <div class="flex gap-3">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-red-500" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <circle cx="12" cy="12" r="9"></circle>
                            <path stroke-linecap="round" d="M12 8v4m0 4h.01"></path>
                        </svg>

                        <div>
                            <p class="text-xs font-semibold text-red-700 dark:text-red-400">
                                Please check the highlighted fields.
                            </p>

                            <p class="mt-0.5 text-[11px] text-red-600 dark:text-red-400">
                                Some information needs to be corrected before continuing.
                            </p>
                        </div>
                    </div>
                </div>
            @endif


            {{-- Main Form Grid --}}
            <div class="grid gap-5 lg:grid-cols-2 lg:items-start">

                {{-- =========================================================
                 LEFT COLUMN — BASIC INFORMATION
            ========================================================== --}}
                <div
                    class="rounded-2xl border border-border-subtle bg-surface/70 p-4
                       shadow-sm dark:border-border-subtle-dark dark:bg-surface-dark/70
                       sm:p-5">

                    {{-- Section Header --}}
                    <div class="mb-4 flex items-center gap-3">
                        <div
                            class="flex h-9 w-9 shrink-0 items-center justify-center
                               rounded-xl bg-gold/10 text-gold-dark dark:text-gold">
                            <svg class="h-4.5 w-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0
                                       3.75 3.75 0 0 1 7.5 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 20.25a7.5 7.5 0 0 1 15 0" />
                            </svg>
                        </div>

                        <div>
                            <h3
                                class="text-sm font-semibold text-text-primary
                                   dark:text-text-primary-dark">
                                Personal information
                            </h3>

                            <p
                                class="text-[11px] text-text-secondary
                                  dark:text-text-secondary-dark">
                                Tell us a little about yourself.
                            </p>
                        </div>
                    </div>


                    {{-- Name --}}
                    <div>
                        <label for="name"
                            class="mb-1.5 block text-xs font-semibold
                               text-text-primary dark:text-text-primary-dark">
                            Full Name
                            <span class="text-red-500">*</span>
                        </label>

                        <input id="name" type="text" name="name" x-model="name" value="{{ old('name') }}"
                            required autofocus autocomplete="name" placeholder="Your full name"
                            class="w-full rounded-xl border border-border-subtle
                               bg-surface px-3 py-2.5 text-sm text-text-primary
                               placeholder:text-text-secondary/50 transition
                               focus:border-gold focus:outline-none
                               focus:ring-2 focus:ring-gold/20
                               dark:border-border-subtle-dark
                               dark:bg-surface-dark
                               dark:text-text-primary-dark
                               dark:placeholder:text-text-secondary-dark/50
                               @error('name')
                                   border-red-400 focus:ring-red-200
                                   dark:border-red-500/60
                                   dark:focus:ring-red-500/20
                               @enderror">

                        @error('name')
                            <p
                                class="mt-1.5 text-[11px] font-medium text-red-600
                                  dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Email --}}
                    <div class="mt-4">
                        <label for="email"
                            class="mb-1.5 block text-xs font-semibold
                               text-text-primary dark:text-text-primary-dark">
                            Email Address
                            <span class="text-red-500">*</span>
                        </label>

                        <input id="email" type="email" name="email" x-model="email" value="{{ old('email') }}"
                            required autocomplete="username" placeholder="you@example.com"
                            class="w-full rounded-xl border border-border-subtle
                               bg-surface px-3 py-2.5 text-sm text-text-primary
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
                                   dark:focus:ring-red-500/20
                               @enderror">

                        @error('email')
                            <p
                                class="mt-1.5 text-[11px] font-medium text-red-600
                                  dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Phone --}}
                    <div class="mt-4">
                        <label for="phone"
                            class="mb-1.5 block text-xs font-semibold
                               text-text-primary dark:text-text-primary-dark">
                            Phone Number
                            <span
                                class="text-[10px] font-normal text-text-secondary
                                     dark:text-text-secondary-dark">
                                (Optional)
                            </span>
                        </label>

                        <input id="phone" type="tel" name="phone" x-model="phone" value="{{ old('phone') }}"
                            autocomplete="tel" inputmode="tel" placeholder="Enter your phone number"
                            :class="phone && !phoneValid ?
                                'border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20' :
                                ''"
                            class="w-full rounded-xl border border-border-subtle
                               bg-surface px-3 py-2.5 text-sm text-text-primary
                               placeholder:text-text-secondary/50 transition
                               focus:border-gold focus:outline-none
                               focus:ring-2 focus:ring-gold/20
                               dark:border-border-subtle-dark
                               dark:bg-surface-dark
                               dark:text-text-primary-dark
                               dark:placeholder:text-text-secondary-dark/50
                               @error('phone')
                                   border-red-400 focus:ring-red-200
                                   dark:border-red-500/60
                                   dark:focus:ring-red-500/20
                               @enderror">

                        <p x-show="phone && !phoneValid" x-cloak
                            class="mt-1.5 text-[11px] font-medium text-red-600
                               dark:text-red-400">
                            Please enter a valid phone number.
                        </p>

                        @error('phone')
                            <p
                                class="mt-1.5 text-[11px] font-medium text-red-600
                                  dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Profile Picture --}}
                    <div x-data="{
                        preview: null,
                    
                        handleFile(event) {
                            const file = event.target.files[0];
                    
                            if (!file) {
                                this.preview = null;
                                return;
                            }
                    
                            if (file.size > 2 * 1024 * 1024) {
                                alert('Profile picture must be less than 2MB.');
                                event.target.value = '';
                                this.preview = null;
                                return;
                            }
                    
                            this.preview = URL.createObjectURL(file);
                        },
                    
                        removeFile() {
                            this.preview = null;
                            this.$refs.profilePicture.value = '';
                        }
                    }" class="mt-4">

                        <div class="mb-1.5 flex items-center justify-between">
                            <label for="profile_picture"
                                class="block text-xs font-semibold
                                   text-text-primary dark:text-text-primary-dark">
                                Profile Picture
                            </label>

                            <span
                                class="text-[10px] text-text-secondary
                                     dark:text-text-secondary-dark">
                                Optional
                            </span>
                        </div>


                        <div
                            class="flex items-center gap-3 rounded-xl border
                               border-border-subtle bg-background/50 p-3
                               dark:border-border-subtle-dark
                               dark:bg-background-dark/40">

                            {{-- Avatar --}}
                            <div class="relative shrink-0">
                                <div
                                    class="h-16 w-16 overflow-hidden rounded-full
                                       border-2 border-gold/40 bg-surface
                                       shadow-sm dark:bg-surface-dark">

                                    <template x-if="preview">
                                        <img :src="preview" alt="Profile preview"
                                            class="h-full w-full object-cover">
                                    </template>

                                    <template x-if="!preview">
                                        <div
                                            class="flex h-full w-full items-center
                                               justify-center text-text-secondary
                                               dark:text-text-secondary-dark">
                                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0
                                                       3.75 3.75 0 0 1 7.5 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                            </svg>
                                        </div>
                                    </template>
                                </div>


                                {{-- Camera Badge --}}
                                <label for="profile_picture"
                                    class="absolute bottom-0 right-0 flex h-6 w-6
                                       cursor-pointer items-center justify-center
                                       rounded-full border-2 border-surface
                                       bg-gold text-navy shadow-sm transition
                                       hover:scale-105 hover:shadow-md
                                       dark:border-surface-dark"
                                    aria-label="Choose profile picture">
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5h1.5l1-1.5h5.5l1 1.5h1.5
                                               A2.25 2.25 0 0 1 19.5 9.75v7.5
                                               A2.25 2.25 0 0 1 17.25 19.5H6.75
                                               A2.25 2.25 0 0 1 4.5 17.25v-7.5
                                               A2.25 2.25 0 0 1 6.75 7.5Z" />
                                        <circle cx="12" cy="13.5" r="3" />
                                    </svg>
                                </label>
                            </div>


                            {{-- Upload Content --}}
                            <div class="min-w-0 flex-1">
                                <p
                                    class="text-xs font-semibold text-text-primary
                                      dark:text-text-primary-dark">
                                    Add your profile photo
                                </p>

                                <p
                                    class="mt-0.5 text-[10px] leading-4
                                      text-text-secondary
                                      dark:text-text-secondary-dark">
                                    Use a clear photo so members can recognize you.
                                </p>

                                <div class="mt-2 flex flex-wrap items-center gap-2">

                                    <label for="profile_picture"
                                        class="inline-flex cursor-pointer items-center
                                           gap-1.5 rounded-lg border
                                           border-border-subtle bg-surface px-2.5
                                           py-1.5 text-[10px] font-semibold
                                           text-text-primary transition
                                           hover:border-gold hover:text-gold
                                           dark:border-border-subtle-dark
                                           dark:bg-surface-dark
                                           dark:text-text-primary-dark">
                                        <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.8" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V3.75m0 0L7.5 8.25
                                                   M12 3.75l4.5 4.5" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 13.5v4.125A2.625 2.625 0 0 0
                                                   7.875 20.25h8.25a2.625 2.625 0 0 0
                                                   2.625-2.625V13.5" />
                                        </svg>

                                        Choose Photo
                                    </label>


                                    <button type="button" x-show="preview" x-cloak @click="removeFile"
                                        class="inline-flex items-center rounded-lg
                                           px-2 py-1.5 text-[10px] font-medium
                                           text-red-600 transition
                                           hover:bg-red-50
                                           dark:text-red-400
                                           dark:hover:bg-red-500/10">
                                        Remove
                                    </button>
                                </div>

                                <p
                                    class="mt-1.5 text-[9px] text-text-secondary
                                      dark:text-text-secondary-dark">
                                    JPG, PNG or WEBP · Maximum 2MB
                                </p>
                            </div>
                        </div>


                        <input x-ref="profilePicture" id="profile_picture" type="file" name="profile_picture"
                            accept="image/jpeg,image/png,image/webp" class="hidden" @change="handleFile">

                        @error('profile_picture')
                            <p
                                class="mt-1.5 text-[11px] font-medium text-red-600
                                  dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>


                {{-- =========================================================
                 RIGHT COLUMN — SECURITY
            ========================================================== --}}
                <div
                    class="rounded-2xl border border-border-subtle bg-surface/70 p-4
                       shadow-sm dark:border-border-subtle-dark
                       dark:bg-surface-dark/70 sm:p-5">

                    {{-- Section Header --}}
                    <div class="mb-4 flex items-center gap-3">
                        <div
                            class="flex h-9 w-9 shrink-0 items-center justify-center
                               rounded-xl bg-gold/10 text-gold-dark
                               dark:text-gold">
                            <svg class="h-4.5 w-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75" />
                                <rect x="4.5" y="10.5" width="15" height="10.5" rx="2.25" />
                                <path stroke-linecap="round" d="M12 14.25v3" />
                            </svg>
                        </div>

                        <div>
                            <h3
                                class="text-sm font-semibold text-text-primary
                                   dark:text-text-primary-dark">
                                Account security
                            </h3>

                            <p
                                class="text-[11px] text-text-secondary
                                  dark:text-text-secondary-dark">
                                Keep your account protected.
                            </p>
                        </div>
                    </div>


                    {{-- Password --}}
                    <div>
                        <label for="password"
                            class="mb-1.5 block text-xs font-semibold
                               text-text-primary dark:text-text-primary-dark">
                            Password
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                                x-model="password" required minlength="8" autocomplete="new-password"
                                placeholder="Create a password"
                                :class="password && !passwordValid ?
                                    'border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20' :
                                    ''"
                                class="w-full rounded-xl border border-border-subtle
                                   bg-surface py-2.5 pl-3 pr-10 text-sm
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
                                       dark:focus:ring-red-500/20
                                   @enderror">

                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 flex items-center
                                   px-3 text-text-secondary transition
                                   hover:text-gold
                                   dark:text-text-secondary-dark
                                   dark:hover:text-gold"
                                aria-label="Toggle password visibility">
                                <svg x-show="!showPassword" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639
                                           C3.423 7.51 7.36 4.5 12 4.5
                                           c4.638 0 8.573 3.007 9.963 7.178
                                           .07.207.07.431 0 .639
                                           C20.577 16.49 16.64 19.5 12 19.5
                                           c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                                <svg x-show="showPassword" x-cloak class="h-4 w-4" viewBox="0 0 24 24" fill="none"
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


                        {{-- Password Strength --}}
                        <div
                            class="mt-2 h-1.5 overflow-hidden rounded-full
                               bg-border-subtle dark:bg-border-subtle-dark">
                            <div class="h-full rounded-full transition-all duration-300"
                                :style="'width:' +
                                Math.min((password.length / 8) * 100, 100) +
                                    '%'"
                                :class="password.length >= 8 ?
                                    'bg-emerald-500' :
                                    password.length >= 6 ?
                                    'bg-amber-500' :
                                    'bg-red-500'">
                            </div>
                        </div>

                        <div class="mt-2 flex items-center justify-between gap-3">
                            <p :class="password.length >= 8 ?
                                'text-emerald-600 dark:text-emerald-400' :
                                'text-text-secondary dark:text-text-secondary-dark'"
                                class="text-[10px]">
                                <span x-show="password.length >= 8">✓ </span>
                                Minimum 8 characters
                            </p>

                            <p x-show="password" class="text-[10px]"
                                :class="passwordValid
                                    ?
                                    'text-emerald-600 dark:text-emerald-400' :
                                    'text-text-secondary dark:text-text-secondary-dark'">
                                <span x-text="password.length"></span>/8+
                            </p>
                        </div>

                        @error('password')
                            <p
                                class="mt-1.5 text-[11px] font-medium text-red-600
                                  dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Confirm Password --}}
                    <div class="mt-4">
                        <label for="password_confirmation"
                            class="mb-1.5 block text-xs font-semibold
                               text-text-primary dark:text-text-primary-dark">
                            Confirm Password
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <input :type="showConfirmPassword ? 'text' : 'password'" id="password_confirmation"
                                name="password_confirmation" x-model="confirmPassword" required
                                autocomplete="new-password" placeholder="Repeat your password"
                                :class="confirmPassword && !passwordsMatch ?
                                    'border-red-400 focus:ring-red-200 dark:border-red-500/60 dark:focus:ring-red-500/20' :
                                    ''"
                                class="w-full rounded-xl border border-border-subtle
                                   bg-surface py-2.5 pl-3 pr-10 text-sm
                                   text-text-primary
                                   placeholder:text-text-secondary/50 transition
                                   focus:border-gold focus:outline-none
                                   focus:ring-2 focus:ring-gold/20
                                   dark:border-border-subtle-dark
                                   dark:bg-surface-dark
                                   dark:text-text-primary-dark
                                   dark:placeholder:text-text-secondary-dark/50
                                   @error('password_confirmation')
                                       border-red-400 focus:ring-red-200
                                       dark:border-red-500/60
                                       dark:focus:ring-red-500/20
                                   @enderror">

                            <button type="button" @click="showConfirmPassword = !showConfirmPassword"
                                class="absolute inset-y-0 right-0 flex items-center
                                   px-3 text-text-secondary transition
                                   hover:text-gold
                                   dark:text-text-secondary-dark
                                   dark:hover:text-gold"
                                aria-label="Toggle confirm password visibility">
                                <svg x-show="!showConfirmPassword" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639
                                           C3.423 7.51 7.36 4.5 12 4.5
                                           c4.638 0 8.573 3.007 9.963 7.178
                                           .07.207.07.431 0 .639
                                           C20.577 16.49 16.64 19.5 12 19.5
                                           c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                                <svg x-show="showConfirmPassword" x-cloak class="h-4 w-4" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
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

                        <p x-show="confirmPassword && !passwordsMatch" x-cloak
                            class="mt-1.5 text-[11px] font-medium text-red-600
                               dark:text-red-400">
                            Passwords do not match.
                        </p>

                        <p x-show="confirmPassword && passwordsMatch" x-cloak
                            class="mt-1.5 text-[11px] font-medium text-emerald-600
                               dark:text-emerald-400">
                            ✓ Passwords match
                        </p>

                        @error('password_confirmation')
                            <p
                                class="mt-1.5 text-[11px] font-medium text-red-600
                                  dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Security Note --}}
                    <div
                        class="mt-4 flex gap-2.5 rounded-xl border
                           border-gold/15 bg-gold/5 px-3 py-2.5">
                        <svg class="mt-0.5 h-3.5 w-3.5 shrink-0 text-gold-dark
                               dark:text-gold"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3 5.25 6v5.25c0 4.15 2.85 7.95
                                   6.75 9.75 3.9-1.8 6.75-5.6 6.75-9.75V6L12 3Z" />
                            <path stroke-linecap="round" d="m9.5 12 1.6 1.6 3.4-3.4" />
                        </svg>

                        <p
                            class="text-[10px] leading-4 text-text-secondary
                              dark:text-text-secondary-dark">
                            Your password is securely hashed and never stored
                            in plain text.
                        </p>
                    </div>

                </div>

            </div>


            {{-- =============================================================
             TERMS + SUBMIT
        ============================================================== --}}
            <div
                class="rounded-2xl border border-border-subtle bg-surface/50 p-4
                   dark:border-border-subtle-dark dark:bg-surface-dark/50">

                <label
                    class="flex items-start gap-3 text-xs leading-5
                       text-text-secondary dark:text-text-secondary-dark">
                    <input type="checkbox" name="terms" value="1" required @checked(old('terms'))
                        class="mt-0.5 h-4 w-4 shrink-0 rounded border-border-subtle
                           text-gold focus:ring-gold
                           dark:border-border-subtle-dark
                           @error('terms')
                               border-red-500 ring-1 ring-red-500
                           @enderror">

                    <span>
                        I agree to the
                        <a href="{{ url('/terms') }}" target="_blank"
                            class="font-semibold text-gold-dark transition
                               hover:text-gold dark:text-gold
                               dark:hover:text-gold/80">
                            Terms of Service
                        </a>

                        and

                        <a href="{{ url('/community-guidelines') }}" target="_blank"
                            class="font-semibold text-gold-dark transition
                               hover:text-gold dark:text-gold
                               dark:hover:text-gold/80">
                            Team 0001 Community Guidelines
                        </a>.

                        <span class="text-red-500">*</span>
                    </span>
                </label>

                @error('terms')
                    <p class="mt-2 ml-7 text-[11px] font-medium text-red-600
                          dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror


                {{-- Submit --}}
                <button type="submit" :disabled="loading"
                    class="mt-4 group flex w-full items-center justify-center
                       gap-2 rounded-xl bg-gold px-4 py-3 text-sm font-bold
                       text-navy transition duration-200
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

                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4z" />
                    </svg>

                    <span
                        x-text="loading
                        ? 'Creating account...'
                        : 'Create Team 0001 Account'">
                        Create Team 0001 Account
                    </span>

                    <svg x-show="!loading"
                        class="h-4 w-4 transition-transform
                           group-hover:translate-x-0.5"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />

                        <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
                    </svg>

                </button>

            </div>

        </form>


        {{-- Login Link --}}
        <div class="mt-5 text-center text-xs text-text-secondary
               dark:text-text-secondary-dark">
            Already have an account?

            <a href="{{ route('login') }}"
                class="ml-1 font-semibold text-gold-dark transition
                   hover:text-gold dark:text-gold
                   dark:hover:text-gold/80">
                Sign in
            </a>
        </div>

    </div>

@endsection
