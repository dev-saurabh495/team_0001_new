@extends('Web.layouts.app')

@section('title', __('about.meta_title'))

@section('meta_description', __('about.meta_description'))

@section('content')

    <section class="team0001-about-hero">
        <div class="team0001-about-hero-bg"></div>

        <div class="team0001-about-container">
            <div class="team0001-about-hero-content">

                <div class="team0001-about-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Team 0001 Logo" loading="eager">
                </div>

                <nav class="team0001-about-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    <span aria-hidden="true">/</span>

                    <span>
                        {{ __('about.breadcrumb') }}
                    </span>
                </nav>

                <span class="team0001-about-badge">
                    {{ __('about.badge') }}
                </span>

                <h1>
                    {{ __('about.hero_title') }}
                </h1>

                <p>
                    {{ __('about.hero_description') }}
                </p>

            </div>
        </div>
    </section>

    <section class="team0001-about-intro">
        <div class="team0001-about-container">

            <div class="team0001-about-intro-grid">

                <div class="team0001-about-intro-heading">
                    <span>{{ __('about.intro_badge') }}</span>

                    <h2>
                        {{ __('about.intro_title') }}
                    </h2>
                </div>

                <div class="team0001-about-intro-content">
                    <p>
                        {{ __('about.intro_text_1') }}
                    </p>

                    <p>
                        {{ __('about.intro_text_2') }}
                    </p>
                </div>

            </div>

        </div>
    </section>

    <section class="team0001-about-story">
        <div class="team0001-about-container">

            <div class="team0001-about-story-grid">

                <div class="team0001-about-story-content">

                    <span class="team0001-about-section-label">
                        {{ __('about.story_badge') }}
                    </span>

                    <h2>
                        {{ __('about.story_title') }}
                    </h2>

                    <p>
                        {{ __('about.story_text_1') }}
                    </p>

                    <p>
                        {{ __('about.story_text_2') }}
                    </p>

                    <div class="team0001-about-story-highlight">
                        <strong>{{ __('about.story_quote') }}</strong>
                    </div>

                </div>

                <div class="team0001-about-story-visual">

                    <div class="team0001-about-story-circle circle-one"></div>
                    <div class="team0001-about-story-circle circle-two"></div>

                    <div class="team0001-about-story-card">

                        <div class="team0001-about-story-logo">
                            <img src="{{ asset('images/logo.png') }}" alt="Team 0001" loading="lazy">
                        </div>

                        <span>TEAM</span>

                        <strong>0001</strong>

                        <small>
                            {{ __('about.story_card_text') }}
                        </small>

                    </div>

                </div>

            </div>

        </div>
    </section>

    <section class="team0001-about-purpose">
        <div class="team0001-about-container">

            <div class="team0001-about-section-heading">
                <span>{{ __('about.purpose_badge') }}</span>

                <h2>
                    {{ __('about.purpose_title') }}
                </h2>

                <p>
                    {{ __('about.purpose_description') }}
                </p>
            </div>

            <div class="team0001-about-purpose-grid">

                <article class="team0001-about-purpose-card">
                    <span class="team0001-about-card-number">01</span>

                    <div class="team0001-about-card-icon">◎</div>

                    <h3>
                        {{ __('about.mission_title') }}
                    </h3>

                    <p>
                        {{ __('about.mission_text') }}
                    </p>
                </article>

                <article class="team0001-about-purpose-card">
                    <span class="team0001-about-card-number">02</span>

                    <div class="team0001-about-card-icon">✦</div>

                    <h3>
                        {{ __('about.vision_title') }}
                    </h3>

                    <p>
                        {{ __('about.vision_text') }}
                    </p>
                </article>

                <article class="team0001-about-purpose-card">
                    <span class="team0001-about-card-number">03</span>

                    <div class="team0001-about-card-icon">↗</div>

                    <h3>
                        {{ __('about.impact_title') }}
                    </h3>

                    <p>
                        {{ __('about.impact_text') }}
                    </p>
                </article>

            </div>

        </div>
    </section>

    <section class="team0001-about-values">
        <div class="team0001-about-container">

            <div class="team0001-about-values-heading">
                <div>
                    <span>{{ __('about.values_badge') }}</span>

                    <h2>
                        {{ __('about.values_title') }}
                    </h2>
                </div>

                <p>
                    {{ __('about.values_description') }}
                </p>
            </div>

            <div class="team0001-about-values-grid">

                @foreach (__('about.values') as $value)
                    <article class="team0001-about-value">
                        <span class="team0001-about-value-icon">
                            {{ $value['icon'] }}
                        </span>

                        <div>
                            <h3>
                                {{ $value['title'] }}
                            </h3>

                            <p>
                                {{ $value['description'] }}
                            </p>
                        </div>
                    </article>
                @endforeach

            </div>

        </div>
    </section>

    <section class="team0001-about-journey">
        <div class="team0001-about-container">

            <div class="team0001-about-section-heading">
                <span>{{ __('about.journey_badge') }}</span>

                <h2>
                    {{ __('about.journey_title') }}
                </h2>

                <p>
                    {{ __('about.journey_description') }}
                </p>
            </div>

            <div class="team0001-about-timeline">

                @foreach (__('about.journey') as $item)
                    <div class="team0001-about-timeline-item">

                        <div class="team0001-about-timeline-marker">
                            {{ $item['number'] }}
                        </div>

                        <div class="team0001-about-timeline-content">
                            <span>{{ $item['label'] }}</span>

                            <h3>
                                {{ $item['title'] }}
                            </h3>

                            <p>
                                {{ $item['description'] }}
                            </p>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <section class="team0001-about-cta">
        <div class="team0001-about-container">

            <div class="team0001-about-cta-inner">

                <div>
                    <span>{{ __('about.cta_badge') }}</span>

                    <h2>
                        {{ __('about.cta_title') }}
                    </h2>

                    <p>
                        {{ __('about.cta_description') }}
                    </p>
                </div>

                <div class="team0001-about-cta-actions">
                    <a href="{{ route('join') }}" class="team0001-about-cta-primary">
                        {{ __('about.cta_join') }}
                    </a>

                    <a href="{{ route('contact') }}" class="team0001-about-cta-secondary">
                        {{ __('about.cta_contact') }}
                    </a>
                </div>

            </div>

        </div>
    </section>

@endsection
