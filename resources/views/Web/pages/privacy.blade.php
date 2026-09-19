@extends('Web.layouts.app')

@section('title', __('privacy.meta_title'))

@section('meta_description', __('privacy.meta_description'))

@section('content')

    <section class="team0001-privacy-hero">
        <div class="team0001-privacy-container">
            <div class="team0001-privacy-hero-content">

                <div class="team0001-privacy-hero-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Team 0001 Logo" loading="eager">
                </div>

                <nav class="team0001-privacy-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    <span aria-hidden="true">/</span>

                    <span>
                        {{ __('privacy.breadcrumb') }}
                    </span>
                </nav>

                <span class="team0001-privacy-badge">
                    {{ __('privacy.badge') }}
                </span>

                <h1>
                    {{ __('privacy.hero_title') }}
                </h1>

                <p>
                    {{ __('privacy.hero_description') }}
                </p>

                <div class="team0001-privacy-updated">
                    {{ __('privacy.last_updated') }}:
                    <strong>{{ __('privacy.updated_date') }}</strong>
                </div>

            </div>
        </div>
    </section>

    <section class="team0001-privacy-section">
        <div class="team0001-privacy-container">

            <div class="team0001-privacy-layout">

                <aside class="team0001-privacy-sidebar">
                    <div class="team0001-privacy-sidebar-inner">

                        <span class="team0001-privacy-sidebar-label">
                            {{ __('privacy.contents') }}
                        </span>

                        <nav>
                            @foreach (__('privacy.sections') as $key => $section)
                                <a href="#privacy-{{ $key }}">
                                    {{ $section['title'] }}
                                </a>
                            @endforeach
                        </nav>

                    </div>
                </aside>

                <main class="team0001-privacy-content">

                    <div class="team0001-privacy-intro">
                        <p>
                            {{ __('privacy.intro') }}
                        </p>
                    </div>

                    @foreach (__('privacy.sections') as $key => $section)
                        <article class="team0001-privacy-article" id="privacy-{{ $key }}">

                            <div class="team0001-privacy-article-number">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="team0001-privacy-article-content">

                                <h2>
                                    {{ $section['title'] }}
                                </h2>

                                @foreach ($section['paragraphs'] as $paragraph)
                                    <p>
                                        {{ $paragraph }}
                                    </p>
                                @endforeach

                                @if (isset($section['items']))
                                    <ul>
                                        @foreach ($section['items'] as $item)
                                            <li>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                            </div>

                        </article>
                    @endforeach

                    <div class="team0001-privacy-contact">

                        <div>
                            <span>
                                {{ __('privacy.contact_badge') }}
                            </span>

                            <h3>
                                {{ __('privacy.contact_title') }}
                            </h3>

                            <p>
                                {{ __('privacy.contact_description') }}
                            </p>
                        </div>

                        <a href="{{ route('contact') }}" class="team0001-privacy-contact-button">
                            {{ __('privacy.contact_button') }}
                        </a>

                    </div>

                </main>

            </div>

        </div>
    </section>

@endsection
