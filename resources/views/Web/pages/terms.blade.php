@extends('Web.layouts.app')

@section('title', __('terms.title'))

@section('meta_description', __('terms.meta_description'))

@section('content')

    <div class="terms-page">

        <div class="terms-container">

            {{-- HERO --}}
            <section class="terms-hero">

                <div class="terms-breadcrumb">
                    <a href="{{ url('/') }}">
                        {{ __('terms.home') }}
                    </a>

                    <span>/</span>

                    <span>
                        {{ __('terms.title') }}
                    </span>
                </div>

                <div class="terms-hero-content">

                    <div class="terms-badge">
                        <span>✦</span>
                        {{ __('terms.badge') }}
                    </div>

                    <h1>
                        {{ __('terms.title_first') }}
                        <span>{{ __('terms.title_second') }}</span>
                    </h1>

                    <p class="terms-subtitle">
                        {{ __('terms.subtitle') }}
                    </p>

                    <div class="terms-meta">

                        <span>
                            {{ __('terms.last_updated') }}:
                            <strong>{{ __('terms.updated_date') }}</strong>
                        </span>

                        <span>•</span>

                        <span>Team 0001</span>

                    </div>

                </div>

                <img src="{{ asset('images/logo.png') }}" alt="Team 0001 Tiger Logo" class="terms-logo">

            </section>


            <div class="terms-layout">

                {{-- ON THIS PAGE --}}
                <aside class="terms-sidebar">

                    <nav class="terms-nav" aria-label="{{ __('terms.navigation') }}">

                        <div class="terms-nav-title">
                            {{ __('terms.on_this_page') }}
                        </div>

                        <a href="#introduction">
                            {{ __('terms.nav.introduction') }}
                        </a>

                        <a href="#acceptance">
                            {{ __('terms.nav.acceptance') }}
                        </a>

                        <a href="#eligibility">
                            {{ __('terms.nav.eligibility') }}
                        </a>

                        <a href="#account">
                            {{ __('terms.nav.account') }}
                        </a>

                        <a href="#member-id">
                            {{ __('terms.nav.member_id') }}
                        </a>

                        <a href="#acceptable-use">
                            {{ __('terms.nav.acceptable_use') }}
                        </a>

                        <a href="#community">
                            {{ __('terms.nav.community') }}
                        </a>

                        <a href="#content">
                            {{ __('terms.nav.user_content') }}
                        </a>

                        <a href="#intellectual-property">
                            {{ __('terms.nav.intellectual_property') }}
                        </a>

                        <a href="#privacy">
                            {{ __('terms.nav.privacy') }}
                        </a>

                        <a href="#events">
                            {{ __('terms.nav.events') }}
                        </a>

                        <a href="#third-party">
                            {{ __('terms.nav.third_party') }}
                        </a>

                        <a href="#availability">
                            {{ __('terms.nav.availability') }}
                        </a>

                        <a href="#termination">
                            {{ __('terms.nav.termination') }}
                        </a>

                        <a href="#changes">
                            {{ __('terms.nav.changes') }}
                        </a>

                        <a href="#governing-law">
                            {{ __('terms.nav.governing_law') }}
                        </a>

                        <a href="#contact">
                            {{ __('terms.nav.contact') }}
                        </a>

                    </nav>

                </aside>


                {{-- CONTENT --}}
                <main class="terms-content">

                    {{-- 01 --}}
                    <section id="introduction" class="terms-section">

                        <h2>
                            <span class="section-number">01</span>
                            {{ __('terms.sections.introduction.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.introduction.p1') }}
                        </p>

                        <p>
                            {{ __('terms.sections.introduction.p2') }}
                        </p>

                    </section>


                    {{-- 02 --}}
                    <section id="acceptance" class="terms-section">

                        <h2>
                            <span class="section-number">02</span>
                            {{ __('terms.sections.acceptance.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.acceptance.p1') }}
                        </p>

                        <p>
                            {{ __('terms.sections.acceptance.p2') }}
                        </p>

                        <p>
                            {{ __('terms.sections.acceptance.p3') }}
                        </p>

                    </section>


                    {{-- 03 --}}
                    <section id="eligibility" class="terms-section">

                        <h2>
                            <span class="section-number">03</span>
                            {{ __('terms.sections.eligibility.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.eligibility.p1') }}
                        </p>

                        <p>
                            {{ __('terms.sections.eligibility.p2') }}
                        </p>

                    </section>


                    {{-- 04 --}}
                    <section id="account" class="terms-section">

                        <h2>
                            <span class="section-number">04</span>
                            {{ __('terms.sections.account.title') }}
                        </h2>

                        <ul>

                            <li>
                                {{ __('terms.sections.account.items.0') }}
                            </li>

                            <li>
                                {{ __('terms.sections.account.items.1') }}
                            </li>

                            <li>
                                {{ __('terms.sections.account.items.2') }}
                            </li>

                            <li>
                                {{ __('terms.sections.account.items.3') }}
                            </li>

                            <li>
                                {{ __('terms.sections.account.items.4') }}
                            </li>

                        </ul>

                    </section>


                    {{-- 05 --}}
                    <section id="member-id" class="terms-section">

                        <h2>
                            <span class="section-number">05</span>
                            {{ __('terms.sections.member_id.title') }}
                        </h2>

                        <div class="member-id-card">

                            <h3>
                                {{ __('terms.sections.member_id.card_title') }}
                            </h3>

                            <p>
                                {{ __('terms.sections.member_id.card_description') }}
                            </p>

                        </div>

                        <ul>

                            <li>
                                {{ __('terms.sections.member_id.items.0') }}
                            </li>

                            <li>
                                {{ __('terms.sections.member_id.items.1') }}
                            </li>

                            <li>
                                {{ __('terms.sections.member_id.items.2') }}
                            </li>

                        </ul>

                    </section>


                    {{-- 06 --}}
                    <section id="acceptable-use" class="terms-section">

                        <h2>
                            <span class="section-number">06</span>
                            {{ __('terms.sections.acceptable_use.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.acceptable_use.intro') }}
                        </p>

                        <ol>

                            <li>{{ __('terms.sections.acceptable_use.items.0') }}</li>
                            <li>{{ __('terms.sections.acceptable_use.items.1') }}</li>
                            <li>{{ __('terms.sections.acceptable_use.items.2') }}</li>
                            <li>{{ __('terms.sections.acceptable_use.items.3') }}</li>
                            <li>{{ __('terms.sections.acceptable_use.items.4') }}</li>
                            <li>{{ __('terms.sections.acceptable_use.items.5') }}</li>
                            <li>{{ __('terms.sections.acceptable_use.items.6') }}</li>
                            <li>{{ __('terms.sections.acceptable_use.items.7') }}</li>
                            <li>{{ __('terms.sections.acceptable_use.items.8') }}</li>
                            <li>{{ __('terms.sections.acceptable_use.items.9') }}</li>

                        </ol>

                    </section>


                    {{-- 07 --}}
                    <section id="community" class="terms-section">

                        <h2>
                            <span class="section-number">07</span>
                            {{ __('terms.sections.community.title') }}
                        </h2>

                        <ul>

                            <li>{{ __('terms.sections.community.items.0') }}</li>
                            <li>{{ __('terms.sections.community.items.1') }}</li>
                            <li>{{ __('terms.sections.community.items.2') }}</li>
                            <li>{{ __('terms.sections.community.items.3') }}</li>
                            <li>{{ __('terms.sections.community.items.4') }}</li>
                            <li>{{ __('terms.sections.community.items.5') }}</li>
                            <li>{{ __('terms.sections.community.items.6') }}</li>

                        </ul>

                        <div class="terms-quote">
                            {{ __('terms.sections.community.quote') }}
                        </div>

                    </section>


                    {{-- 08 --}}
                    <section id="content" class="terms-section">

                        <h2>
                            <span class="section-number">08</span>
                            {{ __('terms.sections.user_content.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.user_content.intro') }}
                        </p>

                        <ul>

                            <li>{{ __('terms.sections.user_content.items.0') }}</li>
                            <li>{{ __('terms.sections.user_content.items.1') }}</li>
                            <li>{{ __('terms.sections.user_content.items.2') }}</li>
                            <li>{{ __('terms.sections.user_content.items.3') }}</li>
                            <li>{{ __('terms.sections.user_content.items.4') }}</li>

                        </ul>

                        <p>
                            {{ __('terms.sections.user_content.p1') }}
                        </p>

                        <p>
                            {{ __('terms.sections.user_content.p2') }}
                        </p>

                    </section>


                    {{-- 09 --}}
                    <section id="intellectual-property" class="terms-section">

                        <h2>
                            <span class="section-number">09</span>
                            {{ __('terms.sections.intellectual_property.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.intellectual_property.p1') }}
                        </p>

                        <p>
                            {{ __('terms.sections.intellectual_property.p2') }}
                        </p>

                        <p>
                            {{ __('terms.sections.intellectual_property.p3') }}
                        </p>

                    </section>


                    {{-- 10 --}}
                    <section id="privacy" class="terms-section">

                        <h2>
                            <span class="section-number">10</span>
                            {{ __('terms.sections.privacy.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.privacy.p1') }}
                        </p>

                        <a href="{{ url('/privacy-policy') }}" class="terms-action-link">
                            {{ __('terms.read_privacy') }} →
                        </a>

                    </section>


                    {{-- 11 --}}
                    <section id="events" class="terms-section">

                        <h2>
                            <span class="section-number">11</span>
                            {{ __('terms.sections.events.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.events.p1') }}
                        </p>

                        <ul>

                            <li>{{ __('terms.sections.events.items.0') }}</li>
                            <li>{{ __('terms.sections.events.items.1') }}</li>
                            <li>{{ __('terms.sections.events.items.2') }}</li>
                            <li>{{ __('terms.sections.events.items.3') }}</li>

                        </ul>

                    </section>


                    {{-- 12 --}}
                    <section id="third-party" class="terms-section">

                        <h2>
                            <span class="section-number">12</span>
                            {{ __('terms.sections.third_party.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.third_party.p1') }}
                        </p>

                        <p>
                            {{ __('terms.sections.third_party.p2') }}
                        </p>

                    </section>


                    {{-- 13 --}}
                    <section id="availability" class="terms-section">

                        <h2>
                            <span class="section-number">13</span>
                            {{ __('terms.sections.availability.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.availability.p1') }}
                        </p>

                        <ul>

                            <li>{{ __('terms.sections.availability.items.0') }}</li>
                            <li>{{ __('terms.sections.availability.items.1') }}</li>
                            <li>{{ __('terms.sections.availability.items.2') }}</li>
                            <li>{{ __('terms.sections.availability.items.3') }}</li>
                            <li>{{ __('terms.sections.availability.items.4') }}</li>
                            <li>{{ __('terms.sections.availability.items.5') }}</li>

                        </ul>

                    </section>


                    {{-- 14 --}}
                    <section id="termination" class="terms-section">

                        <h2>
                            <span class="section-number">14</span>
                            {{ __('terms.sections.termination.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.termination.p1') }}
                        </p>

                        <ul>

                            <li>{{ __('terms.sections.termination.items.0') }}</li>
                            <li>{{ __('terms.sections.termination.items.1') }}</li>
                            <li>{{ __('terms.sections.termination.items.2') }}</li>
                            <li>{{ __('terms.sections.termination.items.3') }}</li>

                        </ul>

                        <p>
                            {{ __('terms.sections.termination.p2') }}
                        </p>

                    </section>


                    {{-- 15 --}}
                    <section id="changes" class="terms-section">

                        <h2>
                            <span class="section-number">15</span>
                            {{ __('terms.sections.changes.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.changes.p1') }}
                        </p>

                        <p>
                            <strong>
                                {{ __('terms.last_updated') }}:
                                {{ __('terms.updated_date') }}
                            </strong>
                        </p>

                        <p>
                            {{ __('terms.sections.changes.p2') }}
                        </p>

                    </section>


                    {{-- 16 --}}
                    <section id="governing-law" class="terms-section">

                        <h2>
                            <span class="section-number">16</span>
                            {{ __('terms.sections.governing_law.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.governing_law.p1') }}
                        </p>

                    </section>


                    {{-- 17 --}}
                    <section id="contact" class="terms-section terms-contact">

                        <h2>
                            {{ __('terms.sections.contact.title') }}
                        </h2>

                        <p>
                            {{ __('terms.sections.contact.p1') }}
                        </p>

                        <a href="{{ url('/contact') }}" class="terms-action-link">
                            {{ __('terms.contact_team') }} →
                        </a>

                    </section>


                    {{-- FINAL CTA --}}
                    <section class="terms-bottom-cta">

                        <h2>
                            {{ __('terms.cta.title_first') }}
                            <br>
                            {{ __('terms.cta.title_second') }}
                        </h2>

                        <div class="terms-buttons">

                            <a href="{{ url('/') }}" class="terms-btn terms-btn-primary">
                                {{ __('terms.back_home') }}
                            </a>

                            <a href="{{ url('/contact') }}" class="terms-btn terms-btn-secondary">
                                {{ __('terms.contact_us') }}
                            </a>

                        </div>

                    </section>

                </main>

            </div>

        </div>

    </div>


    @push('scripts')
        <script>
            document.querySelectorAll('.terms-nav a').forEach(link => {

                link.addEventListener('click', function(e) {

                    const target = document.querySelector(
                        this.getAttribute('href')
                    );

                    if (target) {

                        e.preventDefault();

                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                    }

                });

            });
        </script>
    @endpush

@endsection
