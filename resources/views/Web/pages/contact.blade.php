@extends('Web.layouts.app')

@section('title', __('contact.meta_title'))

@section('meta_description', __('contact.meta_description'))

@section('content')

    <section class="team0001-contact-page">

        {{-- HERO --}}
        <div class="team0001-contact-hero">
            <div class="team0001-contact-container">

                <div class="team0001-contact-hero-content">

                    {{-- Team Logo --}}
                    <div class="team0001-contact-hero-logo">
                        <img src="{{ asset('images/logo.png') }}" alt="Team 0001 Logo" loading="eager">
                    </div>

                    {{-- Breadcrumb --}}
                    <nav class="team0001-contact-breadcrumb" aria-label="Breadcrumb">
                        <a href="{{ url('/') }}">
                            {{ __('Home') }}
                        </a>

                        <span aria-hidden="true">/</span>


                        <span>
                            Contact
                        </span>
                    </nav>

                    {{-- Badge --}}
                    <span class="team0001-contact-badge">
                        {{ __('contact.badge') }}
                    </span>

                    {{-- Heading --}}
                    <h1>
                        {{ __('contact.hero_title') }}
                    </h1>

                    {{-- Description --}}
                    <p>
                        {{ __('contact.hero_description') }}
                    </p>

                </div>

            </div>
        </div>


        {{-- MAIN CONTENT --}}
        <div class="team0001-contact-container">

            <div class="team0001-contact-grid">

                {{-- LEFT SIDE --}}
                <div class="team0001-contact-info">

                    <span class="team0001-contact-small-title">
                        {{ __('contact.info_badge') }}
                    </span>

                    <h2>
                        {{ __('contact.info_title') }}
                    </h2>

                    <p class="team0001-contact-info-description">
                        {{ __('contact.info_description') }}
                    </p>


                    {{-- CONTACT CARDS --}}

                    @if (!empty($contactSettings['email']))
                        <a href="mailto:{{ $contactSettings['email'] }}" class="team0001-contact-info-card">
                            <div class="team0001-contact-icon">
                                ✉
                            </div>

                            <div>
                                <span>
                                    {{ __('contact.email_label') }}
                                </span>

                                <strong>
                                    {{ $contactSettings['email'] }}
                                </strong>
                            </div>
                        </a>
                    @endif


                    @if (!empty($contactSettings['phone']))
                        <a href="tel:{{ $contactSettings['phone'] }}" class="team0001-contact-info-card">
                            <div class="team0001-contact-icon">
                                ☎
                            </div>

                            <div>
                                <span>
                                    {{ __('contact.phone_label') }}
                                </span>

                                <strong>
                                    {{ $contactSettings['phone'] }}
                                </strong>
                            </div>
                        </a>
                    @endif


                    @if (!empty($contactSettings['address']))
                        <div class="team0001-contact-info-card">

                            <div class="team0001-contact-icon">
                                ⌖
                            </div>

                            <div>
                                <span>
                                    {{ __('contact.address_label') }}
                                </span>

                                <strong>
                                    {{ $contactSettings['address'] }}
                                </strong>
                            </div>

                        </div>
                    @endif


                    {{-- SOCIAL LINKS --}}

                    @if (!empty($socialLinks))

                        <div class="team0001-contact-social">

                            <span>
                                {{ __('contact.follow_us') }}
                            </span>

                            <div class="team0001-contact-social-links">

                                @foreach ($socialLinks as $social)
                                    @if (!empty($social['url']))
                                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                                            aria-label="{{ $social['name'] ?? 'Social Media' }}">
                                            {{ $social['icon'] ?? '↗' }}
                                        </a>
                                    @endif
                                @endforeach

                            </div>

                        </div>

                    @endif

                </div>


                {{-- FORM --}}
                <div class="team0001-contact-form-wrapper">

                    <div class="team0001-contact-form-header">

                        <span>
                            {{ __('contact.form_badge') }}
                        </span>

                        <h2>
                            {{ __('contact.form_title') }}
                        </h2>

                        <p>
                            {{ __('contact.form_description') }}
                        </p>

                    </div>


                    @if (session('success'))
                        <div class="team0001-contact-alert team0001-contact-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    @if (session('error'))
                        <div class="team0001-contact-alert team0001-contact-error">
                            {{ session('error') }}
                        </div>
                    @endif


                    @if ($errors->any())

                        <div class="team0001-contact-alert team0001-contact-error">

                            <strong>
                                {{ __('contact.validation_title') }}
                            </strong>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>

                    @endif


                    <form action="{{ route('contact.submit') }}" method="POST" class="team0001-contact-form">

                        @csrf

                        <div class="team0001-contact-form-row">

                            <div class="team0001-contact-field">

                                <label for="name">
                                    {{ __('contact.name') }}
                                </label>

                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    placeholder="{{ __('contact.name_placeholder') }}" autocomplete="name" required>

                            </div>


                            <div class="team0001-contact-field">

                                <label for="email">
                                    {{ __('contact.email') }}
                                </label>

                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="{{ __('contact.email_placeholder') }}" autocomplete="email" required>

                            </div>

                        </div>


                        <div class="team0001-contact-field">

                            <label for="phone">
                                {{ __('contact.phone') }}
                            </label>

                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                placeholder="{{ __('contact.phone_placeholder') }}" autocomplete="tel" inputmode="numeric"
                                pattern="[0-9]{10}" maxlength="12">

                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>


                        <div class="team0001-contact-field">

                            <label for="subject">
                                {{ __('contact.subject') }}
                            </label>

                            <select id="subject" name="subject" required>

                                <option value="">
                                    {{ __('contact.subject_placeholder') }}
                                </option>

                                @foreach (__('contact.subjects') as $key => $subject)
                                    <option value="{{ $key }}" @selected(old('subject') === $key)>
                                        {{ $subject }}
                                    </option>
                                @endforeach

                            </select>

                        </div>


                        <div class="team0001-contact-field">

                            <label for="message">
                                {{ __('contact.message') }}
                            </label>

                            <textarea id="message" name="message" rows="6" placeholder="{{ __('contact.message_placeholder') }}" required>{{ old('message') }}</textarea>

                        </div>


                        <div class="team0001-contact-form-footer">

                            <p>
                                {{ __('contact.form_note') }}
                            </p>

                            <button type="submit" class="team0001-contact-submit" id="contactSubmitButton">
                                <span class="team0001-contact-submit-content" id="contactSubmitContent">
                                    <span>{{ __('contact.submit') }}</span>
                                </span>

                                <span class="team0001-contact-submit-loading" id="contactSubmitLoading" aria-hidden="true">
                                    <span class="team0001-contact-spinner"></span>
                                    <span>{{ __('contact.sending') }}</span>
                                </span>
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.querySelector('.team0001-contact-form');
                const button = document.getElementById('contactSubmitButton');
                const content = document.getElementById('contactSubmitContent');
                const loading = document.getElementById('contactSubmitLoading');

                if (!form || !button) return;

                form.addEventListener('submit', function() {
                    button.disabled = true;
                    button.classList.add('is-loading');

                    content.style.display = 'none';
                    loading.style.display = 'inline-flex';
                });
            });


           
        </script>

        <script>
             document.getElementById('phone').addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 10);
            });
        </script>
    @endpush
@endsection
