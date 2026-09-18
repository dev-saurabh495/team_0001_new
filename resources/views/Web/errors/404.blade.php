@extends('website.layouts.app')

@section('title', 'Page Not Found — Team 0001')

@section('content')

    <main class="relative flex min-h-screen items-center justify-center overflow-hidden bg-[#0D1B2A] px-5 pt-24">
        {{-- Subtle background glow --}}
        <div class="pointer-events-none absolute left-1/2 top-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[#D4AF37]/[0.035] blur-[120px]"
            aria-hidden="true"></div>

        
        {{-- Subtle circular lines --}}
        <div class="pointer-events-none absolute left-1/2 top-1/2 h-[420px] w-[420px] -translate-x-1/2 -translate-y-1/2 rounded-full border border-white/[0.035]"
            aria-hidden="true"></div>

        <div class="pointer-events-none absolute left-1/2 top-1/2 h-[620px] w-[620px] -translate-x-1/2 -translate-y-1/2 rounded-full border border-white/[0.025]"
            aria-hidden="true"></div>


        {{-- Content --}}
        <section class="relative z-10 w-full max-w-xl text-center" aria-labelledby="error-title">

            {{-- Logo --}}
            <div
                class="mx-auto mb-8 flex h-16 w-16 items-center justify-center overflow-hidden rounded-full border border-[#D4AF37]/25 bg-white/[0.04] shadow-[0_0_40px_rgba(212,175,55,0.06)]">
                <img src="{{ asset('images/team0001-logo.png') }}" alt="Team 0001 Tiger Logo"
                    class="h-full w-full object-cover"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                <span
                    class="hidden h-full w-full items-center justify-center font-[Cinzel,serif] text-sm font-bold text-[#D4AF37]">
                    T1
                </span>
            </div>


            {{-- Error number --}}
            <p class="font-[Cinzel,serif] text-[clamp(5rem,18vw,9rem)] font-semibold leading-none tracking-[-0.04em] text-[#F8F9FA]/[0.09]"
                aria-hidden="true">
                404
            </p>


            {{-- Heading --}}
            <h1 id="error-title"
                class="-mt-4 font-[Poppins,sans-serif] text-2xl font-bold tracking-[-0.02em] text-[#F8F9FA] sm:text-3xl">
                Looks like you took a wrong turn.
            </h1>


            {{-- Description --}}
            <p class="mx-auto mt-4 max-w-md font-[Poppins,sans-serif] text-sm leading-7 text-[#B8C0CC] sm:text-base">
                The page you're looking for doesn't exist or may have
                moved somewhere else.
            </p>


            {{-- Actions --}}
            <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">

                <a href="{{ route('home') }}"
                    class="group inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#D4AF37] px-5 py-3 font-[Poppins,sans-serif] text-sm font-semibold text-[#0D1B2A] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#E6C65C] hover:shadow-[0_10px_30px_rgba(212,175,55,0.15)] sm:w-auto">
                    Back to Home

                    <span class="transition-transform duration-300 group-hover:-translate-x-0.5">
                        ←
                    </span>
                </a>


                <a href="{{ route('about') }}"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-white/[0.12] bg-white/[0.045] px-5 py-3 font-[Poppins,sans-serif] text-sm font-medium text-[#F8F9FA] backdrop-blur-xl transition-all duration-300 hover:-translate-y-0.5 hover:border-white/[0.18] hover:bg-white/[0.07] sm:w-auto">
                    Explore Team

                    <span>
                        →
                    </span>
                </a>

            </div>


            {{-- Small identity --}}
            <div class="mt-12 flex items-center justify-center gap-3">

                <span class="h-px w-8 bg-white/[0.10]"></span>

                <span class="font-[Cinzel,serif] text-[10px] font-semibold tracking-[0.25em] text-[#D4AF37]/70">
                    TEAM 0001
                </span>

                <span class="h-px w-8 bg-white/[0.10]"></span>

            </div>

        </section>
        

    </main>

@endsection
