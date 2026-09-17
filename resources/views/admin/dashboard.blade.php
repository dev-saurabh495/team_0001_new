@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats[0]['value'] }}</h3>
                    <p>{{ $stats[0]['label'] }}</p>
                </div>

                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats[1]['value'] }}</h3>
                    <p>{{ $stats[1]['label'] }}</p>
                </div>

                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats[2]['value'] }}</h3>
                    <p>{{ $stats[2]['label'] }}</p>
                </div>

                <div class="icon">
                    <i class="fas fa-bell"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $stats[3]['value'] }}</h3>
                    <p>{{ $stats[3]['label'] }}</p>
                </div>

                <div class="icon">
                    <i class="fas fa-id-card"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history mr-2"></i>
                        Recent Activity
                    </h3>
                </div>

                <div class="card-body p-0">

                    <ul class="list-group list-group-flush">

                        @forelse($notifications->take(5) as $notification)
                            <li class="list-group-item">

                                <div class="d-flex align-items-start">

                                    <div class="mr-3">
                                        <span
                                            class="badge badge-{{ $notification->read_at ? 'secondary' : 'warning' }} p-2">
                                            <i class="fas fa-bell"></i>
                                        </span>
                                    </div>

                                    <div>

                                        <strong>
                                            {{ $notification->data['title'] ?? 'Activity update' }}
                                        </strong>

                                        <div class="text-muted small mt-1">
                                            {{ $notification->data['message'] ?? '' }}
                                        </div>

                                        <div class="text-muted small mt-1">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </div>

                                    </div>

                                </div>

                            </li>

                        @empty

                            <li class="list-group-item text-center text-muted py-4">
                                No recent activity.
                            </li>
                        @endforelse

                    </ul>

                </div>
            </div>

        </div>


        <div class="col-md-4">

            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-check mr-2"></i>
                        Account
                    </h3>
                </div>

                <div class="card-body">

                    <div class="text-center mb-3">

                        <div class="mb-2">
                            <i class="fas fa-user-circle fa-4x text-primary"></i>
                        </div>

                        <h4 class="mb-1">
                            {{ $user->name }}
                        </h4>

                        <p class="text-muted mb-0">
                            {{ $user->email }}
                        </p>

                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-6">
                            <strong>Member ID</strong>
                        </div>

                        <div class="col-6 text-right">
                            {{ $user->member_id ?? 'Pending' }}
                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-6">
                            <strong>Role</strong>
                        </div>

                        <div class="col-6 text-right text-capitalize">
                            {{ str_replace('-', ' ', $user->getRoleNames()->first() ?? 'member') }}
                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-6">
                            <strong>Status</strong>
                        </div>

                        <div class="col-6 text-right">
                            <span class="badge badge-success">
                                Active
                            </span>
                        </div>

                    </div>

                </div>

                <div class="card-footer">

                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block">
                        <i class="fas fa-user-edit mr-1"></i>
                        Manage Profile
                    </a>

                </div>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-md-4">

            <div class="info-box">
                <span class="info-box-icon bg-info">
                    <i class="fas fa-users"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Community Members</span>
                    <span class="info-box-number">
                        {{ $user::query()->count() }}
                    </span>
                </div>
            </div>

        </div>


        <div class="col-md-4">

            <div class="info-box">
                <span class="info-box-icon bg-warning">
                    <i class="fas fa-bell"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Notifications</span>
                    <span class="info-box-number">
                        {{ $notifications->count() }}
                    </span>
                </div>
            </div>

        </div>


        <div class="col-md-4">

            <div class="info-box">
                <span class="info-box-icon bg-success">
                    <i class="fas fa-clock"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Member Since</span>
                    <span class="info-box-number">
                        {{ $user->created_at?->diffInDays(now()) ?? 0 }}
                        <small>days</small>
                    </span>
                </div>
            </div>

        </div>

    </div>

 
@section('css')

    <style>
        :root {
            --team-navy: #0d1b2a;
            --team-navy-2: #1b263b;
            --team-gold: #d4af37;
            --team-text: #f5f7fa;
            --team-muted: #aab4c3;
            --team-border: rgba(212, 175, 55, 0.18);
        }

        body {
            background: #0d1b2a !important;
            color: var(--team-text);
        }

        .content-wrapper {
            background: #0d1b2a !important;
        }

        .content-header h1 {
            color: #ffffff;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .content-header p {
            color: var(--team-muted);
        }


        /* =========================
           TEAM 0001 STAT CARDS
           ========================= */

        .team-stat-card {
            position: relative;
            overflow: hidden;
            min-height: 145px;
            border-radius: 14px;
            padding: 24px;
            background: linear-gradient(145deg,
                    #18263b,
                    #111e30);
            border: 1px solid var(--team-border);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.18);
            transition: all 0.3s ease;
        }

        .team-stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(212, 175, 55, 0.55);
            box-shadow:
                0 14px 35px rgba(0, 0, 0, 0.3),
                0 0 20px rgba(212, 175, 55, 0.08);
        }

        .team-stat-card .stat-content {
            position: relative;
            z-index: 2;
        }

        .team-stat-card .stat-label {
            display: block;
            color: var(--team-muted);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .team-stat-card .stat-value {
            display: block;
            color: #ffffff;
            font-size: 30px;
            font-weight: 700;
            line-height: 1.15;
            word-break: break-word;
        }

        .team-stat-card .stat-detail {
            display: block;
            color: var(--team-gold);
            font-size: 12px;
            margin-top: 10px;
        }

        /* Icon */

        .team-stat-icon {
            position: absolute;
            right: 20px;
            top: 20px;

            width: 52px;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: rgba(212, 175, 55, 0.10);
            border: 1px solid rgba(212, 175, 55, 0.20);

            color: var(--team-gold);

            font-size: 21px;

            transition:
                transform 0.35s ease,
                background 0.35s ease,
                box-shadow 0.35s ease;
        }

        .team-stat-card:hover .team-stat-icon {
            transform: rotate(8deg) scale(1.12);
            background: rgba(212, 175, 55, 0.18);
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.20);
        }


        /* =========================
           GENERAL CARDS
           ========================= */

        .card {
            background: #162438 !important;
            border: 1px solid rgba(255, 255, 255, 0.07) !important;
            border-radius: 14px !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.18) !important;
            overflow: hidden;
        }

        .card-header {
            background: transparent !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07) !important;
            padding: 18px 20px !important;
        }

        .card-title {
            color: #ffffff !important;
            font-weight: 600;
        }

        .card-body {
            color: #e9edf3;
        }

        .card-footer {
            background: transparent !important;
            border-top: 1px solid rgba(255, 255, 255, 0.07) !important;
        }


        /* =========================
           ACCOUNT CARD
           ========================= */

        .team-account-card {
            background: linear-gradient(145deg,
                    #18263b,
                    #101d2e) !important;
        }

        .team-account-icon {
            width: 76px;
            height: 76px;
            margin: auto;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: rgba(212, 175, 55, 0.10);
            border: 1px solid rgba(212, 175, 55, 0.30);

            color: var(--team-gold);

            transition: all 0.35s ease;
        }

        .team-account-icon i {
            transition: transform 0.35s ease;
        }

        .team-account-icon:hover {
            background: rgba(212, 175, 55, 0.18);
            box-shadow: 0 0 25px rgba(212, 175, 55, 0.15);
        }

        .team-account-icon:hover i {
            transform: scale(1.15) rotate(5deg);
        }


        /* =========================
           ACTIVITY
           ========================= */

        .team-activity-item {
            padding: 18px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            transition: background 0.25s ease;
        }

        .team-activity-item:last-child {
            border-bottom: 0;
        }

        .team-activity-item:hover {
            background: rgba(212, 175, 55, 0.04);
        }

        .team-activity-icon {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 10px;

            color: var(--team-gold);
            background: rgba(212, 175, 55, 0.10);

            transition: all 0.3s ease;
        }

        .team-activity-item:hover .team-activity-icon {
            transform: translateX(4px) rotate(5deg);
            background: rgba(212, 175, 55, 0.18);
        }


        /* =========================
           BUTTONS
           ========================= */

        .btn-team {
            background: var(--team-gold);
            border: none;
            color: #111827;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.25s ease;
        }

        .btn-team:hover {
            background: #e3c34c;
            color: #111827;
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(212, 175, 55, 0.18);
        }


        /* =========================
           INFO BOXES
           ========================= */

        .team-info-box {
            display: flex;
            align-items: center;

            padding: 18px;

            min-height: 95px;

            background: #162438;
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 12px;

            transition: all 0.3s ease;
        }

        .team-info-box:hover {
            transform: translateY(-4px);
            border-color: rgba(212, 175, 55, 0.35);
        }

        .team-info-icon {
            width: 50px;
            height: 50px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-right: 15px;

            border-radius: 12px;

            color: var(--team-gold);
            background: rgba(212, 175, 55, 0.10);

            font-size: 20px;

            transition: all 0.3s ease;
        }

        .team-info-box:hover .team-info-icon {
            transform: scale(1.1) rotate(5deg);
            background: rgba(212, 175, 55, 0.18);
        }

        .team-info-label {
            display: block;
            color: var(--team-muted);
            font-size: 13px;
        }

        .team-info-value {
            display: block;
            color: #ffffff;
            font-size: 22px;
            font-weight: 700;
            margin-top: 3px;
        }


        /* =========================
           RESPONSIVE
           ========================= */

        @media (max-width: 767px) {

            .team-stat-card {
                min-height: 130px;
                padding: 20px;
            }

            .team-stat-card .stat-value {
                font-size: 24px;
            }

            .team-stat-icon {
                width: 45px;
                height: 45px;
                right: 15px;
                top: 15px;
            }

        }
    </style>

@stop
