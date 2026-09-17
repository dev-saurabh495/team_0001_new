<!DOCTYPE html>
<html lang="en" x-data="{
    dark: localStorage.getItem('team0001-theme') === 'dark' || (!localStorage.getItem('team0001-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches),
    loading: true,
    progress: 0
}" x-init="$watch('dark', val => localStorage.setItem('team0001-theme', val ? 'dark' : 'light'));
let t = setInterval(() => {
    progress += Math.floor(Math.random() * 12) + 4;
    if (progress >= 100) {
        progress = 100;
        clearInterval(t);
        setTimeout(() => loading = false, 350);
    }
}, 120);" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team 0001 — People. Participation. Community.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Cinzel:wght@400;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-sans antialiased bg-background dark:bg-background-dark text-text-primary dark:text-text-primary-dark transition-colors duration-300"
    :class="{ 'overflow-hidden': loading }">

    {{-- =================== LOADER =================== --}}
    <div x-show="loading" x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex items-center justify-center bg-navy overflow-hidden">

        <div class="absolute inset-0 opacity-60"
            style="background: radial-gradient(circle at 50% 40%, rgba(212,175,55,0.2), transparent 55%);"></div>

        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-gold/10 blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-gold/10 blur-3xl animate-pulse"
            style="animation-delay:0.8s"></div>

        <div class="relative text-center px-6">
            <div class="relative inline-block">
                <div class="absolute inset-0 rounded-full bg-gold/25 blur-2xl scale-125 animate-pulse"></div>
                <img src="{{ asset('images/logo.png') }}" alt="Team 0001"
                    class="relative w-24 h-24 md:w-32 md:h-32 object-contain mx-auto"
                    style="animation: spinReveal 1.4s cubic-bezier(.22,1,.36,1) both;">
            </div>

            <h1 class="mt-6 font-heading text-2xl md:text-3xl tracking-[0.2em] text-white">
                TEAM <span class="text-gold">0001</span>
            </h1>

            {{-- Progress bar --}}
            <div class="mt-8 w-56 md:w-64 mx-auto">
                <div class="h-1 rounded-full bg-white/10 overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-gold-dark to-gold rounded-full transition-all duration-150 ease-out"
                        :style="`width: ${progress}%`"></div>
                </div>
                <p class="mt-2 text-[11px] tracking-widest text-white/40 uppercase" x-text="progress + '%'"></p>
            </div>
        </div>
    </div>

    {{-- =================== MAIN CONTENT =================== --}}
    <div x-show="!loading" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100">

        {{-- ---------- NAVBAR ---------- --}}
        <header
            class="sticky top-0 z-40 backdrop-blur-md bg-background/80 dark:bg-background-dark/80 border-b border-border-subtle dark:border-border-subtle-dark">
            <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
                <a href="/" class="flex items-center gap-2.5">
                    <img src="{{ asset('images/logo.png') }}" alt="Team 0001" class="w-8 h-8 object-contain">
                    <span
                        class="font-heading text-sm md:text-base tracking-widest text-text-primary dark:text-text-primary-dark">
                        TEAM <span class="text-gold-dark dark:text-gold">0001</span>
                    </span>
                </a>

                <nav
                    class="hidden md:flex items-center gap-8 text-sm font-medium text-text-secondary dark:text-text-secondary-dark">
                    <a href="#about" class="hover:text-gold-dark dark:hover:text-gold transition">About</a>
                    <a href="#mission" class="hover:text-gold-dark dark:hover:text-gold transition">Mission</a>
                    <a href="#activities" class="hover:text-gold-dark dark:hover:text-gold transition">Activities</a>
                    <a href="#contact" class="hover:text-gold-dark dark:hover:text-gold transition">Contact</a>
                </nav>

                <div class="flex items-center gap-3">
                    <button type="button" @click="dark = !dark"
                        class="w-9 h-9 flex items-center justify-center rounded-full
                               border border-border-subtle dark:border-border-subtle-dark
                               text-gold-dark dark:text-gold hover:border-gold transition"
                        aria-label="Toggle dark mode">
                        <svg x-show="!dark" x-cloak style="width:17px;height:17px" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                        <svg x-show="dark" x-cloak style="width:17px;height:17px" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                        </svg>
                    </button>

                    @if (Route::has('login'))
                        <a href="{{ route('login') }}"
                            class="hidden sm:inline-flex items-center gap-1.5 bg-gold-dark dark:bg-gold hover:shadow-gold-lg hover:-translate-y-0.5
                              text-navy text-sm font-semibold rounded-lg px-4 py-2 transition-all">
                            Admin Login
                        </a>
                    @endif
                </div>
            </div>
        </header>

        {{-- ---------- HERO ---------- --}}
        <section class="relative overflow-hidden bg-navy">
            <div class="absolute inset-0 opacity-60"
                style="background: radial-gradient(circle at 50% 20%, rgba(212,175,55,0.18), transparent 55%);"></div>
            <div class="absolute inset-0 opacity-[0.05]"
                style="background-image: linear-gradient(rgba(212,175,55,0.6) 1px, transparent 1px), linear-gradient(90deg, rgba(212,175,55,0.6) 1px, transparent 1px);
                    background-size: 44px 44px;">
            </div>
            <div class="absolute -top-20 -left-20 w-96 h-96 rounded-full bg-gold/10 blur-3xl"></div>
            <div class="absolute -bottom-24 -right-16 w-[28rem] h-[28rem] rounded-full bg-gold/10 blur-3xl"></div>

            <div class="relative max-w-5xl mx-auto px-6 pt-20 pb-24 md:pt-32 md:pb-36 text-center">
                <div
                    class="inline-flex items-center gap-2 text-xs tracking-widest uppercase text-gold border border-gold/30 rounded-full px-4 py-1.5 mb-8">
                    <span class="w-1.5 h-1.5 rounded-full bg-gold animate-pulse"></span>
                    Youth-Led Community Initiative
                </div>

                <h1 class="font-heading text-4xl sm:text-5xl md:text-7xl leading-tight text-white">
                    We are <span class="text-gold">TEAM 0001</span>
                </h1>

                <p class="mt-6 text-base md:text-lg text-text-secondary-dark max-w-2xl mx-auto">
                    Young people coming together to create positive impact in their community —
                    through participation, purpose, and pride.
                </p>

                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="#about"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gold-dark hover:shadow-gold-lg hover:-translate-y-0.5
                          text-navy font-semibold text-sm rounded-lg px-7 py-3.5 transition-all">
                        Explore Team 0001
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <a href="#contact"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border border-white/20 hover:border-gold
                          text-white font-medium text-sm rounded-lg px-7 py-3.5 transition-all">
                        Get in Touch
                    </a>
                </div>

                {{-- Ornamental divider --}}
                <div class="flex items-center justify-center gap-3 mt-16">
                    <span class="h-px w-10 bg-gold/40"></span>
                    <span class="w-1.5 h-1.5 rotate-45 bg-gold"></span>
                    <span class="h-px w-10 bg-gold/40"></span>
                </div>
            </div>
        </section>

        {{-- ---------- STATS / PILLARS ---------- --}}
        <section class="bg-surface dark:bg-surface-dark border-b border-border-subtle dark:border-border-subtle-dark">
            <div class="max-w-6xl mx-auto px-6 py-14 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                @foreach ([
        ['label' => 'People', 'icon' => 'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z'],
        ['label' => 'Participation', 'icon' => 'M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z'],
        ['label' => 'Community', 'icon' => 'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z'],
        ['label' => 'Impact', 'icon' => 'M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.563.563 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z'],
    ] as $pillar)
                    <div class="flex flex-col items-center gap-3">
                        <div
                            class="w-12 h-12 rounded-full flex items-center justify-center bg-navy/5 dark:bg-gold/10 text-gold-dark dark:text-gold">
                            <svg style="width:22px;height:22px" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $pillar['icon'] }}" />
                            </svg>
                        </div>
                        <p
                            class="font-heading text-sm tracking-widest text-text-primary dark:text-text-primary-dark uppercase">
                            {{ $pillar['label'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ---------- ABOUT ---------- --}}
        <section id="about" class="max-w-5xl mx-auto px-6 py-24 text-center">
            <span class="text-xs tracking-widest uppercase text-gold-dark dark:text-gold">Who We Are</span>
            <h2 class="mt-3 font-heading text-3xl md:text-4xl text-text-primary dark:text-text-primary-dark">
                More than a community.<br class="hidden md:block"> A movement of young changemakers.
            </h2>
            <p class="mt-6 text-text-secondary dark:text-text-secondary-dark max-w-2xl mx-auto leading-relaxed">
                Team 0001 is a youth-led community initiative focused on connecting young people,
                encouraging active participation, and organizing positive social activities —
                not a traditional NGO, but a shared platform for people to create real impact together.
            </p>
        </section>

        {{-- ---------- MISSION ---------- --}}
        <section id="mission" class="bg-navy relative overflow-hidden">
            <div class="absolute inset-0 opacity-40"
                style="background: radial-gradient(circle at 80% 50%, rgba(212,175,55,0.12), transparent 55%);"></div>
            <div class="relative max-w-5xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-12">
                <div>
                    <span class="text-xs tracking-widest uppercase text-gold">Our Mission</span>
                    <h3 class="mt-3 font-heading text-2xl text-white">
                        Connect. Encourage. Participate.
                    </h3>
                    <p class="mt-4 text-text-secondary-dark leading-relaxed">
                        To connect young people and encourage meaningful, active participation in their community.
                    </p>
                </div>
                <div>
                    <span class="text-xs tracking-widest uppercase text-gold">Our Vision</span>
                    <h3 class="mt-3 font-heading text-2xl text-white">
                        Contributors, not observers.
                    </h3>
                    <p class="mt-4 text-text-secondary-dark leading-relaxed">
                        To build a community where young people aren't just spectators — they're active contributors
                        shaping what happens around them.
                    </p>
                </div>
            </div>
        </section>

        {{-- ---------- CONTACT / CTA ---------- --}}
        <section id="contact" class="max-w-3xl mx-auto px-6 py-24 text-center">
            <div class="relative inline-block mb-6">
                <div class="absolute inset-0 rounded-full bg-gold/15 blur-2xl scale-110"></div>
                <img src="{{ asset('images/logo.png') }}" alt="Team 0001"
                    class="relative w-16 h-16 object-contain mx-auto">
            </div>
            <h2 class="font-heading text-2xl md:text-3xl text-text-primary dark:text-text-primary-dark">
                Want to be part of Team 0001?
            </h2>
            <p class="mt-3 text-text-secondary dark:text-text-secondary-dark">
                Reach out and let's build something meaningful together.
            </p>
            <a href="mailto:hello@team0001.com"
                class="mt-8 inline-flex items-center gap-2 bg-gold-dark dark:bg-gold hover:shadow-gold-lg hover:-translate-y-0.5
                  text-navy font-semibold text-sm rounded-lg px-7 py-3.5 transition-all">
                Contact Us
            </a>
        </section>

        {{-- ---------- FOOTER ---------- --}}
        <footer class="border-t border-border-subtle dark:border-border-subtle-dark">
            <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Team 0001" class="w-6 h-6 object-contain">
                    <span class="text-sm font-heading tracking-widest text-text-primary dark:text-text-primary-dark">
                        TEAM 0001
                    </span>
                </div>
                <p class="text-xs text-text-secondary dark:text-text-secondary-dark">
                    &copy; {{ date('Y') }} Team 0001. All rights reserved.
                </p>
            </div>
        </footer>
    </div>

    <style>
        @keyframes spinReveal {
            0% {
                opacity: 0;
                transform: scale(0.4) rotate(-25deg);
            }

            60% {
                opacity: 1;
                transform: scale(1.08) rotate(4deg);
            }

            100% {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }
    </style>

</body>

</html>
