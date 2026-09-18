@php
    $footerLinks = [
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

    $footerLogin = Route::has('login') ? route('login') : null;

    $footerRegister = Route::has('register') ? route('register') : null;
@endphp


<footer class="team0001-footer">

    {{-- =====================================================
         TOP GOLD LINE
    ====================================================== --}}
    <div class="team0001-footer__gold-line"></div>


    <div class="team0001-footer__container">

        {{-- =================================================
             MAIN FOOTER
        ================================================== --}}
        <div class="team0001-footer__main">


            {{-- =================================================
                 BRAND COLUMN
            ================================================== --}}
            <div class="team0001-footer__brand-column">

                <a href="{{ Route::has('home') ? route('home') : url('/') }}" class="team0001-footer__brand">

                    <span class="team0001-footer__logo-wrap">

                        <span class="team0001-footer__logo-ring"></span>

                        <img src="{{ asset('images/logo.png') }}" alt="Team 0001" class="team0001-footer__logo"
                            width="54" height="54">

                    </span>


                    <span class="team0001-footer__brand-text">

                        <span class="team0001-footer__brand-team">
                            TEAM
                        </span>

                        <span class="team0001-footer__brand-number">
                            0001
                        </span>

                    </span>

                </a>


                <p class="team0001-footer__description">
                    Building a community of passionate people,
                    meaningful activities and unforgettable experiences.
                </p>


                {{-- Social Icons --}}
                <div class="team0001-footer__socials">

                    {{-- Instagram --}}
                    <a href="#" aria-label="Instagram" class="team0001-footer__social">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="5" />
                            <circle cx="12" cy="12" r="4" />
                            <circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none" />
                        </svg>
                    </a>


                    {{-- Facebook --}}
                    <a href="#" aria-label="Facebook" class="team0001-footer__social">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 3h3V0h-3c-3.31 0-6 2.69-6 6v3H6v3h3v9h3v-9h3l1-3h-4V6c0-1.66 1.34-3 3-3z" />
                        </svg>
                    </a>


                    {{-- YouTube --}}
                    <a href="#" aria-label="YouTube" class="team0001-footer__social">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.97C18.88 4 12 4 12 4s-6.88 0-8.59.45A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33 2.78 2.78 0 0 0 1.95 1.97C5.12 19.5 12 19.5 12 19.5s6.88 0 8.59-.45a2.78 2.78 0 0 0 1.95-1.97A29 29 0 0 0 23 11.75a29 29 0 0 0-.46-5.33z" />
                            <path d="m9.75 15.02 5.75-3.27-5.75-3.27v6.54z" />
                        </svg>
                    </a>


                    {{-- LinkedIn --}}
                    <a href="#" aria-label="LinkedIn" class="team0001-footer__social">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z" />
                            <rect x="2" y="9" width="4" height="12" />
                            <circle cx="4" cy="4" r="2" />
                        </svg>
                    </a>

                </div>

            </div>


            {{-- =================================================
                 QUICK LINKS
            ================================================== --}}
            <div class="team0001-footer__column">

                <h3>
                    Explore
                </h3>

                <div class="team0001-footer__links">

                    @foreach ($footerLinks as $item)
                        @php
                            $routeExists = Route::has($item['route']);

                            $href = $routeExists ? route($item['route']) : $item['fallback'];
                        @endphp

                        <a href="{{ $href }}">
                            <span>{{ $item['label'] }}</span>

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M5 12h14" />
                                <path d="m13 6 6 6-6 6" />
                            </svg>
                        </a>
                    @endforeach

                </div>

            </div>


            {{-- =================================================
                 COMMUNITY
            ================================================== --}}
            <div class="team0001-footer__column">

                <h3>
                    Community
                </h3>

                <div class="team0001-footer__links">

                    @if ($footerRegister)
                        <a href="{{ $footerRegister }}">
                            <span>Join Team</span>

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m13 6 6 6-6 6" />
                            </svg>
                        </a>
                    @endif

                    @if ($footerLogin)
                        <a href="{{ $footerLogin }}">
                            <span>Member Login</span>

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                                <path d="M10 17l5-5-5-5" />
                                <path d="M15 12H3" />
                            </svg>
                        </a>
                    @endif

                    <a href="#events">
                        <span>Upcoming Events</span>

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>
                    </a>

                    <a href="#gallery">
                        <span>Our Gallery</span>

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>
                    </a>

                </div>

            </div>


            {{-- =================================================
                 CONTACT / CTA
            ================================================== --}}
            <div class="team0001-footer__column team0001-footer__contact">

                <h3>
                    Stay Connected
                </h3>

                <p>
                    Be part of the journey. Stay updated with
                    our latest activities and events.
                </p>


                <a href="{{ $footerRegister ?? '#join' }}" class="team0001-footer__cta">
                    <span>Join Team 0001</span>

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m13 6 6 6-6 6" />
                    </svg>
                </a>


                <div class="team0001-footer__email">

                    <span class="team0001-footer__email-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="5" width="18" height="14" rx="2" />
                            <path d="m3 7 9 6 9-6" />
                        </svg>
                    </span>

                    <span>
                        Get in touch with us
                    </span>

                </div>

            </div>

        </div>


        {{-- =================================================
             BOTTOM BAR
        ================================================== --}}
        <div class="team0001-footer__bottom">

            <div class="team0001-footer__copyright">
                © {{ date('Y') }}
                <span>Team 0001</span>.
                All rights reserved.
            </div>


            <div class="team0001-footer__bottom-links">

                <a href="#">
                    Privacy Policy
                </a>

                <span></span>

                <a href="#">
                    Terms
                </a>

                <span></span>

                <a href="#">
                    Contact
                </a>

            </div>


            <div class="team0001-footer__made">

                Crafted with
                <span>♥</span>
                by Team 0001

            </div>

        </div>

    </div>

</footer>


<style>
    /* =========================================================
   TEAM 0001 PREMIUM FOOTER
   ========================================================= */

    .team0001-footer,
    .team0001-footer *,
    .team0001-footer *::before,
    .team0001-footer *::after {
        box-sizing: border-box;
    }

    .team0001-footer {
        position: relative;

        width: 100%;

        margin-top: 80px;

        overflow: hidden;

        color: #f8f9fa;

        background:
            radial-gradient(circle at 10% 10%,
                rgba(212, 175, 55, .075),
                transparent 28%),
            radial-gradient(circle at 90% 75%,
                rgba(27, 38, 59, .65),
                transparent 35%),
            linear-gradient(145deg,
                #081522 0%,
                #0d1b2a 48%,
                #111e31 100%);

        border-top: 1px solid rgba(255, 255, 255, .06);
    }


    /* =========================================================
   GOLD TOP LINE
   ========================================================= */

    .team0001-footer__gold-line {
        width: 100%;
        height: 2px;

        background:
            linear-gradient(90deg,
                transparent 0%,
                rgba(212, 175, 55, .15) 10%,
                #d4af37 50%,
                rgba(212, 175, 55, .15) 90%,
                transparent 100%);

        box-shadow:
            0 0 18px rgba(212, 175, 55, .15);
    }


    /* =========================================================
   CONTAINER
   ========================================================= */

    .team0001-footer__container {
        width: min(1180px, calc(100% - 40px));

        margin: 0 auto;
    }


    /* =========================================================
   MAIN
   ========================================================= */

    .team0001-footer__main {
        display: grid;

        grid-template-columns:
            1.5fr 1fr 1fr 1.25fr;

        gap: 55px;

        padding: 70px 0 55px;
    }


    /* =========================================================
   BRAND
   ========================================================= */

    .team0001-footer__brand {
        display: inline-flex;
        align-items: center;

        gap: 13px;

        color: #fff;

        text-decoration: none;
    }

    .team0001-footer__logo-wrap {
        position: relative;

        width: 54px;
        height: 54px;

        display: grid;
        place-items: center;
    }

    .team0001-footer__logo-ring {
        position: absolute;

        inset: -3px;

        border: 1px solid rgba(212, 175, 55, .30);

        border-radius: 50%;

        box-shadow:
            0 0 15px rgba(212, 175, 55, .07);
    }

    .team0001-footer__logo {
        position: relative;
        z-index: 2;

        width: 54px;
        height: 54px;

        display: block;

        object-fit: cover;

        border-radius: 50%;

        box-shadow:
            0 5px 18px rgba(0, 0, 0, .3);
    }

    .team0001-footer__brand-text {
        display: flex;
        align-items: baseline;

        gap: 7px;

        font-family: Poppins, sans-serif;

        font-size: 16px;
        font-weight: 600;

        letter-spacing: .14em;
    }

    .team0001-footer__brand-number {
        color: #e6c65c;

        font-size: 15px;
    }

    .team0001-footer__description {
        max-width: 330px;

        margin: 24px 0 22px;

        color: #aeb8c5;

        font-family: Poppins, sans-serif;

        font-size: 13px;

        line-height: 1.8;
    }


    /* =========================================================
   SOCIALS
   ========================================================= */

    .team0001-footer__socials {
        display: flex;

        align-items: center;

        gap: 8px;
    }

    .team0001-footer__social {
        width: 37px;
        height: 37px;

        display: grid;
        place-items: center;

        color: #aeb8c5;

        border: 1px solid rgba(255, 255, 255, .09);

        border-radius: 11px;

        background: rgba(255, 255, 255, .035);

        text-decoration: none;

        transition:
            color .2s ease,
            background .2s ease,
            border-color .2s ease,
            transform .2s ease;
    }

    .team0001-footer__social svg {
        width: 17px;
        height: 17px;
    }

    .team0001-footer__social:hover {
        color: #e6c65c;

        border-color: rgba(212, 175, 55, .35);

        background: rgba(212, 175, 55, .08);

        transform: translateY(-2px);
    }


    /* =========================================================
   COLUMNS
   ========================================================= */

    .team0001-footer__column h3 {
        margin: 4px 0 22px;

        color: #f8f9fa;

        font-family: Poppins, sans-serif;

        font-size: 13px;
        font-weight: 600;

        letter-spacing: .10em;

        text-transform: uppercase;
    }

    .team0001-footer__column h3::after {
        content: "";

        display: block;

        width: 24px;
        height: 2px;

        margin-top: 9px;

        border-radius: 999px;

        background: #d4af37;
    }


    /* =========================================================
   LINKS
   ========================================================= */

    .team0001-footer__links {
        display: flex;

        flex-direction: column;

        gap: 7px;
    }

    .team0001-footer__links a {
        display: flex;

        align-items: center;
        justify-content: space-between;

        min-height: 35px;

        padding: 0 9px;

        margin-left: -9px;

        color: #aeb8c5;

        border-radius: 8px;

        font-family: Poppins, sans-serif;

        font-size: 12.5px;

        text-decoration: none;

        transition:
            color .2s ease,
            background .2s ease,
            padding .2s ease;
    }

    .team0001-footer__links a:hover {
        color: #f8f9fa;

        background: rgba(255, 255, 255, .045);

        padding-left: 13px;
    }

    .team0001-footer__links svg {
        width: 14px;
        height: 14px;

        opacity: 0;

        color: #e6c65c;

        transform: translateX(-4px);

        transition:
            opacity .2s ease,
            transform .2s ease;
    }

    .team0001-footer__links a:hover svg {
        opacity: 1;

        transform: translateX(0);
    }


    /* =========================================================
   CONTACT
   ========================================================= */

    .team0001-footer__contact p {
        max-width: 280px;

        margin: 0 0 20px;

        color: #aeb8c5;

        font-family: Poppins, sans-serif;

        font-size: 12.5px;

        line-height: 1.75;
    }


    /* =========================================================
   CTA
   ========================================================= */

    .team0001-footer__cta {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 8px;

        min-height: 42px;

        padding: 0 16px;

        color: #0d1b2a;

        border-radius: 999px;

        background:
            linear-gradient(135deg,
                #e6c65c,
                #d4af37);

        font-family: Poppins, sans-serif;

        font-size: 12px;
        font-weight: 700;

        text-decoration: none;

        box-shadow:
            0 6px 20px rgba(212, 175, 55, .14);

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            filter .2s ease;
    }

    .team0001-footer__cta:hover {
        transform: translateY(-2px);

        filter: brightness(1.05);

        box-shadow:
            0 9px 27px rgba(212, 175, 55, .25);
    }

    .team0001-footer__cta svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
   EMAIL / CONTACT INFO
   ========================================================= */

    .team0001-footer__email {
        display: flex;

        align-items: center;

        gap: 9px;

        margin-top: 18px;

        color: #8f9aaa;

        font-family: Poppins, sans-serif;

        font-size: 11px;
    }

    .team0001-footer__email-icon {
        width: 29px;
        height: 29px;

        display: grid;
        place-items: center;

        color: #e6c65c;

        border: 1px solid rgba(212, 175, 55, .15);

        border-radius: 8px;

        background: rgba(212, 175, 55, .05);
    }

    .team0001-footer__email-icon svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
   BOTTOM
   ========================================================= */

    .team0001-footer__bottom {
        display: grid;

        grid-template-columns: 1fr auto 1fr;

        align-items: center;

        gap: 20px;

        min-height: 65px;

        border-top: 1px solid rgba(255, 255, 255, .075);
    }

    .team0001-footer__copyright,
    .team0001-footer__made {
        color: #7f8b9b;

        font-family: Poppins, sans-serif;

        font-size: 10.5px;
    }

    .team0001-footer__copyright span {
        color: #c3ccd6;
    }

    .team0001-footer__bottom-links {
        display: flex;

        align-items: center;

        justify-content: center;

        gap: 10px;
    }

    .team0001-footer__bottom-links a {
        color: #8f9aaa;

        font-family: Poppins, sans-serif;

        font-size: 10.5px;

        text-decoration: none;

        transition: color .2s ease;
    }

    .team0001-footer__bottom-links a:hover {
        color: #e6c65c;
    }

    .team0001-footer__bottom-links span {
        width: 3px;
        height: 3px;

        border-radius: 50%;

        background: rgba(212, 175, 55, .45);
    }

    .team0001-footer__made {
        text-align: right;
    }

    .team0001-footer__made span {
        color: #d4af37;

        padding: 0 2px;
    }


    /* =========================================================
   TABLET
   ========================================================= */

    @media (max-width: 950px) {

        .team0001-footer__main {
            grid-template-columns:
                1.4fr 1fr 1fr;

            gap: 40px;
        }

        .team0001-footer__contact {
            grid-column: 1 / -1;

            padding-top: 10px;
        }

        .team0001-footer__contact p {
            max-width: 500px;
        }

    }


    /* =========================================================
   MOBILE
   ========================================================= */

    @media (max-width: 680px) {

        .team0001-footer {
            margin-top: 55px;
        }

        .team0001-footer__container {
            width: min(100% - 30px, 560px);
        }

        .team0001-footer__main {
            grid-template-columns: 1fr;

            gap: 35px;

            padding: 50px 0 40px;
        }

        .team0001-footer__brand-column {
            padding-bottom: 5px;
        }

        .team0001-footer__description {
            max-width: 100%;
        }

        .team0001-footer__contact {
            grid-column: auto;
        }

        .team0001-footer__bottom {
            grid-template-columns: 1fr;

            gap: 13px;

            padding: 20px 0;

            text-align: center;
        }

        .team0001-footer__bottom-links {
            order: -1;
        }

        .team0001-footer__made {
            text-align: center;
        }

        .team0001-footer__copyright {
            text-align: center;
        }

    }


    /* =========================================================
   SMALL MOBILE
   ========================================================= */

    @media (max-width: 400px) {

        .team0001-footer__brand-text {
            font-size: 14px;
        }

        .team0001-footer__logo-wrap,
        .team0001-footer__logo {
            width: 48px;
            height: 48px;
        }

        .team0001-footer__bottom-links {
            flex-wrap: wrap;

            row-gap: 8px;
        }

    }


    /* =========================================================
   REDUCED MOTION
   ========================================================= */

    @media (prefers-reduced-motion: reduce) {

        .team0001-footer *,
        .team0001-footer *::before,
        .team0001-footer *::after {
            transition-duration: .01ms !important;
        }

    }
</style>
