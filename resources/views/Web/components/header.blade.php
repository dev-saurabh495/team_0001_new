@php
    $navigation = [
        [
            'label' => 'Home',
            'route' => 'home',
            'fallback' => url('/'),
        ],
        [
            'label' => 'About',
            'route' => 'about',
            'fallback' => '#about',
        ],
        [
            'label' => 'Activities',
            'route' => 'activities',
            'fallback' => '#activities',
        ],
        [
            'label' => 'Events',
            'route' => 'events',
            'fallback' => '#events',
        ],
        [
            'label' => 'Gallery',
            'route' => 'gallery',
            'fallback' => '#gallery',
        ],
    ];

    $currentRoute = Route::currentRouteName();

    $loginUrl = Route::has('login') ? route('login') : '#';

    $registerUrl = Route::has('register') ? route('register') : '#';
@endphp


<header id="team0001-header" x-data="team0001Header()" x-init="init()" @keydown.escape.window="closeMenu()"
    class="team0001-header">
    <div class="team0001-container">

        {{-- ================= HEADER BAR ================= --}}
        <div class="team0001-bar" :class="{ 'is-scrolled': scrolled }">

            {{-- LOGO / BRAND --}}
            <a href="{{ Route::has('home') ? route('home') : url('/') }}" class="team0001-brand">
                <span class="team0001-logo-wrap">
                    <span class="team0001-logo-ring"></span>

                    <img src="{{ asset('images/logo.png') }}" alt="Team 0001" class="team0001-logo">
                </span>

                <span class="team0001-brand-name">
                    <span>TEAM</span>
                    <strong>0001</strong>
                </span>
            </a>


            {{-- ================= DESKTOP NAV ================= --}}
            <nav class="team0001-desktop-nav" aria-label="Primary navigation">
                @foreach ($navigation as $item)
                    @php
                        $routeExists = Route::has($item['route']);

                        $href = $routeExists ? route($item['route']) : $item['fallback'];

                        $isActive =
                            $routeExists &&
                            ($currentRoute === $item['route'] || request()->routeIs($item['route'] . '.*'));
                    @endphp

                    <a href="{{ $href }}" class="{{ $isActive ? 'active' : '' }}"
                        @if ($isActive) aria-current="page" @endif>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>


            {{-- ================= DESKTOP ACTIONS ================= --}}
            <div class="team0001-actions">

                <div class="team0001-language">

                    <a href="{{ route('language', ['locale' => 'en']) }}"
                        class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">
                        EN
                    </a>

                    <a href="{{ route('language', ['locale' => 'hi']) }}"
                        class="{{ app()->getLocale() === 'hi' ? 'active' : '' }}">
                        हिंदी
                    </a>

                </div>

                <a href="{{ $loginUrl }}" class="team0001-login">
                    {{ __('common.login') }}
                </a>

                <a href="{{ $registerUrl }}" class="team0001-join">
                    {{ __('common.join_team') }}
                </a>

            </div>


            {{-- ================= MOBILE BUTTON ================= --}}
            <button type="button" class="team0001-mobile-button" @click.stop="toggleMenu()" :aria-expanded="mobileOpen"
                aria-controls="team0001-mobile-menu" aria-label="Open navigation menu">
                <span :class="{ 'open': mobileOpen }"></span>
                <span :class="{ 'open': mobileOpen }"></span>
                <span :class="{ 'open': mobileOpen }"></span>
            </button>

        </div>


        {{-- ================= MOBILE MENU ================= --}}
        <div id="team0001-mobile-menu" class="team0001-mobile-menu" x-show="mobileOpen" x-transition
            @click.outside="closeMenu()" x-cloak>

            <nav>

                @foreach ($navigation as $item)
                    @php
                        $routeExists = Route::has($item['route']);

                        $href = $routeExists ? route($item['route']) : $item['fallback'];

                        $isActive =
                            $routeExists &&
                            ($currentRoute === $item['route'] || request()->routeIs($item['route'] . '.*'));
                    @endphp

                    <a href="{{ $href }}" class="{{ $isActive ? 'active' : '' }}" @click="closeMenu()">
                        <span>{{ $item['label'] }}</span>

                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>
                    </a>
                @endforeach


                <div class="team0001-divider"></div>


                {{-- MOBILE LANGUAGE --}}
                <div class="team0001-mobile-language">

                    <span>Language</span>

                    <div class="team0001-language">

                        <button type="button" @click="language = 'en'" :class="{ 'active': language === 'en' }">
                            EN
                        </button>

                        <button type="button" @click="language = 'hi'" :class="{ 'active': language === 'hi' }">
                            हिंदी
                        </button>

                    </div>

                </div>


                {{-- MOBILE ACTIONS --}}
                <div class="team0001-mobile-actions">

                    <a href="{{ $loginUrl }}" class="team0001-login" @click="closeMenu()">
                        Login
                    </a>

                    <a href="{{ $registerUrl }}" class="team0001-join" @click="closeMenu()">
                        Join Team
                    </a>

                </div>

            </nav>

        </div>

    </div>
</header>


<style>
    /* =========================================================
   TEAM 0001 HEADER
   ========================================================= */

    :root {
        --team-navy: #0d1b2a;
        --team-navy-2: #1b263b;
        --team-gold: #d4af37;
        --team-gold-light: #e6c65c;
        --team-white: #f8f9fa;
        --team-muted: #b8c0cc;
    }


    /* =========================================================
   RESET
   ========================================================= */

    .team0001-header,
    .team0001-header *,
    .team0001-header *::before,
    .team0001-header *::after {
        box-sizing: border-box;
    }


    /* =========================================================
   HEADER
   ========================================================= */

    .team0001-header {
        position: fixed;

        top: 0;
        left: 0;
        right: 0;

        width: 100%;

        z-index: 9999;

        padding: 12px 16px;

        pointer-events: none;
    }

    .team0001-container {
        position: relative;

        width: 100%;
        max-width: 1280px;

        margin: 0 auto;

        pointer-events: auto;
    }


    /* =========================================================
   BAR
   ========================================================= */

    .team0001-bar {
        position: relative;

        width: 100%;
        min-height: 76px;

        display: flex;
        align-items: center;

        padding: 0 20px;

        background: rgba(13, 27, 42, 0.96);

        border: 1px solid rgba(212, 175, 55, 0.20);

        border-radius: 22px;

        box-shadow:
            0 12px 35px rgba(13, 27, 42, 0.22),
            inset 0 1px 0 rgba(255, 255, 255, .08);

        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);

        transition:
            background .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .team0001-bar.is-scrolled {
        background: rgba(13, 27, 42, 0.99);

        border-color: rgba(212, 175, 55, .32);

        box-shadow:
            0 15px 45px rgba(13, 27, 42, .30),
            0 0 30px rgba(212, 175, 55, .05);
    }


    /* =========================================================
   BRAND
   ========================================================= */

    .team0001-brand {
        display: flex;
        align-items: center;

        gap: 11px;

        flex-shrink: 0;

        color: #fff;

        text-decoration: none;
    }

    .team0001-logo-wrap {
        position: relative;

        width: 44px;
        height: 44px;

        flex-shrink: 0;

        display: grid;
        place-items: center;
    }

    .team0001-logo-ring {
        position: absolute;

        inset: -2px;

        border: 1px solid rgba(212, 175, 55, .35);

        border-radius: 50%;
    }

    .team0001-logo {
        position: relative;
        z-index: 2;

        display: block;

        width: 44px;
        height: 44px;

        object-fit: cover;

        border-radius: 50%;

        box-shadow:
            0 4px 15px rgba(0, 0, 0, .3);
    }

    .team0001-brand-name {
        display: flex;
        align-items: baseline;

        gap: 6px;

        white-space: nowrap;

        font-family: Poppins, sans-serif;

        font-size: 14px;
        font-weight: 600;

        letter-spacing: .13em;
    }

    .team0001-brand-name strong {
        color: var(--team-gold-light);
    }


    /* =========================================================
   DESKTOP NAV
   ========================================================= */

    .team0001-desktop-nav {
        flex: 1;

        display: flex;
        align-items: center;
        justify-content: center;

        gap: 3px;

        margin: 0 30px;
    }

    .team0001-desktop-nav a {
        position: relative;

        display: flex;
        align-items: center;

        min-height: 42px;

        padding: 0 14px;

        color: rgba(248, 249, 250, .82);

        font-family: Poppins, sans-serif;

        font-size: 13px;
        font-weight: 500;

        text-decoration: none;

        border-radius: 10px;

        transition:
            color .2s ease,
            background .2s ease;
    }

    .team0001-desktop-nav a:hover,
    .team0001-desktop-nav a.active {
        color: #fff;

        background: rgba(255, 255, 255, .06);
    }

    .team0001-desktop-nav a::after {
        content: "";

        position: absolute;

        left: 50%;
        bottom: 4px;

        width: 0;
        height: 2px;

        border-radius: 999px;

        background: var(--team-gold-light);

        transform: translateX(-50%);

        transition: width .2s ease;
    }

    .team0001-desktop-nav a:hover::after,
    .team0001-desktop-nav a.active::after {
        width: 18px;
    }


    /* =========================================================
   ACTIONS
   ========================================================= */

    .team0001-actions {
        display: flex;
        align-items: center;

        gap: 8px;

        flex-shrink: 0;
    }


    /* =========================================================
   LANGUAGE
   ========================================================= */

    .team0001-language {
        display: flex;
        align-items: center;

        gap: 2px;

        padding: 3px;

        border: 1px solid rgba(255, 255, 255, .10);

        border-radius: 999px;

        background: rgba(255, 255, 255, .05);
    }

    .team0001-language a {
        min-width: 38px;
        height: 30px;

        padding: 8px;

        border: 0;

        border-radius: 999px;

        background: transparent;

        color: #b8c0cc;

        font-family: Poppins, sans-serif;

        font-size: 11px;
        font-weight: 600;

        cursor: pointer;

        transition:
            color .2s ease,
            background .2s ease;
    }

    .team0001-language a:hover {
        color: #fff;
    }

    .team0001-language a.active {
        color: var(--team-gold-light);
        margin: auto;
        padding: 8px;
        background: rgba(212, 175, 55, .14);
    }


    /* =========================================================
   LOGIN
   ========================================================= */

    .team0001-login {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-height: 40px;

        padding: 0 15px;

        color: #fff;

        border: 1px solid rgba(212, 175, 55, .35);

        border-radius: 999px;

        background: rgba(255, 255, 255, .04);

        font-family: Poppins, sans-serif;

        font-size: 12px;
        font-weight: 600;

        text-decoration: none;

        transition: .2s ease;
    }

    .team0001-login:hover {
        color: var(--team-gold-light);

        border-color: rgba(230, 198, 92, .65);

        background: rgba(212, 175, 55, .10);
    }


    /* =========================================================
   JOIN
   ========================================================= */

    .team0001-join {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-height: 40px;

        padding: 0 16px;

        color: var(--team-navy);

        border: 0;

        border-radius: 999px;

        background:
            linear-gradient(135deg,
                var(--team-gold-light),
                var(--team-gold));

        font-family: Poppins, sans-serif;

        font-size: 12px;
        font-weight: 700;

        text-decoration: none;

        box-shadow:
            0 5px 18px rgba(212, 175, 55, .18);

        transition: .2s ease;
    }

    .team0001-join:hover {
        transform: translateY(-1px);

        box-shadow:
            0 8px 25px rgba(212, 175, 55, .28);
    }


    /* =========================================================
   MOBILE BUTTON
   ========================================================= */

    .team0001-mobile-button {
        display: none;

        position: relative;

        width: 44px;
        height: 44px;

        margin-left: auto;

        padding: 0;

        border: 1px solid rgba(255, 255, 255, .12);

        border-radius: 12px;

        background: rgba(255, 255, 255, .05);

        color: #fff;

        cursor: pointer;

        z-index: 20;
    }

    .team0001-mobile-button:hover {
        background: rgba(255, 255, 255, .10);

        border-color: rgba(212, 175, 55, .35);
    }

    .team0001-mobile-button span {
        position: absolute;

        left: 11px;

        width: 21px;
        height: 2px;

        background: currentColor;

        border-radius: 10px;

        transition:
            transform .25s ease,
            opacity .2s ease;
    }

    .team0001-mobile-button span:nth-child(1) {
        top: 13px;
    }

    .team0001-mobile-button span:nth-child(2) {
        top: 20px;
    }

    .team0001-mobile-button span:nth-child(3) {
        top: 27px;
    }

    .team0001-mobile-button span:nth-child(1).open {
        transform: translateY(7px) rotate(45deg);
    }

    .team0001-mobile-button span:nth-child(2).open {
        opacity: 0;
    }

    .team0001-mobile-button span:nth-child(3).open {
        transform: translateY(-7px) rotate(-45deg);
    }


    /* =========================================================
   MOBILE MENU
   ========================================================= */

    [x-cloak] {
        display: none !important;
    }

    .team0001-mobile-menu {
        position: absolute;

        top: calc(100% + 8px);

        left: 0;
        right: 0;

        width: 100%;

        padding: 15px;

        background: rgba(13, 27, 42, .99);

        border: 1px solid rgba(212, 175, 55, .20);

        border-radius: 20px;

        box-shadow:
            0 20px 50px rgba(0, 0, 0, .35);

        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);

        z-index: 10;
    }

    .team0001-mobile-menu nav {
        display: flex;
        flex-direction: column;

        gap: 4px;
    }

    .team0001-mobile-menu nav>a {
        display: flex;
        align-items: center;
        justify-content: space-between;

        min-height: 48px;

        padding: 0 14px;

        color: #b8c0cc;

        border-radius: 11px;

        font-family: Poppins, sans-serif;

        font-size: 14px;
        font-weight: 500;

        text-decoration: none;

        transition: .2s ease;
    }

    .team0001-mobile-menu nav>a:hover,
    .team0001-mobile-menu nav>a.active {
        color: #fff;

        background: rgba(255, 255, 255, .07);
    }

    .team0001-mobile-menu nav>a.active {
        color: var(--team-gold-light);
    }

    .team0001-mobile-menu svg {
        opacity: .55;
    }


    /* =========================================================
   DIVIDER
   ========================================================= */

    .team0001-divider {
        width: 100%;
        height: 1px;

        margin: 10px 0;

        background: rgba(255, 255, 255, .08);
    }


    /* =========================================================
   MOBILE LANGUAGE
   ========================================================= */

    .team0001-mobile-language {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 7px 4px;
    }

    .team0001-mobile-language>span {
        color: #b8c0cc;

        font-family: Poppins, sans-serif;

        font-size: 12px;
    }


    /* =========================================================
   MOBILE ACTIONS
   ========================================================= */

    .team0001-mobile-actions {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 8px;

        margin-top: 10px;
    }

    .team0001-mobile-actions a {
        width: 100%;
    }


    /* =========================================================
   TABLET
   ========================================================= */

    @media (max-width: 1050px) {

        .team0001-desktop-nav {
            margin-left: 15px;
            margin-right: 15px;
        }

        .team0001-desktop-nav a {
            padding-left: 9px;
            padding-right: 9px;

            font-size: 12px;
        }

        .team0001-language {
            display: none;
        }

    }


    /* =========================================================
   MOBILE
   ========================================================= */

    @media (max-width: 768px) {

        .team0001-header {
            padding: 8px 10px;
        }

        .team0001-bar {
            min-height: 62px;

            padding: 0 10px 0 12px;

            border-radius: 18px;
        }

        .team0001-logo-wrap,
        .team0001-logo {
            width: 38px;
            height: 38px;
        }

        .team0001-brand {
            gap: 9px;
        }

        .team0001-brand-name {
            font-size: 13px;

            letter-spacing: .10em;
        }

        .team0001-desktop-nav,
        .team0001-actions {
            display: none;
        }

        .team0001-mobile-button {
            display: block;
        }

        .team0001-mobile-menu {
            max-height: calc(100vh - 90px);

            overflow-y: auto;
        }

    }


    /* =========================================================
   SMALL MOBILE
   ========================================================= */

    @media (max-width: 420px) {

        .team0001-header {
            padding-left: 7px;
            padding-right: 7px;
        }

        .team0001-brand-name {
            font-size: 12px;
        }

        .team0001-logo-wrap,
        .team0001-logo {
            width: 36px;
            height: 36px;
        }

        .team0001-mobile-actions {
            grid-template-columns: 1fr;
        }

    }


    /* =========================================================
   REDUCED MOTION
   ========================================================= */

    @media (prefers-reduced-motion: reduce) {

        .team0001-header *,
        .team0001-header *::before,
        .team0001-header *::after {
            transition-duration: .01ms !important;
            animation-duration: .01ms !important;
        }

    }
</style>


<script>
    function team0001Header() {
        return {
            scrolled: false,

            mobileOpen: false,

            language: 'en',

            handleScroll: null,

            init() {

                this.updateScroll();

                this.handleScroll = () => {
                    this.updateScroll();
                };

                window.addEventListener(
                    'scroll',
                    this.handleScroll, {
                        passive: true
                    }
                );

            },

            updateScroll() {
                this.scrolled = window.scrollY > 30;
            },

            toggleMenu() {
                this.mobileOpen = !this.mobileOpen;
            },

            closeMenu() {
                this.mobileOpen = false;
            }
        };
    }
</script>
