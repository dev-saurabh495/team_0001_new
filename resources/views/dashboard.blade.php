@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <h1 class="m-0">Dashboard</h1>
            <small class="text-muted">
                Welcome back, {{ $user->name }}
            </small>
        </div>


    </div>
@stop


@section('content')

    <div class="container-fluid">

        {{-- Overview --}}
        <div class="row">

            <div class="col-md-6">

                <div class="info-box bg-white">

                    <span class="info-box-icon bg-primary">
                        <i class="fas fa-id-card"></i>
                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text text-muted">
                            Member ID
                        </span>

                        <span class="info-box-number">
                            {{ $user->member_id ?? 'Pending' }}
                        </span>

                    </div>

                </div>

            </div>


            <div class="col-md-6">

                <div class="info-box bg-white">

                    <span class="info-box-icon bg-success">
                        <i class="fas fa-check"></i>
                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text text-muted">
                            Account
                        </span>

                        <span class="info-box-number">
                            Active
                        </span>

                    </div>

                </div>

            </div>

        </div>


        <div class="row">

            {{-- Activity --}}
            <div class="col-lg-8">

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">
                            <i class="fas fa-bell mr-2 text-primary"></i>
                            Recent Activity
                        </h3>

                        @if ($unreadNotifications > 0)
                            <div class="card-tools">

                                <span class="badge badge-warning">
                                    {{ $unreadNotifications }} unread
                                </span>

                            </div>
                        @endif

                    </div>


                    <div class="card-body p-0">

                        @forelse($notifications->take(5) as $notification)
                            <div class="d-flex align-items-center px-3 py-3 border-bottom">

                                <div class="mr-3">

                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                        style="width:42px;height:42px;">

                                        <i class="fas fa-bell text-primary"></i>

                                    </div>

                                </div>


                                <div class="flex-grow-1">

                                    <div class="font-weight-bold">

                                        {{ $notification->data['title'] ?? 'Activity update' }}

                                    </div>

                                    @if (!empty($notification->data['message']))
                                        <div class="text-muted small">
                                            {{ $notification->data['message'] }}
                                        </div>
                                    @endif

                                    <div class="text-muted small mt-1">

                                        <i class="far fa-clock mr-1"></i>

                                        {{ $notification->created_at->diffForHumans() }}

                                    </div>

                                </div>


                                @if (!$notification->read_at)
                                    <span class="badge badge-primary">
                                        New
                                    </span>
                                @endif

                            </div>

                        @empty

                            <div class="text-center py-5 text-muted">

                                <i class="far fa-bell-slash fa-2x mb-3"></i>

                                <p class="mb-0">
                                    No recent activity
                                </p>

                            </div>
                        @endforelse

                    </div>

                </div>

            </div>


            {{-- Profile --}}
            <div class="col-lg-4">

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">
                            <i class="fas fa-user mr-2 text-primary"></i>
                            My Profile
                        </h3>

                    </div>


                    <div class="card-body">

                        <div class="text-center mb-4">

                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center text-white"
                                style="width:70px;height:70px;font-size:25px;">

                                {{ strtoupper(substr($user->name, 0, 1)) }}

                            </div>

                            <h5 class="mt-3 mb-1">
                                {{ $user->name }}
                            </h5>

                            <p class="text-muted small mb-0">
                                {{ $user->email }}
                            </p>

                        </div>


                        <div class="border-top pt-3">

                            <div class="d-flex justify-content-between mb-3">

                                <span class="text-muted">
                                    Member ID
                                </span>

                                <strong>
                                    {{ $user->member_id ?? 'Pending' }}
                                </strong>

                            </div>


                            <div class="d-flex justify-content-between mb-3">

                                <span class="text-muted">
                                    Phone
                                </span>

                                <strong>
                                    {{ $user->phone ?? 'Not added' }}
                                </strong>

                            </div>


                            <div class="d-flex justify-content-between">

                                <span class="text-muted">
                                    Joined
                                </span>

                                <strong>
                                    {{ $user->created_at?->format('d M Y') }}
                                </strong>

                            </div>

                        </div>

                    </div>


                    <div class="card-footer">

                        <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block">

                            <i class="fas fa-user-edit mr-1"></i>
                            Edit Profile

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

@stop
