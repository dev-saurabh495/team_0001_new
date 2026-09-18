<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Team 0001 — A youth community built around connection, participation, creativity and growth.">
    <meta name="theme-color" content="#0D1B2A">

    <title>Team 0001 — Together, We Create Something Bigger</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --navy: #0D1B2A;
            --navy-2: #1B263B;
            --gold: #D4AF37;
            --gold-soft: rgba(212, 175, 55, .18);
            --white: #f7f5ef;
        }

        html {
            scroll-behavior: auto;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--navy);
            color: var(--white);
            overflow-x: hidden;
        }

        .font-display {
            font-family: 'Cinzel', serif;
        }

        .glass {
            background: rgba(255, 255, 255, .055);
            border: 1px solid rgba(255, 255, 255, .105);
            box-shadow:
                0 20px 80px rgba(0, 0, 0, .18),
                inset 0 1px 0 rgba(255, 255, 255, .035);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
        }

        .glass-strong {
            background: rgba(13, 27, 42, .72);
            border: 1px solid rgba(255, 255, 255, .11);
            box-shadow:
                0 20px 80px rgba(0, 0, 0, .28),
                inset 0 1px 0 rgba(255, 255, 255, .04);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
        }

        .gold-text {
            color: var(--gold);
        }

        .gold-line {
            background: linear-gradient(90deg,
                    transparent,
                    var(--gold),
                    transparent);
        }

        .hero-bg {
            background:
                radial-gradient(circle at 72% 32%, rgba(212, 175, 55, .105), transparent 23%),
                radial-gradient(circle at 20% 70%, rgba(43, 75, 112, .28), transparent 28%),
                linear-gradient(135deg, #081521 0%, #0D1B2A 48%, #111e31 100%);
        }

        .grain {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .035;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.5'/%3E%3C/svg%3E");
            mix-blend-mode: overlay;
        }

        .ambient {
            position: absolute;
            width: 30rem;
            height: 30rem;
            border-radius: 999px;
            filter: blur(100px);
            pointer-events: none;
            opacity: .11;
        }

        .ambient-gold {
            background: #D4AF37;
        }

        .ambient-blue {
            background: #315d89;
        }

        .hero-ring {
            position: absolute;
            border: 1px solid rgba(212, 175, 55, .16);
            border-radius: 999px;
            pointer-events: none;
        }

        .hero-ring::after {
            content: "";
            position: absolute;
            inset: 8%;
            border: 1px solid rgba(255, 255, 255, .055);
            border-radius: inherit;
        }

        .orbit {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 999px;
            transform: rotate(-18deg) scaleY(.45);
        }

        .orbit-dot {
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--gold);
            box-shadow: 0 0 22px rgba(212, 175, 55, .8);
            top: -3px;
            left: 50%;
        }

        .hero-logo {
            filter:
                drop-shadow(0 0 30px rgba(212, 175, 55, .14)) drop-shadow(0 30px 50px rgba(0, 0, 0, .35));
        }

        .hero-logo-wrap {
            background:
                radial-gradient(circle at 50% 45%, rgba(212, 175, 55, .12), transparent 37%),
                rgba(255, 255, 255, .035);
        }

        .section-grid {
            background-image:
                linear-gradient(rgba(255, 255, 255, .025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .025) 1px, transparent 1px);
            background-size: 80px 80px;
        }

        .reveal {
            opacity: 0;
            transform: translateY(35px);
            transition:
                opacity .9s ease,
                transform .9s cubic-bezier(.16, 1, .3, 1);
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-left {
            opacity: 0;
            transform: translateX(-45px);
            transition:
                opacity .9s ease,
                transform .9s cubic-bezier(.16, 1, .3, 1);
        }

        .reveal-left.is-visible {
            opacity: 1;
            transform: translateX(0);
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(45px);
            transition:
                opacity .9s ease,
                transform .9s cubic-bezier(.16, 1, .3, 1);
        }

        .reveal-right.is-visible {
            opacity: 1;
            transform: translateX(0);
        }

        .image-reveal {
            overflow: hidden;
        }

        .image-reveal img {
            transform: scale(1.12);
            transition: transform 1.4s cubic-bezier(.16, 1, .3, 1);
        }

        .image-reveal.is-visible img {
            transform: scale(1);
        }

        .magnetic {
            transition:
                transform .35s cubic-bezier(.16, 1, .3, 1),
                box-shadow .35s ease,
                background .35s ease;
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -7px;
            width: 0;
            height: 1px;
            background: var(--gold);
            transform: translateX(-50%);
            transition: width .3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 18px;
        }

        .activity-card {
            transition:
                transform .5s cubic-bezier(.16, 1, .3, 1),
                border-color .4s ease,
                background .4s ease;
        }

        .activity-card:hover {
            transform: translateY(-8px);
            border-color: rgba(212, 175, 55, .32);
            background: rgba(255, 255, 255, .075);
        }

        .activity-card img {
            transition: transform .8s cubic-bezier(.16, 1, .3, 1);
        }

        .activity-card:hover img {
            transform: scale(1.055);
        }

        .number-outline {
            color: transparent;
            -webkit-text-stroke: 1px rgba(255, 255, 255, .12);
        }

        .cta-glow {
            box-shadow:
                0 0 0 1px rgba(212, 175, 55, .08),
                0 20px 100px rgba(212, 175, 55, .08);
        }

        .gold-button {
            background: var(--gold);
            color: #101820;
        }

        .gold-button:hover {
            box-shadow: 0 14px 45px rgba(212, 175, 55, .22);
        }

        .outline-button:hover {
            border-color: rgba(212, 175, 55, .55);
            background: rgba(212, 175, 55, .07);
        }

        .mobile-menu {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition:
                max-height .45s ease,
                opacity .3s ease;
        }

        .mobile-menu.open {
            max-height: 500px;
            opacity: 1;
        }

        .cursor-glow {
            position: fixed;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            background: radial-gradient(circle,
                    rgba(212, 175, 55, .055),
                    transparent 68%);
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity .3s ease;
        }

        body:hover .cursor-glow {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .cursor-glow {
                display: none;
            }

            .hero-ring {
                opacity: .65;
            }

            .ambient {
                width: 18rem;
                height: 18rem;
                filter: blur(70px);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto !important;
            }

            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }

            .reveal,
            .reveal-left,
            .reveal-right {
                opacity: 1;
                transform: none;
            }

            .image-reveal img {
                transform: scale(1);
            }
        }
    </style>
</head>

<body class="bg-[#0D1B2A] text-[#f7f5ef]">

    <div class="cursor-glow" id="cursorGlow"></div>

    <!-- =========================================
     NAVIGATION
========================================= -->

    <header id="siteHeader" class="fixed inset-x-0 top-0 z-50 px-4 pt-4 transition-all duration-500">
        <div id="navbar"
            class="mx-auto max-w-7xl rounded-2xl border border-white/10 bg-white/[0.045] backdrop-blur-xl transition-all duration-500">
            <div class="flex h-[72px] items-center justify-between px-4 sm:px-6">

                <a href="#home" class="group flex items-center gap-3" aria-label="Team 0001 home">
                    <div class="relative flex h-11 w-11 items-center justify-center">
                        <div
                            class="absolute inset-0 rounded-full border border-[#D4AF37]/25 transition-transform duration-500 group-hover:scale-110">
                        </div>

                        <img src="{{ asset('images/logo.png') }}" alt="Team 0001 tiger logo"
                            class="relative h-9 w-9 object-contain">
                    </div>

                    <div class="hidden sm:block">
                        <div class="text-[13px] font-semibold tracking-[.28em]">
                            TEAM 0001
                        </div>
                        <div class="text-[9px] uppercase tracking-[.22em] text-white/35">
                            Youth • Community
                        </div>
                    </div>
                </a>

                <nav class="hidden items-center gap-7 lg:flex" aria-label="Main navigation">
                    <a href="#home" class="nav-link active text-[12px] font-medium text-white/80 hover:text-white">
                        Home
                    </a>
                    <a href="#about" class="nav-link text-[12px] font-medium text-white/60 hover:text-white">
                        About
                    </a>
                    <a href="#activities" class="nav-link text-[12px] font-medium text-white/60 hover:text-white">
                        Activities
                    </a>
                    <a href="#moments" class="nav-link text-[12px] font-medium text-white/60 hover:text-white">
                        Events
                    </a>
                    <a href="#gallery" class="nav-link text-[12px] font-medium text-white/60 hover:text-white">
                        Gallery
                    </a>
                    <a href="#contact" class="nav-link text-[12px] font-medium text-white/60 hover:text-white">
                        Contact
                    </a>
                </nav>

                <div class="hidden items-center gap-3 md:flex">
                    <a href="#login"
                        class="rounded-full px-4 py-2 text-[11px] font-medium text-white/65 transition hover:text-white">
                        Login
                    </a>

                    <a href="#join"
                        class="magnetic gold-button rounded-full px-5 py-2.5 text-[11px] font-semibold tracking-wide"
                        data-magnetic>
                        Join Team
                        <span class="ml-1">↗</span>
                    </a>
                </div>

                <button id="menuButton" type="button"
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/[0.04] lg:hidden"
                    aria-label="Open navigation menu" aria-expanded="false">
                    <span class="flex w-5 flex-col gap-1.5">
                        <span class="h-px w-full bg-white transition"></span>
                        <span class="h-px w-3/4 bg-white transition"></span>
                    </span>
                </button>
            </div>

            <div id="mobileMenu" class="mobile-menu lg:hidden">
                <nav class="border-t border-white/10 px-5 py-5" aria-label="Mobile navigation">
                    <div class="grid gap-1">
                        <a href="#home"
                            class="rounded-xl px-4 py-3 text-sm text-white/75 hover:bg-white/5 hover:text-white">Home</a>
                        <a href="#about"
                            class="rounded-xl px-4 py-3 text-sm text-white/75 hover:bg-white/5 hover:text-white">About</a>
                        <a href="#activities"
                            class="rounded-xl px-4 py-3 text-sm text-white/75 hover:bg-white/5 hover:text-white">Activities</a>
                        <a href="#moments"
                            class="rounded-xl px-4 py-3 text-sm text-white/75 hover:bg-white/5 hover:text-white">Events</a>
                        <a href="#gallery"
                            class="rounded-xl px-4 py-3 text-sm text-white/75 hover:bg-white/5 hover:text-white">Gallery</a>
                        <a href="#contact"
                            class="rounded-xl px-4 py-3 text-sm text-white/75 hover:bg-white/5 hover:text-white">Contact</a>
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-3 border-t border-white/10 pt-4">
                        <a href="#login"
                            class="rounded-full border border-white/10 px-4 py-3 text-center text-xs text-white/70">
                            Login
                        </a>

                        <a href="#join" class="gold-button rounded-full px-4 py-3 text-center text-xs font-semibold">
                            Join Team
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main>

        <!-- =========================================
     HERO
========================================= -->

        <section id="home" class="hero-bg relative min-h-screen overflow-hidden">
            <div class="grain"></div>

            <div class="ambient ambient-gold absolute -right-40 top-32" data-parallax="0.12"></div>

            <div class="ambient ambient-blue absolute -left-40 bottom-0" data-parallax="-0.08"></div>

            <div class="absolute inset-0 section-grid opacity-30"></div>

            <div
                class="relative z-10 mx-auto flex min-h-screen max-w-7xl items-center px-5 pb-16 pt-32 sm:px-8 lg:px-10">

                <div class="grid w-full items-center gap-12 lg:grid-cols-[1.02fr_.98fr] lg:gap-4">

                    <!-- Hero copy -->
                    <div class="relative z-20 max-w-3xl">

                        <div
                            class="reveal mb-7 inline-flex items-center gap-3 rounded-full border border-white/10 bg-white/[0.035] px-4 py-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-[#D4AF37] shadow-[0_0_14px_#D4AF37]"></span>

                            <span class="text-[9px] font-medium uppercase tracking-[.3em] text-white/55">
                                Youth • Community • Together
                            </span>
                        </div>

                        <h1
                            class="reveal max-w-4xl text-[clamp(3.15rem,7vw,7.5rem)] font-semibold leading-[.93] tracking-[-.055em]">
                            Together,
                            <br>

                            <span class="font-display font-medium text-white/90">
                                We Create
                            </span>

                            <br>

                            <span class="gold-text">
                                Something Bigger.
                            </span>
                        </h1>

                        <p class="reveal mt-8 max-w-xl text-sm leading-7 text-white/52 sm:text-base sm:leading-8">
                            Team 0001 is a space for young people to connect,
                            participate, learn, create meaningful moments and grow
                            alongside one another.
                        </p>

                        <div class="reveal mt-9 flex flex-col gap-3 sm:flex-row">

                            <a href="#about"
                                class="magnetic gold-button group inline-flex items-center justify-center rounded-full px-6 py-3.5 text-xs font-semibold"
                                data-magnetic>
                                Explore Team 0001

                                <span class="ml-3 transition-transform duration-300 group-hover:translate-x-1">
                                    →
                                </span>
                            </a>

                            <a href="#join"
                                class="outline-button group inline-flex items-center justify-center rounded-full border border-white/15 px-6 py-3.5 text-xs font-medium text-white/75 transition">
                                Join the Community

                                <span
                                    class="ml-3 text-[#D4AF37] transition-transform duration-300 group-hover:translate-x-1">
                                    ↗
                                </span>
                            </a>

                        </div>

                        <div
                            class="reveal mt-12 flex items-center gap-5 text-[9px] uppercase tracking-[.28em] text-white/30">
                            <span class="h-px w-10 bg-white/15"></span>
                            <span>One community. Many stories.</span>
                        </div>
                    </div>

                    <!-- Hero visual -->
                    <div
                        class="relative mx-auto flex h-[520px] w-full max-w-[620px] items-center justify-center lg:h-[650px]">

                        <div class="hero-ring h-[390px] w-[390px] sm:h-[480px] sm:w-[480px]" data-parallax="0.04">
                        </div>

                        <div class="hero-ring h-[290px] w-[290px] sm:h-[360px] sm:w-[360px]" data-parallax="-0.035">
                        </div>

                        <div
                            class="absolute h-[260px] w-[260px] rounded-full border border-white/10 bg-white/[0.025] shadow-[0_0_120px_rgba(212,175,55,.07)] backdrop-blur-sm sm:h-[330px] sm:w-[330px]">
                        </div>

                        <div class="orbit h-[390px] w-[390px] sm:h-[520px] sm:w-[520px]">
                            <span class="orbit-dot"></span>
                        </div>

                        <div class="hero-logo-wrap relative z-10 flex h-48 w-48 items-center justify-center rounded-full border border-white/10 shadow-2xl sm:h-64 sm:w-64"
                            data-parallax="-0.06">
                            <div class="absolute inset-3 rounded-full border border-[#D4AF37]/20"></div>

                            <img src="{{ asset('images/logo.png') }}" alt="Team 0001 tiger logo"
                                class="hero-logo relative z-10 h-36 w-36 object-contain sm:h-48 sm:w-48">
                        </div>

                        <!-- Floating label 1 -->
                        <div class="glass absolute left-0 top-[20%] z-20 rounded-2xl px-4 py-3 sm:left-[3%]"
                            data-parallax="0.08">
                            <div class="text-[8px] uppercase tracking-[.25em] text-white/35">
                                The energy
                            </div>
                            <div class="mt-1 text-xs font-medium text-white/85">
                                Connect
                            </div>
                        </div>

                        <!-- Floating label 2 -->
                        <div class="glass absolute right-0 top-[29%] z-20 rounded-2xl px-4 py-3 sm:right-[1%]"
                            data-parallax="-0.07">
                            <div class="text-[8px] uppercase tracking-[.25em] text-white/35">
                                The action
                            </div>
                            <div class="mt-1 text-xs font-medium text-white/85">
                                Participate
                            </div>
                        </div>

                        <!-- Floating label 3 -->
                        <div class="glass absolute bottom-[17%] left-[6%] z-20 rounded-2xl px-4 py-3"
                            data-parallax="0.06">
                            <div class="text-[8px] uppercase tracking-[.25em] text-white/35">
                                The idea
                            </div>
                            <div class="mt-1 text-xs font-medium text-white/85">
                                Create
                            </div>
                        </div>

                        <!-- Floating label 4 -->
                        <div class="glass absolute bottom-[11%] right-[4%] z-20 rounded-2xl px-4 py-3"
                            data-parallax="-0.05">
                            <div class="text-[8px] uppercase tracking-[.25em] text-white/35">
                                The journey
                            </div>
                            <div class="mt-1 text-xs font-medium text-white/85">
                                Grow
                            </div>
                        </div>

                        <div
                            class="absolute bottom-0 left-1/2 h-24 w-72 -translate-x-1/2 rounded-full bg-[#D4AF37]/5 blur-3xl">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll indicator -->
            <a href="#about"
                class="absolute bottom-7 left-1/2 z-20 flex -translate-x-1/2 flex-col items-center gap-3"
                aria-label="Scroll to explore">
                <span class="text-[8px] uppercase tracking-[.35em] text-white/35">
                    Scroll to explore
                </span>

                <span class="relative h-10 w-px overflow-hidden bg-white/10">
                    <span
                        class="absolute left-0 top-0 h-1/2 w-full animate-[scrollLine_1.8s_ease-in-out_infinite] bg-[#D4AF37]"></span>
                </span>
            </a>
        </section>

        <!-- =========================================
     INTRO / ABOUT
========================================= -->

        <section id="about" class="relative overflow-hidden border-t border-white/5 bg-[#0D1B2A] py-28 sm:py-36">
            <div class="absolute right-0 top-0 h-[500px] w-[500px] rounded-full bg-[#315d89]/5 blur-[130px]"></div>

            <div class="relative z-10 mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">

                <div class="grid gap-16 lg:grid-cols-[.8fr_1.2fr] lg:gap-28">

                    <div class="reveal-left">
                        <div class="mb-5 flex items-center gap-3">
                            <span class="h-px w-9 bg-[#D4AF37]"></span>
                            <span class="text-[9px] uppercase tracking-[.3em] text-[#D4AF37]">
                                What is Team 0001?
                            </span>
                        </div>

                        <h2 class="font-display text-4xl leading-tight text-white/90 sm:text-5xl">
                            More Than
                            <br>
                            <span class="text-white/45">a Name.</span>
                        </h2>
                    </div>

                    <div class="reveal-right">
                        <p class="max-w-3xl text-xl font-light leading-relaxed text-white/78 sm:text-2xl lg:text-3xl">
                            Team 0001 is about people showing up for one another —
                            sharing ideas, trying something new, taking part and
                            turning ordinary moments into meaningful experiences.
                        </p>

                        <div class="mt-10 h-px w-full bg-white/10"></div>

                        <div class="mt-8 flex flex-col gap-8 sm:flex-row sm:items-end sm:justify-between">
                            <p class="max-w-lg text-sm leading-7 text-white/40">
                                There is no single way to belong here. You can learn,
                                contribute, collaborate, meet people, create something,
                                or simply be part of the moment.
                            </p>

                            <div
                                class="font-display text-7xl font-semibold tracking-[-.08em] text-white/[0.08] sm:text-8xl">
                                0001
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- =========================================
     VALUES
========================================= -->

        <section id="values" class="relative overflow-hidden border-y border-white/5 bg-[#101f31] py-28 sm:py-36">
            <div class="grain"></div>

            <div class="relative z-10 mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">

                <div class="reveal mb-16 max-w-2xl">
                    <div class="mb-5 flex items-center gap-3">
                        <span class="h-px w-9 bg-[#D4AF37]"></span>
                        <span class="text-[9px] uppercase tracking-[.3em] text-[#D4AF37]">
                            The spirit
                        </span>
                    </div>

                    <h2 class="text-4xl font-semibold tracking-tight sm:text-6xl">
                        Four simple ideas.
                        <br>
                        <span class="font-display font-medium text-white/45">
                            One shared energy.
                        </span>
                    </h2>
                </div>

                <div class="grid gap-4 md:grid-cols-2">

                    <!-- CONNECT -->
                    <article
                        class="reveal activity-card glass group relative min-h-[320px] overflow-hidden rounded-[2rem] p-7 sm:p-9">
                        <div
                            class="absolute right-0 top-0 font-display text-[10rem] font-semibold leading-none text-white/[0.025]">
                            01
                        </div>

                        <div class="relative z-10 flex h-full flex-col justify-between">
                            <div>
                                <span class="text-[10px] tracking-[.3em] text-[#D4AF37]">01</span>

                                <h3 class="mt-5 text-3xl font-semibold">
                                    Connect
                                </h3>

                                <p class="mt-4 max-w-sm text-sm leading-7 text-white/45">
                                    Meet people, exchange perspectives and find
                                    common ground beyond the usual circles.
                                </p>
                            </div>

                            <div
                                class="mt-10 text-4xl text-white/10 transition duration-500 group-hover:text-[#D4AF37]/30">
                                ↗
                            </div>
                        </div>
                    </article>

                    <!-- PARTICIPATE -->
                    <article
                        class="reveal activity-card glass group relative min-h-[320px] overflow-hidden rounded-[2rem] p-7 sm:p-9">
                        <div
                            class="absolute right-0 top-0 font-display text-[10rem] font-semibold leading-none text-white/[0.025]">
                            02
                        </div>

                        <div class="relative z-10 flex h-full flex-col justify-between">
                            <div>
                                <span class="text-[10px] tracking-[.3em] text-[#D4AF37]">02</span>

                                <h3 class="mt-5 text-3xl font-semibold">
                                    Participate
                                </h3>

                                <p class="mt-4 max-w-sm text-sm leading-7 text-white/45">
                                    Don't just watch from the sidelines. Bring your
                                    energy, ideas and presence into the community.
                                </p>
                            </div>

                            <div
                                class="mt-10 text-4xl text-white/10 transition duration-500 group-hover:text-[#D4AF37]/30">
                                ↗
                            </div>
                        </div>
                    </article>

                    <!-- CREATE -->
                    <article
                        class="reveal activity-card glass group relative min-h-[320px] overflow-hidden rounded-[2rem] p-7 sm:p-9">
                        <div
                            class="absolute right-0 top-0 font-display text-[10rem] font-semibold leading-none text-white/[0.025]">
                            03
                        </div>

                        <div class="relative z-10 flex h-full flex-col justify-between">
                            <div>
                                <span class="text-[10px] tracking-[.3em] text-[#D4AF37]">03</span>

                                <h3 class="mt-5 text-3xl font-semibold">
                                    Create
                                </h3>

                                <p class="mt-4 max-w-sm text-sm leading-7 text-white/45">
                                    Turn ideas into activities, initiatives and
                                    moments that people can experience together.
                                </p>
                            </div>

                            <div
                                class="mt-10 text-4xl text-white/10 transition duration-500 group-hover:text-[#D4AF37]/30">
                                ↗
                            </div>
                        </div>
                    </article>

                    <!-- GROW -->
                    <article
                        class="reveal activity-card glass group relative min-h-[320px] overflow-hidden rounded-[2rem] p-7 sm:p-9">
                        <div
                            class="absolute right-0 top-0 font-display text-[10rem] font-semibold leading-none text-white/[0.025]">
                            04
                        </div>

                        <div class="relative z-10 flex h-full flex-col justify-between">
                            <div>
                                <span class="text-[10px] tracking-[.3em] text-[#D4AF37]">04</span>

                                <h3 class="mt-5 text-3xl font-semibold">
                                    Grow
                                </h3>

                                <p class="mt-4 max-w-sm text-sm leading-7 text-white/45">
                                    Learn through people, experiences and the
                                    courage to keep discovering something new.
                                </p>
                            </div>

                            <div
                                class="mt-10 text-4xl text-white/10 transition duration-500 group-hover:text-[#D4AF37]/30">
                                ↗
                            </div>
                        </div>
                    </article>

                </div>
            </div>
        </section>

        <!-- =========================================
     ACTIVITIES
========================================= -->

        <section id="activities" class="relative overflow-hidden bg-[#0D1B2A] py-28 sm:py-36">
            <div class="relative z-10 mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">

                <div class="grid items-end gap-10 lg:grid-cols-[1fr_.55fr]">

                    <div class="reveal-left">
                        <div class="mb-5 flex items-center gap-3">
                            <span class="h-px w-9 bg-[#D4AF37]"></span>
                            <span class="text-[9px] uppercase tracking-[.3em] text-[#D4AF37]">
                                Activities & moments
                            </span>
                        </div>

                        <h2 class="max-w-4xl text-4xl font-semibold tracking-tight sm:text-6xl">
                            There is always
                            <br>
                            <span class="font-display font-medium text-white/45">
                                something happening.
                            </span>
                        </h2>
                    </div>

                    <p class="reveal-right text-sm leading-7 text-white/40">
                        From shared activities to creative initiatives and social
                        moments, Team 0001 is built around experiences people can
                        actually be part of.
                    </p>
                </div>

                <!-- Editorial image grid -->
                <div id="moments" class="mt-16 grid gap-5 md:grid-cols-12">

                    <!-- Large feature -->
                    <article
                        class="image-reveal reveal-left group relative min-h-[500px] overflow-hidden rounded-[2rem] border border-white/10 md:col-span-7">
                        <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1400&q=85"
                            alt="Young people spending time together" loading="lazy"
                            class="absolute inset-0 h-full w-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-[#07121d] via-[#07121d]/20 to-transparent">
                        </div>

                        <div class="absolute inset-x-0 bottom-0 p-7 sm:p-9">
                            <span class="text-[9px] uppercase tracking-[.3em] text-[#D4AF37]">
                                Community
                            </span>

                            <h3 class="mt-3 text-2xl font-semibold sm:text-3xl">
                                Shared experiences.
                            </h3>

                            <p class="mt-3 max-w-md text-sm leading-6 text-white/55">
                                The best moments often begin with simply showing up.
                            </p>
                        </div>

                        <div
                            class="absolute right-6 top-6 rounded-full border border-white/15 bg-black/20 px-3 py-2 text-[10px] text-white/60 backdrop-blur-md">
                            01
                        </div>
                    </article>

                    <!-- Right top -->
                    <article
                        class="image-reveal reveal-right group relative min-h-[330px] overflow-hidden rounded-[2rem] border border-white/10 md:col-span-5">
                        <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=1100&q=85"
                            alt="Friends connecting together" loading="lazy"
                            class="absolute inset-0 h-full w-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-[#07121d] via-transparent to-transparent">
                        </div>

                        <div class="absolute inset-x-0 bottom-0 p-6">
                            <span class="text-[9px] uppercase tracking-[.3em] text-[#D4AF37]">
                                Connection
                            </span>

                            <h3 class="mt-2 text-xl font-semibold">
                                Meet. Talk. Belong.
                            </h3>
                        </div>
                    </article>

                    <!-- Right bottom -->
                    <article
                        class="image-reveal reveal-right group relative min-h-[330px] overflow-hidden rounded-[2rem] border border-white/10 md:col-span-5">
                        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1100&q=85"
                            alt="Young people collaborating" loading="lazy"
                            class="absolute inset-0 h-full w-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-[#07121d] via-transparent to-transparent">
                        </div>

                        <div class="absolute inset-x-0 bottom-0 p-6">
                            <span class="text-[9px] uppercase tracking-[.3em] text-[#D4AF37]">
                                Collaboration
                            </span>

                            <h3 class="mt-2 text-xl font-semibold">
                                Ideas become moments.
                            </h3>
                        </div>
                    </article>

                    <!-- Wide bottom -->
                    <article id="gallery"
                        class="image-reveal reveal-left group relative min-h-[330px] overflow-hidden rounded-[2rem] border border-white/10 md:col-span-7">
                        <img src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?auto=format&fit=crop&w=1400&q=85"
                            alt="Community gathering" loading="lazy"
                            class="absolute inset-0 h-full w-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-[#07121d] via-[#07121d]/15 to-transparent">
                        </div>

                        <div class="absolute inset-x-0 bottom-0 flex items-end justify-between p-6 sm:p-8">
                            <div>
                                <span class="text-[9px] uppercase tracking-[.3em] text-[#D4AF37]">
                                    Moments
                                </span>

                                <h3 class="mt-2 text-xl font-semibold sm:text-2xl">
                                    Make memories worth keeping.
                                </h3>
                            </div>

                            <span
                                class="hidden h-10 w-10 items-center justify-center rounded-full border border-white/15 bg-black/20 backdrop-blur-md sm:flex">
                                ↗
                            </span>
                        </div>
                    </article>

                </div>
            </div>
        </section>

        <!-- =========================================
     0001 SIGNATURE
========================================= -->

        <section
            class="relative flex min-h-[720px] items-center justify-center overflow-hidden border-y border-white/5 bg-[#091622]">
            <div class="grain"></div>

            <div
                class="absolute left-1/2 top-1/2 h-[600px] w-[600px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[#D4AF37]/5 blur-[130px]">
            </div>

            <div class="absolute inset-0 flex items-center justify-center overflow-hidden">
                <div class="number-outline font-display whitespace-nowrap text-[38vw] font-bold leading-none tracking-[-.12em]"
                    data-parallax="0.025">
                    0001
                </div>
            </div>

            <div class="relative z-10 mx-auto max-w-3xl px-5 text-center">

                <div class="reveal">
                    <div class="mx-auto mb-7 h-px w-16 bg-[#D4AF37]"></div>

                    <span class="text-[9px] uppercase tracking-[.4em] text-[#D4AF37]">
                        The signature
                    </span>
                </div>

                <h2 class="reveal mt-7 text-4xl font-semibold tracking-tight sm:text-6xl">
                    One community.
                    <br>
                    <span class="font-display font-medium text-white/45">
                        Many stories.
                    </span>
                </h2>

                <p class="reveal mx-auto mt-7 max-w-xl text-sm leading-7 text-white/40">
                    0001 is not about being

                <p class="reveal mx-auto mt-7 max-w-xl text-sm leading-7 text-white/45 sm:text-base">
                    Different people, different paths, different moments —
                    connected by the simple idea of being part of something together.
                </p>

                <div class="reveal mt-10 flex justify-center">
                    <a href="#join"
                        class="magnetic gold-button group inline-flex items-center rounded-full px-7 py-3.5 text-xs font-semibold"
                        data-magnetic>
                        Be Part of 0001

                        <span class="ml-3 transition-transform duration-300 group-hover:translate-x-1">
                            →
                        </span>
                    </a>
                </div>
            </div>

            <!-- Decorative vertical lines -->
            <div class="absolute left-[8%] top-0 hidden h-full w-px bg-white/[0.035] lg:block"></div>
            <div class="absolute right-[8%] top-0 hidden h-full w-px bg-white/[0.035] lg:block"></div>

            <div
                class="absolute bottom-8 left-1/2 h-px w-24 -translate-x-1/2 bg-gradient-to-r from-transparent via-[#D4AF37]/40 to-transparent">
            </div>
        </section>


        <!-- =========================================
     COMMUNITY CTA
========================================= -->

        <section id="join" class="relative overflow-hidden bg-[#0D1B2A] px-5 py-28 sm:px-8 sm:py-36 lg:px-10">
            <div class="absolute inset-0">
                <div
                    class="absolute left-1/2 top-1/2 h-[520px] w-[520px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[#D4AF37]/[0.055] blur-[130px]">
                </div>

                <div class="absolute inset-0 section-grid opacity-20"></div>
            </div>

            <div class="relative z-10 mx-auto max-w-5xl">

                <div
                    class="cta-glow glass-strong relative overflow-hidden rounded-[2.5rem] px-6 py-20 text-center sm:px-12 sm:py-24">
                    <!-- Inner glow -->
                    <div
                        class="absolute left-1/2 top-0 h-px w-1/2 -translate-x-1/2 bg-gradient-to-r from-transparent via-[#D4AF37]/60 to-transparent">
                    </div>

                    <div class="absolute -right-24 -top-24 h-64 w-64 rounded-full bg-[#D4AF37]/[0.06] blur-[80px]">
                    </div>
                    <div class="absolute -bottom-32 -left-20 h-72 w-72 rounded-full bg-[#315d89]/10 blur-[90px]"></div>

                    <div class="relative z-10">

                        <div class="reveal flex justify-center">
                            <div
                                class="flex items-center gap-3 rounded-full border border-white/10 bg-white/[0.035] px-4 py-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-[#D4AF37] shadow-[0_0_14px_#D4AF37]"></span>

                                <span class="text-[9px] uppercase tracking-[.3em] text-white/45">
                                    Your next moment starts here
                                </span>
                            </div>
                        </div>

                        <h2
                            class="reveal mx-auto mt-7 max-w-3xl text-4xl font-semibold leading-tight tracking-tight sm:text-6xl lg:text-7xl">
                            Be Part of
                            <br>
                            <span class="font-display font-medium text-white/50">
                                Team 0001.
                            </span>
                        </h2>

                        <p class="reveal mx-auto mt-7 max-w-xl text-sm leading-7 text-white/45 sm:text-base">
                            Meet people. Take part. Create memories.
                            Grow together.
                        </p>

                        <div class="reveal mt-9 flex flex-col justify-center gap-3 sm:flex-row">

                            <a href="#contact"
                                class="magnetic gold-button group inline-flex items-center justify-center rounded-full px-7 py-3.5 text-xs font-semibold"
                                data-magnetic>
                                Join Team 0001

                                <span class="ml-3 transition-transform duration-300 group-hover:translate-x-1">
                                    →
                                </span>
                            </a>

                            <a href="#activities"
                                class="outline-button group inline-flex items-center justify-center rounded-full border border-white/15 px-7 py-3.5 text-xs font-medium text-white/75 transition">
                                Explore Activities

                                <span
                                    class="ml-3 text-[#D4AF37] transition-transform duration-300 group-hover:translate-x-1">
                                    ↗
                                </span>
                            </a>

                        </div>

                        <div
                            class="mt-12 flex items-center justify-center gap-4 text-[8px] uppercase tracking-[.3em] text-white/20">
                            <span class="h-px w-8 bg-white/10"></span>
                            <span>Connect • Participate • Create • Grow</span>
                            <span class="h-px w-8 bg-white/10"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- =========================================
     CONTACT / FOOTER
========================================= -->

        <footer id="contact" class="relative overflow-hidden border-t border-white/[0.07] bg-[#091521]">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">

                <!-- Footer main -->
                <div class="grid gap-14 py-16 sm:py-20 lg:grid-cols-[1.3fr_.7fr_.7fr_.8fr]">

                    <!-- Brand -->
                    <div>
                        <a href="#home" class="group inline-flex items-center gap-3">
                            <div class="relative flex h-12 w-12 items-center justify-center">
                                <div
                                    class="absolute inset-0 rounded-full border border-[#D4AF37]/20 transition-transform duration-500 group-hover:scale-110">
                                </div>

                                <img src="{{ asset('images/logo.png') }}" alt="Team 0001 tiger logo"
                                    class="relative h-10 w-10 object-contain">
                            </div>

                            <div>
                                <div class="text-sm font-semibold tracking-[.24em]">
                                    TEAM 0001
                                </div>

                                <div class="mt-1 text-[8px] uppercase tracking-[.25em] text-white/30">
                                    Youth • Community
                                </div>
                            </div>
                        </a>

                        <p class="mt-7 max-w-sm text-sm leading-7 text-white/35">
                            A community built around connection, participation,
                            meaningful activities and growing together.
                        </p>

                        <a href="#join"
                            class="mt-7 inline-flex items-center text-[10px] font-medium uppercase tracking-[.25em] text-[#D4AF37] transition hover:text-[#e7c95c]">
                            Join the community
                            <span class="ml-3 text-base">↗</span>
                        </a>
                    </div>


                    <!-- Explore -->
                    <div>
                        <h3 class="text-[9px] uppercase tracking-[.3em] text-white/30">
                            Explore
                        </h3>

                        <nav class="mt-6 grid gap-3">
                            <a href="#home" class="w-fit text-sm text-white/55 transition hover:text-white">
                                Home
                            </a>

                            <a href="#about" class="w-fit text-sm text-white/55 transition hover:text-white">
                                About
                            </a>

                            <a href="#activities" class="w-fit text-sm text-white/55 transition hover:text-white">
                                Activities
                            </a>

                            <a href="#moments" class="w-fit text-sm text-white/55 transition hover:text-white">
                                Events
                            </a>

                            <a href="#gallery" class="w-fit text-sm text-white/55 transition hover:text-white">
                                Gallery
                            </a>
                        </nav>
                    </div>


                    <!-- Community -->
                    <div>
                        <h3 class="text-[9px] uppercase tracking-[.3em] text-white/30">
                            Community
                        </h3>

                        <nav class="mt-6 grid gap-3">
                            <a href="#join" class="w-fit text-sm text-white/55 transition hover:text-white">
                                Join Team
                            </a>

                            <a href="#login" class="w-fit text-sm text-white/55 transition hover:text-white">
                                Login
                            </a>

                            <a href="#contact" class="w-fit text-sm text-white/55 transition hover:text-white">
                                Contact
                            </a>
                        </nav>
                    </div>


                    <!-- Social -->
                    <div>
                        <h3 class="text-[9px] uppercase tracking-[.3em] text-white/30">
                            Stay Connected
                        </h3>

                        <div class="mt-6 flex flex-wrap gap-2">

                            <a href="#" aria-label="Instagram"
                                class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/[0.025] text-xs text-white/50 transition hover:border-[#D4AF37]/30 hover:bg-[#D4AF37]/5 hover:text-[#D4AF37]">
                                IG
                            </a>

                            <a href="#" aria-label="Facebook"
                                class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/[0.025] text-xs text-white/50 transition hover:border-[#D4AF37]/30 hover:bg-[#D4AF37]/5 hover:text-[#D4AF37]">
                                FB
                            </a>

                            <a href="#" aria-label="YouTube"
                                class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/[0.025] text-xs text-white/50 transition hover:border-[#D4AF37]/30 hover:bg-[#D4AF37]/5 hover:text-[#D4AF37]">
                                YT
                            </a>

                        </div>

                        <p class="mt-6 text-xs leading-6 text-white/25">
                            Follow along for upcoming activities,
                            events and community moments.
                        </p>
                    </div>
                </div>


                <!-- Footer bottom -->
                <div
                    class="flex flex-col gap-4 border-t border-white/[0.07] py-7 sm:flex-row sm:items-center sm:justify-between">

                    <p class="text-[10px] uppercase tracking-[.2em] text-white/25">
                        © Team 0001
                    </p>

                    <div class="flex items-center gap-5 text-[9px] uppercase tracking-[.18em] text-white/20">
                        <span>Made for community</span>

                        <span class="h-1 w-1 rounded-full bg-[#D4AF37]/50"></span>

                        <a href="#home" class="transition hover:text-white/50">
                            Back to top ↑
                        </a>
                    </div>
                </div>

            </div>
        </footer>

    </main>


    <!-- =========================================
     JAVASCRIPT
========================================= -->

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const body = document.body;
            const header = document.getElementById('siteHeader');
            const navbar = document.getElementById('navbar');

            const menuButton = document.getElementById('menuButton');
            const mobileMenu = document.getElementById('mobileMenu');

            const cursorGlow = document.getElementById('cursorGlow');

            const prefersReducedMotion =
                window.matchMedia('(prefers-reduced-motion: reduce)').matches;


            /*
            |--------------------------------------------------------------------------
            | Sticky Header
            |--------------------------------------------------------------------------
            */

            const updateHeader = () => {
                if (window.scrollY > 35) {
                    header.classList.remove('pt-4');
                    header.classList.add('pt-2');

                    navbar.classList.remove(
                        'bg-white/[0.045]',
                        'border-white/10'
                    );

                    navbar.classList.add(
                        'bg-[#0D1B2A]/80',
                        'border-white/15',
                        'shadow-[0_15px_60px_rgba(0,0,0,.25)]'
                    );
                } else {
                    header.classList.remove('pt-2');
                    header.classList.add('pt-4');

                    navbar.classList.remove(
                        'bg-[#0D1B2A]/80',
                        'border-white/15',
                        'shadow-[0_15px_60px_rgba(0,0,0,.25)]'
                    );

                    navbar.classList.add(
                        'bg-white/[0.045]',
                        'border-white/10'
                    );
                }
            };

            updateHeader();

            window.addEventListener('scroll', updateHeader, {
                passive: true
            });


            /*
            |--------------------------------------------------------------------------
            | Mobile Menu
            |--------------------------------------------------------------------------
            */

            if (menuButton && mobileMenu) {

                menuButton.addEventListener('click', () => {

                    const isOpen = mobileMenu.classList.toggle('open');

                    menuButton.setAttribute(
                        'aria-expanded',
                        String(isOpen)
                    );

                    const lines = menuButton.querySelectorAll('span span');

                    if (isOpen) {
                        lines[0].style.transform = 'translateY(4px) rotate(45deg)';
                        lines[1].style.transform = 'translateY(-3px) rotate(-45deg)';
                        lines[1].style.width = '100%';
                    } else {
                        lines[0].style.transform = '';
                        lines[1].style.transform = '';
                        lines[1].style.width = '';
                    }
                });


                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {

                        mobileMenu.classList.remove('open');

                        menuButton.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                        const lines = menuButton.querySelectorAll('span span');

                        lines[0].style.transform = '';
                        lines[1].style.transform = '';
                        lines[1].style.width = '';
                    });
                });
            }


            /*
            |--------------------------------------------------------------------------
            | Scroll Reveal
            |--------------------------------------------------------------------------
            */

            const revealElements = document.querySelectorAll(
                '.reveal, .reveal-left, .reveal-right, .image-reveal'
            );

            if (!prefersReducedMotion && 'IntersectionObserver' in window) {

                const revealObserver = new IntersectionObserver(
                    entries => {

                        entries.forEach(entry => {

                            if (!entry.isIntersecting) {
                                return;
                            }

                            entry.target.classList.add('is-visible');

                            revealObserver.unobserve(entry.target);
                        });

                    }, {
                        threshold: 0.12,
                        rootMargin: '0px 0px -60px 0px'
                    }
                );

                revealElements.forEach(element => {
                    revealObserver.observe(element);
                });

            } else {

                revealElements.forEach(element => {
                    element.classList.add('is-visible');
                });

            }


            /*
            |--------------------------------------------------------------------------
            | Staggered Reveals
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll(
                '#values .activity-card'
            ).forEach((card, index) => {

                card.style.transitionDelay =
                    `${index * 90}ms`;
            });


            /*
            |--------------------------------------------------------------------------
            | Smooth Anchor Navigation
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll('a[href^="#"]').forEach(link => {

                link.addEventListener('click', event => {

                    const targetId =
                        link.getAttribute('href');

                    if (!targetId || targetId === '#') {
                        return;
                    }

                    const target =
                        document.querySelector(targetId);

                    if (!target) {
                        return;
                    }

                    event.preventDefault();

                    const headerHeight =
                        header ? header.offsetHeight + 18 : 90;

                    const targetPosition =
                        target.getBoundingClientRect().top +
                        window.scrollY -
                        headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: prefersReducedMotion ?
                            'auto' : 'smooth'
                    });
                });
            });


            /*
            |--------------------------------------------------------------------------
            | Active Navigation
            |--------------------------------------------------------------------------
            */

            const sections = document.querySelectorAll(
                'main section[id]'
            );

            const navLinks = document.querySelectorAll(
                '.nav-link'
            );

            if ('IntersectionObserver' in window) {

                const sectionObserver = new IntersectionObserver(
                    entries => {

                        entries.forEach(entry => {

                            if (!entry.isIntersecting) {
                                return;
                            }

                            const id = entry.target.id;

                            navLinks.forEach(link => {

                                link.classList.toggle(
                                    'active',
                                    link.getAttribute('href') === `#${id}`
                                );
                            });

                        });

                    }, {
                        threshold: 0.25,
                        rootMargin: '-20% 0px -55% 0px'
                    }
                );

                sections.forEach(section => {
                    sectionObserver.observe(section);
                });
            }


            /*
            |--------------------------------------------------------------------------
            | Cursor Glow
            |--------------------------------------------------------------------------
            */

            if (
                cursorGlow &&
                !prefersReducedMotion &&
                window.matchMedia('(pointer: fine)').matches
            ) {

                let cursorX = 0;
                let cursorY = 0;
                let currentX = 0;
                let currentY = 0;

                window.addEventListener('mousemove', event => {
                    cursorX = event.clientX;
                    cursorY = event.clientY;
                });

                const animateCursor = () => {

                    currentX += (cursorX - currentX) * 0.08;
                    currentY += (cursorY - currentY) * 0.08;

                    cursorGlow.style.left = `${currentX}px`;
                    cursorGlow.style.top = `${currentY}px`;

                    requestAnimationFrame(animateCursor);
                };

                animateCursor();
            }


            /*
            |--------------------------------------------------------------------------
            | Subtle Parallax
            |--------------------------------------------------------------------------
            */

            const parallaxElements =
                document.querySelectorAll('[data-parallax]');

            if (
                !prefersReducedMotion &&
                parallaxElements.length
            ) {

                let ticking = false;

                const updateParallax = () => {

                    const scrollY = window.scrollY;

                    parallaxElements.forEach(element => {

                        const speed =
                            parseFloat(
                                element.dataset.parallax
                            ) || 0;

                        const rect =
                            element.getBoundingClientRect();

                        const center =
                            rect.top + rect.height / 2;

                        const viewportCenter =
                            window.innerHeight / 2;

                        const offset =
                            (center - viewportCenter) * speed;

                        element.style.transform =
                            `translate3d(0, ${offset}px, 0)`;
                    });

                    ticking = false;
                };

                window.addEventListener('scroll', () => {

                    if (!ticking) {

                        window.requestAnimationFrame(
                            updateParallax
                        );

                        ticking = true;
                    }

                }, {
                    passive: true
                });

                updateParallax();
            }


            /*
            |--------------------------------------------------------------------------
            | Magnetic Buttons
            |--------------------------------------------------------------------------
            */

            if (
                !prefersReducedMotion &&
                window.matchMedia('(pointer: fine)').matches
            ) {

                document.querySelectorAll(
                    '[data-magnetic]'
                ).forEach(button => {

                    button.addEventListener(
                        'mousemove',
                        event => {

                            const rect =
                                button.getBoundingClientRect();

                            const x =
                                event.clientX -
                                rect.left -
                                rect.width / 2;

                            const y =
                                event.clientY -
                                rect.top -
                                rect.height / 2;

                            button.style.transform =
                                `translate3d(${x * 0.12}px, ${y * 0.12}px, 0)`;
                        }
                    );

                    button.addEventListener(
                        'mouseleave',
                        () => {

                            button.style.transform =
                                'translate3d(0, 0, 0)';
                        }
                    );
                });
            }


            /*
            |--------------------------------------------------------------------------
            | Hero Intro
            |--------------------------------------------------------------------------
            */

            if (!prefersReducedMotion) {

                document
                    .querySelectorAll('#home .reveal')
                    .forEach((element, index) => {

                        element.style.transitionDelay =
                            `${index * 100}ms`;

                        setTimeout(() => {
                            element.classList.add('is-visible');
                        }, 150 + index * 100);
                    });
            }


            /*
            |--------------------------------------------------------------------------
            | Keyboard Accessibility
            |--------------------------------------------------------------------------
            */

            document.addEventListener('keydown', event => {

                if (event.key === 'Escape') {

                    if (mobileMenu) {
                        mobileMenu.classList.remove('open');
                    }

                    if (menuButton) {
                        menuButton.setAttribute(
                            'aria-expanded',
                            'false'
                        );
                    }
                }
            });

        });
    </script>


    <!-- =========================================
     KEYFRAME
========================================= -->

    <style>
        @keyframes scrollLine {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }

            20% {
                opacity: 1;
            }

            70% {
                opacity: 1;
            }

            100% {
                transform: translateY(220%);
                opacity: 0;
            }
        }
    </style>

</body>

</html>
