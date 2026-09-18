

@extends('Web.layouts.app')

@section('title', 'Together. We Create. We Grow.')

@section('meta\_description', 'Team 0001 — A youth community built around people, participation, shared experiences and
    growing together.')

@section('content')

    <style>
        .team-page {
            --navy: #07111f;
            --navy-2: #0d1b2a;
            --navy-3: #18283d;
            --gold: #d4af37;
            --gold-light: #f0d878;
            --white: #f8f9fa;
            --muted: #aeb8c6;
            --muted-2: #778496;
            --border: rgba(255, 255, 255, .09);



            position: relative;
            width: 100%;
            min-height: 100vh;
            overflow: hidden;



            color: var(--white);



            font-family:
                "Poppins",
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;



            background:
                radial-gradient(circle at 10% 5%,
                    rgba(212, 175, 55, .11),
                    transparent 28%),
                radial-gradient(circle at 95% 20%,
                    rgba(45, 86, 130, .20),
                    transparent 30%),
                linear-gradient(180deg,
                    #07111f 0%,
                    #0b1727 48%,
                    #07111f 100%);
        }



        .team-page *,
        .team-page *::before,
        .team-page *::after {
            box-sizing: border-box;
        }



        .team-container {
            width: min(1160px, calc(100% - 40px));
            margin-inline: auto;
        }



        /* =========================================================
       BACKGROUND
       ========================================================= */



        .team-page__noise {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            opacity: .025;



            background-image:
                url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.5'/%3E%3C/svg%3E");
        }



        .team-page__glow {
            position: absolute;
            z-index: 0;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(100px);
            opacity: .14;
        }



        .team-page__glow--gold {
            top: 180px;
            left: -250px;
            background: var(--gold);
        }



        .team-page__glow--blue {
            top: 700px;
            right: -280px;
            background: #37638e;
        }



        /* =========================================================
       HERO
       ========================================================= */



        .team-hero {
            position: relative;
            z-index: 1;



            min-height: 850px;



            display: flex;
            align-items: center;



            padding:
                150px 0 100px;



            isolation: isolate;
        }



        .team-hero__grid {
            position: absolute;
            inset: 0;



            pointer-events: none;



            opacity: .22;



            background-image:
                linear-gradient(rgba(255, 255, 255, .035) 1px,
                    transparent 1px),
                linear-gradient(90deg,
                    rgba(255, 255, 255, .035) 1px,
                    transparent 1px);



            background-size: 72px 72px;



            mask-image:
                linear-gradient(to bottom,
                    black 0%,
                    transparent 82%);



            -webkit-mask-image:
                linear-gradient(to bottom,
                    black 0%,
                    transparent 82%);
        }



        .team-hero__content {
            position: relative;
            z-index: 5;



            width: 100%;
            max-width: 760px;
        }



        .team-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;



            margin-bottom: 24px;
            padding: 8px 14px;



            border: 1px solid rgba(212, 175, 55, .24);
            border-radius: 999px;



            background: rgba(212, 175, 55, .06);



            color: var(--gold-light);



            font-size: 10px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;



            backdrop-filter: blur(12px);
        }



        .team-eyebrow__dot {
            width: 7px;
            height: 7px;
            flex: 0 0 7px;



            border-radius: 50%;



            background: var(--gold-light);



            box-shadow:
                0 0 0 4px rgba(212, 175, 55, .08),
                0 0 15px rgba(240, 216, 120, .65);
        }



        .team-hero h1 {
            margin: 0;



            font-family:
                "Cinzel",
                Georgia,
                serif;



            font-size: clamp(46px, 7vw, 88px);
            font-weight: 600;



            line-height: 1.02;
            letter-spacing: -.035em;
        }



        .team-hero h1 span {
            display: block;



            color: var(--gold-light);



            text-shadow:
                0 0 45px rgba(212, 175, 55, .12);
        }



        .team-hero__description {
            max-width: 650px;



            margin: 28px 0 0;



            color: var(--muted);



            font-size: 16px;
            line-height: 1.85;
        }



        .team-hero__actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;



            margin-top: 36px;
        }



        /* =========================================================
       BUTTONS
       ========================================================= */



        .team-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;



            min-height: 50px;



            padding: 0 22px;



            border-radius: 999px;



            text-decoration: none;



            font-size: 12px;
            font-weight: 700;



            transition:
                transform .25s ease,
                box-shadow .25s ease,
                background .25s ease,
                border-color .25s ease;
        }



        .team-btn--primary {
            color: var(--navy);



            background:
                linear-gradient(135deg,
                    var(--gold-light),
                    var(--gold));



            box-shadow:
                0 10px 30px rgba(212, 175, 55, .18);
        }



        .team-btn--primary:hover {
            transform: translateY(-3px);



            box-shadow:
                0 15px 38px rgba(212, 175, 55, .28);
        }



        .team-btn--secondary {
            color: var(--white);



            border: 1px solid rgba(255, 255, 255, .13);



            background: rgba(255, 255, 255, .045);



            backdrop-filter: blur(14px);
        }



        .team-btn--secondary:hover {
            transform: translateY(-3px);



            border-color: rgba(212, 175, 55, .32);



            background: rgba(255, 255, 255, .07);
        }



        /* =========================================================
       HERO VISUAL
       ========================================================= */



        .team-hero__visual {
            position: absolute;



            z-index: 1;



            top: 50%;
            right: -10px;



            width: 450px;
            height: 450px;



            transform: translateY(-48%);



            pointer-events: none;
        }



        .team-orbit {
            position: absolute;
            inset: 20px;



            border:
                1px solid rgba(212, 175, 55, .15);



            border-radius: 50%;



            animation:
                teamSpin 26s linear infinite;
        }



        .team-orbit::before {
            content: "";



            position: absolute;



            top: 29px;
            left: 70px;



            width: 8px;
            height: 8px;



            border-radius: 50%;



            background: var(--gold-light);



            box-shadow:
                0 0 20px rgba(240, 216, 120, .9);
        }



        .team-orbit::after {
            content: "";



            position: absolute;



            right: 55px;
            bottom: 55px;



            width: 5px;
            height: 5px;



            border-radius: 50%;



            background: rgba(255, 255, 255, .8);



            box-shadow:
                0 0 15px rgba(255, 255, 255, .5);
        }



        .team-orbit--two {
            inset: 70px;



            border-color:
                rgba(255, 255, 255, .07);



            animation:
                teamSpinReverse 19s linear infinite;
        }



        .team-orbit--two::before {
            top: auto;
            left: auto;
            right: 20px;
            bottom: 60px;



            width: 6px;
            height: 6px;



            background: #91a9c4;



            box-shadow:
                0 0 15px rgba(145, 169, 196, .5);
        }



        .team-logo-card {
            position: absolute;



            inset: 112px;



            display: flex;
            align-items: center;
            justify-content: center;



            border:
                1px solid rgba(212, 175, 55, .22);



            border-radius: 50%;



            background:
                radial-gradient(circle,
                    rgba(212, 175, 55, .10),
                    rgba(13, 27, 42, .82) 65%);



            box-shadow:
                0 0 80px rgba(212, 175, 55, .08),
                inset 0 0 45px rgba(255, 255, 255, .025);



            backdrop-filter: blur(15px);
        }



        .team-logo-card img {
            width: 160px;
            height: 160px;



            object-fit: contain;



            border-radius: 50%;



            filter:
                drop-shadow(0 18px 30px rgba(0, 0, 0, .4));
        }



        @keyframes teamSpin {
            from {
                transform: rotate(0deg);
            }



            to {
                transform: rotate(360deg);
            }
        }



        @keyframes teamSpinReverse {
            from {
                transform: rotate(360deg);
            }



            to {
                transform: rotate(0deg);
            }
        }



        /* =========================================================
       STATS
       ========================================================= */



        .team-stats {
            position: relative;
            z-index: 5;



            margin-top: -25px;
        }



        .team-stats__box {
            display: grid;
            grid-template-columns: repeat(3, 1fr);



            overflow: hidden;



            border:
                1px solid var(--border);



            border-radius: 24px;



            background:
                rgba(255, 255, 255, .035);



            backdrop-filter: blur(22px);
        }



        .team-stat {
            padding: 27px 20px;



            text-align: center;



            border-right:
                1px solid var(--border);
        }



        .team-stat:last-child {
            border-right: 0;
        }



        .team-stat strong {
            display: block;



            color: var(--gold-light);



            font-family:
                "Cinzel",
                Georgia,
                serif;



            font-size: 31px;
            font-weight: 600;
        }



        .team-stat span {
            display: block;



            margin-top: 5px;



            color: var(--muted);



            font-size: 10px;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
        }



        /* =========================================================
       GENERAL SECTIONS
       ========================================================= */



        .team-section {
            position: relative;
            z-index: 2;



            padding: 120px 0;
        }



        .team-section__header {
            max-width: 690px;



            margin-bottom: 48px;
        }



        .team-kicker {
            margin-bottom: 13px;



            color: var(--gold-light);



            font-size: 10px;
            font-weight: 700;
            letter-spacing: .22em;
            text-transform: uppercase;
        }



        .team-section h2 {
            margin: 0;



            font-family:
                "Cinzel",
                Georgia,
                serif;



            font-size: clamp(32px, 4vw, 53px);
            font-weight: 600;



            line-height: 1.13;
            letter-spacing: -.02em;
        }



        .team-section__header p {
            max-width: 650px;



            margin: 17px 0 0;



            color: var(--muted);



            font-size: 14px;
            line-height: 1.85;
        }



        /* =========================================================
       GLASS
       ========================================================= */



        .team-glass {
            border:
                1px solid var(--border);



            background:
                linear-gradient(145deg,
                    rgba(255, 255, 255, .055),
                    rgba(255, 255, 255, .018));



            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .025);



            backdrop-filter: blur(20px);
        }



        /* =========================================================
       ABOUT
       ========================================================= */



        .team-about {
            display: grid;



            grid-template-columns:
                minmax(0, 1.15fr) minmax(300px, .85fr);



            gap: 20px;
        }



        .team-about__main {
            position: relative;



            min-height: 380px;



            display: flex;
            flex-direction: column;
            justify-content: flex-end;



            overflow: hidden;



            padding: 40px;



            border-radius: 26px;
        }



        .team-about__main::before {
            content: "0001";



            position: absolute;



            top: -35px;
            right: -15px;



            color: rgba(212, 175, 55, .035);



            font-family:
                "Cinzel",
                Georgia,
                serif;



            font-size: 160px;
            font-weight: 700;
        }



        .team-about__main::after {
            content: "";



            position: absolute;



            top: 45px;
            left: 45px;



            width: 90px;
            height: 90px;



            border-radius: 50%;



            background:
                rgba(212, 175, 55, .06);



            filter: blur(30px);
        }



        .team-about__main h3,
        .team-about__main p {
            position: relative;
            z-index: 2;
        }



        .team-about__main h3 {
            margin: 0 0 13px;



            font-family:
                "Cinzel",
                Georgia,
                serif;



            font-size: 29px;
        }



        .team-about__main p {
            max-width: 600px;



            margin: 0;



            color: var(--muted);



            font-size: 14px;
            line-height: 1.85;
        }



        .team-about__values {
            display: grid;
            gap: 20px;
        }



        .team-value {
            flex: 1;



            padding: 30px;



            border-radius: 24px;
        }



        .team-value__icon {
            width: 45px;
            height: 45px;



            display: grid;
            place-items: center;



            margin-bottom: 18px;



            border:
                1px solid rgba(212, 175, 55, .15);



            border-radius: 14px;



            color: var(--gold-light);



            background:
                rgba(212, 175, 55, .08);



            font-size: 19px;
        }



        .team-value h3 {
            margin: 0 0 8px;



            font-size: 17px;
        }



        .team-value p {
            margin: 0;



            color: var(--muted);



            font-size: 13px;
            line-height: 1.75;
        }



        /* =========================================================
       ACTIVITIES
       ========================================================= */



        .team-activities {
            display: grid;



            grid-template-columns:
                repeat(3, minmax(0, 1fr));



            gap: 18px;
        }



        .team-activity {
            position: relative;



            min-height: 295px;



            overflow: hidden;



            padding: 30px;



            border-radius: 24px;



            transition:
                transform .3s ease,
                border-color .3s ease,
                background .3s ease;
        }



        .team-activity:hover {
            transform: translateY(-7px);



            border-color:
                rgba(212, 175, 55, .22);



            background:
                linear-gradient(145deg,
                    rgba(255, 255, 255, .065),
                    rgba(255, 255, 255, .02));
        }



        .team-activity__number {
            position: absolute;



            top: 17px;
            right: 23px;



            color: rgba(255, 255, 255, .07);



            font-family:
                "Cinzel",
                Georgia,
                serif;



            font-size: 47px;
        }



        .team-activity__icon {
            width: 53px;
            height: 53px;



            display: grid;
            place-items: center;



            margin-bottom: 65px;



            border:
                1px solid rgba(212, 175, 55, .14);



            border-radius: 16px;



            color: var(--gold-light);



            background:
                rgba(212, 175, 55, .08);



            font-size: 21px;
        }



        .team-activity h3 {
            margin: 0 0 9px;



            font-size: 18px;
        }



        .team-activity p {
            margin: 0;



            color: var(--muted);



            font-size: 13px;
            line-height: 1.75;
        }



        /* =========================================================
       EVENTS
       ========================================================= */



        .team-events {
            position: relative;



            overflow: hidden;



            padding: 65px;



            border:
                1px solid rgba(212, 175, 55, .19);



            border-radius: 30px;



            background:
                radial-gradient(circle at 88% 50%,
                    rgba(212, 175, 55, .13),
                    transparent 32%),
                linear-gradient(135deg,
                    rgba(255, 255, 255, .06),
                    rgba(255, 255, 255, .022));



            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .025);
        }



        .team-events::after {
            content: "EVENTS";



            position: absolute;



            right: -30px;
            bottom: -45px;



            color: rgba(255, 255, 255, .025);



            font-family:
                "Cinzel",
                Georgia,
                serif;



            font-size: 100px;
            font-weight: 700;



            pointer-events: none;
        }



        .team-events h2 {
            position: relative;
            z-index: 2;



            max-width: 650px;
        }



        .team-events p {
            position: relative;
            z-index: 2;



            max-width: 610px;



            margin: 17px 0 28px;



            color: var(--muted);



            font-size: 14px;
            line-height: 1.85;
        }



        .team-events .team-btn {
            position: relative;
            z-index: 3;
        }



        /* =========================================================
       GALLERY
       ========================================================= */



        .team-gallery {
            display: grid;



            grid-template-columns:
                1.25fr .75fr .75fr;



            grid-template-rows:
                190px 190px;



            gap: 14px;
        }



        .team-gallery__item {
            position: relative;



            overflow: hidden;



            border:
                1px solid rgba(255, 255, 255, .08);



            border-radius: 20px;



            background:
                linear-gradient(135deg,
                    rgba(212, 175, 55, .10),
                    rgba(255, 255, 255, .025));
        }



        .team-gallery__item:first-child {
            grid-row: 1 / 3;
        }



        .team-gallery__item::before {
            content: "";



            position: absolute;



            inset: 0;



            background:
                radial-gradient(circle at 50% 35%,
                    rgba(212, 175, 55, .17),
                    transparent 40%);
        }



        .team-gallery__item::after {
            content: attr(data-number);



            position: absolute;



            left: 20px;
            bottom: 17px;



            color: rgba(255, 255, 255, .5);



            font-family:
                "Cinzel",
                Georgia,
                serif;



            font-size: 12px;
            letter-spacing: .12em;
        }



        .team-gallery__center {
            position: absolute;



            top: 50%;
            left: 50%;



            width: 90px;
            height: 90px;



            transform:
                translate(-50%, -50%);



            border:
                1px solid rgba(212, 175, 55, .22);



            border-radius: 50%;



            background:
                rgba(212, 175, 55, .045);



            box-shadow:
                0 0 50px rgba(212, 175, 55, .08);
        }



        .team-gallery__center::after {
            content: "";



            position: absolute;



            inset: 14px;



            border:
                1px solid rgba(212, 175, 55, .14);



            border-radius: 50%;
        }



        /* =========================================================
       FINAL QUOTE
       ========================================================= */



        .team-final {
            position: relative;



            z-index: 2;



            padding: 80px 20px 130px;



            text-align: center;
        }



        .team-final__mark {
            color: var(--gold);



            font-family: Georgia, serif;



            font-size: 70px;



            line-height: .4;
        }



        .team-final h2 {
            max-width: 820px;



            margin: 25px auto 18px;



            font-family:
                "Cinzel",
                Georgia,
                serif;



            font-size: clamp(30px, 4vw, 49px);
            font-weight: 600;



            line-height: 1.2;
        }



        .team-final p {
            margin: 0;



            color: var(--muted-2);



            font-size: 10px;
            font-weight: 600;



            letter-spacing: .16em;
        }



        /* =========================================================
       RESPONSIVE
       ========================================================= */



        @media (max-width: 1050px) {



            .team-hero__visual {
                right: -130px;
                opacity: .42;
            }



            .team-hero__content {
                max-width: 700px;
            }



            .team-about {
                grid-template-columns: 1fr;
            }



            .team-about__values {
                grid-template-columns: repeat(2, 1fr);
            }
        }



        @media (max-width: 760px) {



            .team-container {
                width: calc(100% - 28px);
            }



            .team-hero {
                min-height: auto;



                padding:
                    145px 0 85px;
            }



            .team-hero h1 {
                font-size:
                    clamp(43px,
                        13vw,
                        65px);
            }



            .team-hero__description {
                font-size: 14px;
                line-height: 1.8;
            }



            .team-hero__actions {
                flex-direction: column;
                align-items: stretch;
            }



            .team-btn {
                width: 100%;
            }



            .team-hero__visual {
                width: 340px;
                height: 340px;



                top: 31%;
                right: -160px;



                opacity: .18;
            }



            .team-logo-card {
                inset: 82px;
            }



            .team-logo-card img {
                width: 115px;
                height: 115px;
            }



            .team-stats {
                margin-top: 0;
            }



            .team-stats__box {
                grid-template-columns: 1fr;



                border-radius: 20px;
            }



            .team-stat {
                border-right: 0;
                border-bottom:
                    1px solid var(--border);
            }



            .team-stat:last-child {
                border-bottom: 0;
            }



            .team-section {
                padding: 80px 0;
            }



            .team-about__main {
                min-height: 320px;
                padding: 28px;
            }



            .team-about__main::before {
                font-size: 110px;
            }



            .team-about__values {
                grid-template-columns: 1fr;
            }



            .team-activities {
                grid-template-columns: 1fr;
            }



            .team-activity {
                min-height: 240px;
            }



            .team-activity__icon {
                margin-bottom: 48px;
            }



            .team-events {
                padding: 36px 25px;
                border-radius: 23px;
            }



            .team-events::after {
                font-size: 60px;
            }



            .team-gallery {
                grid-template-columns: 1fr 1fr;
                grid-template-rows:
                    190px 150px 150px;
            }



            .team-gallery__item:first-child {
                grid-column: 1 / 3;
                grid-row: 1;
            }



            .team-final {
                padding-bottom: 90px;
            }
        }



        @media (max-width: 430px) {



            .team-hero {
                padding-top: 135px;
            }



            .team-eyebrow {
                font-size: 9px;
            }



            .team-hero h1 {
                font-size: 43px;
            }



            .team-about__main {
                padding: 24px;
            }



            .team-value {
                padding: 25px;
            }



            .team-gallery {
                grid-template-rows:
                    170px 125px 125px;
            }
        }



        @media (prefers-reduced-motion: reduce) {



            .team-orbit,
            .team-orbit--two {
                animation: none;
            }



            .team-btn,
            .team-activity {
                transition: none;
            }
        }
    </style>
    <div class="team-page">

        <div class="team-page__noise"></div>



        <div class="team-page__glow team-page__glow--gold"></div>
        <div class="team-page__glow team-page__glow--blue"></div>



        {{-- =====================================================
     HERO
====================================================== --}}



        <section class="team-hero">



            <div class="team-hero__grid"></div>



            <div class="team-container">



                <div class="team-hero__content">



                    <div class="team-eyebrow">
                        <span class="team-eyebrow__dot"></span>
                        Welcome to Team 0001
                    </div>



                    <h1>
                        Together.
                        <span>We Create.</span>
                        We Grow.
                    </h1>



                    <p class="team-hero__description">
                        A community built around people, participation and
                        shared experiences — where ideas become action,
                        connections become friendships, and everyone gets
                        a chance to grow.
                    </p>



                    <div class="team-hero__actions">



                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="team-btn team-btn--primary">
                                Join Team
                                <span>→</span>
                            </a>
                        @else
                            <a href="#about" class="team-btn team-btn--primary">
                                Discover Team
                                <span>→</span>
                            </a>
                        @endif



                        <a href="#activities" class="team-btn team-btn--secondary">
                            Explore Activities
                        </a>



                    </div>



                </div>



            </div>



            {{-- Hero logo --}}



            <div class="team-hero__visual" aria-hidden="true">



                <div class="team-orbit"></div>



                <div class="team-orbit team-orbit--two"></div>



                <div class="team-logo-card">



                    <img src="{{ asset('images/logo.png') }}" alt="" loading="eager">



                </div>



            </div>



        </section>



        {{-- =====================================================
     STATS
====================================================== --}}



        <section class="team-stats">



            <div class="team-container">



                <div class="team-stats__box">



                    <div class="team-stat">
                        <strong>01</strong>
                        <span>One Community</span>
                    </div>



                    <div class="team-stat">
                        <strong>∞</strong>
                        <span>Ideas & Possibilities</span>
                    </div>



                    <div class="team-stat">
                        <strong>100%</strong>
                        <span>Participation</span>
                    </div>



                </div>



            </div>



        </section>



        {{-- =====================================================
     ABOUT
====================================================== --}}



        <section id="about" class="team-section">



            <div class="team-container">



                <div class="team-section__header">



                    <div class="team-kicker">
                        Who We Are
                    </div>



                    <h2>
                        More than a team.
                        <br>
                        A shared journey.
                    </h2>



                    <p>
                        Team 0001 is about bringing people together and
                        creating meaningful experiences. Everyone brings
                        something different — a skill, an idea, an energy,
                        a perspective.
                    </p>



                </div>



                <div class="team-about">



                    <div class="
                    team-glass
                    team-about__main
                ">



                        <h3>
                            Why Team 0001?
                        </h3>



                        <p>
                            Because the best things rarely happen alone.
                            We believe in creating an environment where
                            people can participate, collaborate, discover
                            their strengths and grow alongside others.
                        </p>



                    </div>



                    <div class="team-about__values">



                        <div
                            class="
                        team-glass
                        team-value
                    ">



                            <div class="team-value__icon">
                                ✦
                            </div>



                            <h3>
                                Connect
                            </h3>



                            <p>
                                Meet people, share experiences and build
                                connections that actually matter.
                            </p>



                        </div>



                        <div
                            class="
                        team-glass
                        team-value
                    ">



                            <div class="team-value__icon">
                                ↗
                            </div>



                            <h3>
                                Grow
                            </h3>



                            <p>
                                Learn from each other and keep moving
                                forward, one experience at a time.
                            </p>



                        </div>



                    </div>



                </div>



            </div>



        </section>



        {{-- =====================================================
     ACTIVITIES
====================================================== --}}



        <section id="activities" class="team-section">



            <div class="team-container">



                <div class="team-section__header">



                    <div class="team-kicker">
                        What We Do
                    </div>



                    <h2>
                        Ideas become
                        <br>
                        experiences.
                    </h2>



                    <p>
                        From creative projects to community events,
                        Team 0001 creates opportunities for people
                        to participate and contribute.
                    </p>



                </div>



                <div class="team-activities">



                    <article class="
                    team-glass
                    team-activity
                ">



                        <span class="team-activity__number">
                            01
                        </span>



                        <div class="team-activity__icon">
                            ✦
                        </div>



                        <h3>
                            Creative Projects
                        </h3>



                        <p>
                            Turn ideas into something real through
                            collaboration, creativity and shared effort.
                        </p>



                    </article>



                    <article class="
                    team-glass
                    team-activity
                ">



                        <span class="team-activity__number">
                            02
                        </span>



                        <div class="team-activity__icon">
                            ◎
                        </div>



                        <h3>
                            Community Events
                        </h3>



                        <p>
                            Meet, participate, celebrate and create
                            experiences that bring the community closer.
                        </p>



                    </article>



                    <article class="
                    team-glass
                    team-activity
                ">



                        <span class="team-activity__number">
                            03
                        </span>



                        <div class="team-activity__icon">
                            ↗
                        </div>



                        <h3>
                            Learn & Grow
                        </h3>



                        <p>
                            Discover new skills, exchange knowledge and
                            grow together with people around you.
                        </p>



                    </article>



                </div>



            </div>



        </section>



        {{-- =====================================================
     EVENTS CTA
====================================================== --}}



        <section id="events" class="team-section">



            <div class="team-container">



                <div class="team-events">



                    <div class="team-kicker">
                        Be Part Of It
                    </div>



                    <h2>
                        Something exciting
                        <br>
                        is always happening.
                    </h2>



                    <p>
                        Discover upcoming activities, meetups and
                        community experiences. There is always a place
                        for another idea, another person and another story.
                    </p>



                    @if (Route::has('events'))
                        <a href="{{ route('events') }}" class="team-btn team-btn--primary">
                            View Events
                            <span>→</span>
                        </a>
                    @else
                        <a href="#activities" class="team-btn team-btn--primary">
                            Explore Team
                            <span>→</span>
                        </a>
                    @endif



                </div>



            </div>



        </section>



        {{-- =====================================================
     GALLERY
====================================================== --}}



        <section id="gallery" class="team-section">



            <div class="team-container">



                <div class="team-section__header">



                    <div class="team-kicker">
                        Our Moments
                    </div>



                    <h2>
                        People.
                        <br>
                        Moments. Memories.
                    </h2>



                    <p>
                        Every gathering becomes a story. Every story
                        becomes part of what makes Team 0001 special.
                    </p>



                </div>



                <div class="team-gallery">



                    <div class="team-gallery__item" data-number="TEAM 0001">
                        <div class="team-gallery__center"></div>
                    </div>



                    <div class="team-gallery__item" data-number="01"></div>



                    <div class="team-gallery__item" data-number="02"></div>



                    <div class="team-gallery__item" data-number="03"></div>



                    <div class="team-gallery__item" data-number="04"></div>



                </div>



            </div>



        </section>



        {{-- =====================================================
     FINAL MESSAGE
====================================================== --}}



        <section class="team-final">



            <div class="team-container">



                <div class="team-final__mark">
                    “
                </div>



                <h2>
                    Different people.
                    One team.
                    Endless possibilities.
                </h2>



                <p>
                    TEAM 0001 — TOGETHER WE CREATE. WE GROW.
                </p>



            </div>



        </section>


    </div>

@endsection
