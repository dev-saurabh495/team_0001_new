@php
    $footerLinks = [
        [
            'label' => __('common.home'),
            'route' => 'home',
            'fallback' => url('/'),
        ],
        [
            'label' => __('about.breadcrumb'),
            'route' => 'about',
            'fallback' => url('/about'),
        ],
        [
            'label' => __('activities.breadcrumb'),
            'route' => 'activities',
            'fallback' => url('/activities'),
        ],
        [
            'label' => __('events.breadcrumb'),
            'route' => 'events',
            'fallback' => url('/events'),
        ],
        [
            'label' => __('gallery.breadcrumb'),
            'route' => 'gallery',
            'fallback' => url('/gallery'),
        ],
    ];

    $footerLogin = Route::has('login') ? route('login') : null;
    $footerRegister = Route::has('register') ? route('register') : null;
@endphp

<footer class="team0001-footer">
    <div class="team0001-footer__gold-line"></div>

    <div class="team0001-footer__container">

        <div class="team0001-footer__main">

            <div class="team0001-footer__brand-column">

                <a href="{{ Route::has('home') ? route('home') : url('/') }}" class="team0001-footer__brand">
                    <span class="team0001-footer__logo-wrap">
                        <span class="team0001-footer__logo-ring"></span>

                        <img src="{{ asset('images/logo.png') }}" alt="Team 0001" class="team0001-footer__logo"
                            width="54" height="54" loading="lazy">
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
                    {{ __('footer.description') }}
                </p>

                <div class="team0001-footer__socials">

                    <a href="#" aria-label="Instagram" class="team0001-footer__social">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="5" />
                            <circle cx="12" cy="12" r="4" />
                            <circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none" />
                        </svg>
                    </a>

                    <a href="#" aria-label="Facebook" class="team0001-footer__social">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 3h3V0h-3c-3.31 0-6 2.69-6 6v3H6v3h3v9h3v-9h3l1-3h-4V6c0-1.66 1.34-3 3-3z" />
                        </svg>
                    </a>

                    <a href="#" aria-label="YouTube" class="team0001-footer__social">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.97C18.88 4 12 4 12 4s-6.88 0-8.59.45A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33 2.78 2.78 0 0 0 1.95 1.97C5.12 19.5 12 19.5 12 19.5s6.88 0 8.59-.45a2.78 2.78 0 0 0 1.95-1.97A29 29 0 0 0 23 11.75a29 29 0 0 0-.46-5.33z" />
                            <path d="m9.75 15.02 5.75-3.27-5.75-3.27v6.54z" />
                        </svg>
                    </a>

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

            <div class="team0001-footer__column">

                <h3>
                    {{ __('footer.explore') }}
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

            <div class="team0001-footer__column">

                <h3>
                    {{ __('footer.community') }}
                </h3>

                <div class="team0001-footer__links">

                    @if ($footerRegister)
                        <a href="{{ $footerRegister }}">
                            <span>{{ __('footer.join_team') }}</span>

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m13 6 6 6-6 6" />
                            </svg>
                        </a>
                    @endif

                    @if ($footerLogin)
                        <a href="{{ $footerLogin }}">
                            <span>{{ __('footer.member_login') }}</span>

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                                <path d="M10 17l5-5-5-5" />
                                <path d="M15 12H3" />
                            </svg>
                        </a>
                    @endif

                    <a href="{{ Route::has('events') ? route('events') : url('/events') }}">
                        <span>{{ __('footer.upcoming_events') }}</span>

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>
                    </a>

                    <a href="{{ Route::has('gallery') ? route('gallery') : url('/gallery') }}">
                        <span>{{ __('footer.gallery') }}</span>

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>
                    </a>

                    <a href="{{ route('community.guidelines') }}">
                        <span>{{ __('footer.community_guidelines') }}</span>

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>
                    </a>

                </div>

            </div>

            <div class="team0001-footer__column team0001-footer__contact">

                <h3>
                    {{ __('footer.stay_connected') }}
                </h3>

                <p>
                    {{ __('footer.contact_description') }}
                </p>

                <a href="{{ $footerRegister ?? route('contact') }}" class="team0001-footer__cta">
                    <span>
                        {{ $footerRegister ? __('footer.join_team') : __('footer.contact_us') }}
                    </span>

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m13 6 6 6-6 6" />
                    </svg>
                </a>

                <a href="{{ route('contact') }}" class="team0001-footer__email">
                    <span class="team0001-footer__email-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="5" width="18" height="14" rx="2" />
                            <path d="m3 7 9 6 9-6" />
                        </svg>
                    </span>

                    <span>
                        {{ __('footer.get_in_touch') }}
                    </span>
                </a>

            </div>

        </div>

        <div class="team0001-footer__bottom">

            <div class="team0001-footer__copyright">
                © {{ date('Y') }}
                <span>Team 0001</span>.
                {{ __('footer.all_rights_reserved') }}
            </div>

            <div class="team0001-footer__bottom-links">

                <a href="{{ route('privacy') }}">
                    {{ __('privacy.breadcrumb') }}
                </a>

                <span></span>

                <a href="{{ route('terms') }}">
                    {{ __('terms.breadcrumb') }}
                </a>

                <span></span>

                <a href="{{ route('contact') }}">
                    {{ __('contact.breadcrumb') }}
                </a>

            </div>

            <div class="team0001-footer__made">
                {{ __('footer.made_with') }}
                <span>♥</span>
                {{ __('footer.by_team') }}
            </div>

        </div>

    </div>
</footer>
