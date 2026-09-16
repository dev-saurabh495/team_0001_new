<!DOCTYPE html>
<html lang="en"
      x-data="{
          theme: localStorage.getItem('team0001-theme') || 'system',
          systemDark: window.matchMedia('(prefers-color-scheme: dark)').matches,
          get darkMode() {
              return this.theme === 'dark' || (this.theme === 'system' && this.systemDark);
          }
      }"
      x-init="
          const media = window.matchMedia('(prefers-color-scheme: dark)');
          const sync = () => { $data.systemDark = media.matches; };
          media.addEventListener ? media.addEventListener('change', sync) : media.addListener(sync);
          $watch('theme', value => localStorage.setItem('team0001-theme', value));
          sync();
      "
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Authentication') | Team 0001</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Cinzel:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-background text-text-primary transition-colors duration-300 dark:bg-background-dark dark:text-text-primary-dark">
    <div class="min-h-screen px-4 py-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl">
            <div class="overflow-hidden rounded-[28px] border border-border-subtle bg-surface shadow-[0_25px_70px_rgba(13,27,42,0.08)] dark:border-border-subtle-dark dark:bg-surface-dark dark:shadow-[0_25px_70px_rgba(2,6,23,0.55)]">
                <div class="grid min-h-[760px] lg:grid-cols-[1.08fr_0.92fr]">
                    <div class="relative overflow-hidden bg-navy px-6 py-8 sm:px-10 lg:px-12 lg:py-12">
                        <div class="absolute inset-0 opacity-80" style="background: radial-gradient(circle at 50% 26%, rgba(212,175,55,0.18), transparent 48%);"></div>
                        <div class="absolute inset-0 opacity-[0.08]" style="background-image: linear-gradient(rgba(212,175,55,0.75) 1px, transparent 1px), linear-gradient(90deg, rgba(212,175,55,0.75) 1px, transparent 1px); background-size: 36px 36px;"></div>
                        <div class="absolute -left-20 top-10 h-52 w-52 rounded-full bg-gold/10 blur-3xl"></div>
                        <div class="absolute -right-12 bottom-0 h-60 w-60 rounded-full bg-gold/10 blur-3xl"></div>

                        <div class="relative z-10 flex h-full flex-col justify-between">
                            <div class="flex items-center justify-between">
                                <a href="{{ url('/') }}" class="inline-flex items-center gap-3" aria-label="Go to Team 0001 home">
                                    <div class="team0001-logo-badge h-14 w-14 sm:h-16 sm:w-16">
                                        <img src="{{ asset('images/logo.png') }}" alt="Team 0001 logo">
                                    </div>
                                    <span class="font-heading text-xl tracking-[0.26em] text-white sm:text-2xl">TEAM <span class="text-gold">0001</span></span>
                                </a>

                                <div class="flex items-center gap-2">
                                    <label for="theme-select" class="sr-only">Choose theme</label>
                                    <select id="theme-select" x-model="theme" class="rounded-full border border-white/15 bg-white/5 px-2.5 py-1.5 text-[10px] font-medium uppercase tracking-[0.22em] text-slate-100 outline-none transition focus:border-gold focus:ring-2 focus:ring-gold/40">
                                        <option value="system" class="text-navy">System</option>
                                        <option value="light" class="text-navy">Light</option>
                                        <option value="dark" class="text-navy">Dark</option>
                                    </select>
                                </div>
                            </div>

                            <div class="relative mx-auto max-w-md pt-12 text-center lg:pt-0">
                                <div class="inline-flex items-center rounded-full border border-gold/30 bg-gold/10 px-3 py-1 text-[10px] font-medium uppercase tracking-[0.28em] text-gold">
                                    Community • Leadership • Action
                                </div>
                                <h1 class="mt-6 font-heading text-3xl leading-tight text-white sm:text-4xl lg:text-5xl">
                                    Youth-led<br>
                                    community impact.
                                </h1>
                                <p class="mt-4 text-sm leading-7 text-slate-200 sm:text-base">
                                    Young people coming together to build a stronger, more connected, and more active community.
                                </p>

                                <div class="mt-7 flex items-center justify-center gap-3">
                                    <span class="h-px w-10 bg-gold/70"></span>
                                    <span class="h-2.5 w-2.5 rotate-45 bg-gold"></span>
                                    <span class="h-px w-10 bg-gold/70"></span>
                                </div>

                                <div class="mt-7 grid grid-cols-3 gap-3 rounded-2xl border border-white/10 bg-white/5 p-3 text-left backdrop-blur-sm">
                                    <div>
                                        <p class="text-xl font-semibold text-white">12+</p>
                                        <p class="mt-1 text-[11px] uppercase tracking-[0.24em] text-slate-300">Projects</p>
                                    </div>
                                    <div>
                                        <p class="text-xl font-semibold text-white">5K</p>
                                        <p class="mt-1 text-[11px] uppercase tracking-[0.24em] text-slate-300">Members</p>
                                    </div>
                                    <div>
                                        <p class="text-xl font-semibold text-white">24/7</p>
                                        <p class="mt-1 text-[11px] uppercase tracking-[0.24em] text-slate-300">Support</p>
                                    </div>
                                </div>
                            </div>

                            <div class="relative pt-10 text-center text-xs tracking-[0.22em] text-slate-300 uppercase">
                                People • Participation • Community • Impact
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center bg-background px-5 py-8 sm:px-8 lg:px-10 dark:bg-background-dark">
                        <div class="w-full max-w-md pt-6 lg:pt-0">
                            <div class="mb-6 flex justify-center lg:hidden">
                                <div class="team0001-logo-badge h-20 w-20">
                                    <img src="{{ asset('images/logo.png') }}" alt="Team 0001 logo">
                                </div>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
