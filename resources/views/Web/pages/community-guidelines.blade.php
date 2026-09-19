@extends('Web.layouts.app')

@section('title', __('community.meta_title'))

@section('meta_description', __('community.meta_description'))

@section('content')

    {{-- =====================================================
        COMMUNITY GUIDELINES HERO
    ====================================================== --}}

    <section class="team0001-community-hero">

        <div class="team0001-community-container">

            <div class="team0001-community-hero-content">

                {{-- Team Logo --}}
                <div class="team0001-community-hero-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Team 0001 Logo" loading="eager">
                </div>

                {{-- Breadcrumb --}}
                <nav class="team0001-community-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    <span aria-hidden="true">/</span>

                    <span>
                        {{ __('community.breadcrumb') }}
                    </span>
                </nav>

                {{-- Badge --}}
                <span class="team0001-community-badge">
                    {{ __('community.badge') }}
                </span>

                {{-- Heading --}}
                <h1>
                    {{ __('community.hero_title') }}
                </h1>

                {{-- Description --}}
                <p>
                    {{ __('community.hero_description') }}
                </p>

            </div>

        </div>

    </section>


    {{-- =====================================================
        INTRO
    ====================================================== --}}

    <section class="team0001-community-section">

        <div class="team0001-community-container">

            <div class="team0001-community-intro">

                <span class="team0001-community-section-label">
                    {{ __('community.intro_badge') }}
                </span>

                <h2>
                    {{ __('community.intro_title') }}
                </h2>

                <p>
                    {{ __('community.intro_description') }}
                </p>

            </div>


            {{-- =================================================
                GUIDELINES
            ================================================== --}}

            <div class="team0001-community-guidelines">

                @foreach (__('community.guidelines') as $index => $guideline)
                    <article class="team0001-community-card">

                        <div class="team0001-community-card-number">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        <div class="team0001-community-card-content">

                            <h3>
                                {{ $guideline['title'] }}
                            </h3>

                            <p>
                                {{ $guideline['description'] }}
                            </p>

                        </div>

                    </article>
                @endforeach

            </div>


            {{-- =================================================
                REPORTING
            ================================================== --}}

            <div class="team0001-community-report">

                <div class="team0001-community-report-icon">
                    !
                </div>

                <div class="team0001-community-report-content">

                    <span>
                        {{ __('community.report_badge') }}
                    </span>

                    <h3>
                        {{ __('community.report_title') }}
                    </h3>

                    <p>
                        {{ __('community.report_description') }}
                    </p>

                </div>

                <a href="{{ route('contact') }}" class="team0001-community-report-button">
                    {{ __('community.report_button') }}
                </a>

            </div>


            {{-- =================================================
                ENFORCEMENT
            ================================================== --}}

            <div class="team0001-community-enforcement">

                <div class="team0001-community-enforcement-header">

                    <span class="team0001-community-section-label">
                        {{ __('community.enforcement_badge') }}
                    </span>

                    <h2>
                        {{ __('community.enforcement_title') }}
                    </h2>

                    <p>
                        {{ __('community.enforcement_description') }}
                    </p>

                </div>


                <div class="team0001-community-enforcement-grid">

                    @foreach (__('community.enforcement') as $item)
                        <div class="team0001-community-enforcement-item">

                            <span class="team0001-community-check">
                                ✓
                            </span>

                            <span>
                                {{ $item }}
                            </span>

                        </div>
                    @endforeach

                </div>

            </div>


            {{-- =================================================
                APPEAL
            ================================================== --}}

            <div class="team0001-community-appeal">

                <div>

                    <span class="team0001-community-appeal-badge">
                        {{ __('community.appeal_badge') }}
                    </span>

                    <h3>
                        {{ __('community.appeal_title') }}
                    </h3>

                    <p>
                        {{ __('community.appeal_description') }}
                    </p>

                </div>

                <a href="{{ route('contact') }}" class="team0001-community-appeal-button">
                    {{ __('community.appeal_button') }}
                </a>

            </div>

        </div>

    </section>

@endsection
