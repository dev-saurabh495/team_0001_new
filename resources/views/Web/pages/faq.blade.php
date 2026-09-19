@extends('Web.layouts.app')

@section('title', __('faq.meta_title'))

@section('meta_description', __('faq.meta_description'))

@section('content')

    {{-- =====================================================
        FAQ HERO
    ====================================================== --}}

    <section class="team0001-faq-hero">

        <div class="team0001-faq-container">

            <div class="team0001-faq-hero-content">

                {{-- Team Logo --}}
                <div class="team0001-faq-hero-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Team 0001 Logo" loading="eager">
                </div>

                {{-- Breadcrumb --}}
                <nav class="team0001-faq-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    <span aria-hidden="true">/</span>

                    <span>
                        {{ __('faq.breadcrumb') }}
                    </span>
                </nav>

                {{-- Badge --}}
                <span class="team0001-faq-badge">
                    {{ __('faq.badge') }}
                </span>

                {{-- Heading --}}
                <h1>
                    {{ __('faq.hero_title') }}
                </h1>

                {{-- Description --}}
                <p>
                    {{ __('faq.hero_description') }}
                </p>

            </div>

        </div>

    </section>


    {{-- =====================================================
        FAQ CONTENT
    ====================================================== --}}

    <section class="team0001-faq-section">

        <div class="team0001-faq-container">

            <div class="team0001-faq-header">

                <span class="team0001-faq-section-label">
                    {{ __('faq.section_badge') }}
                </span>

                <h2>
                    {{ __('faq.section_title') }}
                </h2>

                <p>
                    {{ __('faq.section_description') }}
                </p>

            </div>


            {{-- FAQ Accordion --}}

            <div class="team0001-faq-list" id="team0001FaqList">

                @foreach (__('faq.questions') as $index => $faq)
                    <article class="team0001-faq-item" data-faq-item>

                        <button type="button" class="team0001-faq-question" aria-expanded="false"
                            aria-controls="faq-answer-{{ $index }}">

                            <span class="team0001-faq-question-text">
                                {{ $faq['question'] }}
                            </span>

                            <span class="team0001-faq-icon" aria-hidden="true">
                                <span></span>
                                <span></span>
                            </span>

                        </button>


                        <div id="faq-answer-{{ $index }}" class="team0001-faq-answer" role="region">

                            <div class="team0001-faq-answer-inner">

                                <p>
                                    {{ $faq['answer'] }}
                                </p>

                            </div>

                        </div>

                    </article>
                @endforeach

            </div>


            {{-- Still Have Question --}}

            <div class="team0001-faq-contact">

                <div class="team0001-faq-contact-content">

                    <span class="team0001-faq-contact-badge">
                        {{ __('faq.contact_badge') }}
                    </span>

                    <h3>
                        {{ __('faq.contact_title') }}
                    </h3>

                    <p>
                        {{ __('faq.contact_description') }}
                    </p>

                </div>

                <a href="{{ route('contact') }}" class="team0001-faq-contact-button">
                    {{ __('faq.contact_button') }}
                </a>

            </div>

        </div>

    </section>




    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const faqItems = document.querySelectorAll('[data-faq-item]');

                faqItems.forEach(function(item) {

                    const button = item.querySelector('.team0001-faq-question');

                    button.addEventListener('click', function() {

                        const isOpen = item.classList.contains('is-open');

                        // Close all other FAQ items
                        faqItems.forEach(function(otherItem) {

                            if (otherItem !== item) {

                                otherItem.classList.remove('is-open');

                                const otherButton =
                                    otherItem.querySelector('.team0001-faq-question');

                                if (otherButton) {
                                    otherButton.setAttribute(
                                        'aria-expanded',
                                        'false'
                                    );
                                }
                            }

                        });

                        // Toggle current item
                        if (isOpen) {

                            item.classList.remove('is-open');

                            button.setAttribute(
                                'aria-expanded',
                                'false'
                            );

                        } else {

                            item.classList.add('is-open');

                            button.setAttribute(
                                'aria-expanded',
                                'true'
                            );

                        }

                    });

                });

            });
        </script>
    @endpush
@endsection
